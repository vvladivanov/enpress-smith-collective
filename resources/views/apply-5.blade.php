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
        <div>
          <h4 class="text-warning">Thanks so much for registering your interest.</h4>
          <div>
            <p>You will receive an email with some additional information.</p>
            <p>We’ll soon be in touch with you personally, to book in your tour and to answer any questions you might have about Smith Collective.</p>
          </div>
        </div>
      </div>
    </div>
  </app-apply>
@endsection