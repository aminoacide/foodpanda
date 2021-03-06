<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', app_name())</title>

        <!-- Meta -->
        <meta name="description" content="@yield('meta_description', 'Laravel 5 Boilerplate')">
        <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
        @yield('meta')

        <!-- Styles -->
        @yield('before-styles')

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        @langRTL
        {{ Html::style(getRtlCss('css/frontend.css')) }}
        @else
        {{ Html::style('css/frontend.css') }}
        {{ Html::style('plugins/font-awesome/css/font-awesome.min.css') }}
        {{ Html::style('css/home.css') }}
        {{ Html::style('css/index.css') }}
        {{ Html::style('css/RestaurantList.css') }}
        {{ Html::style('css/RestaurantMenu.css') }}
        {{ Html::style('css/rateit.css') }}

        {!! Html::script('//maps.googleapis.com/maps/api/js?v=3&sensor=false&amp;libraries=places&key=AIzaSyADZWdKQx3dXmvQZ04M6pZhZaBtSdaoOxw') !!}

        @endif

        @yield('after-styles')




        <script>
            window.Laravel = <?php
echo json_encode([
    'csrfToken' => csrf_token(),
]);
?>
        </script>
    </head>
    <body id="app-layout" >
        <div id="app">
            @include('includes.partials.logged-in-as')
            @include('frontend.includes.nav')

            <div class="container">
                @include('includes.partials.messages')
                @yield('content')
            </div><!-- container -->
        </div><!--#app-->

        <!-- Scripts -->
        @yield('before-scripts')
        {!! Html::script(('js/frontend.js')) !!}
        {!! Html::script(('js/frontendCustom.js')) !!}

        {!! Html::script(('js/jquery.placepicker.js')) !!}
        {!! Html::script(('js/jquery.geocomplete.js')) !!}
         {!! Html::script(('js/jquery.rateit.js')) !!}
         {!! Html::script(('js/makefixed.js')) !!}
          {!! Html::script(('js/jquery.floatit.js')) !!}
           {!! Html::script(('js/handleCounter.js')) !!}
        @yield('after-scripts')

        @include('includes.partials.ga')
    </body>
</html>