@extends('layouts.backend')

@section('page-title')
<h1 class="page-header text-overflow">Tambah Master Data {!! $title !!}</h1>
@endsection

@section('breadcrumb')
<li><a href="#">Master Data</a></li>
<li><a href="{!! route('master_data.index', $table) !!}">{!! $title !!}</a></li>
<li class="active">Tambah</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-body">
                {!! Form::open(['url'=>route('master_data.store', $table), 'method' => 'post', 'class'=>'form-horizontal']) !!}
                @include('backend.master_data._form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection