<?php

namespace App\Http\Controllers;

use App\Http\Resources\PoemResource;
use App\Models\Poem;
use App\Models\Poet;

/**
 * @OA\Get(
 *     path="/api/poets/{poet_slug}/poems/{poem_slug}",
 *     tags={"poems"},
 *     summary="Get poem from poet",
 *     description="Getting poem from a poet.",
 *     operationId="show",
 *      @OA\Parameter(
 *          name="poet_slug",
 *          description="Poet slug",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\Parameter(
 *          name="poem_slug",
 *          description="Poem slug",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *     @OA\Response(
 *         response=200,
 *         description="successful operation",
 *     ),
 *       @OA\Response(
 *          response=404,
 *          description="Not found"
 *      )
 * )
 */
class PoetPoemController extends Controller
{
    public function show(Poet $poet, Poem $poem): PoemResource
    {
        return new PoemResource($poem->load('poet', 'poet.poetData'));
    }
}
