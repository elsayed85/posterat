@extends('layouts.master')
@section('content')
@include('partial.page-header')
@include('msg.status')
 @include('dashboard.cities.table')
@endsection