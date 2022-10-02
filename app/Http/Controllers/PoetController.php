<?php

namespace App\Http\Controllers;

use App\Http\Requests\PoetRequest;
use App\Models\Poet;
use Illuminate\Http\JsonResponse;
use OpenApi\Annotations as OA;

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
 *     @OA\Parameter(
 *         name="per_page",
 *         in="query",
 *         required=false,
 *         @OA\Schema(type="integer")
 *     )
 * )
 */
class PoetController extends Controller
{
    public function getPoets(PoetRequest $request): JsonResponse
    {
        $perPage = $request->input('per_page') ?? config('pagination.per_page.poets');

        $poets = Poet::with('poetData')
            ->paginate($perPage);

        return response()->json($poets);
    }
}
