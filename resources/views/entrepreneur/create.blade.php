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
                            <form action="{{ route('entrepreneur.store') }}" method="post">
                                @csrf

                                <div class="mb-3">
                                    <label for="nom" class="form-label">Nom de l'entrepreneur</label>
                                    <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" id="nom" value="{{ old('nom') }}" required>
                                    @error('nom')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="libelle" class="form-label">Téléphone</label>
                                    <input type="text" name="telephone" class="form-control @error('telephone') is-invalid @enderror" id="telephone" value="{{ old('telephone') }}" required>
                                    @error('telephone')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="mail" class="form-label">Adresse mail</label>
                                    <input type="mail" name="mail" class="form-control @error('mail') is-invalid @enderror" id="mail" value="{{ old('mail') }}" required>
                                    @error('mail')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="nationalite" class="form-label">Nationalité</label>
                                    <input type="text" name="nationalite" class="form-control @error('nationalite') is-invalid @enderror" id="nationalite" value="{{ old('nationalite') }}" required>
                                    @error('nationalite')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
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
