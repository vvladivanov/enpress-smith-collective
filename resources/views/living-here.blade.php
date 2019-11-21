@extends('layouts.app')
@section ('content')
  @php
    $class = get_field('class_style', $page->ID);
    $title = $page->title;
    $content = $page->content;
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
  <div class="section section-social-culture pt-7 mb-6 mb-lg-8">
    <app-parallax class="parallax-full">
      <div class="parallax-background" data-depth="0.3"></div>
    </app-parallax>
    <div class="timeline timeline-right">
      <span class="text text-info">Smith Street, Southport</span>
      <span class="mark"></span>
    </div>
  </div>
  @include('sections.blocks')
  @include('sections.bottom')
@endsection