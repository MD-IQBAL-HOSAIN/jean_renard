<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$title}}</title>
    @include('frontend.partials.style')
</head>

<body>
     <!-- start header  -->
    @include('frontend.partials.header')
    <!-- end header  -->

    @include('frontend.partials.flash-message')

    <main>
        @yield('main')
    </main>

    <!-- start footer  -->
    @include('frontend.partials.footer')
    <!-- end footer  -->

    <!-- start script  -->
    @include('frontend.partials.script')
    <!-- script  end-->
</body>

</html>