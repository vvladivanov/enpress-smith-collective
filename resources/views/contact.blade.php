@extends('layouts.app')
@section ('content')
  <div class="section section-contact pt-6 pt-md-14 pb-6">
    <app-parallax class="parallax-full">
      <div class="parallax-background" data-depth="0.3"></div>
    </app-parallax>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 mb-6">
          <h1 class="text-primary h3 h1-md mb-4 mb-md-6"><?php the_field('title', $page->ID);?></h1>
          @php
            the_field('content',$page->ID);
          @endphp
        </div>
        <div class="col-lg-6 pr-md-0">
          <div class="bg-dark pt-1 pl-1">
            <div class="card-contact px-3 px-md-6 py-5 py-md-8">
              <p class="font-size-xl text-warning mb-5">Request a callback</p>
              {!! do_shortcode('[ninja_form id=1]') !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('sections.bottom')
@endsection