@extends('layouts.app')
@section ('content')
  @php
    $title = $page->title;
    $content = $page->content;
    $timeline_top = get_field('hero_timeline_top', $page->ID);
    $timeline_text = get_field('hero_sideway_text', $page->ID);
    $timeline_icon = get_field('sideway_icon', $page->ID);
  @endphp
  @include('sections.hero-about', [
    'data' => (object)([
      'title' => $title,
      'content' => $content,
      'timeline_top' => $timeline_top,
      'timeline_text' => $timeline_text,
      'timeline_icon' => $timeline_icon
    ])
  ])
  @include('sections.blocks')
  @include('sections.bottom')
@endsection