<div>
    <div class="card shadow-sm mb-5 mr-2 pb-8 mb-xl-4">
        <!--begin::Header-->
        <div class="card-header border-0 pt-0">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-semibolder fs-4 mb-0">{{$titulo_card_index}}</span>
                <span class="text-muted mt-1 fw-normal fs-7">{{$subtitulo_card_index}}</span>
            </h3>
            <div class="card-toolbar">
                <a href="{{ route('usuarios.create') }}" class="btn btn-sm btn-primary">
                    <i class="fa-solid fa-plus"></i>
                    Criar usuário
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
                        <input type="text" wire:model.live='search' class="form-control form-control-solid ps-12" name="search" value="" placeholder="Pesquisar por: Nome ou Email">
                    </div>
                    <button wire:click="resetPage" class="btn btn-light-primary me-md-2">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                    <!-- Seletor de ordenação por coluna "ativo" -->
                    <select class="form-select form-select-sm form-select-solid w-90px me-md-2">
                        <option value="">Ativo</option>
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
                            <th class="rounded-start">
                                <a href="#" class="text-gray-600">Nome</a>    
                            </th>
                            {{-- <th class="rounded-start">
                                <a href="#" class="text-gray-600">
                                   Email
                                </a>    
                            </th> --}}
                            <th class="rounded-start">
                                <a href="#" class="text-gray-600">
                                    Admin
                                </a>    
                            </th>
                            <th class="rounded-start">
                                <a href="#" class="text-gray-600">
                                    Ativo
                                </a>    
                            </th>
                            <th class="min-w-130px text-end text-gray-600">Ações</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        
                        {{-- @if(!$pedidos > 0) --}}
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-50px me-5">
                                                @if ($usuario->foto)
                                                    <img src="{{ asset('storage/' . $usuario->foto) }}" alt="Logo" width="50">
                                                @else
                                                    Sem foto
                                                @endif
                                            </div>
                                            <div class="d-flex justify-content-start flex-column">
                                                <a href="#" class="text-dark mb-1 fs-6">
                                                   {{ $usuario->name}}
                                                </a>
                                                <span class="text-muted">
                                                     {{ $usuario->email }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    {{-- <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <a href="#" class="text-dark mb-1 fs-6">
                                                    {{ $usuario->email }}
                                                </a>
                                            </div>
                                        </div>
                                    </td> --}}
                                     <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                               <div class="d-flex justify-content-start flex-column">
                                                {{-- Fazer verificação de is_admin --}}
                                                 @if ($usuario->is_admin)
                                                    <span class="badge badge-light-success fs-6 fw-bold">Sim</span>
                                                @else  
                                                    <span class="badge badge-light-danger fs-6 fw-bold">Não</span>  
                                                @endif
                                            </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                 @if ($usuario->ativo)
                                                    <span class="badge badge-light-success fs-6 fw-bold">Sim</span>
                                                @else  
                                                    <span class="badge badge-light-danger fs-6 fw-bold">Não</span>  
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end min-w-150px">
                                        <a href="{{ route('usuarios.edit', ['id' => $usuario->id]) }}" class="btn btn-icon btn-light-primary btn-color-primary btn-sm me-1">
                                            <i class="fa-solid fa-info"></i>
                                        </a>
                                        <a href="{{ route('usuarios.edit', ['id' => $usuario->id]) }}" class="btn btn-icon btn-light-warning btn-color-warning btn-sm me-1">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        @if ($btnDelete)
                                            {{-- <form action="{{ route('marcas.destroy', $produto->id) }}" method="POST" style="display: inline;">
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
                        {{-- @else --}}
                            {{-- <tr>
                                <td>Nenhum marca cadastrada</td>
                            </tr> --}}
                        {{-- @endif --}}
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
            <span class="px-4">
                {{-- Mostrando {{ $produtos->firstItem() }} a {{ $produtos->lastItem() }} de {{ $produtos->total() }} registros. --}}
            </span> 
            {{-- <div class="dataTables_info" id="kt_datatable_column_rendering_info" role="status" aria-live="polite">Showing 1 to 10 of 57 records</div> --}}
        </div>
        {{-- Paginação --}}
        <div class="col-sm-12 col-md-8 d-flex align-items-center justify-content-center justify-content-md-end">
            {{ $usuarios->links('vendor.livewire.custom-pagination'); }}
        </div>
    </div>
</div>



