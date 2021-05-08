<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
//            'childrens' => self::collection($this->whenLoaded('childrens'))  ,
'id' => $this->id,
'title_ar' => $this->title_ar,
'title_en' => $this->title_en,
'icon' => $this->icon,
'description_ar' => $this->description_ar,
'description_en' => $this->description_en,
'parent' => $this->parent,
'deep' => $this->deep,
'published' => $this->published,
'is_menu' => $this->is_menu,
'premium_ads_is' => $this->premium_ads_is,
'premium_ads_num' => $this->premium_ads_num,
'order_is' => $this->order_is,

        ];
    }
}
