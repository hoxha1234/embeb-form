@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-warning">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0">Modifica Campagna: {{ $campaign->name }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('campaigns.update', $campaign->id) }}" method="POST">
                        @csrf
                        @method('PUT') {{-- Fondamentale per l'aggiornamento --}}

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nome Campagna / Cliente</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $campaign->name) }}" required>
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Dominio Autorizzato</label>
                                <input type="text" name="authorized_domain" class="form-control @error('authorized_domain') is-invalid @enderror" value="{{ old('authorized_domain', $campaign->authorized_domain) }}" required>
                                @error('authorized_domain') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tag Contatto (CRM)</label>
                                <input type="text" name="tag" class="form-control" value="{{ old('tag', $campaign->tag) }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Stato</label>
                                <select name="status" class="form-select">
                                    <option value="active" {{ $campaign->status == 'active' ? 'selected' : '' }}>Attivo</option>
                                    <option value="inactive" {{ $campaign->status == 'inactive' ? 'selected' : '' }}>Inattivo</option>
                                </select>
                            </div>
                        </div>

                        <hr>

                        <div class="mb-3">
                            <label class="form-label">URL Privacy Policy</label>
                            <input type="url" name="privacy_policy_url" class="form-control @error('privacy_policy_url') is-invalid @enderror" value="{{ old('privacy_policy_url', $campaign->privacy_policy_url) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">URL Termini e Condizioni (Opzionale)</label>
                            <input type="url" name="terms_conditions_url" class="form-control" value="{{ old('terms_conditions_url', $campaign->terms_conditions_url) }}">
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('campaigns.index') }}" class="btn btn-light">Annulla</a>
                            <button type="submit" class="btn btn-warning px-5">Aggiorna Campagna</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection