@extends('layouts.master')
@section('content')
    @include('partial.page-header')
    @include('msg.errors')
    <form action="{{route('dashboard.coupons.store') }}" method="POST" class="form-horizontal">
    @include('dashboard.coupons.form')
    </form>
@endsection