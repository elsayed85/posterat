@extends('layouts.master')
@section('content')
    @include('partial.page-header')
    @include('msg.errors')
    <form action="{{route('dashboard.pages.store') }}" method="POST" class="form-horizontal">
    @include('dashboard.pages.form')
    </form>
@endsection