<?php

namespace App\Http\Controllers;

use App\Models\Poet;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Get(
 *     path="/api/poets",
 *     tags={"poets"},
 *     summary="Get all poets",
 *     description="Getting all poets with pagination.",
 *     operationId="getPoets",
 *     @OA\Response(
 *         response=200,
 *         description="successful operation",
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *     )
 * )
 */
class PoetController extends Controller
{
    public function get_poets(): JsonResponse
    {
        $poets = Poet::with('poetData')
            ->paginate(1)
            ->makeHidden(['created_at', 'updated_at']);

        return response()->json(['poets' => $poets]);
    }
}
