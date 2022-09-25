<?php

namespace App\Http\Controllers;

use App\Models\Poet;
use Illuminate\Http\JsonResponse;

class PoetController extends Controller
{
    public function get_poets(): JsonResponse
    {
        $poets = Poet::with('poetData')
            ->paginate(1)
            ->makeHidden(['created_at', 'updated_at']);
        return response()->json($poets);
    }
}
