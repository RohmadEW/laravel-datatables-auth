<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Akun;
use App\Model\MasterData\Kecamatan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProfilController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $akun = Akun::find(Auth::user()->id);
        $role = Auth::user()->roles->first()->name;

        return view('backend.profil.edit', compact('akun', 'role'));
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
        $id = Auth::user()->id;

        $role = Auth::user()->roles->first()->name;

        $extension = 'jpg';
        $validate = array(
            'name' => 'required',
            'password' => 'sometimes|nullable|string|min:6|confirmed',
            'files' => 'sometimes|nullable|max:10240|image',
        );
        $this->validate($request, $validate);

        $data = array(
            'name' => $request->post('name'),
            'password' => Hash::make($request->post('password'))
        );

        $akun = Akun::find($id);
        $akun->update($data);

        if ($request->hasFile('files')) {
            $uploaded_files = $request->file('files');
            $extension = $uploaded_files->getClientOriginalExtension();
            $filename = md5(time()) . $id . '.' . $extension;
            $uploaded_files->move(storage_path('/files/profil'), $filename);
            $akun->photo = $filename;
            $akun->save();

            Auth::user()->photo = $filename;
        }

        Session::flash("flash_notification", [
            "level" => "success",
            "title" => "Selamat",
            "message" => "Berhasil menyimpan $akun->name"
        ]);

        return redirect()->route('profil.index');
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
