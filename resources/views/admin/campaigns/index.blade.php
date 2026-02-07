@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-4">
        <h3>Gestione Domini Autorizzati</h3>
        <a href="{{ route('campaigns.create') }}" class="btn btn-primary">+ Nuova Campagna</a>
    </div>

    <table class="table table-striped border">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Dominio</th>
                <th>Tag CRM</th>
                <th>Stato</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($campaigns as $c)
            <tr>
                <td>{{ $c->name }}</td>
                <td><code>{{ $c->authorized_domain }}</code></td>
                <td><span class="badge bg-info">{{ $c->tag }}</span></td>
                <td>
                    <span class="badge {{ $c->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                        {{ $c->status }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('campaigns.edit', $c->id) }}" class="btn btn-sm btn-warning">Modifica</a>
                    <form action="{{ route('campaigns.destroy', $c->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Sei sicuro?')">Elimina</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
