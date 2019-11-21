@extends('layouts.app')
@section ('content')
  @php
    $title = $page->title;
  @endphp 
  @include('sections.rental-options-hero')
  @include('sections.blocks')
  @include('components.card-apartment')
  @include('sections.rental-options')
  @include('sections.bottom')
@endsection