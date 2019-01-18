<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileController extends Controller {

    public function __construct() {
        
    }

    public function getFile($folder, $filename) {
        return response()->download(storage_path('files/' . $folder . '/' . $filename), null, [], null);
    }

}
