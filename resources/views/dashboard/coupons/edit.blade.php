@extends('layouts.master')
@section('content')
    @include('partial.page-header')
    @include('msg.errors')
    <form action="{{route('dashboard.coupons.update',$coupon->id) }}" method="POST" class="form-horizontal">
        @method('PUT')
    @include('dashboard.coupons.form')
    </form>
@endsection