<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function getDeepFromParent($id)
    {
        return ($id??0 > 0) ? Category::findOrFail($id)->deep+1 : 1;
    }
    public function index()
    {
       $categories = Category::latest()->paginate(20);
       return view('dashboard.categories.index' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all(['id','title_ar','title_en']);
        return view('dashboard.categories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $request = $request->merge(['user_id' => auth()->user()->id,'deep'=> $this->getDeepFromParent($request->parent)]);
        Category::create($request->all());
 
         return redirect()->route('dashboard.categories.index')
             ->with('status','created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $category = Category::findOrFail($id);
    return view('dashboard.categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::all(['id','title_ar','title_en']);
        return view('dashboard.categories.edit',compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request = $request->merge(['user_id' => auth()->user()->id,'deep'=> $this->getDeepFromParent($request->parent)]);
        $category = Category::findOrFail($id);
        $category->update($request->all());

     return redirect()->route('dashboard.categories.index')->with('status','updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('dashboard.categories.index')->with('status','deleted successfully');
    }

}
