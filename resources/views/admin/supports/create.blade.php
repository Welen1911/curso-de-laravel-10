<h1>Nova dúvida!</h1>


<form action="{{ route('supports.store') }}" method="post">
    @csrf
    <input type="text" name="subject" placeholder="Assunto"><br>
    <textarea name="body" id="" cols="30" rows="10" placeholder="Descrição"></textarea>
    <button type="submit">Enviar</button>
</form>