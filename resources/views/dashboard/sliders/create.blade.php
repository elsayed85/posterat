@extends('layouts.master')
@section('content')
    @include('partial.page-header')
    @include('msg.errors')
    <form action="{{route('dashboard.sliders.store') }}" method="POST" class="form-horizontal">
    @include('dashboard.sliders.form')
    </form>
@endsection