<?php

namespace App\Http\Controllers\Backend;

use App\Libraries\DatatablesHandler;
use Yajra\DataTables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Model\Pengaturan;
use App\Libraries\DumpHandler;

class PengaturanController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder) {
        if ($request->ajax()) {
            $pengaturan = Pengaturan::all();

            return Datatables::of($pengaturan)
                            ->addColumn('input_isi', function($akun) {
                                if ($akun->kode == 'registrasi_wilayah') {
                                    $html = '<select class="form-control input-sm" data-id="' . $akun->id . '" onchange="save_action(this)"><option value="negara" ' . ($akun->isi == 'negara' ? 'selected' : '') . '>negara</option><option value="provinsi" ' . ($akun->isi == 'provinsi' ? 'selected' : '') . '>provinsi</option><option value="kabupaten" ' . ($akun->isi == 'kabupaten' ? 'selected' : '') . '>kabupaten</option><option value="kecamatan" ' . ($akun->isi == 'kecamatan' ? 'selected' : '') . '>kecamatan</option></select>';
                                } else {
                                    $html = sprintf('<input type="text" class="form-control input-sm" value="%s" data-id="%s" onchange="save_action(this)" style="width:250px">', $akun->isi, $akun->id);
                                }

                                return $html;
                            })
                            ->rawColumns(['input_isi'])
                            ->make(true);
        }

        $datatables = array(
            'columns' => [
                ['data' => 'kode', 'name' => 'kode', 'title' => 'Kode', 'footer' => 'Kode'],
                ['data' => 'input_isi', 'name' => 'isi', 'title' => 'Isi', 'footer' => 'Isi'],
            ]
        );

        $html = $htmlBuilder->columns($datatables['columns']);
        $html->ajax(DatatablesHandler::defaultAjax(route('pengaturan.datatables')));
        $html->parameters(DatatablesHandler::defaultParameters($datatables));

        return view('backend.pengaturan.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        if ($request->ajax()) {
            $id = $request->post('id');

            Pengaturan::find($id)->update([
                'isi' => $request->post('isi')
            ]);

            return DumpHandler::output('success', 'Selamat', 'Pengaturan berhasil disimpan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
