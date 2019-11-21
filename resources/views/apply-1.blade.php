@extends('layouts.app', ['apply' => true])

@section ('content')
  <app-apply class="section-apply">
    {{ link_to(Session::get('previous_path', '/'), '', ['class' => 'close']) }}
    <div class="apply-body">
      <div class="apply-image" style="background-image: url('{{ asset('/dist/media/images/apply-now-1.jpg') }}')">
      </div>
      <div class="apply-main">
        <div class="mb-5">
          <a class="apply-brand" href="{{ url('/') }}">
            <img src="{{ asset('/dist/media/logos/smith-logo-white.png') }}">
          </a>
          {{-- <div class="apply-content">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis nisi eget mi commodo posuere eget sed odio. Phasellus nisi mi, tincidunt a urna at, blandit molestie augue.</p>
          </div> --}}
        </div>
        <div>
          {!! Form::open(['route' => 'apply.store']) !!}
            {{ csrf_field() }}
            <input type="hidden" value="1" name="step">
            <p class="text-warning font-size-xl mb-5">What are you looking for?</p>
            <div class="row row-small mb-6">
              <div class="col-lg-4">
                @include ('components.appointment', [
                  'data' => (object)([
                    'name' => 'apartment_1-bed-apartment',
                    'checked' => !empty($data['apartment_1-bed-apartment']),
                    'value' => 'One bed',
                    'icons' => ['bed'],
                    'title' => '1 bed apartment'
                  ])
                ])
              </div>
              <div class="col-lg-4">
                @include ('components.appointment', [
                  'data' => (object)([
                    'name' => 'apartment_2-bed-apartment',
                    'checked' => !empty($data['apartment_2-bed-apartment']),
                    'value' => 'Two bed',
                    'icons' => ['bed', 'bed'],
                    'title' => '2 bed apartment'
                  ])
                ])
              </div>
              <div class="col-lg-4">
                @include ('components.appointment', [
                  'data' => (object)([
                    'name' => 'apartment_3-bed-townhouse',
                    'checked' => !empty($data['apartment_3-bed-townhouse']),
                    'value' => 'Three bed',
                    'icons' => ['bed', 'bed', 'bed'],
                    'title' => '3 bed townhouse'
                  ])
                ])
              </div>
            </div>
            <p class="text-warning font-size-xl mb-5">Do you need any extras?</p>
            <div class="custom-control custom-checkbox mb-3">
              <input type="checkbox" class="custom-control-input" id="checkbox-after-an-accessible-property" name="extra_accessible-property" 
                value="After an Accessible Property" @if (!empty($data['extra_accessible-property'])) checked @endif>
              <label class="custom-control-label font-size-sm" for="checkbox-after-an-accessible-property">I’m after an accessible property</label>
            </div>
            <div class="custom-control custom-checkbox mb-5">
              <input type="checkbox" class="custom-control-input" id="checkbox-need-a-space-for-my-pet" name="extra_space-for-pet" 
                value="Space for Pet" @if (!empty($data['extra_space-for-pet'])) checked @endif>
              <label class="custom-control-label font-size-sm" for="checkbox-need-a-space-for-my-pet">I need a space for my pet</label>
            </div>
            <div class="text-right">
              <button class="btn btn-outline-primary text-white">Next</button>
            </div>
          {!! Form:: close() !!}
        </div>
      </div>
    </div>
  </app-apply>
  
@endsection