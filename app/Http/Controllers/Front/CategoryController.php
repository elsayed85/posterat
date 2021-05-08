<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\Category;
use App\Models\PremiumAd;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $categories = Category::with('children')->where('published',1)->orderBy('order_is','ASC')->get();
        //$parent_cats =$this->parentsDNA($id);
        //$category = Category::where('id',$id)->where('published',1)->firstOrFail();
        $ads = Ad::with('category','city')->where('published',1)->where('archived',0)->limit(get_setting('ads_home_limit', 36))->orderBy('premium','DESC')->orderBy('published_at','DESC')->get();
        return view('frontend.categories.index',compact('ads'));
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
        AdAbuse::create([
            'ad_id'=> $ad->id,
            'comment'=> $request->comment,
            'reason'=> $request->reason,
            'user_id'=> auth()->user()->id,
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
        $parent_cats =$this->parentsDNA($id);
        $category = Category::where('id',$id)->where('published',1)->firstOrFail();
        $category_child = Category::where('parent',$id)->where('published',1)->pluck('id')->toArray();

        $premium_ads_is = PremiumAd::where('to', '>=', Carbon::now())->where('category_id',$id)->where('published', 1)->get(['ad_id']);
        $premium_ads=[];
        if(count($premium_ads_is)){

            $premium_ads = Ad::with('category','city')->whereIn('id',$premium_ads_is)->where('published',1)->where('archived',0)->where('sold',0)->orderBy('premium','DESC')->orderBy('published_at','DESC')->get();

        }
//        dd($category_child);
        $id=array($id);
        if(count($category_child)){

            $id = array_merge($id, $category_child);
            $category_child1 = Category::whereIn('parent',$category_child)->where('published',1)->pluck('id')->toArray();
            if(count($category_child1)){
                $id = array_merge($id, $category_child1);
                $category_child2 = Category::whereIn('parent',$category_child1)->where('published',1)->pluck('id')->toArray();
                if(count($category_child2)){
                    $id = array_merge($id, $category_child2);
                    $category_child3 = Category::whereIn('parent',$category_child2)->where('published',1)->pluck('id')->toArray();
                    if(count($category_child3)){
                        $id = array_merge($id, $category_child3);
                        $category_child4 = Category::whereIn('parent',$category_child3)->where('published',1)->pluck('id')->toArray();
                        if(count($category_child4)){
                            $id = array_merge($id, $category_child4);
                            $category_child5 = Category::whereIn('parent',$category_child4)->where('published',1)->pluck('id')->toArray();
                            if(count($category_child5)){
                                $id = array_merge($id, $category_child5);

                            }
                        }
                    }
                }
            }
        }
//        $normal_ads = Ad::with('category','city')->whereIn('category_id',$id)->whereNotIn('id',$premium_ads_is)->where('published',1)->where('archived',0)->where('sold',0)->orderBy('category_id','ASC')->orderBy('published_at','DESC')->paginate(get_setting('ads_category_limit'));
        $normal_ads = Ad::with('category','city')->whereIn('category_id',$id)->whereNotIn('id',$premium_ads_is)->where('published',1)->where('archived',0)->where('sold',0)->orderBy('published_at','DESC')->paginate(get_setting('ads_category_limit'));
        return view('frontend.categories.show',compact('parent_cats','category','normal_ads','premium_ads'));
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
    public function parentsDNA($id):array
    {
        $d = (Category::with('parentCategory')->where('id',$id)->first());
        $parent_cats =[];
        while (isset($d) &&  $d->has('parentCategory') ) {
            $d = $d->parentCategory;
           if($d)
               $parent_cats[]=$d;
        }
        return array_reverse($parent_cats);
    }

}
