@extends('layouts.master')
@section('content')
    @include('partial.page-header')
    @include('msg.errors')
    <form action="{{route('dashboard.categories.store') }}" method="POST" class="form-horizontal">
    @include('dashboard.categories.form')
    </form>
@endsection