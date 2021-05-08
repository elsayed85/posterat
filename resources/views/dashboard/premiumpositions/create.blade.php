@extends('layouts.master')
@section('content')
    @include('partial.page-header')
    @include('msg.errors')
    <form action="{{route('dashboard.premiumpositions.store') }}" method="POST" class="form-horizontal">
    @include('dashboard.premiumpositions.form')
    </form>
@endsection