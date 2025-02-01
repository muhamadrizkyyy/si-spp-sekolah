@extends('errors::minimal')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('status message', __('Whoops!! Too Many Requests.'))
@section('message', __('Sorry, you have made too many requests. Please slow down and try again later.'))
