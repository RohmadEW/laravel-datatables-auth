@extends('layouts.backend')

@section('page-title')
<h1 class="page-header text-overflow">Daftar Akun</h1>
@endsection

@section('breadcrumb')
<li class="active">Akun</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-body ">
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
    function reset_wilayah(id) {
        create_swal_option('Warning', 'Apakah Anda yakin megnhapus wilayah untuk akun ini?', function () {
            create_ajax('{!! route("akun.reset_wilayah") !!}', 'id=' + id, function (data) {
                reload_page();
            });
        });
    }
    
    function change_suspend(id, status) {
        create_swal_option('Warning', 'Apakah Anda yakin merubah status suspend akun ini?', function () {
            create_ajax('{!! route("akun.change_suspend") !!}', 'id=' + id + '&status=' + status, function (data) {
                create_alert('#datatableId_wrapper', data);
                $('#datatableId_wrapper').DataTable().ajax.reload();
            });
        });
    }

    function change_role(t) {
        create_swal_option('Warning', 'Apakah Anda yakin merubah hak akses akun ini?', function () {
            create_ajax('{!! route("akun.change_role") !!}', 'id=' + $(t).data('id') + '&value=' + $(t).val(), function (data) {
                reload_page();
            });
        });
    }

    $(function () {
        $(document).on('change', '.kabupaten, .provinsi, .negara, .kecamatan', function () {
            var wilayah = $(this).data('wilayah');
            var data = $(this).select2('data')[0];

            create_ajax('{!! route("akun.simpan_wilayah") !!}', 'wilayah=' + wilayah + '&value=' + data.id + '&id=' + $(this).data('id'), function (data) {
                reload_page();
            });
        });
    });
</script>
@endsection