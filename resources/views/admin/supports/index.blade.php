<h1>Dúvidas abridas:</h1>

@foreach ($supports as $support)
    <ol>
        <li>Assunto: {{ $support['subject'] }}</li>
        <li>Detalhes: {{ $support['body'] }}</li>
        <li>Status: {{ $support['status'] }}</li>
    </ol>
@endforeach

<a href="{{ route('supports.create') }}">Cadastrar dúvida</a>
