<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="og:title" content="Smith Collective - Together, we are reinventing rental"/>
    <meta property="og:description" content="A brand new type of rental neighbourhood, with a focus on community, health and wellbeing and an amazing lifestyle in the heart of Southport.">
    <meta property="og:site_name" content="Smith Collective"/>
    <meta property="og:image" content="{{ asset('dist/media/images/smith-og-image.jpg') }}" />
    {!! App\Assets::style('app') !!}
    <link rel="icon" type="image/png" href="{{ asset('dist/media/logos/smith-favicon.png') }}" />
    <title>{{ (isset($title) ? $title . ' - ' : '') . "Smith Collective - Renter's community in the heart of Southport" }}</title>

    {{ wp_head() }}
    
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-TXRVW7N');</script>
    <!-- End Google Tag Manager -->
</head>
<body class="loading">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TXRVW7N"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

  <div class="site">
    @if (empty($apply))
      @include('layouts.partials.header')
    @endif
    <div class="site-content">
      @yield('content')
    </div>
    @if (empty($apply))
      @include('layouts.partials.footer')
    @endif
  </div>
  <app-tent class="site-tent"></app-tent>
  {{ wp_footer() }}
  
  {!! App\Assets::script('polyfills') !!}
  {!! App\Assets::script('app') !!}
  @stack('scripts')

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-128390706-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-128390706-1');
  </script>

  <!-- Facebook Pixel Code -->
  <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function()
    
    {n.callMethod? n.callMethod.apply(n,arguments):n.queue.push(arguments)}
    ;
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window,document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '2237091776362926'); 
    fbq('track', 'PageView');
  </script>
  <noscript>
    <img height="1" width="1" 
    src="https://www.facebook.com/tr?id=2237091776362926&ev=PageView
    &noscript=1"/>
  </noscript>
  <!-- End Facebook Pixel Code -->
</body>
</html>
