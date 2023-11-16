
<div>
    <form class="card shadow-sm" wire:submit="update">
        <div class="card-header">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-4 mb-0">{{ $titulo_card_edit }}</span>
                <span class="text-muted mt-1 fw-normal fs-7">{{ $subtitulo_card_edit }}</span>
            </h3>
            <div class="card-toolbar">
                <a href="{{ route('vendedores.index') }}" class="btn btn-primary btn-sm">
                    <i class="fa-solid fa-bars-staggered"></i>
                    Listar vendedores
                </a>
            </div>
        </div>
        <div class="card-body">
            <livewire:utils.alert />
            
            <div class="mb-10 d-flex flex-wrap gap-5">
                <div class="d-flex flex-column w-100 w-xl-300px">
                    <label class="form-label">Vendedor ativo</label>
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
            </div>

            <div class="row g-9 mb-6">
                <div class="col-md-6">
                    <label class="required form-label">Nome</label>
                    <input wire:model='nome' type="text" id="nome" class="form-control mb-2">
                    @error('nome') 
                        <span class="text-danger">{{ $message }}</span>  
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="required form-label">Email</label>
                    <input wire:model='email' type="email" id="email" class="form-control mb-2">
                    @error('email') 
                        <span class="text-danger">{{ $message }}</span>  
                    @enderror
                </div>
            </div>

            <div class="row g-9 mb-6">
                <div class="col-md-3">
                    <label class="form-label">CPF</label>
                    <input wire:model='cpf' type="text" id="cpf" class="form-control mb-2">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Data Nascimento</label>
                    <input wire:model='data_nascimento' id="data_nascimento" type="text" class="form-control mb-2">
                </div>
                <div class="col-md-3">
                    <label class="required form-label">Fone Principal</label>
                    <input wire:model='celular1' type="text" id="celular1" class="form-control mb-2">
                    @error('celular1') 
                        <span class="text-danger">{{ $message }}</span>  
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label">Fone Altenativo</label>
                    <input wire:model='celular2' id="celular2" type="text" class="form-control mb-2">
                </div>
            </div>

            <div class="mb-10 fv-row fv-plugins-icon-container">
                <label class="form-label">Foto</label>
                <input wire:model="foto" type="file" id="{{ $randImage }}" class="form-control mb-2">
                @error('foto') 
                    <span class="text-danger">{{ $message }}</span>  
                @enderror

                 @if ($foto)
                    <div class="my-2">
                        <img src="{{ $foto->temporaryUrl() }}" alt="Logo Preview" id="{{ $randImage }}" class="rounded w-100px h-100px block">
                    </div>
                @else
                    @if ($foto_preview)
                        <div class="my-2">
                            <img src="{{ asset('storage/' . $foto_preview) }}" alt="Foto Preview" id="{{ $randImage }}" class="rounded w-100px h-100px block">
                        </div>
                    @endif
                 @endif
            </div>

            {{-- Endereço --}}
            <div>
                <h2>Informações de enderço</h2>
                <div class="separator separator-dashed mb-6"></div>
                    <div class="row g-9 mb-6">
                        <div class="col-md-4">
                            <label class="form-label">CEP</label>
                            <input wire:model.blur='cep' type="text" id="cep" class="form-control mb-2">
                        </div>
                        <div class="col-md-8">
                            <label class="form-label">Endereço</label>
                            <input wire:model='endereco' type="text" class="form-control mb-2" disabled>
                        </div>
                    </div>

                    <div class="row g-9 mb-6">
                        <div class="col-md-2">
                            <label class="form-label">Numero</label>
                            <input wire:model='numero' type="text" class="form-control mb-2">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Complemento</label>
                            <input wire:model='complemento' type="text" class="form-control mb-2">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Bairro</label>
                            <input wire:model='bairro' type="text" class="form-control mb-2" disabled>
                        </div>
                    </div>

                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-2 g-9 mb-2">
                        <div class="col">
                            <label class="form-label">Cidade</label>
                            <input wire:model='cidade' type="text" class="form-control mb-2" disabled>
                        </div>
                        <div class="col">
                            <label class="form-label">Estado</label>
                            <input wire:model='uf' type="text" class="form-control mb-2" disabled>
                        </div>
                    </div>
 
            </div>
            
            <div class="mt-8">
                {{-- <h2>Dados de acesso</h2>
                <div class="separator separator-dashed mb-6"></div> --}}

               

                {{-- <div class="fv-row fv-plugins-icon-container">
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
                </div>     --}}
            </div>        
        </div>

        <div class="card-footer">
            @livewire('notice')
           <button type="submit" class="btn btn-success">
                <i class="fa-solid fa-check mr-3"></i>
                Salvar alterações
            </button>
           <a href="{{ route('vendedores.index') }}" type="submit" class="btn btn-light btn-sm">
                <i class="fa-solid fa-ban"></i>    
                Cancelar
            </a>
        </div>
  
    </form>

</div>

<script>
    document.addEventListener('livewire:init', function() {
        Inputmask({
            "mask" : "99999-999"   
        }).mask('#cep');

         Inputmask({
            "mask" : "(99) 99999-9999"   
        }).mask('#celular1');
         
        Inputmask({
            "mask" : "(99) 99999-9999"   
        }).mask('#celular2');

         Inputmask({
            "mask" : "999.999.999-99"   
        }).mask('#cpf');

        Inputmask({
            "mask" : "99/99/9999"
        }).mask('#data_nascimento');
    });
</script>

