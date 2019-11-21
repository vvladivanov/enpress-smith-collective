<div class="card-eventbrite">
  <a href="{{$data->url}}" target="_blank" class="card-image" style="background-image: url('{{$data->card_image}}')"></a>
  <div class="card-body bg-dark">
    <div class="d-flex">
      <div class="date pr-3">
        <p class="text-primary font-size-sm">{{$data->month}}</p>
        <div class="d-flex justify-content-center">
          <p class="font-size-lg font-weight-medium">{{$data->day}}</p>
        </div>
      </div>
      <div class="content">
        <p class="text-light font-size-lg font-weight-medium"><a class="text-link" href="{{$data->url}}" target="_blank">{{$data->title}}</a></p>
        <p class="font-size-sm">{{$data->date_time}}</p>
        @if($data->venue_guid and $venue = App\Models\Post::where('guid', $data->venue_guid)->first())
          <p class="font-size-sm">{{ $venue->content }}</p>
        @endif
      </div>
    </div>
  </div>
</div>