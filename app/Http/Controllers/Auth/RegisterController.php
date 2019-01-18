<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Model\Pengaturan;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use App\Role;

class RegisterController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Register Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users as well as their
      | validation and creation. By default this controller uses a trait to
      | provide this functionality without requiring any additional code.
      |
     */

use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'npsn' => ['required', 'integer', 'digits:8', 'unique:users'],
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'string', 'min:6', 'confirmed'],
                    'kode' => ['required', 'exists:pengaturan,isi,kode,registrasi_kode'],
                    'daerah' => ['required', 'exists:' . Pengaturan::where('kode', '=', 'registrasi_wilayah')->first()->isi . ',id'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data) {
        $return = DB::transaction(function() use ($data) {
                    $wilayah = Pengaturan::where('kode', '=', 'registrasi_wilayah')->first()->isi;

                    $user = User::create([
                                'npsn' => $data['npsn'],
                                'name' => $data['name'],
                                'email' => $data['email'],
                                'password' => Hash::make($data['password']),
                                'client_address' => Request::ip(),
                                'wilayah_id' => $data['daerah'],
                                'wilayah_type' => 'App\\Model\\MasterData\\' . ucwords($wilayah)
                    ]);

                    $role = Role::where('name', config('constants.table.wilayah_role.' . $wilayah))->first();
                    $user->attachRole($role);

                    return $user;
                });

        return $return;
    }

}
