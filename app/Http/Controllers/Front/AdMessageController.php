<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\AdMessage;
use Illuminate\Http\Request;

class AdMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $ad_messages = AdMessage::select('ad_id')
//        ->with(['ad'])
            ->where('from_user_id', $user->id)
            ->orWhere('to_user_id', $user->id)
//            ->groupBy('ad_id')
            //->take(20)
            ->orderBy('ad_id')
            ->orderBy('updated_at')
            ->get();
        $user_ad_messages=[];
       if(!$ad_messages->isEmpty()) {

           $first_ad_messages = $ad_messages->first();

           $user_ad_messages = AdMessage::with(['ad'])
               ->where('ad_id', $first_ad_messages->ad_id)
               ->where(function ($q) use ($user) {
                   $q->where('from_user_id', $user->id);
                   $q->orWhere('to_user_id', $user->id);
               })->get();
       }
       if(request('ad_message') && request('ad_message') > 0){
           $user_ad_messages = AdMessage::with(['ad'])
               ->where('ad_id', request('ad_message'))
               ->where(function ($q) use ($user) {
                   $q->where('from_user_id', $user->id);
                   $q->orWhere('to_user_id', $user->id);
               })->get();
       }
        return view('frontend.users.messages',compact('ad_messages','user_ad_messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth()->user()){
            abort(401, 'You need to login');
        }
        $ad = Ad::findOrFail($request->ad_id);
        AdMessage::create([
            'ad_id'=> $ad->id,
            'message'=> $request->message,
            'from_user_id'=> auth()->user()->id,
            'to_user_id'=> $ad->user_id,
            'published_at'=> now(),
            ]);
        return response()->json(array('msg'=>'success'), 200);
           // return redirect()->route('ads.show',$request->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
