@php 
  $class = isset($data->class) ? $data->class : ''
@endphp
<div class="section section-hero-main {{ $class }}">
  <div class="timeline timeline-left">
    <i class="icon icon-base" style="top: {{ $data->timeline_top }}">
      <img class="w-100" src="{{ $data->timeline_icon }}" />
    </i>
    <span class="text text-info" style="top: {{ $data->timeline_top }};">{{ $data->timeline_text }}</span>
    <span class="mark" style="top: {{ $data->timeline_top }};"></span>
  </div>
  <div class="hero-main pt-5 pt-lg-0">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-7 col-xl-6 pr-xl-11 mb-4">
          <div class="hero-content">
            <h1 class="text-primary subtitle mb-md-5">{{ $data->title }}</h1>
            @if (isset($data->content))
              <div>
                {!! $data->content !!}
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row no-gutters">
    <div class="offset-lg-7 offset-xl-6 col-lg-5 col-xl-6">
      <div class="hero-image" style="background-image: url('{{ $data->image }}');"></div>
    </div>
  </div>
  @if ($class === "living-here-view")
    @include ('components.card-weather')
  @endif
</div>