<!DOCTYPE html>
<html lang="en">

{{-- head --}}
@include('backend.layouts.head')

<body>

    <!-- ======= Header ======= -->
    @include('backend.layouts.header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('backend.layouts.sidebar')
    <!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>@yield('title_page')</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">@yield('breadcrumb')</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                @yield('content')

            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('backend.layouts.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    {{-- Scripts --}}
    @include('backend.layouts.js')

</body>

</html>
