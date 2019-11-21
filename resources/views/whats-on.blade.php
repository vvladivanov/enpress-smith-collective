@extends('layouts.app')
@section ('content')
  @php
    $class = get_field('class_style', $page->ID);
    $title = $page->post_title;
    $content = $page->post_content;
    $image = get_the_post_thumbnail_url();
    $timeline_top = get_field('hero_top', $page->ID);
    $timeline_text = get_field('hero_sideway_text', $page->ID);
    $timeline_icon = get_field('sideway_icon', $page->ID);
  @endphp
  @include('sections.hero-main',[
    'data' => (object)([
      'class' => $class,
      'title' => $title,
      'content' => $content,
      'image' => $image,
      'timeline_top' => $timeline_top,
      'timeline_text' => $timeline_text,
      'timeline_icon' => $timeline_icon

    ])
  ])
  <div class="section section-eventbrite pb-6 pb-md-14 pt-4 pt-md-0">
    <div class="container px-xl-0">
      <div class="row row-small py-md-5 bg-dark pr-md-3">
        @forelse ($events as $event)
            <div class="col-md-6 col-lg-4 mb-4">
              @include('components.card-eventbrite', [
                'data' => (object)([
                  'url' => $event->getMeta('external_url'),
                  'card_image' => $event->getMeta('thumbnail_url'),
                  'month' => $event->date->format('M'),
                  'day' => $event->date->format('d'),
                  'title' => $event->title,
                  'date_time' => $event->date->format('D, M j, g:ia'),
                  'venue_guid' => $event->getMeta('venue_guid')
                ])
              ])
            </div>
        @empty
          <div class="col-sm-12">
            There are currently no events on.
          </div>
        @endforelse
      </div>
    </div>
  </div>
  @include('sections.bottom')
@endsection