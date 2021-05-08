<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\PremiumPosition;
use Illuminate\Http\Request;

class PremiumPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $premiumpositions = PremiumPosition::latest()->paginate(20);
        return view('dashboard.premiumpositions.index' , compact('premiumpositions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.premiumpositions.create');
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
        PremiumPosition::create($request->all());

        return redirect()->route('dashboard.premiumpositions.index')
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
        $premiumposition =PremiumPosition::findOrFail($id);
        return view('dashboard.premiumpositions.show',compact('premiumposition'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $premiumposition = PremiumPosition::findOrFail($id);
        return view('dashboard.premiumpositions.edit',compact('premiumposition'));
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
        $premiumposition = PremiumPosition::findOrFail($id);  $request = $request->merge(['user_id' => auth()->user()->id]);
        $premiumposition->update($request->all());
        return redirect()->route('dashboard.premiumpositions.index')->with('status','updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $premiumposition = PremiumPosition::findOrFail($id);
        $premiumposition->delete();
        return redirect()->route('dashboard.premiumpositions.index')->with('status','deleted successfully');
    }
}
