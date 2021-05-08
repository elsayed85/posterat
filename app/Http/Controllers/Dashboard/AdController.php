<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Ad;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
       $ads = Ad::with(['category','user'])->latest()->paginate(20);
       return view('dashboard.ads.index' , compact('ads'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $ad = Ad::findOrFail($id);
    return view('dashboard.ads.show',compact('ad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ad = Ad::findOrFail($id);
        $categories = Category::all(['id','title_ar','title_en']);
        return view('dashboard.ads.edit',compact('ad','categories'));
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
        $request = $request->merge([/*'user_id' => auth()->user()->id,*/'deep'=> $this->getDeepFromParent($request->parent)]);
        $ad = Ad::findOrFail($id);
        $ad->update($request->all());

     return redirect()->route('dashboard.ads.index')->with('status','updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $ad = Ad::findOrFail($id);
        $ad->delete();
        return redirect()->route('dashboard.ads.index')->with('status','deleted successfully');
    }
    public function archive($id)
    {
        if($id >= 1) {
            $ad = Ad::where('id', $id)->where('archived', 0)->first();
            if ($ad) {
                $ad->archived = 1;
                $ad->archived_at = now();
                $ad->archived_manually = 1;
                $ad->save();
                if($ad->premium == 1 && $ad->sold != 1){
                    $published_premium_ads_cat = PremiumAd::where('ad_id',$id)->where('published',1)->first();
                    PremiumAd::where('ad_id',$id)->update(['published'=> 0 ,'expired_at' => Carbon::now()]);
                    if( isset($published_premium_ads_cat) && $published_premium_ads_cat->category->premium_ads_num >0){

                        $published_premium_ads_cat->category->decrement('premium_ads_num');
                    }
                }

            }
        }
        return redirect()->back();

    }
    public function sold($id)
    {
        if($id >= 1) {
            $ad = Ad::where('id',$id)->where('sold',0)->first();
            if($ad){
                $ad->sold=1;
                $ad->save();
                if($ad->premium == 1 && $ad->archived != 1){//
                    //  dd($ad->premium_ad->category); //->decrement('premium_ads_num');


//                    $published_premium_ads_update= PremiumAd::where('to', '<', Carbon::now())->where('published', 1);
//                    if($published_premium_ads_update) {
                    $published_premium_ads_cat = PremiumAd::where('ad_id',$id)->where('published',1)->first();
                    PremiumAd::where('ad_id',$id)->update(['published'=> 0 ,'expired_at' => Carbon::now()]);
                    if( isset($published_premium_ads_cat) && $published_premium_ads_cat->category->premium_ads_num >0){

                        $published_premium_ads_cat->category->decrement('premium_ads_num');
                    }




                }


            }


        }

//        return redirect()->back()->with('error', 'Something went wrong.');
        return redirect()->back();

    }

}
