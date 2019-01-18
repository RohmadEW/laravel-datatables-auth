<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Observer\RolesObserver;

class Roles extends Model {

    protected $table = 'roles';
    protected $hidden = ['description', 'created_at', 'updated_at'];

    protected static function boot() {
        parent::boot();

        static::observe(new RolesObserver);
    }

    public function role_user() {
        return $this->hasOne(RolesUser::class, 'role_id');
    }

}
