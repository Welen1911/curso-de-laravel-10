<h1>Nova dúvida!</h1>

<x-alert/>

<form action="{{ route('supports.store') }}" method="post">
    @include('admin.supports.partials.form', ['support' => ''])
    <button type="submit">Enviar</button>
</form>
