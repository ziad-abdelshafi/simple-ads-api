<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Advertiser;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index(Request $request)
    {
        $queryBuilder = Ad::query();

        // filter ads by tag if exists
        if ($request->query('tag'))
        {
            $queryBuilder = $queryBuilder->whereHas('tags', function($query) use ($request) {
                return $query->where('name', $request->query('tag'));
            });
        }

        // filter ads by category if exists
        if ($request->query('category'))
        {
            $queryBuilder = $queryBuilder->whereHas('category', function($query) use ($request) {
                return $query->where('name', $request->query('category'));
            });
        }

        return response()->json([
            'message' => 'Ads retreived successfully',
            'data' => $queryBuilder->get()
        ], 200);
    }

    public function advertisersAds($advertiserId)
    {
        $advertiser = Advertiser::findOrFail($advertiserId);

        return response()->json([
            'message' => 'Advertiser\'s ads retreived successfully',
            'data' => $advertiser->ads
        ], 200);
    }
}
