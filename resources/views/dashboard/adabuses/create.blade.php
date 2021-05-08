@extends('layouts.master')
@section('content')
    @include('partial.page-header')
    @include('msg.errors')
    <form action="{{route('dashboard.adabuses.store') }}" method="POST" class="form-horizontal">
    @include('dashboard.adabuses.form')
    </form>
@endsection