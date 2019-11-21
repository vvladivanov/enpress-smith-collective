<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Enpress\Models\PostMeta;
use Illuminate\Http\Request;

class EventbriteController extends Controller
{
    public function whatson() {
        $events = Post::type('event')->get();
        $events = $events->filter(function($event){
            $now = date('Y-m-d H:i:s');
            return $now < $event->getMeta('end');
        });
        $page = get_post();
        $template = get_page_template_slug( $page->ID );
        return view($template, [
            'events' => $events,
            'page' => $page
        ]);
    }

    public function webhook(Request $request) {
        $config = $request->get('config', []) + ['action' => ''];
        switch ($config['action']) {
            case 'event.updated':
                return $this->updateEvent($request->api_url);

            case 'venue.updated':
                return $this->updateVenue($request->api_url);
        }
    }

    public function request($url) {
        if (!$token = env('EVENTBRITE_TOKEN')) {
            throw new Exception('EVENTBRITE_TOKEN not set', 1);
        }
        if (!$res = file_get_contents("$url?token=$token")) {
            throw new Exception('No response from Eventbrite', 1);
        }
        if (!$data = json_decode($res)) {
            throw new Exception('Not json', 1);
        }
        return $data;
    }

    public function updateEvent($url) {
        $data = $this->request($url);

        $external_id = sanitize_title($data->name->text . ' ' . $data->id);

        $post = Post::type('event')->where('post_name', $external_id)->first() ?: new Post();
        $post->type = 'event';
        $post->title = $data->name->text;
        $post->post_name = $external_id;
        $post->post_date = $post->post_date_gmt = date('Y-m-d H:i:s', strtotime($data->start->local));
        $post->post_modified = $post->post_modified_gmt = date('Y-m-d H:i:s', strtotime($data->changed));
        $post->content = $post->excerpt = $data->description->html;
        $post->to_ping = $post->pinged = $post->post_content_filtered = '';
        $post->comment_status = 'closed';
        $post->save();

        update_post_meta($post->id, 'end', date('Y-m-d 23:59:59', strtotime($data->end->local)));
        update_post_meta($post->id, 'external_url', $data->url);
        update_post_meta($post->id, 'thumbnail_url', $data->logo->url);
        update_post_meta($post->id, 'venue_guid', 'venue-' . $data->venue_id);

        if ($data->status != 'live') {
            $post->delete();
            return 'deleted';
        }

        return $post->id;
    }

    public function updateVenue($url) {
        $data = $this->request($url);
        $post = Post::type('venue')->where('post_title', $data->name)->first() ?: new Post();
        $post->type = 'venue';
        $post->title = $data->name;
        $post->post_name = sanitize_title($post->title);
        $post->guid = 'venue-' . $data->id;
        $post->post_date = $post->post_date_gmt = date('Y-m-d H:i:s');
        $post->post_modified = $post->post_modified_gmt = date('Y-m-d H:i:s');
        $post->content = $post->excerpt = $data->address->localized_address_display;
        $post->to_ping = $post->pinged = $post->post_content_filtered = '';
        $post->comment_status = 'closed';
        $post->save();
        return $post->id;
    }

}
