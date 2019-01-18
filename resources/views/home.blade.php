@extends('layouts.backend')

@section('page-title')
<div class="pad-all text-center text-light">
    <h3>Selamat Datang, {!! Auth::user()->name !!}</h3>
    <p>{!! config('constants.options.name_apps') !!} - {!! config('constants.options.lembaga') !!}</p>
</div>
@endsection

@section('breadcrumb')
@endsection

@section('content')
<div class="row">
    <div class="col-lg-2">
        <div class="panel">
            <div class="panel-body">
                {!! Html::image(asset('img/logo-big.jpg'), null, ['class'=>'img-responsive']) !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer-scripts')
<script type="text/javascript">
    $(document).on('nifty.ready', function () {
        
    });
</script>
@endsection