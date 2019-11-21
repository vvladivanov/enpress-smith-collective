<div class="section-bottom">
  <div class="row align-items-center">
    <div class="col-lg-6 pr-lg-0">
      <div class="bottom-apply-now">
        <div class="card card-apply-now">
          <div class="card-body">
            <h2 class="text-white subtitle">Apply Now</h2>
              {!! the_field('content', 'option') !!}
            <a class="btn btn-outline-light text-dark d-block d-md-inline-block" href="{{ url('/apply') }}">{!! the_field('cta_label', 'option') !!}</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 pl-lg-0">
      <div class="bottom-subscribe text-lg-left text-center">
          <div class="card">
            <div class="card-body">
              <div class="heading">
                <h1 class="title text-warning">Let's move in together</h1>
                {!! do_shortcode('[ninja_form id=2]') !!}
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
  <div class="timeline timeline-left">
    @if(get_field('timeline_icon', 'option'))
      <i class="icon icon-base">
        <img class="w-100" src="<?php the_field('sideway_icon', 'option');?>" />
      </i>
    @endif
    <span class="text text-dark">
      <?php the_field('sideway_fact', 'option');?>
    </span>
    <span class="mark"></span>
  </div>
</div>