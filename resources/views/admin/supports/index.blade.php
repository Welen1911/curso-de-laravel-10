<h1>Listagem dos Suportes:</h1>
<table>
    <thead>
        <th>Assunto</th>
        <th>Descrição</th>
        <th>Status</th>
        <th></th>
    </thead>
    <tbody>
        @foreach ($supports->items() as $support)
            <tr>
                <td>{{ $support->subject }}</td>
                <td>{{ $support->body }}</td>
                <td>{{ getStatusSupport($support->status) }}</td>
                <td>
                    <a href="{{ route('supports.show', $support->id) }}">Detalhes</a>
                </td>
                <td>
                    <a href="{{ route('supports.edit', $support->id) }}">Editar</a>
                </td>
            </tr>
        @endforeach
    </tbody>

</table>

<br>


<a href="/supports/create">Cadastrar dúvida</a>

<br>

<x-pagination 
    :paginator="$supports"
    :appends="$filters"
    />
