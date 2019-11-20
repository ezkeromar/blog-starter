<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;

class OffersController extends Controller
{
    public function getOffers(Request $request) {
        $offers = Offer::select('uuid', 'title', 'text')->where('is_published', true);
        if(!empty($request->all()['sector'])) {
            $offers = $offers->where('sector_id', $request->all()['sector']);
        }
        $res = $offers->get();
        return response()->json($res);
    }
}
