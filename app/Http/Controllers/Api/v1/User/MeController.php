<?php

namespace App\Http\Controllers\Api\v1\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\User\ChangePasswordRequest;
use App\Http\Requests\Api\V1\User\UpdateAvatarRequest;
use App\Http\Requests\Api\V1\User\UpdateInfoRequest;
use App\Models\Ad;
use App\Models\Bookmark;
use App\Models\User;
use App\Traits\ImageUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class MeController extends Controller
{
    use ImageUploader;

    public function me()
    {
        return success(auth()->user());
    }

    public function statuses()
    {
        $user = auth()->user();
        return success([
            'verified_email' => $user->hasVerifiedEmail(),
        ]);
    }

    public function updataAvatar(UpdateAvatarRequest $request)
    {
        $path = 'uploads/user/' . auth()->id() . '/';
        $this->uploadPath = public_path($path);

        $response = $this->prefix('user_photo_')->fileStore($request, 'avatar');

        $user =  auth()->user();

        $this->resizeImage($path, $this->imageName, 300, 300, 'large_');
        $this->resizeImage($path, $this->imageName, 200, 200, 'small_');
        $user->update([
            'photo' =>   $path . 'large_' . $this->imageName,
            'photo_thumb' =>   $path . 'small_' . $this->imageName,
        ]);
        $user->save();

        return success([
            'photo' =>   $path . 'large_' . $this->imageName,
            'photo_thumb' =>   $path . 'small_' . $this->imageName,
        ]);
    }

    public function verifyEmail()
    {
        $user = auth()->user();
        if (!$user->hasVerifiedEmail()) {
            $user->sendEmailVerificationNotification();
            return success(['message' => "check your email"]);
        }
        return success(['has_verified_email' => $user->hasVerifiedEmail(), 'message' => "email is verified"]);
    }

    public function updateInfo(UpdateInfoRequest $request)
    {

        $data = $request->validated();

        if (!count($data)) {
            return failed('nothing changed');
        }

        if ($email = $request->email) {
            if ($email != auth()->user()->email) {
                $data['email_verified_at'] = null;
                auth()->user()->sendEmailVerificationNotification();
            }
        }
        
        auth()->user()->update($data);
        return success(['message' => "You Info Updated", 'user' => auth()->user()]);
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->new_password)]);
        return response()->noContent();
    }

    public function resizeImage($img_url, $img, $w = 320, $h = 240, $thumb = 'thumb_')
    {
        $image = Image::make(public_path($img_url . $img))->resize($w, $h); //320, 240

        $image->save(public_path($img_url . $thumb . $img));
    }

    public function favourite()
    {
        $ad_ids = Bookmark::where(['bookmarks.user_id' => auth()->id()])
            ->select('ad_id')->get();
        $ads = Ad::whereIn('id', $ad_ids)->paginate(10);
        return success(['ads' => $ads]);
    }

    public function userads(User $user)
    {
        $full_name = $user->fullname;
        $ads = Ad::where(['user_id' => $user->id, 'archived' => 0, 'published' => 1])->paginate(12);
        return success(['full_name' => $full_name, 'ads' => $ads]);
    }

    public function myads()
    {
        $ads = Ad::where(['user_id' => auth()->id(), 'archived' => 0, 'published' => 1])->paginate(10);
        return success(['ads' => $ads]);
    }

    public function mysaved()
    {
        $ads = Ad::where(['user_id' => auth()->id(), 'archived' => 0, 'published' => 0])->paginate(10);
        return success(['ads' => $ads]);
    }
}
