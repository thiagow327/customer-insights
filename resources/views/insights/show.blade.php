@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="d-flex align-items-center mb-4">
            <a href="{{ route('insights.index') }}" class="btn btn-sm btn-outline-secondary me-3">← Voltar</a>
            <h4 class="mb-0">Detalhes do Insight</h4>
        </div>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <code>{{ $insight->protocolo }}</code>
                <div class="d-flex gap-2">
                    <a href="{{ route('insights.edit', $insight) }}" class="btn btn-sm btn-outline-secondary">Editar</a>
                    <form action="{{ route('insights.destroy', $insight) }}" method="POST"
                        onsubmit="return confirm('Deseja excluir este insight?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Excluir</button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <dl class="row mb-0">
                    <dt class="col-sm-3 text-muted">Cliente</dt>
                    <dd class="col-sm-9">{{ $insight->cliente }}</dd>

                    <dt class="col-sm-3 text-muted">Canal</dt>
                    <dd class="col-sm-9">{{ ucfirst($insight->canal->value) }}</dd>

                    <dt class="col-sm-3 text-muted">Sentimento</dt>
                    <dd class="col-sm-9">
                        @php
                            $sentimentoClasses = ['positivo' => 'success', 'neutro' => 'secondary', 'negativo' => 'danger'];
                            $sc = $sentimentoClasses[$insight->sentimento->value] ?? 'secondary';
                        @endphp
                        <span class="badge bg-{{ $sc }}">{{ ucfirst($insight->sentimento->value) }}</span>
                    </dd>

                    <dt class="col-sm-3 text-muted">Risco</dt>
                    <dd class="col-sm-9">
                        @php
                            $riscoClasses = ['baixo' => 'success', 'medio' => 'warning', 'alto' => 'danger'];
                            $rc = $riscoClasses[$insight->risco->value] ?? 'secondary';
                        @endphp
                        <span class="badge bg-{{ $rc }}">{{ ucfirst($insight->risco->value) }}</span>
                    </dd>

                    <dt class="col-sm-3 text-muted">Problema</dt>
                    <dd class="col-sm-9">{{ $insight->problema }}</dd>

                    <dt class="col-sm-3 text-muted">Status</dt>
                    <dd class="col-sm-9">
                        @php
                            $statusClasses = ['aberto' => 'secondary', 'em_andamento' => 'warning', 'resolvido' => 'success'];
                            $statusLabels = ['aberto' => 'Aberto', 'em_andamento' => 'Em andamento', 'resolvido' => 'Resolvido'];
                            $stc = $statusClasses[$insight->status->value] ?? 'secondary';
                        @endphp
                        <span class="badge bg-{{ $stc }}">{{ $statusLabels[$insight->status->value] ?? $insight->status->value }}</span>
                    </dd>

                    <dt class="col-sm-3 text-muted">Criado em</dt>
                    <dd class="col-sm-9">{{ $insight->created_at->format('d/m/Y H:i') }}</dd>

                    <dt class="col-sm-3 text-muted">Atualizado em</dt>
                    <dd class="col-sm-9">{{ $insight->updated_at->format('d/m/Y H:i') }}</dd>
                </dl>
            </div>
        </div>

    </div>
</div>
@endsection