@extends('layouts.master')
@section('content')
    @include('partial.page-header')
    @include('msg.errors')
    <form action="{{route('dashboard.customfields.update',$customfield->id) }}" method="POST" class="form-horizontal">
        @method('PUT')
    @include('dashboard.customfields.form')
    </form>
@endsection