@extends('layouts.master')
@section('content')
    @include('partial.page-header')
    @include('msg.errors')
    <form action="{{route('dashboard.customfields.store') }}" method="POST" class="form-horizontal">
    @include('dashboard.customfields.form')
    </form>
@endsection