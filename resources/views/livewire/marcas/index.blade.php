<div>
    
   
   
    <div class="card shadow-sm mb-5 mr-2 pb-8 mb-xl-4">
        <!--begin::Header-->
        <div class="card-header border-0 pt-0">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-semibolder fs-4 mb-0">Marcas</span>
                <span class="text-muted mt-1 fw-normal fs-7">listagem de marcas</span>
            </h3>
            <div class="card-toolbar">
                <a href="{{ route('marcas.create') }}" class="btn btn-sm btn-primary">
                    <i class="fa-solid fa-plus"></i>
                    Criar marca
                </a>
            </div>
        </div>

        <div class="row px-8 mb-4">
            <div class="col-sm-12 col-md-12 d-flex align-items-center justify-content-center justify-content-md-start">
                <div class="d-flex align-items-center">
                    <!--begin::Input group-->
                    <div class="position-relative w-md-400px min-w-400px me-md-2">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        <span class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <input type="text" wire:model.live='search' class="form-control form-control-solid ps-12" name="search" value="" placeholder="Pesquisar por: Nome">
                    </div>
                    <button wire:click="resetPage" class="btn btn-light-primary me-md-2">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                    <!-- Seletor de ordenação por coluna "ativo" -->
                    <select wire:model="ativoFiltro" wire:change='orderByAtivo' class="form-select form-select-sm form-select-solid w-90px me-md-2">
                        <option value="">Ativo</option>
                        <option value="S">Sim</option>
                        <option value="N">Não</option>
                    </select>

                    <!-- Seletor de ordenação por coluna "destaque" -->
                    <select wire:model='destaqueFiltro' wire:change="orderByDestaque" class="form-select form-select-sm form-select-solid w-120px">
                        <option value="">Destaque</option>
                        <option value="S">Sim</option>
                        <option value="N">Não</option>
                    </select>

                </div>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-0">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed table-row-gray-300 gs-0 gy-4">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="fw-bolder text-muted">
                            <th class="w-75 rounded-start">
                                <a href="#" wire:click="sortBy('nome')" class="text-gray-600 text-hover-primary">
                                    Nome
                                    @if ($sortField === 'nome')
                                        @if ($sortAsc)
                                            &uarr; <!-- Seta para cima (ascendente) -->
                                        @else
                                            &darr; <!-- Seta para baixo (descendente) -->
                                        @endif
                                    @endif
                                </a>    
                                {{-- Nome --}}
                            </th>
                            <th class="min-w-80px">
                                <a href="#" wire:click="orderByAtivo" class="text-gray-600 text-hover-primary">
                                    Ativo
                                    @if ($sortField === 'ativo')
                                        @if ($sortAsc)
                                            &uarr;
                                        @else
                                            &darr;
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th class="min-w-100px">
                                 <a href="#" wire:click="orderByDestaque" class="text-gray-600 text-hover-primary">
                                    Destaque
                                    @if ($sortField === 'destaque')
                                        @if ($sortAsc)
                                            &uarr;
                                        @else
                                            &darr;
                                        @endif
                                    @endif
                                </a>
                            </th>
                            <th class="min-w-130px text-end text-gray-600">Ações</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        
                        @if($marcas->count() > 0)
                            @foreach ($marcas as $marca)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-50px me-5">
                                                @if ($marca->logo)
                                                    <img src="{{ asset('storage/' . $marca->logo) }}" alt="Logo" width="50">
                                                @else
                                                    Sem logo
                                                @endif
                                            </div>
                                            <div class="d-flex justify-content-start flex-column">
                                                <a href="#" class="text-dark fw-semibolder text-hover-primary mb-1 fs-6">
                                                    {{ $marca->nome }}
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if ( $marca->ativo == 'S')
                                            <span class="badge badge-light-success fs-6 fw-bold">Sim</span>
                                        @else  
                                            <span class="badge badge-light-danger fs-6 fw-bold">Não</span>  
                                        @endif
                                        
                                    </td>
                                    <td>
                                        @if ( $marca->destaque == 'S')
                                            <span class="badge badge-light-success fs-6 fw-bold">Sim</span>
                                        @else  
                                            <span class="badge badge-light-danger fs-6 fw-bold">Não</span>  
                                        @endif
                                    </td>
                                    <td class="text-end min-w-150px">
                                        <a href="{{ route('marcas.edit', ['id' => $marca->id]) }}" class="btn btn-icon btn-light-primary btn-color-primary btn-sm me-1">
                                            <i class="fa-solid fa-info"></i>
                                        </a>
                                        <a href="{{ route('marcas.edit', ['id' => $marca->id]) }}" class="btn btn-icon btn-light-warning btn-color-warning btn-sm me-1">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        @if ($btnDelete)
                                            {{-- <form action="{{ route('marcas.destroy', $marca->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Excluir</button>
                                            </form> --}}
                                            <a href="#" class="btn btn-icon btn-light-danger btn-color-danger btn-sm">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>    
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>Nenhum marca cadastrada</td>
                            </tr>
                        @endif
                        {{-- <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-50px me-5">
                                        <img src="assets/media/stock/600x400/img-9.jpg" class="" alt="">
                                    </div>
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Payroll Application</a>
                                        <span class="text-muted fw-bold text-muted d-block fs-7">PHP, Laravel, VueJS</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="#" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">$4,390</a>
                                <span class="text-muted fw-bold text-muted d-block fs-7">Paid</span>
                            </td>
                            <td>
                                <a href="#" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">$593</a>
                                <span class="text-muted fw-bold text-muted d-block fs-7">Rejected</span>
                            </td>
                            <td>
                                <a href="#" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">Zoey McGee</a>
                                <span class="text-muted fw-bold text-muted d-block fs-7">Ruby Developer</span>
                            </td>
                            <td>
                                <span class="badge badge-light-success fs-7 fw-bold">Success</span>
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="black"></path>
                                            <path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="black"></path>
                                        </svg>
                                    </span>
                            
                                </a>
                                <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                            
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                                        </svg>
                        
                                </a>
                                <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                        
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path>
                                            <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path>
                                            <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path>
                                        </svg>
                                    </span>
                                
                                </a>
                            </td>
                        </tr> --}}
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Table container-->
        </div>
        <!--begin::Body-->
    </div>

    <div class="row">
        {{-- Quantidade por pagina --}}
        <div class="col-sm-12 col-md-4 d-flex align-items-center justify-content-center justify-content-md-start">
            <div class="dataTables_length" id="kt_datatable_column_rendering_length">
                <label>
                    <select name="kt_datatable_column_rendering_length" aria-controls="kt_datatable_column_rendering" class="form-select form-select-sm" wire:model.live='perPage' wire:change="resetPage">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    </select>
                </label>
            </div>
            <span class="px-4">Mostrando {{ $marcas->firstItem() }} a {{ $marcas->lastItem() }} de {{ $marcas->total() }} registros.</span> 
            {{-- <div class="dataTables_info" id="kt_datatable_column_rendering_info" role="status" aria-live="polite">Showing 1 to 10 of 57 records</div> --}}
        </div>
        {{-- Paginação --}}
        <div class="col-sm-12 col-md-8 d-flex align-items-center justify-content-center justify-content-md-end">
            {{ $marcas->links('vendor.livewire.custom-pagination'); }}
        </div>
    </div>



    

</div>
