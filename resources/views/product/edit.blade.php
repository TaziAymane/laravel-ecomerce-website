@extends('base')
@section('title','Edit')
@section('content')
   <x-edit-form :product="$product"></x-editForm>
@endsection