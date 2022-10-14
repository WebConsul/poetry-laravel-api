<?php

namespace App\Http\Controllers;

use App\Actions\Poet\GetPoetAction;
use App\Http\Requests\PoetRequest;
use App\Http\Resources\PoetResource;
use App\Models\Poet;
use Illuminate\Http\JsonResponse;
use OpenApi\Annotations as OA;

class PoetController extends Controller
{
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
    public function getPoets(PoetRequest $request): JsonResponse
    {
        $perPage = $request->input('per_page') ?? config('pagination.per_page.poets');

        $poets = Poet::with('poetData')
            ->paginate($perPage);

        return response()->json($poets);
    }

    /**
     * @param  GetPoetAction  $action
     * @param $slug
     * @return PoetResource
     *
     * @OA\Get(
     *      path="/api/poets/{slug}",
     *      operationId="getPoetBySlug",
     *      tags={"poets"},
     *      summary="Get poet information",
     *      description="Returns poet data",
     *      @OA\Parameter(
     *          name="slug",
     *          description="Poet slug",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/PoetResource")
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found"
     *      )
     * )
     */
    public function show(GetPoetAction $action, $slug): PoetResource
    {
        return new PoetResource($action->execute($slug));
    }
}
