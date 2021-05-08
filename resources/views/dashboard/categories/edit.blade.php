@extends('layouts.master')
@section('content')
    @include('partial.page-header')
    @include('msg.errors')
    <form action="{{route('dashboard.categories.update',$category->id) }}" method="POST" class="form-horizontal">
        @method('PUT')
    @include('dashboard.categories.form')
    </form>
@endsection