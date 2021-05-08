<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdAbuse;

class AdAbuseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adabuses = AdAbuse::latest()->paginate(20);
        return view('dashboard.adabuses.index' , compact('adabuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.adabuses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = $request->merge(['user_id' => auth()->user()->id]);
        AdAbuse::create($request->all());

        return redirect()->route('dashboard.adabuses.index')
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
        $adabuse =AdAbuse::findOrFail($id);
        return view('dashboard.adabuses.show',compact('adabuse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adabuse = AdAbuse::findOrFail($id);
        return view('dashboard.adabuses.edit',compact('adabuse'));
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
        $adabuse = AdAbuse::findOrFail($id);
        $adabuse->update($request->all());
        return redirect()->route('dashboard.adabuses.index')->with('status','updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adabuse = AdAbuse::findOrFail($id);
        $adabuse->delete();
        return redirect()->route('dashboard.adabuses.index')->with('status','deleted successfully');
    }
}
