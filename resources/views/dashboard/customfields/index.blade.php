@extends('layouts.master')
@section('content')
@include('partial.page-header')
@include('msg.status')
 @include('dashboard.customfields.table')
@endsection