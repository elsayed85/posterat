<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait ImageUploader
{

    public $allowImages;
    public $uploadPath;
    public $path;
    public $prefix;
    public $imageName = '';
    public function __construct()
    {
        $this->uploadPath = public_path('uploads/' . date('y-m') . '/');
        $this->allowImages = ['jpg', 'png', 'jpeg'];
        $this->prefix = Str::orderedUuid() . '.';
    }

    public function prefix($prefix = '')
    {

        if ($prefix != '') {
            $prefix = normalizer_normalize($prefix);
            $prefix = preg_replace("[A-Za-z0-9]", "_", $prefix);
        }
        $this->prefix = $prefix . Str::orderedUuid() . '.';
        return $this;
    }

    public function fileCreate()
    {
        return view('imageupload');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function fileStore(Request $request, $filename = 'file')
    {
        $image = $request->file($filename);
        $imageName = $image->getClientOriginalName();
        $ext = strtolower($image->getClientOriginalExtension());
        if (in_array($ext, $this->allowImages)) {
            $this->imageName = $this->prefix . $ext;
            $image->move($this->uploadPath, $this->imageName);
        }
        return response()->json(['success' => $imageName]);
    }

    public function fileDestroy(Request $request)
    {
        $filename =  $request->get('filename');
        //ImageUpload::where('filename',$filename)->delete();
        $path = $this->uploadPath . $filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }
}
