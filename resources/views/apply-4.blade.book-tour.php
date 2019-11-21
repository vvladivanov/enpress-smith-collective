@extends('layouts.app', ['apply' => true])
@section ('content')
  <app-apply class="section-apply">
    {{ link_to(Session::get('previous_path', '/'), '', ['class' => 'close']) }}
    <div class="apply-body">
      <div class="apply-image" style="background-image: url('{{ asset('/dist/media/images/apply-now-4.jpg') }}')">
      </div>
      <div class="apply-main">
        <div class="mb-5">
          <a class="apply-brand" href="{{ url('/') }}">
            <img src="{{ asset('/dist/media/logos/smith-logo-white.png') }}">
          </a>
        </div>
        <div>
          {!! Form::open(['route' => 'apply.store']) !!}
            {{ csrf_field() }}
            <input type="hidden" value="4" name="step">
            <div class="d-flex justify-content-between">
              <div class="form-group mr-2">
                <div class="font-size-xl text-warning">When would you like to book a tour?</div>
              </div>
              <div class="form-group">
                <button class="btn btn-outline-primary text-white" style="min-width: 146px">Skip  →</button>
              </div>
            </div>
            <div class="row row-small">
              <div class="col-md-6">
                <div class="form-group">
                  {{ Form::label('day_of_week', 'Day of the week', ['class'=>'form-caption']) }}
                  {{ Form::select('day_of_week', array_combine(['No tour selected', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'], ['Select one', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']), isset($data['day_of_week']) ? $data['day_of_week'] : '', ['class'=>'form-control custom-select custom-select-icon icon-calendar']) }}
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  {{ Form::label('time', 'Time', ['class'=>'form-caption']) }}
                  {{ Form::select('time', array_combine(['', 'Morning', 'Afternoon'], ['Select one', 'Morning', 'Afternoon']), isset($data['time']) ? $data['time'] : '', ['class'=>'form-control custom-select custom-select-icon icon-time']) }}
                </div>
              </div>
            </div>
            <div class="d-flex justify-content-between">
              {{ link_to_route('apply.back', 'Back', [], ['class'=> 'btn btn-outline-danger text-white']) }}
              <div class="px-2"></div>
              <button class="btn btn-outline-primary text-white">Next</button>
              </div>
            </div>
          {!! Form::open(['url' => 'apply']) !!}
        </div>
      </div>
    </div>
  </app-apply>
  
@endsection