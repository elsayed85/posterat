<?php

namespace App\Repositories;

use App\Http\Resources\BookmarkResource;
use App\Models\BalancePackage;
use App\Models\Bookmark;

class BookmarkRepository
{
    public function all()
    {
        $bookmarks = BookmarkResource::collection(Bookmark::where(['bookmarks.user_id' => auth()->id()])->get());

        if (!$bookmarks->isEmpty()) {
            return success([
                'bookmarks' => $bookmarks
            ]);
        }

        return failed('bookmarks is empty', [], 404);
    }

    public function findById($id)
    {
        $bookmark = new BookmarkResource(
            Bookmark::where(['bookmarks.user_id' => auth()->id()])->where('id', $id)->first()
        );

        if ($bookmark->resource) {
            return success($bookmark);
        }

        return failed('this bookmark is not found', [], 404);
    }
}
