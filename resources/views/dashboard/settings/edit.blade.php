@extends('layouts.master')
@section('content')
    @include('partial.page-header')
    @include('msg.errors')
    <form action="{{route('dashboard.settings.update',$setting->id) }}" method="POST" class="form-horizontal">
        @method('PUT')
    @include('dashboard.settings.form')
    </form>
@endsection