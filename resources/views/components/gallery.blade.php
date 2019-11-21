@php
  $gallery_type = get_sub_field('gallery_type');
  $gallery_background = get_sub_field('gallery_background');
  $subtitle = get_sub_field('gallery_subtitle');
  $title = get_sub_field('gallery_title');
  if($gallery_type === 'three-column-feature-image') :
    $left_content = get_sub_field('left_content');
    $right_content = get_sub_field('right_content');
  else :
    $content = get_sub_field('gallery_content');  
  endif;
  $link = get_sub_field('cta_link');
  $action_title = get_sub_field('cta_label');
  $features = get_sub_field('gallery_features');
  $galleries = get_sub_field('gallery_image');
  if(!$gallery_type) :
    $gallery_type = 'gallery-features';
  endif;
@endphp
<app-gallery class="section-gallery gallery {{ $gallery_type }}">
  <div class="gallery-main">
    <div class="gallery-background" style="background-image: url('{{ $gallery_background }}')"></div>
    <div class="gallery-content-field">
      <div class="gallery-content-main">
        <h3 class="subtitle mb-0">{{ $subtitle }}</h3>
        <h1 class="title">{{ $title }}</h1>
        <div class="content">
          <?php
            if($gallery_type === 'three-column-feature-image') :
             ?>
              <div class="left-content">
                <?php  echo $left_content; ?>
              </div>
              <div class="right-content">
                <?php echo $right_content; ?>
              </div>
             <?php
            else :
              echo $content;
            endif;
          ?>
        </div>
        @if ($link != '')
          <a href="{{ $link }}" class="btn btn-outline-danger">{{ $action_title }}</a>
        @endif
      </div>
      @if ($features != '')
        <div class="gallery-content-feature">
          <h1 class="title text-white">Features</h1>
          {!! $features !!}
        </div>
      @endif
    </div>
    <div class="gallery-content"></div>
  </div>
  <div class="gallery-collection"> 
    <div class="gallery-collection-display">
      @foreach ($galleries as $gallery)
        <div class="gallery-item">
          <div class="gallery-image" style="background-image: url('<?php echo $gallery['url'];?>')">
          <script data-item="content-info" type="text/html" @if (isset($gallery['caption'])) data-mark="<?php echo $gallery['caption'];?>" @endif>
          </script>
          </div>
        </div>
      @endforeach
    </div>
    @if ($gallery_type === 'gallery-features')
      <div class="gallery-collection-nav">
        @foreach($galleries as $gallery)
          <div class="gallery-collection-nav-item" style="background: url('<?php echo $gallery['url']?>');"></div>
        @endforeach
      </div>
    @endif
    
    @if (count($galleries) > 1)
      <div class="gallery-control">
        <div class="gallery-pagination">
          <div class="gallery-dots"></div>
          &nbsp;/&nbsp;&nbsp;
          <div class="gallery-count">{{ count($galleries) }}</div>
        </div>
        <div class="gallery-mark"><?php echo $gallery['caption']?></div>
        <div class="gallery-arrows"></div>
      </div>
    @endif
  </div>
</app-gallery>