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
    <button type="submit">Deletar</button>
</form>