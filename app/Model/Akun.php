<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Observer\AkunObserver;
use Illuminate\Support\Facades\Session;
use App\Model\MasterData\TahunAjaranSemester;
use Illuminate\Support\Facades\DB;

class Akun extends Model {

    use SoftDeletes;

    protected $table = 'users';
    protected $fillable = ['suspended', 'wilayah_id', 'wilayah_type', 'npsn', 'name', 'photo'];
    protected $hidden = ['password', 'client_address', 'provider_id', 'remember_token', 'deleted_at', 'created_at', 'updated_at'];
    protected $dates = ['deleted_at'];
    protected $casts = [
        'suspended' => 'boolean'
    ];

    protected static function boot() {
        parent::boot();

        static::observe(new AkunObserver);
    }

    public function roles_users() {
        return $this->hasOne(RolesUser::class, 'user_id');
    }

    public function wilayah() {
        return $this->morphTo();
    }

    public function scopeLimitedAccessUser($query) {
        $table = config('constants.table.wilayah.' . Auth::user()->roles->first()->name);

        if ($table == 'kabupaten') {
            $query->join('kecamatan', 'kecamatan.id', '=', 'wilayah_id');
            $query->where('kabupaten_id', Session::get('wilayah_id'));
            $query->where('wilayah_type', 'App\\Model\\MasterData\\Kecamatan');
        } elseif ($table == 'provinsi') {
            $kec = DB::table('kecamatan')
                    ->select('provinsi_id as prov_id', 'kecamatan.id as kecamatan_id')
                    ->join('kabupaten', 'kabupaten.id', '=', 'kabupaten_id');

            $query->leftJoin('provinsi', 'provinsi.id', '=', 'wilayah_id');
            $query->leftJoin('kabupaten', 'wilayah_id', '=', 'kabupaten.id');
            $query->leftJoinSub($kec, 'kec', function ($join) {
                $join->on('wilayah_id', '=', 'kecamatan_id');
            });
            
            $query->where(function ($query) {
                $query->where(function ($query) {
                    $query->where('wilayah_type', 'App\\Model\\MasterData\\Kecamatan');
                    $query->where('prov_id', Session::get('wilayah_id'));
                });
                $query->orWhere(function ($query) {
                    $query->where('wilayah_type', 'App\\Model\\MasterData\\Kabupaten');
                    $query->where('provinsi_id', Session::get('wilayah_id'));
                });
                $query->orWhere(function ($query) {
                    $query->where('wilayah_type', 'App\\Model\\MasterData\\Provinsi');
                    $query->where('provinsi.id', Session::get('wilayah_id'));
                });
            });
        }

        return $query;
    }

}
