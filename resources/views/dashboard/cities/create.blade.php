@extends('layouts.master')
@section('content')
    @include('partial.page-header')
    @include('msg.errors')
    <form action="{{route('dashboard.cities.store') }}" method="POST" class="form-horizontal">
    @include('dashboard.cities.form')
    </form>
@endsection