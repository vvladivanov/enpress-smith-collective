@extends('layouts.app')
@section ('content')
  <div class="section-post py-6 py-md-14">
    <div class="container">
      <h1 class="subtitle text-primary mt-md-10 mb-md-6"><?php the_field('title', $page->ID);?></h1>
      <div class="wp-content">
        @php
          the_field('content', $page->ID);
        @endphp
      </div>     
    </div>
  </div>
@endsection