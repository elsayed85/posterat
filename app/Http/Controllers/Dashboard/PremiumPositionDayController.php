<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\PremiumPositionDay;
use Illuminate\Http\Request;

class PremiumPositionDayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $premiumpositiondays = PremiumPositionDay::latest()->paginate(20);
        return view('dashboard.premiumpositiondays.index' , compact('premiumpositiondays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.premiumpositiondays.create');
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
        PremiumPositionDay::create($request->all());

        return redirect()->route('dashboard.premiumpositiondays.index')
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
        $premiumpositionday =PremiumPositionDay::findOrFail($id);
        return view('dashboard.premiumpositiondays.show',compact('premiumpositionday'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $premiumpositionday = PremiumPositionDay::findOrFail($id);
        return view('dashboard.premiumpositiondays.edit',compact('premiumpositionday'));
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
        $premiumpositionday = PremiumPositionDay::findOrFail($id);  $request = $request->merge(['user_id' => auth()->user()->id]);
        $premiumpositionday->update($request->all());
        return redirect()->route('dashboard.premiumpositiondays.index')->with('status','updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $premiumpositionday = PremiumPositionDay::findOrFail($id);
        $premiumpositionday->delete();
        return redirect()->route('dashboard.premiumpositiondays.index')->with('status','deleted successfully');
    }
}
