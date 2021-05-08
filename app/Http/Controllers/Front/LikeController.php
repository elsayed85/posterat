<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user = auth()->user();
        $like = Like::firstOrNew([
            'ad_id'=> $request->ad_id,
            'user_id'=> $user->id
        ]);

        if(!$like->exists){
           $like->save();
            $user->points++;//config('points_for_like')
            $user->save();
            $ad->increment('total_likes');
            $add=1;
        }else{
            $user->points--;//config('points_for_like')
            $user->save();
            $like->delete();
            $ad->decrement('total_likes');
            $add=-1;
        }

        return response()->json(array('msg'=>$add), 200);
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
