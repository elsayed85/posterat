@extends('layouts.master')
@section('content')
    @include('partial.page-header')
    @include('msg.errors')
    <form action="{{route('dashboard.balancepackages.update',$balancepackage->id) }}" method="POST" class="form-horizontal">
        @method('PUT')
    @include('dashboard.balancepackages.form')
    </form>
@endsection