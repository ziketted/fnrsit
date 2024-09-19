@include('header.header')

<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div>
                <a
                    name=""
                    id=""
                    class="btn btn-primary text-white m-1"
                    href="{{ route('entrepreneur.create') }}"
                    role="button"
                    >+ Ajouter un entrepreneur</a
                >

            </div>
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
                                        <input type="text" id="search-orders" name="searchorders"
                                            class="form-control search-orders" placeholder="Search">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn app-btn-secondary">Search</button>
                                    </div>
                                </form>

                            </div>
                            <!--//col-->


                        </div>
                        <!--//row-->
                    </div>
                    <!--//table-utilities-->
                </div>
                <!--//col-auto-->
            </div>
            <!--//row-->

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            {{-- <nav id="orders-table-tab"
                class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab"
                    href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">All</a>
                <a class="flex-sm-fill text-sm-center nav-link" id="orders-paid-tab" data-bs-toggle="tab"
                    href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Paid</a>
                <a class="flex-sm-fill text-sm-center nav-link" id="orders-pending-tab" data-bs-toggle="tab"
                    href="#orders-pending" role="tab" aria-controls="orders-pending" aria-selected="false">Pending</a>
                <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab" data-bs-toggle="tab"
                    href="#orders-cancelled" role="tab" aria-controls="orders-cancelled"
                    aria-selected="false">Cancelled</a>
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
                                            <th class="cell">Nom</th>
                                            <th class="cell">Téléphone</th>
                                            <th class="cell">Mail</th>
                                            <th class="cell"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($entrepreneur as $item)
                                        <tr>
                                            <td class="cell">#{{ $item->id }}</td>
                                            <td class="cell"><span class="truncate">{{ $item->nom }}</span></td>
                                            <td class="cell">{{ $item->telephone }}</td>
                                            <td class="cell">{{ $item->mail }}</td>
                                            <td class="cell">
                                                <a class="btn-sm app-btn-secondary"
                                                    href="{{ route('secteur.show', $item->id) }}">View</a>
                                            </td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!--//table-responsive-->

                        </div>
                        <!--//app-card-body-->
                    </div>
                    <!--//app-card-->
                    <nav class="app-pagination">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                    <!--//app-pagination-->

                </div>
                <!--//tab-pane-->





            </div>
            <!--//tab-content-->



        </div>
        <!--//container-fluid-->
    </div>
    <!--//app-content-->

    <footer class="app-footer">
        
    </footer>
    <!--//app-footer-->

</div>
<!--//app-wrapper-->
@include('header.footer')
