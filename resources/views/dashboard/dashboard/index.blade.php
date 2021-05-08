@extends('layouts.master')
@section('content')
    welcome {{auth()->user()->fullname}}
@endsection