
<div>
    <form class="card shadow-sm" wire:submit="update">
        <div class="card-header">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-2 mb-0">Editar marcas</span>
                <span class="text-muted mt-1 fw-normal fs-7">Utilize o formulário abaixo para editar uma marca</span>
            </h3>
            <div class="card-toolbar">
                <a href="{{ route('marcas.index') }}" class="btn btn-primary btn-sm">
                    <i class="fa-solid fa-bars-staggered"></i>
                    Listar marcas
                </a>
            </div>
        </div>
        <div class="card-body">
            <livewire:utils.alert />
            
            <div class="mb-10 d-flex flex-wrap gap-5">
                <div class="d-flex flex-column w-100 w-xl-300px">
                    <label class="form-label">Marca ativo</label>
                    <div class="form-check form-switch form-check-custom form-check-success form-check-solid">
                        <input wire:model.live="ativo" name="ativo" class="form-check-input" type="checkbox" />
                        <label class="form-check-label" for="kt_flexSwitchCustomDefault_1_1">
                            @if ($ativo == 1)
                                <span class="fw-bold">Sim </span>   
                            @else
                                <span class="text-muted">Não</span> 
                            @endif
                        </label>
                    </div> 
                </div>
  
                <div class="d-flex flex-column w-100 w-xl-300px">
                    <label class="form-label">Marca em destaque</label>
                    <div class="form-check form-switch form-check-custom form-check-success form-check-solid">
                        <input wire:model.live='destaque' class="form-check-input " type="checkbox" value="" id="kt_flexSwitchCustomDefault_1_1"/>
                        <label class="form-check-label" for="kt_flexSwitchCustomDefault_1_1">
                            @if ($destaque == 1)
                                <span class="fw-bold">Sim </span>   
                            @else
                                <span class="text-muted">Não</span>
                            @endif
                        </label>
                    </div> 
                </div>
            </div>
            <div class="mb-10 fv-row fv-plugins-icon-container">
                <label class="required form-label">Nome da marca</label>
                <input wire:model='nome' type="text" name="nome" class="form-control mb-2" placeholder="" value="">
                @error('nome') 
                <span class="text-danger">{{ $message }}</span>  
                @enderror
            </div>  
            <div class="mb-10 fv-row fv-plugins-icon-container">
                <label class="form-label">Descrição</label>
                <textarea wire:model='descricao' name="descricao" id="" rows="4" class="form-control mb-2"></textarea>
            </div>
            <div class="mb-10 fv-row fv-plugins-icon-container">
                <label class="form-label">Logo da marca</label>
                <input wire:model="logo" type="file" id="{{ $randImage }}" class="form-control mb-2">
                @error('logo') 
                <span class="text-danger">{{ $message }}</span>  
                @enderror

                @if ($logo)
                    <div class="my-2">
                        <img src="{{ $logo->temporaryUrl() }}" alt="Logo Preview" id="{{ $randImage }}" class="rounded w-100px h-100px block">
                    </div>
                @else
                    @if ($logoPreview)
                        <div class="my-2">
                            <img src="{{ asset('storage/' . $logoPreview) }}" alt="Logo Preview" id="{{ $randImage }}" class="rounded w-100px h-100px block">
                        </div>
                    @endif
                 @endif
            </div>
            <div class="mb-10 fv-row fv-plugins-icon-container">
                <label class="form-label">Url da marca</label>
                <input wire:model='seo_url' type="text" name="seo_url" class="form-control mb-2">
            </div>            
        </div>

        <div class="card-footer">
            @livewire('notice')
           <button type="submit" class="btn btn-success">
                <i class="fa-solid fa-check mr-3"></i>
                Salvar alterações
            </button>
           <a href="{{ route('marcas.index') }}" type="submit" class="btn btn-light btn-sm">
                <i class="fa-solid fa-ban"></i>    
                Cancelar
            </a>
        </div>
  
    </form>

</div>