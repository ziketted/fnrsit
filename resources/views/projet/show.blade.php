@include('header.header')

<div class="app-wrapper">
	    <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-6 col-lg-12">
                        <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                            <div class="app-card-header p-3 border-bottom-0">
                                <div class="row align-items-center gx-3">
                                    <div class="col-auto">
                                        <div class="app-icon-holder">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-shield-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M5.443 1.991a60.17 60.17 0 0 0-2.725.802.454.454 0 0 0-.315.366C1.87 7.056 3.1 9.9 4.567 11.773c.736.94 1.533 1.636 2.197 2.093.333.228.626.394.857.5.116.053.21.089.282.11A.73.73 0 0 0 8 14.5c.007-.001.038-.005.097-.023.072-.022.166-.058.282-.111.23-.106.525-.272.857-.5a10.197 10.197 0 0 0 2.197-2.093C12.9 9.9 14.13 7.056 13.597 3.159a.454.454 0 0 0-.315-.366c-.626-.2-1.682-.526-2.725-.802C9.491 1.71 8.51 1.5 8 1.5c-.51 0-1.49.21-2.557.491zm-.256-.966C6.23.749 7.337.5 8 .5c.662 0 1.77.249 2.813.525a61.09 61.09 0 0 1 2.772.815c.528.168.926.623 1.003 1.184.573 4.197-.756 7.307-2.367 9.365a11.191 11.191 0 0 1-2.418 2.3 6.942 6.942 0 0 1-1.007.586c-.27.124-.558.225-.796.225s-.526-.101-.796-.225a6.908 6.908 0 0 1-1.007-.586 11.192 11.192 0 0 1-2.417-2.3C2.167 10.331.839 7.221 1.412 3.024A1.454 1.454 0 0 1 2.415 1.84a61.11 61.11 0 0 1 2.772-.815z"/>
                                        <path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                        </svg>
                                    </div><!--//icon-holder-->

                                    </div><!--//col-->
                                    <div class="col-auto">
                                        <h4 class="app-card-title">{{ $projet->titre }}</h4>
                                    </div><!--//col-->
                                </div><!--//row-->
                            </div><!--//app-card-header-->
                            <div class="app-card-body px-4 w-100">

                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"> Propiétaire : <strong>{{ $projet->entrepreneur->nom }}</strong></div>
                                            <div class="item-data">Secteur : {{ $projet->secteur->libelle }}</div>
                                            <div class="item-data">Budget :<strong> {{ $projet->budget }} </strong> CDF</div>
                                        </div><!--//col-->
                                        <div class="col text-end">
                                            <a class="btn-sm app-btn-secondary" href="#">Change</a>
                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div><!--//item-->

                            </div><!--//app-card-body-->

                            <div class="app-card-footer p-4 mt-auto">
                            <a class="btn app-btn-secondary" href="#">Ajouter un actionnaire</a>
                            </div><!--//app-card-footer-->

                        </div><!--//app-card-->
                    </div>
                </div>
	         </div><!--//app-content-->


    </div>
    </div><!--//app-wrapper-->








    <div class="app-wrapper">


        <div class="container ">
            <div class="row">
                <div class="col-lg-5">
                    <!-- Contenu de la première colonne -->

                        <div class="app-card app-card-settings shadow-sm p-4">
                            <div class="app-card-body">
                                <form action="{{ route('principale-depense.store') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="projet_id" value="{{ $projet->id }}">
                                    <div class="mb-3">
                                        <label for="secteur" class="form-label">Secteur</label>
                                        <select class="form-select form-select-lg" name="partie" id="secteur">
                                            <option value="Actifs immobilisés">Actifs immobilisés</option>
                                            <option value="Actifs circulants">Actifs circulants</option>
                                            <option value="Trésorerie">Trésorerie</option>
                                            <option value="Provision pour Imprévu">Imprévus (10%)</option>
                                        </select>
                                        @error('partie')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="libelle" class="form-label">Description</label>
                                        <input type="text" name="libelle" class="form-control @error('libelle') is-invalid @enderror" id="libelle" value="{{ old('libelle') }}" required>
                                        @error('libelle')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="cout" class="form-label">Cout</label>
                                        <input type="number" name="cout" class="form-control @error('cout') is-invalid @enderror" id="cout" value="{{ old('cout') }}" required>
                                        @error('cout')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="duree" class="form-label">Durée</label>
                                        <select class="form-select form-select-lg" name="duree" id="duree">
                                            <option value="Annuel">Coût Annuel</option>
                                            <option value="Mensuel">Coût Mensuel</option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn app-btn-primary">Ajouter le coût</button>
                                </form>



                            </div>
                    </div>
                </div>
                <div class="col-lg-7">

                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>N°</th>
                                <th>Type</th>
                                <th>Désignation</th>
                                <th>Coût mensuel</th>
                                <th>Coût annuel</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                       $i=1;
                                       $som=0
                                   @endphp
                         @foreach ($depenses as $item)
                               <tr>
                                   <td>{{ $i++ }}</td>
                                   <td><strong>{{ $item->partie }}</strong></td>
                                   <td>{{ $item->libelle }}</td>

                                   <td>{{ $item->cout }}</td>
                                   <td><strong>{{ $item->cout }}</strong></td>
                                  @php
                                      $som+=$item->cout
                                  @endphp
                               </tr>
                         @endforeach
                         <tr >
                            <td colspan="4">Total</td>

                            <td><strong>{{ $som }}</strong></td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
</div>














@include('header.footer')


