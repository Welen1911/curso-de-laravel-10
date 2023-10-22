@extends('admin.template.layout')

@section('title', 'Fórum')

@section('header')
@include('admin.supports.partials.header', compact('supports'))
@endsection

{{-- @include('components.messages') --}}

@section('content')
@include('admin.supports.partials.content')

<x-pagination
    :paginator="$supports"
    :appends="$filters" />

@endsection