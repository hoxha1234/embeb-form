@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Aggiungi Nuovo Dominio Autorizzato</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('campaigns.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nome Campagna / Cliente</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Es: Immobiliare Verdi" required>
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Dominio Autorizzato</label>
                                <input type="text" name="authorized_domain" class="form-control @error('authorized_domain') is-invalid @enderror" value="{{ old('authorized_domain') }}" placeholder="Es: immobiliareverdi.it" required>
                                <small class="text-muted">Inserire solo l'host (senza https://)</small>
                                @error('authorized_domain') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tag Contatto (CRM)</label>
                                <input type="text" name="tag" class="form-control" value="{{ old('tag', 'Web Lead') }}" placeholder="Es: Lead-Verdi">
                                @error('tag') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Stato Iniziale</label>
                                <select name="status" class="form-select">
                                    <option value="active" selected>Attivo (Accetta Lead)</option>
                                    <option value="inactive">Inattivo (Blocca Lead)</option>
                                </select>
                            </div>
                        </div>

                        <hr>

                        <div class="mb-3">
                            <label class="form-label">URL Privacy Policy</label>
                            <input type="url" name="privacy_policy_url" class="form-control @error('privacy_policy_url') is-invalid @enderror" value="{{ old('privacy_policy_url', 'https://fatjonhoxha.it/privacy-policy') }}" required>
                            @error('privacy_policy_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">URL Termini e Condizioni (Opzionale)</label>
                            <input type="url" name="terms_conditions_url" class="form-control @error('terms_conditions_url') is-invalid @enderror" value="{{ old('terms_conditions_url') }}">
                            @error('terms_conditions_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('campaigns.index') }}" class="btn btn-light">Annulla</a>
                            <button type="submit" class="btn btn-success px-5">Salva Campagna</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection