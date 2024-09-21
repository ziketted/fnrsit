@include('header.header')

<div class="app-wrapper">

	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">

			    <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Nos secteurs de financements </h1>
				    </div>
				    <div class="col-auto">
					     <div class="page-utilities">
						    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							    <div class="col-auto">
								    <form class="table-search-form row gx-1 align-items-center">
					                    <div class="col-auto">
					                        <input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Search">
					                    </div>
					                    <div class="col-auto">
					                        <button type="submit" class="btn app-btn-secondary">Search</button>
					                    </div>
					                </form>

							    </div><!--//col-->


						    </div><!--//row-->
					    </div><!--//table-utilities-->
				    </div><!--//col-auto-->
			    </div><!--//row-->

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
			  {{--   <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
				    <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">All</a>
				    <a class="flex-sm-fill text-sm-center nav-link"  id="orders-paid-tab" data-bs-toggle="tab" href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Paid</a>
				    <a class="flex-sm-fill text-sm-center nav-link" id="orders-pending-tab" data-bs-toggle="tab" href="#orders-pending" role="tab" aria-controls="orders-pending" aria-selected="false">Pending</a>
				    <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab" data-bs-toggle="tab" href="#orders-cancelled" role="tab" aria-controls="orders-cancelled" aria-selected="false">Cancelled</a>
				</nav> --}}


				<div class="tab-content" id="orders-table-tab-content">

			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">


							    <div class="table-responsive">
							        <table class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
												<th class="cell">#Code</th>
												<th class="cell">Titre</th>
												<th class="cell">Entrepreneur</th>
												<th class="cell">Secteur</th>
												<th class="cell">Budget</th>
												<th class="cell">Début</th>
												<th class="cell">Fin</th>
											</tr>
										</thead>
										<tbody>
										@foreach ($projets as $item)
                                            	<tr>
                                            		<td class="cell">#{{ $item->id }}</td>
                                            		<td class="cell"><span class="truncate">{{ $item->titre }}</span></td>
                                            		<td class="cell">{{ $item->entrepreneur->nom ?? 'N/A'}}</td>
                                            		<td class="cell">{{ $item->secteur->libelle ?? 'N/A'}}</td>
                                                    <td class="cell">{{ $item->budget }}</td>
                                                    <td class="cell">{{ $item->debut }}</td>
                                                    <td class="cell">{{ $item->fin }}</td>
                                            		<td class="cell">
                                                      <a class="btn-sm app-btn-secondary" href="{{ route('projet.show', $item->id) }}">View</a>
                                                    </td>

                                            	</tr>
                                        @endforeach

										</tbody>
									</table>
						        </div><!--//table-responsive-->

						    </div><!--//app-card-body-->
						</div><!--//app-card-->

                       {{--  <nav aria-label="Page navigation example">
                            <ul class=" justify-content-center">
                              {{ $projets->onEachSide(1)->links() }}
                            </ul>
                          </nav> --}}
			        </div><!--//tab-pane-->




				</div><!--//tab-content-->



		    </div><!--//container-fluid-->
	    </div><!--//app-content-->

	    <footer class="app-footer">
		    <div class="container text-center py-3">
		         <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->

		    </div>
	    </footer><!--//app-footer-->

    </div><!--//app-wrapper-->
@include('header.footer')
