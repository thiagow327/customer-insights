@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Insights de Atendimento</h4>
    <a href="{{ route('insights.create') }}" class="btn btn-primary btn-sm">+ Novo Insight</a>
</div>

<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('insights.index') }}" class="row g-2">
            <div class="col-md-4">
                <input type="text" name="protocolo" class="form-control form-control-sm"
                    placeholder="Filtrar por protocolo"
                    value="{{ request('protocolo') }}">
            </div>
            <div class="col-md-4">
                <input type="text" name="cliente" class="form-control form-control-sm"
                    placeholder="Filtrar por cliente"
                    value="{{ request('cliente') }}">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-secondary btn-sm">Filtrar</button>
                <a href="{{ route('insights.index') }}" class="btn btn-outline-secondary btn-sm">Limpar</a>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-dark">
                <tr>
                    <th>Protocolo</th>
                    <th>Cliente</th>
                    <th>Canal</th>
                    <th>Sentimento</th>
                    <th>Risco</th>
                    <th>Status</th>
                    <th class="text-end">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($insights as $insight)
                <tr>
                    <td><code>{{ $insight->protocolo }}</code></td>
                    <td>{{ $insight->cliente }}</td>
                    <td>{{ ucfirst($insight->canal->value) }}</td>
                    <td>
                        @php
                            $sentimentoClasses = ['positivo' => 'success', 'neutro' => 'secondary', 'negativo' => 'danger'];
                            $sc = $sentimentoClasses[$insight->sentimento->value] ?? 'secondary';
                        @endphp
                        <span class="badge bg-{{ $sc }}">{{ ucfirst($insight->sentimento->value) }}</span>
                    </td>
                    <td>
                        @php
                            $riscoClasses = ['baixo' => 'success', 'medio' => 'warning', 'alto' => 'danger'];
                            $rc = $riscoClasses[$insight->risco->value] ?? 'secondary';
                        @endphp
                        <span class="badge bg-{{ $rc }}">{{ ucfirst($insight->risco->value) }}</span>
                    </td>
                    <td>
                        @php
                            $statusClasses = ['aberto' => 'secondary', 'em_andamento' => 'warning', 'resolvido' => 'success'];
                            $statusLabels = ['aberto' => 'Aberto', 'em_andamento' => 'Em andamento', 'resolvido' => 'Resolvido'];
                            $stc = $statusClasses[$insight->status->value] ?? 'secondary';
                        @endphp
                        <span class="badge bg-{{ $stc }}">{{ $statusLabels[$insight->status->value] ?? $insight->status->value }}</span>
                    </td>
                    <td class="text-end">
                        <a href="{{ route('insights.show', $insight) }}" class="btn btn-sm btn-outline-primary">Ver</a>
                        <a href="{{ route('insights.edit', $insight) }}" class="btn btn-sm btn-outline-secondary">Editar</a>
                        <form action="{{ route('insights.destroy', $insight) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Deseja excluir este insight?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted py-4">Nenhum insight encontrado.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection