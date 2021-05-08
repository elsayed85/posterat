@extends('layouts.master')
@section('content')
    @include('partial.page-header')
    @include('msg.errors')
    <form action="{{route('dashboard.adabuses.update',$adabuse->id) }}" method="POST" class="form-horizontal">
        @method('PUT')
    @include('dashboard.adabuses.form')
    </form>
@endsection