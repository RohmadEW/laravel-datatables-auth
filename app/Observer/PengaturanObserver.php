<?php

/* 
 * PENDATAAN MAARIF NU
 * Dikembangkan oleh Rohmad Eko Wahyudi
 * rohmad.ew@gmail.com
 */

namespace App\Observer;

use App\Model\Pengaturan;
use Illuminate\Support\Facades\Auth;

class PengaturanObserver {

    public function created($model) {
        \Log::info('TABLE Pengaturan ADD with id ' . $model->id . ' and data after ' . json_encode($model) . ' >>>> User is ' . json_encode(Auth::user()));
    }

    public function updating($model) {
        \Log::info('TABLE Pengaturan EDIT with id ' . $model->id . ' and data before ' . json_encode(Pengaturan::find($model->id)) . ' >>>> User is ' . json_encode(Auth::user()));
    }

    public function updated($model) {
        \Log::info('TABLE Pengaturan EDIT with id ' . $model->id . ' and data after ' . json_encode($model) . ' >>>> User is ' . json_encode(Auth::user()));
    }

    public function deleting($model) {
        \Log::info('TABLE Pengaturan DELETE with id ' . $model->id . ' and data before ' . json_encode(Pengaturan::find($model->id)) . ' >>>> User is ' . json_encode(Auth::user()));
    }

    public function deleted($model) {
        \Log::info('TABLE Pengaturan DELETE with id ' . $model->id . ' >>>> User is ' . json_encode(Auth::user()));
    }

}
