@php
  $path = Request::path();
@endphp
<div class="site-header">
  <app-navigation class="navigation">
    <div class="navigation-main">
      <a class="navigation-brand" href="{{ url('/') }}">
        <img src="{{ asset('/dist/media/logos/smith-logo-white.png' ) }}" class="animation-icon" title="Smith Collective">
        {{-- <app-animation-icon class="animation-icon" data-animation="logo"></app-animation-icon> --}}
      </a>
      <button class="navigation-toggler">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="btn btn-outline-primary text-white navigation-button d-none d-lg-block" href="{{ url('apply') }}">Enquire now</a>
    </div>
    <div class="navigation-collapsible">
      <a class="btn btn-outline-primary text-white navigation-button btn-block d-block d-lg-none" href="{{ url('apply') }}">Enquire now</a>
      @if (!empty($primaryMenuItems))
        <ul class="navigation-menu">
          @foreach ($primaryMenuItems as $menuItem)
            <li class="{{ $menuItem->current ? ' active' : '' }}">
              <a class="nav-item"
                href="{{ $menuItem->url }}">
                {{ $menuItem->title }}
              </a>
              @if (isset($menuItem->wpse_children))
                <ul class="navigation-submenu">
                  @foreach ($menuItem->wpse_children as $submenuItem)
                  <li class="{{ $submenuItem->current ? ' active' : '' }}">
                    <a class="nav-item"
                      href="{{ $submenuItem->url }}">
                      {{ $submenuItem->title }}
                    </a>
                  </li>
                  @endforeach
                </ul>
              @endif
            </li>
          @endforeach
        </ul>
      @endif
    </div>
  </app-navigation>
</div>
