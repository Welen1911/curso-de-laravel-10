@extends('admin.template.layout')


@section('title', "Dúvida $support->subject")

@section('header')
<h1 class="text-lg text-black-500">Dúvida {{ $support->subject }}</h1>
@endsection

@section('content')
<h1>Detalhes do Suporte {{ $support->id }}</h1>

<ul>
    <li>Assunto: {{ $support->subject }}</li>
    <li>Status: {{ $support->status }}</li>
    <li>Descrição: {{ $support->body }}</li>
    <li>Criado em: {{ $support->created_at }}</li>
</ul>

<form action="{{ route('supports.destroy', $support->id) }}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit" class="slex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-gray-900 hover:bg-gray-100 dark:text-red-400 dark:border-red-700">Deletar</button>
</form>

@endsection