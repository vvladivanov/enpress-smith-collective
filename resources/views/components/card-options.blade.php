@if(get_sub_field('card_type') === 'With Image')
  <div class="col-lg-6 col-xl-4 mb-6">
    <a class="card-options" @if (get_sub_field('cta_link')) href="{{ $data->action_url }}" @endif>
      <div class="card-content px-6 py-5" style="background-color: {{ $data->bg_color }};">
        <h2 class="subtitle h3 h2-xl">{{ $data->title }}</h2>
        @if (isset($data->content) && !empty($data->content))
          <p class="font-size-sm mt-2">
            {!! $data->content !!}
          </p>
        @endif
      </div>
      <div class="card-image" style="background-image: url('{{ $data->image }}')">
        @if (get_sub_field('cta_link'))
          <div class="link" style="background-color: {{ $data->bg_color }};">
            <i class="icon icon-arrow-black icon-sm"></i>
          </div>
        @endif
      </div>
    </a>
  </div>
@endif
@if(get_sub_field('card_type') === 'Text Only')
  <div class="col-lg-4 col-md-6 col-sm-12 mb-6 d-flex">
    <div class="card-option pt-0 pt-md-7 pb-5">
      <h4 class="text-warning font-weight-normal">{{ $data->title }}</h4>
      {!! $data->content !!}
      @if(get_sub_field('cta_link'))
        <a href="{{ $data->action_url }}" class="btn btn-outline-primary text-white" target="_blank">
          {{ $data->action_title }}
        </a>
      @endif
    </div>
  </div>
@endif