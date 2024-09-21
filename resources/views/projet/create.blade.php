@include('header.header')

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1 class="app-page-title">Créer un Secteur</h1>
            <hr class="mb-4">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row g-4 settings-section">
                <div class="col-12 col-md-4">
                    <h3 class="section-title">Information</h3>
                    <div class="section-intro">Le secteur de financement du fonds national de recherche scientifique et innovation technologique.</div>
                </div>
                <div class="col-12 col-md-8">
                    <div class="app-card app-card-settings shadow-sm p-4">
                        <div class="app-card-body">
                            <form action="{{ route('projet.store') }}" method="post">
                                @csrf

                                <div class="mb-3">
                                    <label for="titre" class="form-label">Titre du projet</label>
                                    <input type="text" name="titre" class="form-control @error('titre') is-invalid @enderror" id="titre" value="{{ old('titre') }}" required>
                                    @error('titre')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>


                                    <div class="mb-3">
                                        <label for="propiretaire" class="form-label">Porteur du projet</label>
                                        <select
                                            class="form-select form-select-lg"
                                            name="entrepreneur_id"
                                            id="propiretaire">
                                            @foreach ($entrepreneurs as $item)
                                                <option value="{{ $item->id }}" {{ old('entrepreneur_id') == $item->id ? 'selected' : '' }}>{{ $item->nom }} [{{ $item->nationalite }}]</option>
                                            @endforeach

                                        </select>

                                        @error('entrepreneur_id')
                                                 <span class="invalid-feedback">{{ $message }}</span>
                                         @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="secteur" class="form-label">Secteur</label>
                                        <select
                                            class="form-select form-select-lg"
                                            name="secteur_id"
                                            id="secteur">
                                            @foreach ($secteurs as $item)
                                                <option value="{{ $item->id }}" {{ old('secteur_id') == $item->id ? 'selected' : '' }}>{{ $item->libelle }}</option>
                                            @endforeach

                                        </select>

                                        @error('secteur_id')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror


                                </div>
                                <div class="mb-3">
                                    <label for="budget" class="form-label">Budget</label>
                                    <input type="number" name="budget" class="form-control @error('budget') is-invalid @enderror" id="budget" value="{{ old('budget') }}" required>
                                    @error('budget')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-6"><label for="debut" class="form-label">Date du début</label>
                                            <input type="date" name="debut" class="form-control @error('debut') is-invalid @enderror" id="debut" value="{{ old('debut') }}" required>
                                            @error('debut')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label for="fin" class="form-label">Date de fin</label>
                                    <input type="date" name="fin" class="form-control @error('fin') is-invalid @enderror" id="fin" value="{{ old('fin') }}" required>
                                    @error('fin')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                        </div>
                                    </div>

                                </div>
                                <button type="submit" class="btn app-btn-primary">Enregistrer</button>
                            </form>
                        </div><!--//app-card-body-->
                    </div><!--//app-card-->
                </div>
            </div><!--//row-->
        </div><!--//container-fluid-->
    </div><!--//app-content-->
</div><!--//app-wrapper-->

@include('header.footer')
