@php
  $args = array(
    'post_type' => 'apartment',
    'order' => 'asc',
    'orderby' => 'title'
  );
  $apartment = new WP_Query($args);
  $bg_color = ['#F7D8BA','#F1BFB8','#B8E3DE'];
@endphp
@if(count($apartment) > 0)
  <app-apartment-cards class="section-apartment-cards">
    <div class="container">
      <div class="row justify-content-center">
        @while ($apartment->have_posts())
          @php
            $apartment->the_post();
            $check_link = get_field('link_allow');
            $k = mt_rand(0, 2);
            if($check_link === '' || $check_link === null):
              $link_url = null;
            else:
              $link_url = get_post_permalink();
            endif
          @endphp
          <div class="col-lg-6 col-xl-4 mb-6">
            <a class="card-options" @if($check_link != null) href="{{ $link_url }} @endif">
              <div class="card-content px-6 py-5" style="background-color:{{ $bg_color[$k] }};">
                <h2 class="subtitle h3 h2-xl">{{ the_title() }}</h2>
                <div class="font-size-sm mt-2">
                  {!! the_content() !!}
                </div>
              </div>
              <div class="card-image" style="background-image: url('{{ get_the_post_thumbnail_url() }}')">
                @if($link_url != null)
                  <div class="link" style="background-color: {{ $bg_color[$k] }};">
                    <i class="icon icon-arrow-black icon-sm"></i>
                  </div>
                @endif
              </div>
            </a>
          </div>
        @endwhile
      </div>
    </div>
  </app-apartment-cards>
  @php wp_reset_postdata(); @endphp
@endif