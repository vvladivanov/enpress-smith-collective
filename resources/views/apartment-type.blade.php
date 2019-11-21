@extends('layouts.app')
@section ('content')
    @php
      $title = $apartment->title;
      @endphp
      @include('sections.bed-apartment')
    @php
      if(have_rows('feature_carousel', $apartment->ID)) :
        while(have_rows('feature_carousel', $apartment->ID)) : the_row();
          @endphp
            @include('components.gallery')
          <?php
        endwhile; 
      endif;?>
    @php
      if (have_rows('apartment_plan', $apartment->ID)) :
        while(have_rows('apartment_plan', $apartment->ID)) : the_row();
          @endphp
          @include('sections.apartment-plan')
          <?php
        endwhile; 
      endif;
      if (have_rows('apartment_video', $apartment->ID)) :
        while(have_rows('apartment_video', $apartment->ID)) : the_row();
          ?>
            @include('sections.apartment-video')
          <?php 
        endwhile;
      endif;
    ?>
  @include('sections.bottom')
@endsection