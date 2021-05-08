@extends('layouts.master')
@section('content')
    @include('partial.page-header')
    @include('msg.errors')
    <form action="{{route('dashboard.pages.update',$page->id) }}" method="POST" class="form-horizontal">
        @method('PUT')
    @include('dashboard.pages.form')
    </form>
@endsection