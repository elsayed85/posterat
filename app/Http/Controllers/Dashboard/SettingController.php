<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::paginate(20);
       // $settings = Setting::all()->pluck('var', 'name');
       // dd($settings['paid_expired_at']);
        return view('dashboard.settings.index' , compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.settings.create');
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
        Setting::create($request->all());
 
         return redirect()->route('dashboard.settings.index')
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
        $setting =Setting::findOrFail($id);
        return view('dashboard.settings.show',compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Setting::findOrFail($id);
        return view('dashboard.settings.edit',compact('setting'));
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
        $setting = Setting::findOrFail($id);
        $setting->update($request->all());
        Cache::forget('site_setting');
        Cache::rememberForever('site_setting', function () {
            return Setting::all()->pluck('var', 'name')->toArray();
        });
//        $x=cache('site_setting');;
//        dd($x);
     return redirect()->route('dashboard.settings.index')->with('status','updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setting = Setting::findOrFail($id);
        $setting->delete();
        Cache::forget('site_setting');
        Cache::rememberForever('site_setting', function () {
            return Setting::all()->pluck('var', 'name')->toArray();
        });
        return redirect()->route('dashboard.settings.index')->with('status','deleted successfully');
    }
}
