@extends('layouts.master')
@section('content')
    @include('partial.page-header')
    @include('msg.errors')
    <form action="{{route('dashboard.users.store') }}" method="POST" class="form-horizontal">
    @include('dashboard.users.form')
    </form>
@endsection