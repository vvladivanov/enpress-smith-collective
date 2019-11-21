<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PagesController extends Controller
{
    public function page($page)
    {   
        $page = Post::published()->where('post_type', 'page')->where('post_name', $page)->firstOrFail();
        $template = $page->getMeta('_wp_page_template');
        if($template === 'default') {
            echo "<script>alert('Please setting a page template in the Wordpress Backend.');</script>";
            return view('errors/404');
        } else {
            return view($template ?: 'page', compact('page'));
        }
    }
    
    public function home() {
        $page = get_page_by_title('home');
        return view('home' ?: 'home', compact('page'));
    }
    public function apartment($apartment) {
        $apartment = Post::published()->where('post_type', 'apartment')->where('post_name', $apartment)->firstOrFail();
        return view('apartment-type' ?: 'apartment', compact('apartment'));
    }
}
