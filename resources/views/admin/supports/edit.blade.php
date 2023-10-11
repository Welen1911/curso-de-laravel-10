<h1>Editar dúvida:</h1>
@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach
@endif

<form action="{{ route('supports.update', $support->id)}}" method="post">
    @csrf
    @method('put')
    <input type="text" name="subject" placeholder="Assunto" value="{{ $support->subject }}"><br>
    <textarea name="body" id="" cols="30" rows="10" placeholder="Descrição">{{ $support->body }}</textarea>
    <button type="submit">Enviar</button>
</form>
