<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\Category;
use App\Models\City;
use App\Models\CustomField;
use App\Models\PremiumPositionDay;
use App\Traits\ImageUploader;
use App\Traits\UPayments;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;


class AdController extends Controller
{
use ImageUploader, UPayments;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function create()
    {
        $user = auth()->user();
        if(request('step') && request('step')==1){
            $ad = Ad::where(['user_id'=>$user->id ])->orderBy('id', 'desc')->first();

            $cities = City::all();
            $categories = Category::RootCategories();

            return view('frontend.ads.step1',compact('categories','cities','ad'));
        }
        if($user->usual_balance < 1 && $user->paid_balance < 1){
            session()->flash('status', trans('ad.you haven\'t balance for publishing ad'));
            session()->flash('type', 'info');
            return redirect()->route('packages.index');

        }

        //dd(public_path('uplads'));
//        $ad = Ad::find(1);
//        $details = $ad->details;
//
//        $details['جازس'] = 'no';
//        $details['long'] = 500;
//
//        $ad->details = $details;
//
//        $ad->save();
        $cities = City::all();
//$ad->update(['details->color' => 'red','details->num' => '800','details->example' => '*']);

//foreach ($ad->details as $detail=>$value){
//    dump( $detail);     dump( $value);
        $categories = Category::RootCategories();

        return view('frontend.ads.create',compact('categories','cities'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        if($request->step && $request->step==1 && $request->ad_id){
            $lastElement =array_filter($request->subcategory);
            $request->validate([
                'category_id'=>'required|exists:categories,id',
                'city_id'=>'required|exists:cities,id',
                'title'=>'required',
            ]);
            $request->merge(['user_id'=>auth()->user()->id,'phone'=>auth()->user()->phone]);
            if(is_array($lastElement)){
                foreach ($lastElement as $item){
                    $request->merge(['category_id'=>$item]);
                }
            }
            $ad = Ad::where(['user_id'=>$user->id,'id'=>$request->ad_id ])->orderBy('id', 'desc')->first();
            $ad->update($request->all());
            return redirect()->route('ads.edit',compact('ad'));
        }
        if($user->usual_balance < 1 && $user->paid_balance < 1){
            session()->flash('status', 'ad.you haven\'t balance for publishing ad');
            return redirect()->route('packages.index');

        }
if( !is_null($user->paid_expired_at) && Carbon::parse($user->paid_expired_at)->gt(Carbon::now()) && $user->paid_balance > 0 ){
        $user->paid_balance -=1;
}elseif( !is_null($user->usual_expired_at) && $user->usual_balance > 0){
        $user->usual_balance -=1;
}else{
            return redirect()->route('packages.index');
        }//save is below
        $user->points+=get_setting('ad_points');
        $user->save();
        $lastElement =array_filter($request->subcategory);
        $request->validate([
            'category_id'=>'required|exists:categories,id',
            'city_id'=>'required|exists:cities,id',
            'title'=>'required',
        ]);
        $request->merge(['user_id'=>auth()->user()->id,'phone'=>auth()->user()->phone]);
       if(is_array($lastElement)){
           foreach ($lastElement as $item){
                $request->merge(['category_id'=>$item]);
        }
       }
//      dd($request->all(),$lastElement);


        $ad = Ad::create($request->all());

        return redirect()->route('ads.edit',compact('ad'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ad = Ad::with(['category','city'])->where('id',$id)->where('archived',0)->where('sold',0)->where('published',1)->firstOrFail();
        $related_ads = Ad::with('category')->with('city')->where('published', 1)
            ->where('archived', 0)->where('category_id', $ad->category_id)->WhereNotIn('ads.id', ['id' => $id])
            ->limit(get_setting('related_ads_limit'))->orderBy('premium', 'DESC')->orderBy('published_at', 'DESC')->get();
//        $now = Carbon::now();
//       $from = Carbon::createFromTimeString($ad->disturb_hours_from);
//        $to =Carbon::createFromTimeString($ad->disturb_hours_to);

       $ad->increment('total_views',1); // add a new page view to our `views` column by incrementing it

        $like =$ad->likes()->where('user_id',auth()->user()->id??'')->count() > 0;
        $custom_inputs = CustomField::whereHas('categories', function($q) use($ad) {
            $q->whereIn('id', [$ad->category_id]);
        })->get();

//dd($ad);
    return view('frontend.ads.show',compact('ad','related_ads','like','custom_inputs'));

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
//        $custom_inputs=Category::where('id',$ad->category_id)->customfields()->get();
//        $custom_inputs = Category::with('customfields')->where('id', $ad->category_id)->customfields()->get();
        $custom_inputs = CustomField::whereHas('categories', function($q) use($ad) {
            $q->whereIn('id', [$ad->category_id]);
        })->get();
        return view('frontend.ads.edit',compact('ad','custom_inputs'));
    }

    public function plan($id)
    {
        $ad = Ad::findOrFail($id);

        if($ad->category->deep > 1) {
            $d = (Category::with('parentCategory')->with('premiumPositionDays')->with('premiumPosition')->where('id', $ad->category->id)->first());
            $parent_cats = [];

            while (isset($d) && $d->has('parentCategory')) {

                if ($d )
                    array_push($parent_cats,  $d);
                    $d = $d->parentCategory;

            }
           // $parent_cats = array_reverse($parent_cats);
        }else{
            $parent_cats[] = (Category::with('premiumPositionDays')->with('premiumPosition')->where('id', $ad->category->id)->first());
        }

//dump($ad->category);
//        $parent_cats->merge(Category::with('premiumPositionDays')->with('premiumPosition')->where('id', '=','1')->first());
       // collect($parent_cats)->sortBy('category_deep');


        return view('frontend.ads.plan',compact('ad','parent_cats'));
    }

public function planPublish($id,Request $request)
    {
        $request->validate([
                'plan'=>'required',
            ]);
        if (str_contains($request->plan, '_')) {
          list($plan,$category) =  explode('_',$request->plan);
            if(is_numeric($plan) && is_numeric($category)){
                $request->merge(['plan_id'=>$plan,'category_id'=>$category]);
            }
            $request->validate([
                'category_id'=>'required|integer',
                'plan_id'=>'required|integer',
            ]);
        }else{ redirect()->back();}
        //dd($request->all());
        $payfor =   Category::with(["premiumPositionDays" => function($q) use($request){
            $q->where(['premium_position_days.id' => $request->plan_id]);
         }])->where('id', $request->category_id)->first();


      //  dd($payfor->premiumPositionDays[0]->days);
        $payment = $this->setMode('live');
$this->testCustomer();
//$this->testProduct();
$this->fillProduct('إعلان مميز '.$payfor->premiumPositionDays[0]->days.' يوم',$payfor->premiumPositionDays[0]->days,$payfor->premiumPositionDays[0]->days_cost);
$this->success_url=url('success');
$this->error_url=url('error');
$x = $this->doPayment();
dump($x);

dd($payment);
        //window.location.href=$server_output['paymentURL']; // javascript
//header('Location:'.$server_output['paymentURL']); // PHP

        $ad = Ad::findOrFail($id);
        $ad->published=1;
        $ad->published_at = Carbon::now();
        $ad->save();
        dump($request->featured);
        $selected_plans=[];
for($i=1;$i<=10;$i++){
    if($request->has('plan'.$i)){
        dump($request->{'plan'}.$i);
       array_push($selected_plans,$request->{'plan'}.$i);
    }

}
        $cost =PremiumPositionDay::whereIn('id',$selected_plans)->where('published',1)->sum('days_cost');
dump($cost);dump($selected_plans);


        //return view('frontend.ads.plan',compact('ad','plans'));
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
        $ad = Ad::findOrFail($id);
        $request->validate([
            'description'=>'required|min:16|max:1000',
            'type_is'=>'required',
        ]);
        $ad->update($request->all());
//        if(!$ad->published){
//            return view('frontend.ads.edit',compact('ad'));
//        }
        $details = $ad->details;
        $custom_inputs = CustomField::whereHas('categories', function($q) use($ad) {
            $q->whereIn('id', [$ad->category_id]);
        })->get();
        foreach ($custom_inputs as  $input){
            if(isset($request[$input->input_name]) && $request[$input->input_name] !='0') {
                if($input->input_type == 'checkbox' ) {
                    $details[$input->input_name] = $input->input_title;
                }else {
                    $details[$input->input_name] = $request[$input->input_name] ?? '';

                }
            }

        }
        $ad->details = $details;

        $ad->save();

        return redirect()->route('ads.plan',$ad->id);

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
    public function waterMark($img_url,$img)
    {
        $image = Image::make(public_path($img_url.$img))->resize(480, 360);//320, 240

        /* insert watermark at bottom-right corner with 10px offset */
        $image->insert(public_path('main/water_mark.png'), 'bottom-right', 10, 10);

        $image->save(public_path($img_url.'big_'.$img));

    }
    public function resizeImage($img_url,$img,$w=320,$h=240)
    {
        $image = Image::make(public_path($img_url.$img))->resize($w, $h);//320, 240

        $image->save(public_path($img_url.'thumb_'.$img));
    }
    public function uploadImages(Request $request)
    {
        $path = 'uploads/'.date('y-m/').$request->ad_id.'/';
        $this->uploadPath = public_path($path);
        $response = $this->prefix('images_')->fileStore($request,'images');
        $ad = Ad::findOrFail($request->ad_id);
        $this->waterMark($path,$this->imageName);
        $this->resizeImage($path,$this->imageName);
        $ad->photos()->create([
//            'url'=>  $path .$this->imageName,
            'url'=>  $path .'big_'.$this->imageName,
            'url_thumb'=>  $path .'thumb_'.$this->imageName,
            'order_is'=>$request->order_is
        ]);
        return $response;
    }

    public function uploadMainImage(Request $request)
    {
        $path = 'uploads/'.date('y-m/').$request->ad_id.'/';
        $this->uploadPath = public_path($path);

        $response = $this->prefix('main_image_')->fileStore($request,'main_image');
        $ad = Ad::findOrFail($request->ad_id);
        $this->waterMark($path,$this->imageName);
        $this->resizeImage($path,$this->imageName);
        $ad->update([
            'image'=>   $path .'big_'.$this->imageName,
            'image_thumb'=>   $path .'thumb_'.$this->imageName,
        ]);
        return $response;

    }
}
