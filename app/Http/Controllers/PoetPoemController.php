<?php

namespace App\Http\Controllers;

use App\Http\Resources\PoemResource;
use App\Models\Poem;
use App\Models\Poet;

class PoetPoemController extends Controller
{
    public function show(Poet $poet, Poem $poem): PoemResource
    {
        return new PoemResource($poem->load('poet', 'poet.poetData'));
    }
}
