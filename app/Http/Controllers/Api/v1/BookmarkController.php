<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Bookmark;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookmarkRequest;
use App\Repositories\BookmarkRepository;

class BookmarkController extends Controller
{
    private $bookmarkRepository;

    public function __construct(BookmarkRepository $bookmarkRepository)
    {
        $this->bookmarkRepository = $bookmarkRepository;
    }

    public function index()
    {
        return $this->bookmarkRepository->all();
    }


    public function show($id)
    {
        return $this->bookmarkRepository->findById($id);
    }


    public function store(BookmarkRequest $request)
    {
        $bookmark = Bookmark::create($request->validated());
        return success([
            'message' => 'Bookmark is added successfully',
            'bookmark' => $bookmark
        ], 201);
    }


    public function update(BookmarkRequest $request, Bookmark $bookmark)
    {
        $bookmark->update($request->validated());
        return success([
            'message' => 'Bookmark updated successfully',
            'bookmark' => $bookmark
        ]);
    }

    public function destroy(Bookmark $bookmark)
    {
        $bookmark->delete();
        return success([
            'message' => 'Bookmark deleted successfully'
        ], 200);
    }
}
