@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('status message', __('Whoops!! Something went wrong.'))
@section('message',
    __('Sorry, we can’t seem to find that listing. it might have been removed or doesn’t exist
    anymore'))
