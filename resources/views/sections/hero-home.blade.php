<app-home-hero class="section section-hero-home bg-dark pb-md-0 pb-lg-12 pb-xl-14">
  <div class="timeline timeline-left">
    <i class="icon icon-base" style="top: <?php the_field('hero_top', $page->ID);?>">
      <img class="w-100" src="<?php the_field('sideway_icon', $page->ID);?>" />
    </i>
    <span class="text text-info" style="top: <?php the_field('hero_top', $page->ID);?>;"><?php the_field('hero_sideway_text', $page->ID)?></span>
    <span class="mark" style="top: <?php the_field('hero_top', $page->ID);?>"></span>
  </div>
  <div class="hero-content mb-2"> 
    {{-- style="background-image: url('{{asset('dist/media/images/homepage-hero.png')}}')" --}}
    <div class="hero-spacer">
      <video playsinline muted loop>
        <source src="{{ asset('/dist/media/videos/hero.webm') }}" type="video/webm">
        <source src="{{ asset('/dist/media/videos/hero.mp4') }}" type="video/mp4">
      </video>
    </div>
    <div class="title-content text-white">
      <h3 class="subtitle">I am a</h3>
      <div class="animation-titles">
        <div class="animation-title" data-animation="hero-text" data-timemark="0"></div>
      </div>
      <h1 class="subtitle">Smith</h1>
    </div>
  </div>
</app-home-hero>