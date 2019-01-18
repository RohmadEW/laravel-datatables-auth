<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Observer\PengaturanObserver;
use Illuminate\Support\Facades\Session;
use App\Model\MasterData\TahunAjaranSemester;

class Pengaturan extends Model {

    use SoftDeletes;

    protected $table = 'pengaturan';
    protected $fillable = ['isi', 'user_id'];
    protected $hidden = ['id', 'deleted_at', 'created_at', 'updated_at'];
    protected $dates = ['deleted_at'];

    public function __construct(array $attributes = array()) {
        $this->setRawAttributes(array_merge($this->attributes, array(
            'user_id' => Auth::user()->id,
                )), true);

        parent::__construct($attributes);
    }

    protected static function boot() {
        parent::boot();

        static::observe(new PengaturanObserver);
    }

}
