<div class="section section-rental-options-hero pt-6 ">
  @if (get_field('parallax')) <app-parallax class="parallax-full" > @else <div class="parallax-full"> @endif
    <div class="parallax-background" data-depth="0.3" style="background-image: url('<?php the_field('background_image');?>');"></div>
  @if (get_field('parallax')) </app-parallax> @else </div> @endif
  <div class="container pt-0 pt-md-8">
    <div class="row">
      <div class="col-lg-7">
        <div class="hero-content ml-auto pb-md-14">
          <h1 class="subtitle text-primary mb-4 mb-md-6"><?php echo $title; ?></h1>
          @php
            echo $page->content;
          @endphp
        </div>
      </div>
    </div>
  </div>
</div>