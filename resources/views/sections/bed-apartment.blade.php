
<div class="section section-bed-apartment pt-6 pt-md-14 pb-6 pb-md-14">
  <div class="container">
    <h6 class="text-white font-weight-normal mb-2"><?php if(get_field('bed_option', $apartment->ID)) : the_field('bed_option', $apartment->ID); endif; ?></h6>
    <h1 class="text-primary subtitle h3 h1-md"><?php echo $title; ?></h1>
  </div>
</div>