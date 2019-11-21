@php
  $type = isset($data->type) ? $data->type : 'checkbox';
@endphp

<label class="appointment">
  <input type="{{ $type }}" name="{{ $data->name }}" data-timestamp="{{ isset($data->timestamp) ? $data->timestamp : '' }}"
    @if (isset($data->checked) && $data->checked) checked @endif
    @if (isset($data->value) && $data->value) value="{{ $data->value }}" @endif
  />
  <div class="appointment-body">
    <div class="appointment-icons">
      @foreach ($data->icons as $icon)
        <i class="icon icon-{{ $icon }}"></i>
      @endforeach
    </div>
    <h5 class="mb-0">{{ $data->title }}</h5>
  </div>
</label>
