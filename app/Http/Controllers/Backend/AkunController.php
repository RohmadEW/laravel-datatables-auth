<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Libraries\DatatablesHandler;
use Yajra\DataTables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Libraries\DumpHandler;
use Illuminate\Support\Facades\DB;
use App\Model\Akun;
use App\Model\Roles;
use App\Model\RolesUser;
use App\Model\MasterData;

class AkunController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder) {
        if ($request->ajax()) {
            $akun = Akun::select('users.id as user_id', 'npsn', 'users.name as user_name', 'roles.name as roles_name', 'roles.display_name', 'roles.id as roles_id', 'suspended', 'email')
                    ->join('role_user', 'role_user.user_id', '=', 'users.id')
                    ->join('roles', 'role_user.role_id', '=', 'roles.id')
                    ->where('users.id', '<>', Auth::user()->id);

            return Datatables::of($akun)
                            ->addColumn('suspended', function($akun) {
                                return sprintf('<a href="javascript:void();" onclick="change_suspend(%s, %s)"><i class="fa fa-%s"></i></a>', $akun->user_id, $akun->suspended ? 0 : 1, $akun->suspended ? 'check' : 'close');
                            })
                            ->addColumn('display_name_select', function($akun) {
                                if (Auth::user()->roles->first()->name == 'admin') {
                                    $option_select = "<option value=\"\">-- Pilih --</option>";
                                    foreach (Roles::pluck('display_name as name', 'id')->toArray() as $value => $text) {
                                        $option_select .= "<option value=\"" . $value . "\" " . ($akun->roles_id == $value ? 'selected' : '') . ">" . $text . "</option>";
                                    }
                                    $html = "<select class=\"form-control input-sm\" data-id=\"" . $akun->user_id . "\" onchange=\"change_role(this)\" style=\"width:150px\">" . $option_select . "</select>";
                                } else {
                                    $html = $akun->display_name;
                                }
                                return $html;
                            })
                            ->rawColumns(['suspended', 'display_name_select'])
                            ->make(true);
        }

        $datatables = array(
            'columns' => [
                ['data' => 'email', 'name' => 'users.email', 'title' => 'Email', 'footer' => 'Email'],
                ['data' => 'user_name', 'name' => 'user_name', 'title' => 'Nama', 'footer' => 'Nama'],
                ['data' => 'display_name_select', 'name' => 'roles.display_name', 'title' => 'Hak Akses', 'footer' => 'Hak Akses'],
                ['data' => 'suspended', 'name' => 'suspended', 'title' => 'Suspend', 'footer' => 'Suspend'],
            ],
            'searching' => [
                'suspended' => [
                    'select' => array(
                        '0' => 'Tidak',
                        '1' => 'Ya'
                    )
                ],
                'display_name_select' => [
                    'select' => Roles::pluck('display_name as name', 'display_name as id')->toArray()
                ]
            ],
        );
        $html = $htmlBuilder->columns($datatables['columns']);
        $html->ajax(DatatablesHandler::defaultAjax(route('akun.datatables')));
        $html->parameters(DatatablesHandler::defaultParameters($datatables));

        return view('backend.akun.index', compact('html'));
    }

    public function change_suspend(Request $request) {
        if ($request->ajax()) {
            $id = $request->post('id');
            $status = $request->post('status');

            Akun::find($id)->update(['suspended' => $status]);

            return DumpHandler::output('success', 'Selamat', 'Status suspend Akun berhasil dirubah');
        }
    }

    public function change_role(Request $request) {
        if ($request->ajax()) {
            $id = $request->post('id');
            $value = $request->post('value');

            DB::transaction(function() use ($id, $value) {
                RolesUser::where('user_id', $id)->update([
                    'role_id' => $value,
                ]);
            });

            return DumpHandler::output('success', 'Selamat', 'Status hak akses Akun berhasil dirubah');
        }
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
    public function update(Request $request, $id) {
        //
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
