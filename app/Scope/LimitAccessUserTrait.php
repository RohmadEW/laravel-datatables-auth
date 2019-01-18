<?php

namespace App\Scope;

/*
 * PENDATAAN MAARIF NU
 * Dikembangkan oleh Rohmad Eko Wahyudi
 * rohmad.ew@gmail.com
 */

/**
 * Description of LimitAccessUser
 *
 * @author Rohmad Eko Wahyudi
 */
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

trait LimitAccessUserTrait {

    public function scopeLimitedAccessUser($query) {
        $table = config('constants.table.wilayah.' . Auth::user()->roles->first()->name);

        $akun = DB::table('users')->select('id as user_user_id', 'name', 'wilayah_id', 'wilayah_type');

        $query->joinSub($akun, 'us', function ($join) {
            $join->on('user_id', '=', 'user_user_id');
        });

        return $query;
    }

}
