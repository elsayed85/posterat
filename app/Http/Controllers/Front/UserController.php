<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Ad;
use App\Models\Bookmark;
use App\Models\PremiumAd;
use App\Models\User;
use App\Traits\ImageUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    use ImageUploader;
    public function edit()
    {
        $user = User::where('id', auth()->user()->id)->firstOrFail();

        return view('frontend.users.profile', compact('user'));

    }

    public function update(UserRequest $request)
    {
        $user = User::find(auth()->user()->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
//        $user->email = $request->email;
//        $user->phone = $request->phone;
        $user->whatsapp = $request->whatsapp;
        $user->bio = $request->bio;

        if(request('password')){
            $user->password = Hash::make($request->password);
        }
        $user->save();
        session()->flash('status', 'تم تعديل البيانات الشخصية بنجاح');
        return back();
    }
    public function favourite()
    {
        $ad_ids = Bookmark::where(['bookmarks.user_id' => auth()->user()->id])
            ->select('ad_id')->get();
        $ads = Ad::whereIn('id',$ad_ids)->paginate(10);
        //dd($ads);
       return view('frontend.users.favourite', compact('ads'));
    }
    public function userads($id)
    {
        $full_name = User::findOrFail($id)->fullname;
        $ads = Ad::where(['user_id' => $id,'archived'=>0,'published'=>1])->paginate(12);
        return view('frontend.users.userads', compact('full_name','ads'));
    }
    public function myads()
    {
        $ads = Ad::where(['user_id' => auth()->user()->id,'archived'=>0,'published'=>1])->paginate(10);
       return view('frontend.users.myads', compact('ads'));
    }
    public function mysaved()
    {
        $ads = Ad::where(['user_id' => auth()->user()->id,'archived'=>0,'published'=>0])->paginate(10);
        return view('frontend.users.mysaved', compact('ads'));
    }
    public function destroy(User $user)
    {
        $user->delete();
    }

    public function photo()
    {
        $user = User::where('id', auth()->user()->id)->firstOrFail();

        return view('frontend.users.photo', compact('user'));

    }
    public function updatePhoto(Request $request)
    {
        $path = 'uploads/user/'.auth()->user()->id.'/';
        $this->uploadPath = public_path($path);

        $response = $this->prefix('user_photo_')->fileStore($request,'main_image');
        $user =  auth()->user();
        $this->resizeImage($path,$this->imageName,300,300,'large_');
        $this->resizeImage($path,$this->imageName,200,200,'small_');
        $user->update([
            'photo'=>   $path .'large_'.$this->imageName,
            'photo_thumb'=>   $path .'small_'.$this->imageName,
        ]);
        $user->save();
        return $response;

    }
    public function resizeImage($img_url,$img,$w=320,$h=240,$thumb='thumb_')
    {
        $image = Image::make(public_path($img_url.$img))->resize($w, $h);//320, 240

        $image->save(public_path($img_url.$thumb.$img));
    }
    public function sold($id)
    {
        if($id >= 1) {
            $ad = Ad::where('id',$id)->where('sold',0)->where('user_id',auth()->user()->id)->first();
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
    public function archive($id)
    {
        if($id >= 1) {
            $ad = Ad::where('id', $id)->where('archived', 0)->where('user_id', auth()->user()->id)->first();
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
}
