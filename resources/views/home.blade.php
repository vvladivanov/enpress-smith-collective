@extends('layouts.app')
@section ('content')
  @if($page && $page->post_title='home')
    @include('sections.hero-home')
    @include('sections.blocks')
    @php 
      $subtitle = get_field('connected_subtitle', $page->ID);
      $connected_title = get_field('connected_title', $page->ID);
      $content = get_field('connected_content', $page->ID);
      $action1_link = get_field('cta1_link', $page->ID);
      $action1_title = get_field('cta1_label', $page->ID);
      $action2_link = get_field('cta2_link', $page->ID);
      $action2_title = get_field('cta2_label', $page->ID);
    @endphp
    @include('sections.connected', [
      'data' => (object)([
        'subtitle' => $subtitle,
        'title' => $connected_title,
        'content' => $content,
        'action1_url' => $action1_link,
        'action1_title' => $action1_title,
        'action2_url' => $action2_link,
        'action2_title' => $action2_title
      ])
    ])
  @endif
  @include('sections.bottom')
@endsection