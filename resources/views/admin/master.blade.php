@include('partials.links')
@include('partials.header')
@include('partials.sidebar')

<section class="content-wrapper">
        @yield('content')
</section>

@include('partials.footer')
@include('partials.scripts')
