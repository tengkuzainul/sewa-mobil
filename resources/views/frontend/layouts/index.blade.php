<!DOCTYPE html>
<html lang="en">
{{-- head --}}
@include('frontend.layouts.head')

<body>
    <!-- Navigation-->
    @include('frontend.layouts.navbar')
    <!-- Header-->
    @include('frontend.layouts.header')
    <!-- Section-->
    <section class="py-5">
        <div class="container px-5 px-lg-5 mt-5">
            @yield('content')
        </div>

        {{-- Maps Pages Contact --}}
        @yield('maps')
    </section>
    <!-- Footer-->
    @include('frontend.layouts.footer')
    {{-- js --}}
    @include('frontend.layouts.js')
</body>

</html>
