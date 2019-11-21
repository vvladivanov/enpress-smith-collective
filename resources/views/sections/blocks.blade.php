@if(have_rows('blocks', $page->ID))
  @php
  $blocks = get_field('blocks', $page->ID);
  foreach($blocks as $block) :  
    the_row();
    if($block['acf_fc_layout'] === 'one_column_copy') :
  @endphp
  <div class="section section-introduction pt-6 pt-sm-5 pt-md-7 pt-lg-9">
    @if (get_sub_field('parallax')) <app-parallax class="parallax-full" > @else <div class="parallax-full"> @endif
      <div class="parallax-background" data-depth="0.3" style="background-image: url('<?php the_sub_field('background_image');?>');"></div>
    @if (get_sub_field('parallax')) </app-parallax> @else </div> @endif
    <div class="container pt-6 pt-sm-5 pt-md-7 pt-lg-1">
      <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-md-6 px-md-0">
          <h3 class="subtitle text-primary mb-0">
            <?php the_sub_field('subtitle');?>
          </h3>
          <h1 class="title text-white pl-3">
            <?php the_sub_field('title');?>
          </h1>
          <?php the_sub_field('content');?>
          <?php
            if( have_rows('ctas') ):
              while(have_rows('ctas')) :
                the_row();
                ?>
                  <a href="<?php the_sub_field('cta_link');?>" class="btn btn-outline-<?php the_sub_field('cta_type');?>"><?php the_sub_field('cta_label');?></a>
                <?php
              endwhile;
            endif;
          ?>
        </div>
      </div>
    </div>
    <div class="timeline timeline-right">
      <i class="icon icon-base">
        <img class="w-100" src="<?php the_sub_field('sideway_icon');?>" />
      </i>
      <span class="text text-info">
        <?php the_sub_field('sideway_fact');?>
      </span>
      <span class="mark"></span>
    </div>
  </div>
  <?php endif;?>
  @php
    if($block['acf_fc_layout'] === 'feature_carousel') :
  @endphp
    @include('components.gallery')
  <?php endif;?>
    @if(have_rows('cards'))
      <app-options-cards class="section-cards">
        <div class="container">
          <div class="row justify-content-center">
            @php
              while(have_rows('cards')) : the_row();
                $background_color = get_sub_field('background_color');
                $title = get_sub_field('title');
                $content = get_sub_field('content');
                $image = get_sub_field('image');
                $action_url = get_sub_field('cta_link');
                $action_title = get_sub_field('cta_label');
            @endphp
              @include('components.card-options', [
                'data' => (object)([
                  'bg_color' => $background_color,
                  'title' => $title,
                  'content' => $content,
                  'image' => $image,
                  'action_url' => $action_url,
                  'action_title' => $action_title
                ])
              ])
            <?php endwhile;?>
          </div>
        </div>
      </app-options-cards>
    @endif

    @if($block['acf_fc_layout'] === 'three_column_copy')
    <div class="section section-rental-options pt-10 mb-6">
      <div class="container">
        <h4><?php the_sub_field('title');?></h4>
        <div class="row">
          <div class="col-lg-4 pr-md-8">
            @if(get_sub_field('subtitle'))<h4><?php the_sub_field('subtitle');?></h4>@endif
            @php
              the_sub_field('subcontent');
            @endphp
          </div>
          <div class="col-lg-8">
            <div class="content">
              @php
                the_sub_field('middle_content');
                the_sub_field('right_content');
              @endphp
            </div>
            @if(get_sub_field('bottom_content'))
              <div class="bottom-content mt-6">
                @php
                  the_sub_field('bottom_content');
                @endphp
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endif
  
    @if($block['acf_fc_layout'] === 'two_column_copy')
      <div class="section-healthy-lifestyle pt-md-10 py-7">
        <div class="container">
          <h4><?php the_sub_field('title');?></h4>
          <div class="row">
            <div class="col-md-6 pr-md-0">
              @php
                the_sub_field('sub_content');
              @endphp
            </div>
            <div class="col-md-6 px-lg-7">
              @php
                the_sub_field('content');
              @endphp
              @if (have_rows('cta')) 
                <?php while(have_rows('cta')) : the_row(); ?>
                  <div class="ml-5 mt-7">
                    <a href="<?php the_sub_field('cta_link');?>" class="btn btn-outline-primary text-white"><?php the_sub_field('cta_label');?></a>
                  </div>
                <?php endwhile; ?>
              @endif
            </div>
          </div>
        </div>
      </div>
    @endif

    @if(get_sub_field('full_image'))
      <div class="section section-facilities-map mr-5 mr-md-8">
        <img class="w-100" src="<?php the_sub_field('full_image');?>" alt="full-image" title="full-image"/>
      </div>
    @endif

    @if(get_sub_field('smith_line_type') === 'left')
      <div class="section section-healthy-lifestyle pb-7">
        <div class="container">
          <div class="row mt-5 mt-md-14 align-items-center">
            <div class="col-lg-6 col-xl-5">
              <div class="title-content text-white">
                <h3 class="subtitle mb-1"><?php the_sub_field('min_title');?></h3>
                <span class="d-inline-block title text-warning"><?php the_sub_field('handwritten_title')?></span>
                <h1 class="subtitle"><?php the_sub_field('smith_title')?></h1>
              </div>
              @if(get_sub_field('cta_link'))
                <a href="<?php the_sub_field('cta_link');?>" class="btn btn-outline-primary text-white mb-5 mb-md-7"><?php the_sub_field('cta_label');?></a>
              @endif
            </div>
            <div class="col-lg-6 col-xl-7 pr-md-0">
              @php
                the_sub_field('content');
              @endphp
            </div>
          </div>
        </div>
      </div>
    @endif

    @if(get_sub_field('smith_line_type') === 'right')
      <div class="section section-opportunities py-6 py-md-13">
        <div class="container">
          <h4 class="text-warning mb-4"><?php the_sub_field('subtitle');?></h4>
          <div class="row align-items-center">
            <div class="col-xl-7 col-lg-6">
              @php
                the_sub_field('content');
              @endphp
            </div>
            <div class="col-xl-5 col-lg-6 pl-xl-7">
              <div class="retail-content mb-5">
                <h6 class="text-white mb-0"><?php the_sub_field('min_title');?></h6>
                <div><span class="title text-warning"><?php the_sub_field('handwritten_title');?></span></div>
                <h2 class="text-white subtitle"><?php the_sub_field('smith_title');?></h2>
              </div>
              @if(get_sub_field('cta_link'))
                <a href="<?php the_sub_field('cta_link');?>" class="btn btn-outline-primary text-white mb-5 mb-md-7"><?php the_sub_field('cta_label');?></a>
              @endif
            </div>
          </div>
        </div>
      </div>
    @endif
  <?php
  endforeach; ?>
@endif