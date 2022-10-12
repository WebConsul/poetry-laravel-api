<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     title="PoetResource",
 *     description="Poet resource",
 *     type="object",
 *     allOf={
 *         @OA\Schema(
 *             @OA\Property(property="id", type="integer"),
 *             @OA\Property(property="birth_date", type="string"),
 *             @OA\Property(property="death_date", type="string"),
 *             @OA\Property(property="portrait_url", type="string"),
 *             @OA\Property(property="created_at", type="string"),
 *             @OA\Property(property="updated_at", type="string"),
 *             @OA\Property(property="slug", type="string"),
 *             @OA\Property(
 *                  property="poet_data",
 *                  type="array",
 *                  @OA\Items(
 *                      @OA\Property(property="id", type="integer"),
 *                      @OA\Property(property="poet_id", type="integer"),
 *                      @OA\Property(property="language", type="string"),
 *                      @OA\Property(property="first_name", type="string"),
 *                      @OA\Property(property="last_name", type="string"),
 *                      @OA\Property(property="description", type="string"),
 *                  )
 *             ),
 *             @OA\Property(
 *                  property="poems",
 *                  type="array",
 *                  @OA\Items(
 *                      @OA\Property(property="id", type="integer"),
 *                      @OA\Property(property="poet_id", type="integer"),
 *                      @OA\Property(property="translation_of", type="string"),
 *                      @OA\Property(property="language", type="string"),
 *                      @OA\Property(property="title", type="string"),
 *                      @OA\Property(property="created", type="string"),
 *                      @OA\Property(property="created_at", type="string"),
 *                      @OA\Property(property="updated_at", type="string"),
 *                      @OA\Property(property="slug", type="string"),
 *                  )
 *             ),
 *             @OA\Property(
 *                  property="collections",
 *                  type="array",
 *                  @OA\Items(
 *                      @OA\Property(property="id", type="integer"),
 *                      @OA\Property(property="title", type="integer"),
 *                      @OA\Property(property="publisher", type="string"),
 *                      @OA\Property(property="location", type="string"),
 *                      @OA\Property(property="date", type="string"),
 *                      @OA\Property(property="created_at", type="string"),
 *                      @OA\Property(property="updated_at", type="string"),
 *                      @OA\Property(property="slug", type="string"),
 *                  )
 *             )
 *         )
 *     }
 * )
 */
class PoetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}