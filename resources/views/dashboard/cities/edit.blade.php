@extends('layouts.master')
@section('content')
    @include('partial.page-header')
    @include('msg.errors')
    <form action="{{route('dashboard.cities.update',$city->id) }}" method="POST" class="form-horizontal">
        @method('PUT')
    @include('dashboard.cities.form')
    </form>
@endsection