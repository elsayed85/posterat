<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\AdAattachments;
use App\Models\Ad;
use App\Models\Category;
use App\Models\City;
use App\Models\CustomField;
use Illuminate\Http\Request;

class XAdXController extends Controller
{
    public function index()
    {
    } //end of index

    public function create()
    {
        $categories = Category::all();
        $cities = City::all();
        //        $ad = Ad::find(1);
        //        $details = $ad->details;
        //
        //        $details['oil'] = 'no';
        //        $details['long'] = 210;
        //
        //        $ad->details = $details;
        //
        //        $ad->save();
        //$ad->update(['details->color' => 'red','details->num' => '800','details->example' => '*',]);
        ////foreach ($ad->details as $detail=>$value){
        ////    dump( $detail);     dump( $value);
        ////
        ////}
        ////
        ////        dd($ad->details);


        return view('frontend.ads.add_ad', compact('categories', 'cities'));
    } //end of create

    public function store(Request $request)
    {
        //check attribute in request

        if (!$request->has('cost_hide'))
            $request->request->add(['cost_hide' => 0]);
        else
            $request->request->add(['cost_hide' => 1]);

        if (!$request->has('phone_show'))
            $request->request->add(['phone_show' => 0]);
        else
            $request->request->add(['phone_show' => 1]);

        if (!$request->has('whatsapp_show'))
            $request->request->add(['whatsapp_show' => 0]);
        else
            $request->request->add(['whatsapp_show' => 1]);

        //1- insert table Ads.
        Ad::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'city_id' => $request->city_id,
            'cost' => $request->cost,
            'description' => $request->description,
            'details' => $request->details,
            'tags' => $request->tags,
            'mode' => $request->mode,
            'phone' => $request->phone,
            'whatsapp' => $request->whatsapp,
            'premium' => $request->premium,
            'phone_show' => $request->phone_show,
            'whatsapp_show' => $request->whatsapp_show,
            'type_is' => $request->type_is,
            'published_at' => date('Y-m-d'),
        ]);

        //check exist attachments in request.
        //        if($request->hasFile('pic')){
        //
        //            $this->validate($request, ['pic' => 'required|mimes:pdf,jpeg,png,jpg'], ['pic.mimes' => 'صيغة المرفق يجب ان تكون pdf,jpeg,png,jpg']);
        //
        //                //get the last invoice ID that has been added to the DB.
        //            $ad_id = Ads::latest()->first()->id;
        //
        //                //save request data in variable.
        //            $image = $request->file('pic');
        //            $file_name = $image->getClientOriginalName();
        //            $id = $ad_id;
        //
        //                //2- insert table invoice_attachments.
        //            $attachments = new AdAattachments();
        //            $attachments->file_name = $file_name;
        //            $attachments->ad_id	 = $id;
        //            $attachments->save();
        //
        //                //move pic on server.
        //            $request->pic->move(public_path('Attachments/'. $id), $file_name);

        session()->flash('success', 'تم إضافة إعلانك بنجاح');
        return redirect()->back();
    } //end of store

    public function show()
    {
    } //end of show

    public function edit()
    {
    } //end of edit

    public function update()
    {
    } //end of update

    public function destroy()
    {
        //
    } //end of destroy
}
