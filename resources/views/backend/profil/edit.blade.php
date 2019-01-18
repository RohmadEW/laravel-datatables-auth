@extends('layouts.backend')

@section('page-title')
<h1 class="page-header text-overflow">Ubah Profil</h1>
@endsection

@section('breadcrumb')
<li class="active">Profil</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-body">
                @include('layouts._flash')

                {!! Form::model($akun, ['url'=>route('profil.update', $akun->id), 'method' => 'put', 'files' => true, 'class'=>'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('files') ? 'has-error is-focused' : '' }}">
                    {!! Form::label('files', 'File Gambar', ['class'=>'col-md-2 control-label']) !!}
                    <div class="col-md-10">
                        <span class="pull-left btn btn-primary btn-file">
                            Browse... {!! Form::file('files') !!}
                        </span>
                        {!! $errors->first('files', '<br><br><p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('name') ? 'has-error is-focused' : '' }}">
                    {!! Form::label('name', 'Nama', ['class'=>'col-md-2 control-label']) !!}
                    <div class="col-md-5">
                        {!! Form::text('name', null, ['class'=>'form-control', 'maxlength' => '250']) !!}
                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error is-focused' : '' }}">
                    {!! Form::label('password', 'Password', ['class'=>'col-md-2 control-label']) !!}
                    <div class="col-md-3">
                        {!! Form::password('password', ['class'=>'form-control', 'minlength' => '6']) !!}
                        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error is-focused' : '' }}">
                    {!! Form::label('password_confirmation', 'Confirm Password', ['class'=>'col-md-2 control-label']) !!}
                    <div class="col-md-3">
                        {!! Form::password('password_confirmation', ['class'=>'form-control', 'minlength' => '6']) !!}
                        {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                @if ($role == 'cabang' || $role == 'sekolah' || $role == 'operator')
                <div class="form-group {{ $errors->has('wilayah_id') ? 'has-error is-focused' : '' }}">
                    {!! Form::label('wilayah_id', 'Daerah', ['class'=>'col-md-2 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::select('wilayah_id', [], null, ['class'=>'form-control wilayah_id']) !!}
                        {!! $errors->first('wilayah_id', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                @endif
                <button class="btn btn-primary pull-right">Simpan</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer-scripts')
<script type="text/javascript">
    @if ($role == 'cabang' || $role == 'sekolah' || $role == 'operator')
            {!! DumpHandler::select2('wilayah_id', route('guest.wilayah', config('constants.table.wilayah.'.Auth::user() - > roles - > first() - > name))) !!
            }
    @endif
</script>
@endsection
