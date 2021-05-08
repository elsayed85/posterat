<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show($id)
    {
        $single_page = Page::where('id',$id)->where('published',1)->firstOrFail();
        $page_title = ($single_page->title);
        $page_body = ($single_page->body);
        //dump($single_page->body);
        return view('frontend.pages.show',compact('page_title','page_body'));
    }

}
