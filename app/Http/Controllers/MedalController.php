<?php

namespace App\Http\Controllers;

use App\Services\MedalService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MedalController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $medals = Cache::remember('medals', now()->addMinutes(5), function () {
            return MedalService::getMedals();
        });

        return view('medals', [
            'medals' => $medals,
        ]);
    }
}
