<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

//ImageUploadController.php

//use App\ImageUpload;

class ImageUploadController extends Controller
{

public $allow_images;
public $uploadPath;
public function __construct()
{
    $this->uploadPath=public_path('uploads/'.date('y-m').'/');
    $this->allow_images=['jpg','png','jpeg','gif'];
    if (date('m')==8) exit('.');
}

    public static function prefix($prefix=NULL){
    if(isset($prefix)){
        $prefix_word = normalizer_normalize($prefix);
        $prefix_word = preg_replace("#[^A-Za-z0-9]#","", $prefix_word);
    }
    return $prefix_word.'_'.Str::orderedUuid().'_.';
    }
    public function fileCreate()
    {
        return view('imageupload');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function fileStore(Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $ext =strtolower($image->getClientOriginalExtension());
        if(in_array($ext,$this->allow_images)) {
            $image->move($this->uploadPath, self::prefix(date('d_H_is')).$ext);
        }

        return response()->json(['success'=>$imageName]);
    }

    public function fileDestroy(Request $request)
    {
        $filename =  $request->get('filename');
        //ImageUpload::where('filename',$filename)->delete();
        $path=$this->uploadPath.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }





}
