@extends('layouts.master')
@section('content')
    @include('partial.page-header')
    @include('msg.errors')
    <form action="{{route('dashboard.users.update',$ad->id) }}" method="POST" class="form-horizontal">
        @method('PUT')
    @include('dashboard.users.form')
    </form>
@endsection