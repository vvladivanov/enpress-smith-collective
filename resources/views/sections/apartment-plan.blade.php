<app-apartment class="section section-apartment">
  <div class="row align-items-center mt-6 mt-md-13">
    <div class="col-lg-6 pr-lg-10 pl-0 mb-3">
      <a 
        data-fancybox-floor data-src="<?php the_sub_field('floor_image');?>"
        data-caption="<?php the_sub_field('floor_content');?>"
      >
        <img src="<?php the_sub_field('floor_image');?>" class="apartment-image"/>
      </a>
    </div>
    <div class="col-lg-6 pl-lg-0">
      <div class="px-4 pr-md-6 py-md-5 pt-0">
        <div class="apartment-content">
          <h3 class="subtitle text-primary mb-0"><?php the_sub_field('subtitle');?></h3>
          <span class="title text-white"><?php the_sub_field('title');?></span>
          <?php the_sub_field('content');?>
          <a data-fancybox-toggler class="btn btn-outline-primary text-white">View larger plan</a>
        </div>
      </div>
    </div>
  </div>
</app-apartment>