@extends('layouts.master')
@section('content')
    @include('partial.page-header')
    @include('msg.errors')
    <form action="{{route('dashboard.premiumpositiondays.update',$premiumpositionday->id) }}" method="POST" class="form-horizontal">
        @method('PUT')
    @include('dashboard.premiumpositiondays.form')
    </form>
@endsection