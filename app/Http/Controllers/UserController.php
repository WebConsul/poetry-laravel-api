<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

 /**
 * @OA\Post(
 *     path="/user",
 *     tags={"user"},
 *     summary="Create user",
 *     description="This can only be done by the logged in user.",
 *     operationId="createUser",
 *     @OA\Response(
 *         response="default",
 *         description="successful operation"
 *     ),
 *     @OA\RequestBody(
 *         description="Create user object",
 *         required=true,
 *     )
 * )
 */
class UserController extends Controller
{
    public function me(): JsonResponse
    {
        $user = Auth::user();

        return response()->json($user);
    }
}
