@extends('errors::minimal')

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('status message', __('Whoops!! Service Unavailable.'))
@section('message', __('Sorry, the service is temporarily unavailable. Please try again later.'))
