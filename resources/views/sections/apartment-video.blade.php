<app-apartment class="section section-apartment">
  <div class="pb-3 pb-md-12 pt-5">
    <div class="container">
      <div class="video mx-lg-3" data-fancybox-video data-src="#apartment_video">
        <img src="<?php the_sub_field('video_background');?>"/>
      </div>
    </div>
  </div>
  <video width="1200" height="675" controls id="apartment_video" style="display:none;">
    <source src="<?php the_sub_field('video_webm');?>" type="video/webm">
    <source src="<?php the_sub_field('video_mp4');?>" type="video/mp4">
  </video>
</app-apartment>