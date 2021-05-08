<?php
namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class RootCategories
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->with('children')->where('published', 1)->Where('parent', '1')->orderBy('order_is')->get();
    }


}