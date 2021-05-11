<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Like;
use App\Http\Requests\LikeRequest;
use App\Http\Controllers\Controller;

class LikeController extends Controller
{
    public function store(LikeRequest $request)
    {
        $like = Like::create($request->validated());
        return success([
            'message' => 'You liked this Ad',
            'like' => $like
        ], 201);
    }

    public function destroy(Like $like)
    {
        $like->delete();
        return success([
            'message' => 'You removed like of this Ad'
        ], 200);
    }
}
