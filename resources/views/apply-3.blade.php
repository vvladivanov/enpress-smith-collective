@extends('layouts.app', ['apply' => true])
@section ('content')
  <app-apply class="section-apply">
    {{ link_to(Session::get('previous_path', '/'), '', ['class' => 'close']) }}
    <div class="apply-body">
      <div class="apply-image" style="background-image: url('{{ asset('/dist/media/images/apply-now-3.jpg') }}')">
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
            <input type="hidden" value="3" name="step">
            <p class="text-warning font-size-xl">
              What is your rental budget?
            </p>
            <div class="flex">
              <div class="mt-10 mb-10">
                <input type="hidden" name="budget_min" id="budget_min">
                <input type="hidden" name="budget_max" id="budget_max">
                <app-rangeslider
                  data-options='{
                    "start": [{{ isset($data['budget_min']) ? $data['budget_min'] : 400 }}, {{ isset($data['budget_max']) ? $data['budget_max'] : 600 }}],
                    "connect": true, 
                    "range": {"min": 350, "max": 800}, 
                    "step": 1, 
                    "connectedElements": ["#budget_min", "#budget_max"],
                    "tooltips": true,
                    "format": {
                      "locales": "En-au",
                      "options": {
                        "style": "currency",
                        "currency": "AUD"
                      }
                    }
                  }'
                >
                </app-rangeslider>
              </div>
            </div>
            <div class="d-flex justify-content-between">
              {{ link_to_route('apply.back', 'Back', [], ['class'=> 'btn btn-outline-danger text-white']) }}
              <div class="px-2"></div>
              <button class="btn btn-outline-primary text-white">Next</button>
              </div>
            </div>
            </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </app-apply>
  
@endsection