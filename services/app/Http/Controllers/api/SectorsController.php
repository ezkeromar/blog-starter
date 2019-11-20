<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sector;

class SectorsController extends Controller
{
    public function getSectors() {
        $sectors = Sector::select('uuid', 'title', 'description')->withCount('offers')->orderBy("offers_count", "DESC")->get();
        return response()->json($sectors);
    }
}
