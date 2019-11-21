@extends('layouts.app', ['apply' => true])
@section ('content')
  <app-apply class="section-apply">
    {{ link_to(Session::get('previous_path', '/'), '', ['class' => 'close']) }}
    <div class="apply-body">
      <div class="apply-image" style="background-image: url('{{ asset('/dist/media/images/apply-now-5.jpg') }}')">
      </div>
      <div class="apply-main">
        <div class="mb-5">
          <a class="apply-brand" href="{{ url('/') }}">
            <img src="{{ asset('/dist/media/logos/smith-logo-white.png') }}">
          </a>
        </div>
        <div class="application-form">
          {!! do_shortcode('[ninja_form id=3]') !!}
          <div class="application-form-back">
            {{ link_to_route('apply.back', 'Back', [], ['class'=> 'btn btn-outline-danger text-white']) }}
          </div>
        </div>
      </div>
    </div>
  </app-apply>
  
@endsection