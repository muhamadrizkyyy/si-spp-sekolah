@extends('errors::minimal')

@section('title', __('Unauthorized'))
@section('code', '401')
@section('status message', __('Whoops!! Unauthorized Access.'))
@section('message', __('Sorry, you are not authorized to access this page. Please check your credentials.'))
