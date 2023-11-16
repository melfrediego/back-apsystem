
<div>
    <form class="card shadow-sm" wire:submit="store">
        <div class="card-header">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-4 mb-0">{{ $titulo_card_create }}</span>
                <span class="text-muted mt-1 fw-normal fs-7">{{ $subtitulo_card_create }}</span>
            </h3>
            <div class="card-toolbar">
                <a href="{{ route('usuarios.index') }}" class="btn btn-primary btn-sm">
                    <i class="fa-solid fa-bars-staggered"></i>
                    Listar usuários
                </a>
            </div>
        </div>
        <div class="card-body">
            <livewire:utils.alert />
            
            <div class="mb-10 d-flex flex-wrap gap-5">
                <div class="d-flex flex-column w-100 w-xl-300px">
                    <label class="form-label">Usuário ativo</label>
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
                    <label class="form-label">Usuário Admin</label>
                    <div class="form-check form-switch form-check-custom form-check-success form-check-solid">
                        <input wire:model.live='admin' class="form-check-input " type="checkbox" value="" id="kt_flexSwitchCustomDefault_1_1"/>
                        <label class="form-check-label" for="kt_flexSwitchCustomDefault_1_1">
                            @if ($admin == 1)
                                <span class="fw-bold">Sim</span>   
                            @else
                                <span class="text-muted">Não</span>
                            @endif
                        </label>
                    </div> 
                </div>
            </div>
            <div class="mb-10 fv-row fv-plugins-icon-container">
                <label class="required form-label">Nome usarios</label>
                <input wire:model='nome' type="text" name="nome" class="form-control mb-2" placeholder="" value="">
                @error('nome') 
                <span class="text-danger">{{ $message }}</span>  
                @enderror
            </div>  
            <div class="mb-10 fv-row fv-plugins-icon-container">
                <label class="required form-label">Email</label>
                <input wire:model='email' type="text" name="email" class="form-control mb-2" placeholder="" value="">
                @error('email') 
                <span class="text-danger">{{ $message }}</span>  
                @enderror
            </div>
            <div class="mb-10 fv-row fv-plugins-icon-container">
                <label class="form-label">Foto</label>
                <input wire:model="foto" type="file" id="{{ $randImage }}" class="form-control mb-2">
                @error('foto') 
                    <span class="text-danger">{{ $message }}</span>  
                @enderror

                @if ($foto)
                    <div class="my-2">
                        <img src="{{ $foto->temporaryUrl() }}" alt="Logo Preview" class="rounded w-100px h-100px block">
                    </div>
                @endif
            </div>
            <div class="mb-10 fv-row fv-plugins-icon-container">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-2 g-9 mb-2">
                    <div class="col">
                        <label class="form-label">Criar senha</label>
                        <input wire:model='senha' type="password" name="senha" class="form-control mb-2">
                    </div>
                    <div class="col">
                        <label class="form-label">Confirmar senha</label>
                        <input wire:model='confirma_senha' type="password" name="confirma_senha" class="form-control mb-2">
                    </div>
                </div>
                
            </div>            
        </div>

        <div class="card-footer">
            @livewire('notice')
           <button type="submit" class="btn btn-success">
                <i class="fa-solid fa-check mr-3"></i>
                Criar usuário
            </button>
           <a href="{{ route('usuarios.index') }}" type="submit" class="btn btn-light btn-sm">
                <i class="fa-solid fa-ban"></i>    
                Cancelar
            </a>
        </div>
  
    </form>

</div>
