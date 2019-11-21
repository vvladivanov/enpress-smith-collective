<div class="site-footer">
  <ul class="footer-logos">
    <li>
      <a class="logo-smith-collective" href="/">
        <img src="{{ asset('/dist/media/logos/smith-logo-black.png') }}" alt="Smith Collective Logo" />
      </a>
    </li>
    <li>
      <a class="logo-jil" href="http://www.jll.com/" target="_blank">
        <img src="{{ asset('/dist/media/logos/jil-logo.png') }}" alt="JIL Logo"/>
      </a>
    </li>
  </ul>
  <div class="footer-copyright">
    <span><?php the_field('slogan', 'option');?></span>
  </div>
  <div class="footer-menus align-items-center">
    <ul class="navigation-menu align-items-center">
      <li><?php the_field('address', 'option');?></li>
      <li>
        <a href="<?php the_field('facebook_url', 'option');?>" class="mr-md-3" target="_blank">
          <i class="icon icon-facebook icon-base"></i>
        </a>
        <a href="<?php the_field('instagram_url', 'option');?>" target="_blank">
          <i class="icon icon-insta icon-base"></i>
        </a>
      </li>
      <li class="policy-menu"><a href="<?php the_field('privacy_url', 'option');?>">Privacy</a></li>
    </ul>
  </div>
</div>

<script>
  window.app = {
    url: "{{ url('/') }}",
    csrfToken: "{{ csrf_token() }}"
  };
</script>