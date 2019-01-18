@extends('layouts.backend')

@section('page-title')
<h1 class="page-header text-overflow">Pengaturan Sistem</h1>
@endsection

@section('breadcrumb')
<li class="active">Pengaturan</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-body">
                {!! $html->table(['class' => 'table table-striped table-bordered table-responsive table-hover', 'id' => 'datatableId_wrapper'], true) !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
{!! $html->scripts() !!}
@endsection

@section('footer-scripts')
<script type="text/javascript">

    function save_action(t) {
        create_ajax('{!! route("pengaturan.simpan") !!}', 'id=' + $(t).data('id') + '&isi=' + $(t).val(), function (data) {
            create_alert('#datatableId_wrapper', data);
            $('#datatableId_wrapper').DataTable().ajax.reload();
        });
    }

</script>
@endsection