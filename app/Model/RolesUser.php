<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Observer\RolesUserObserver;

class RolesUser extends Model {

    protected $table = 'role_user';
    protected $hidden = ['user_id', 'role_id'];

    protected static function boot() {
        parent::boot();

        static::observe(new RolesUserObserver);
    }

    public function roles() {
        return $this->belongsTo(Roles::class, 'role_id');
    }

    public function akun() {
        return $this->belongsTo(Akun::class, 'user_id');
    }

}
