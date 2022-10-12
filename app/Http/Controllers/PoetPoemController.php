<?php

namespace App\Http\Controllers;

use App\Http\Resources\PoemResource;
use App\Models\Poem;
use App\Models\Poet;
use Illuminate\Http\Request;

class PoetPoemController extends Controller
{
    public function show(Poet $poet, Poem $poem)
    {
        return new PoemResource($poem->load('poet', 'poet.poetData'));
    }
}
