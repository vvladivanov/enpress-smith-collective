@if(get_field('text_content'))
  <div class="section-rental-option mb-6">
    <div class="container">
      <div class="text-center">
        @php
          the_field('text_content');
        @endphp
        <a href="<?php the_field('text_link');?>" class="text-primary" target="_blank"><?php the_field('link_title');?> </a>
      </div>
    </div>
  </div>
@endif