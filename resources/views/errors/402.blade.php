@section('title', '404 page')
@include('web.layouts.header')
@extends('errors::minimal')

@section('title', __('Payment Required'))
@section('code', '402')
@section('message', __('Payment Required'))
@include('web.layouts.footer')
