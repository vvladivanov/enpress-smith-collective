
<div class="section section-hero-about pt-md-14">
  @if (get_field('parallax')) <app-parallax class="parallax-full" > @else <div class="parallax-full"> @endif
    <div class="parallax-background" data-depth="0.3" style="background-image: url('<?php the_field('background_image');?>');"></div>
  @if (get_field('parallax')) </app-parallax> @else </div> @endif
  <div class="container pt-md-6 pt-5">
    <div class="row">
      <div class="col-xl-6 col-lg-7 pr-md-0">
        <h1 class="subtitle text-primary mb-4 mb-md-6">{{ $data->title }}</h1>
        {!! $data->content !!}
      </div>
    </div>
  </div>
  <div class="timeline timeline-right">
    <i class="icon icon-base" style="top: {{ $data->timeline_top }}">
      <img class="w-100" src="{{ $data->timeline_icon }}" />
    </i>
    <span class="text text-info" style="top: {{ $data->timeline_top }}">{{ $data->timeline_text }}</span>
    <span class="mark" style="top: {{ $data->timeline_top }}"></span>
  </div>  
</div>
