@extends('layouts.master')
@section('content')
    @include('partial.page-header')
    @include('msg.errors')
    <form action="{{route('dashboard.sliders.update',$slider->id) }}" method="POST" class="form-horizontal">
        @method('PUT')
    @include('dashboard.sliders.form')
    </form>
@endsection