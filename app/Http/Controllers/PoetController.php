<?php

namespace App\Http\Controllers;

use App\Actions\Poet\GetPoetAction;
use App\Http\Requests\PoetRequest;
use App\Http\Resources\PoetResource;
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

    /**
     * @param GetPoetAction $action
     * @param $slug
     * @return PoetResource
     */
    public function show(GetPoetAction $action, $slug): PoetResource
    {
        return new PoetResource($action->execute($slug));
    }
}
