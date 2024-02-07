@extends('frontend.layouts.index')
@section('title', 'Contact')
@section('content')

    {{-- alert --}}
    @if (session()->has('massage-send'))
        <div class="alert alert-{{ session()->get('alert-type-send') }} alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            {{ session()->get('massage-send') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- alert eror --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-lg-10 m-auto">
            <div class="contact-form">
                <form action="{{ route('massageSend') }}" action="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6 mb-2">
                            <div class="name-input form-group">
                                <input type="text" name="name" class="form-control rounded"
                                    placeholder="Isikan nama lengkap" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-2">
                            <div class="email-input form-group">
                                <input type="email" name="email" class="form-control rounded"
                                    placeholder="Isikan alamat email" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-6 mb-2">
                            <div class="subject-input form-group">
                                <input type="text" name="subject" class="form-control rounded"
                                    placeholder="Isikan subject email" />
                            </div>
                        </div>
                    </div>
                    <div class="message-input form-group mb-3">
                        <textarea name="pesan" cols="30" rows="10" placeholder="Isikan pesan anda" class="form-control rounded"></textarea>
                    </div>
                    <div class="input-submit form-group">
                        <button type="submit" style="height: 50px; width: 400px; margin: 0 auto"
                            class="d-block btn btn-primary rounded-pill">
                            Kirim Pesan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('maps')
    <div class="maparea mt-5">
        <div class="mapouter">
            <div class="gmap_canvas">
                <iframe width="100%" height="498" id="gmap_canvas"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6896338362285!2d101.36709087367909!3d0.46018106379213086!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5a841a797750d%3A0x55e6373467d7b1b8!2sJl.%20Tuah%20Karya%2C%20Tuah%20Karya%2C%20Kec.%20Tampan%2C%20Kota%20Pekanbaru%2C%20Riau%2028293!5e0!3m2!1sid!2sid!4v1707279137197!5m2!1sid!2sid"
                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                    href="https://fmovies-online.net">fmovies</a><br />
                <style>
                    .mapouter {
                        position: relative;
                        text-align: right;
                        height: 498px;
                        width: 100%;
                    }
                </style><a href="https://www.embedgooglemap.net"></a>
                <style>
                    .gmap_canvas {
                        overflow: hidden;
                        background: none !important;
                        height: 498px;
                        width: 100%;
                    }
                </style>
            </div>
        </div>
    </div>
@endsection
