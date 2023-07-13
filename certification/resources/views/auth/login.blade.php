@extends('layouts.app')

@section('title', '로그인')

@section('content')
  <form action="{{ route('login') }}" method="POST">
    @csrf
    <input type="text" >
  </form>