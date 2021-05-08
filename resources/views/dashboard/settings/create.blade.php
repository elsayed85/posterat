@extends('layouts.master')
@section('content')
    @include('partial.page-header')
    @include('msg.errors')
    <form action="{{route('dashboard.settings.store') }}" method="POST" class="form-horizontal">
    @include('dashboard.settings.form')
    </form>
@endsection