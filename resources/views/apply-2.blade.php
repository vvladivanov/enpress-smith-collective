@extends('layouts.app', ['apply' => true])
@section ('content')
  <app-apply class="section-apply">
    {{ link_to(Session::get('previous_path', '/'), '', ['class' => 'close']) }}
    <div class="apply-body">
      <div class="apply-image" style="background-image: url('{{ asset('/dist/media/images/apply-now-2.jpg') }}')">
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
            <input type="hidden" value="2" name="step">
            <input type="hidden" value="Nothing selected" name="move_in">
            <p class="font-size-xl text-warning mb-5">When are you thinking of moving in?</p>
            <div class="row row-small mb-4">
              <div class="col-lg-4">
                @include ('components.appointment', [
                  'data' => (object)([
                    'type' => 'radio',
                    'value' => 'As soon as I can',
                    'checked' => isset($data['move_in']) && $data['move_in'] == 'As soon as I can',
                    'name' => 'move_in',
                    'icons' => ['calendar-soon'],
                    'title' => 'As soon as I can',
                    'timestamp'  => time(),
                  ])
                ])
              </div>
              <div class="col-lg-4">
                @include ('components.appointment', [
                  'data' => (object)([
                    'type'=> 'radio',
                    'value' => 'In the next 3 months',
                    'checked' => isset($data['move_in']) && $data['move_in'] == 'In the next 3 months',
                    'name' => 'move_in',
                    'icons' => ['calendar-3'],
                    'title' => 'In the next 3 months',
                    'timestamp'  => strtotime('+3month'),
                  ])
                ])
              </div>
              <div class="col-lg-4">
                @include ('components.appointment', [
                  'data' => (object)([
                    'type' => 'radio',
                    'value' => 'In the next 6 months',
                    'checked' => isset($data['move_in']) && $data['move_in'] == 'In the next 6 months',
                    'name' => 'move_in',
                    'icons' => ['calendar-6'],
                    'title' => 'In the next 6 months',
                    'timestamp'  => strtotime('+6month'),
                  ])
                ])
              </div>
            </div>
            <p class="hidden" data-timestamp="{{ strtotime('January 2019') }}">We’re thrilled that you’re keen to move in so quickly, please note that apartments and townhouses will be available from January 2019.<p>
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