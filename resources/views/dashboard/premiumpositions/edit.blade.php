@extends('layouts.master')
@section('content')
    @include('partial.page-header')
    @include('msg.errors')
    <form action="{{route('dashboard.premiumpositions.update',$premiumposition->id) }}" method="POST" class="form-horizontal">
        @method('PUT')
    @include('dashboard.premiumpositions.form')
    </form>
@endsection