@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('status message', __('Whoops!! Access Forbidden.'))
@section('message', __('Sorry, you do not have permission to view this page.'))
