<app-connected class="section section-connected bg-dark">
  <div class="row align-items-center">
    <div class="col-md-6 pr-md-0">
      <div class="connected-map"></div>
    </div>
    <div class="col-md-6 pl-md-0">
      <div class="px-3 px-md-6 py-md-5 pt-0 pb-9">
        <div class="connected-content">
          <h3 class="subtitle text-primary mb-0">{{$data->subtitle}}</h3>
          <span class="title text-white">{{$data->title}}</span>
          {!!$data->content!!}
          <div class="buttons">
            @if (isset($data->action1_url) && !empty($data->action1_url))
              <a href="{{$data->action1_url}}" class="btn btn-outline-primary text-white mr-sm-3 d-block d-sm-inline-block mb-4">{{ $data->action1_title }}</a>
            @endif
            @if (isset($data->action2_url) && !empty($data->action2_url))
              <a href="{{$data->action2_url}}" class="btn btn-outline-danger text-white d-block d-sm-inline-block mb-4">{{ $data->action2_title }}</a>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
  <app-weather class="timeline timeline-right">
    <div class="timeline-content">
      <div class="weather mb-3 d-flex align-items-center">
        <i class="icon weather-icon icon-base mx-3"></i>
        <div class="text-right text-warning font-weight-bold p-2">
          <p class="mb-0 weather-temperature"></p>
          <span>Southport</span>
        </div>
      </div>
      <div class="text-right font-weight-medium">
        <p class="mb-0 text-warning weather-feels-like"></p>
        <p class="mb-0 font-size-sm weather-activity"></p>
      </div>
      <span class="mark"></span>
    </div>
  </app-weather>
</app-connected>