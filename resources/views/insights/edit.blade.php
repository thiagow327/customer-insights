@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="d-flex align-items-center mb-4">
            <a href="{{ route('insights.index') }}" class="btn btn-sm btn-outline-secondary me-3">← Voltar</a>
            <h4 class="mb-0">Editar Insight <code class="fs-6">{{ $insight->protocolo }}</code></h4>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('insights.update', $insight) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Cliente <span class="text-danger">*</span></label>
                        <input type="text" name="cliente" class="form-control @error('cliente') is-invalid @enderror"
                            value="{{ old('cliente', $insight->cliente) }}" placeholder="Nome do cliente">
                        @error('cliente')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Canal <span class="text-danger">*</span></label>
                            <select name="canal" class="form-select @error('canal') is-invalid @enderror">
                                <option value="">Selecione...</option>
                                <option value="email" {{ old('canal', $insight->canal->value) === 'email' ? 'selected' : '' }}>E-mail</option>
                                <option value="voz" {{ old('canal', $insight->canal->value) === 'voz' ? 'selected' : '' }}>Voz</option>
                                <option value="chat" {{ old('canal', $insight->canal->value) === 'chat' ? 'selected' : '' }}>Chat</option>
                            </select>
                            @error('canal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Sentimento <span class="text-danger">*</span></label>
                            <select name="sentimento" class="form-select @error('sentimento') is-invalid @enderror">
                                <option value="">Selecione...</option>
                                <option value="positivo" {{ old('sentimento', $insight->sentimento->value) === 'positivo' ? 'selected' : '' }}>Positivo</option>
                                <option value="neutro" {{ old('sentimento', $insight->sentimento->value) === 'neutro' ? 'selected' : '' }}>Neutro</option>
                                <option value="negativo" {{ old('sentimento', $insight->sentimento->value) === 'negativo' ? 'selected' : '' }}>Negativo</option>
                            </select>
                            @error('sentimento')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Risco <span class="text-danger">*</span></label>
                            <select name="risco" class="form-select @error('risco') is-invalid @enderror">
                                <option value="">Selecione...</option>
                                <option value="baixo" {{ old('risco', $insight->risco->value) === 'baixo' ? 'selected' : '' }}>Baixo</option>
                                <option value="medio" {{ old('risco', $insight->risco->value) === 'medio' ? 'selected' : '' }}>Médio</option>
                                <option value="alto" {{ old('risco', $insight->risco->value) === 'alto' ? 'selected' : '' }}>Alto</option>
                            </select>
                            @error('risco')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Problema <span class="text-danger">*</span></label>
                        <textarea name="problema" rows="3"
                            class="form-control @error('problema') is-invalid @enderror"
                            placeholder="Descreva o problema relatado">{{ old('problema', $insight->problema) }}</textarea>
                        @error('problema')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror">
                            <option value="">Selecione...</option>
                            <option value="aberto" {{ old('status', $insight->status->value) === 'aberto' ? 'selected' : '' }}>Aberto</option>
                            <option value="em_andamento" {{ old('status', $insight->status->value) === 'em_andamento' ? 'selected' : '' }}>Em andamento</option>
                            <option value="resolvido" {{ old('status', $insight->status->value) === 'resolvido' ? 'selected' : '' }}>Resolvido</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                        <a href="{{ route('insights.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection