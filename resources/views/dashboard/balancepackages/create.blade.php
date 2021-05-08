@extends('layouts.master')
@section('content')
    @include('partial.page-header')
    @include('msg.errors')
    <form action="{{route('dashboard.balancepackages.store') }}" method="POST" class="form-horizontal">
    @include('dashboard.balancepackages.form')
    </form>
@endsection