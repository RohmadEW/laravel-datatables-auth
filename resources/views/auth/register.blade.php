@extends('layouts.frontend')

@section('links')
<a href="{{ url('/') }}">Beranda</a>
<a href="{{ route('login') }}">Masuk</a>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="npsn" class="col-md-4 col-form-label text-md-right">NPSN</label>

                            <div class="col-md-7">
                                <input id="npsn" type="text" class="form-control{{ $errors->has('npsn') ? ' is-invalid' : '' }}" name="npsn" value="{{ old('npsn') }}" required autofocus>

                                @if ($errors->has('npsn'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('npsn') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nama Lembaga</label>

                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-7">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-7">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-7">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kode" class="col-md-4 col-form-label text-md-right">Kode</label>

                            <div class="col-md-7">
                                <input id="kode" type="text" class="form-control{{ $errors->has('kode') ? ' is-invalid' : '' }}" name="kode" value="{{ old('kode') }}" required autofocus>

                                @if ($errors->has('kode'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('kode') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="daerah" class="col-md-4 col-form-label text-md-right">Daerah</label>

                            <div class="col-md-7">
                                <select id="daerah" class="daerah form-control{{ $errors->has('daerah') ? ' is-invalid' : '' }}" name="daerah" value="{{ old('daerah') }}" required></select>

                                @if ($errors->has('daerah'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('daerah') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-11 text-right">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">

    $(function(){
        $(".container").css({
            'width': '500px'
        });
        
        {!! DumpHandler::select2('daerah', route('guest.wilayah', \App\Model\Pengaturan::where('kode', '=', 'registrasi_wilayah')->first()->isi)) !!}
    });

</script>
@endsection
