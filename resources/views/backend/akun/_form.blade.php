<div class="form-group {{ $errors->has('kode') ? 'has-error is-focused' : '' }}">
    {!! Form::label('kode', 'Kode', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-8">
        {!! Form::text('kode', null, ['class'=>'form-control']) !!}
        {!! $errors->first('kode', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error is-focused' : '' }}">
    {!! Form::label('name', 'Nama', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-8">
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<button class="btn btn-primary pull-right">Simpan</button>