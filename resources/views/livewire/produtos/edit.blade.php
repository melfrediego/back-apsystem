<div>
    <form action="" wire:submit="update" enctype="multipart/form-data">
        <div class="d-flex flex-column gap-7 gap-lg-10">
            <!--begin::General options-->
            <div class="card card-flush shadow-sm">
                <!--begin::Card header-->
                <div class="card-header">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-4 mb-0">{{ $titulo_card_edit }}</span>
                        <span class="text-muted mt-1 fw-normal fs-7">{{ $subtitulo_card_edit }}</span>
                    </h3>
                    <div class="card-toolbar">
                        <a href="{{ route('produtos.index') }}" class="btn btn-primary btn-sm">
                            <i class="fa-solid fa-bars-staggered"></i>
                            Listar produtos
                        </a>
                    </div>
                </div>
                <livewire:utils.alert />
                <div class="separator"></div>
                <div class="card-header">
                    <div class="card-title">
                        <h2>Informações</h2>
                    </div>
                </div>
                <!--end::Card header-->
               
                <!--begin::Card body-->
                <div class="card-body pt-0">
                     @if (session('success'))
                     <div>
                        <div class="notice d-flex flex-center bg-light-success rounded border-success border border-dashed mb-12 p-6">
                            <span class="svg-icon svg-icon-2tx svg-icon-success me-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>
                                    <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black"></rect>
                                    <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black"></rect>
                                </svg>
                            </span>
                            <div class="d-flex flex-stack flex-grow-1">
                                <div class="fw-bold">
                                    <h4 class="text-gray-900 fw-bolder">Sucesso!</h4>
                                    <div class="fs-6 text-gray-700">{{ session('success') }}
                                    {{-- <a href="{{ route('marcas.index') }}" class="fw-bolder" >listar marcas</a>.</div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="fv-row mb-10">
                        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-1 row-cols-xl-4 g-9">
                            <div class="col">
                                <div class="d-flex flex-column w-100 w-xl-300px">
                                    <label class="form-label">Produto ativo?</label>
                                    <div
                                        class="form-check form-switch form-check-custom form-check-success form-check-solid">
                                        <input wire:model.live="ativo" name="ativo" class="form-check-input"
                                            type="checkbox" />
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
                            <div class="col">
                                <div class="d-flex flex-column w-100 w-xl-300px">
                                    <label class="form-label">Produto com variação?</label>
                                    <div
                                        class="form-check form-switch form-check-custom form-check-success form-check-solid">
                                        <input wire:model.live="variacao" name="" class="form-check-input"
                                            type="checkbox" />
                                        <label class="form-check-label" for="kt_flexSwitchCustomDefault_1_1">
                                            @if ($variacao == 1)
                                                <span class="fw-bold">Sim </span>
                                            @else
                                                <span class="text-muted">Não</span>
                                            @endif
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column w-100 w-xl-300px">
                                    <label class="form-label">Produto em destaque</label>
                                    <div
                                        class="form-check form-switch form-check-custom form-check-success form-check-solid">
                                        <input wire:model.live="destaque" name="ativo" class="form-check-input"
                                            type="checkbox" />
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
                            <div class="col">
                                <div class="d-flex flex-column w-100 w-xl-300px">
                                    <label class="form-label">Situação do produto</label>
                                   
                                        <div class="d-flex gap-6 form-check form-check-custom form-check-solid">
                                            <div>
                                                 <input wire:model='situacao' class="form-check-input" type="radio" value="N" name="situacao" id="flexRadioDefault"/>
                                                <label class="form-check-label" for="flexRadioDefault">
                                                    Novo
                                                </label>
                                            </div>
                                            <div>
                                                <input wire:model='situacao' class="form-check-input" type="radio" value="U" name="situacao" id="flexRadioDefault"/>
                                                <label class="form-check-label" for="flexRadioDefault" class="ml-4">
                                                    Usado
                                                </label>
                                            </div>
                                        </div>
                                        {{-- <input wire:model.live="ativo" name="ativo" class="form-check-input"
                                            type="checkbox" />
                                        <label class="form-check-label" for="kt_flexSwitchCustomDefault_1_1">
                                            @if ($ativo == 1)
                                                <span class="fw-bold">Sim </span>
                                            @else
                                                <span class="text-muted">Não</span>
                                            @endif
                                        </label> --}}
                                    {{-- </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-10 fv-row">
                        <label class="required form-label">Nome do produto</label>
                        <input type="text" wire:model='nome' name="" class="form-control mb-2" placeholder=""
                            value="" />
                        @error('nome')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div wire:ignore>
                        <label class="form-label">Descrição</label>
                        <textarea wire:model='descricao' id="descricao_produto" cols="30" rows="10" class="h-48"></textarea>
                    </div>
                </div>
            </div>
            <!--end::Card-->

            <!--begin::Media-->
            <div class="card card-flush shadow-sm">
                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title">
                        <h2>Midias</h2>
                    </div>
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Input group-->
                    <div class="fv-row mb-2">
                        <!--begin::Dropzone-->
                        <div class="dropzone" id="imagens_produto" wire:ignore>
                            {{-- <input class="dropzone" type="file" name="file[]" multiple> --}}
                            <!--begin::Message-->
                            <div class="min-w-100 dz-message needsclick">
                                <div class="ms-4 text-center">
                                    <div class="block">
                                        <i class="fa-regular fa-image fs-4x mb-1"></i>
                                    </div>
                                    <h3 class="fs-5 fw-bold text-gray-900 mb-1">
                                        Arraste e solte suas imagens aqui.
                                    </h3>
                                    <div class="fs-7 fw-semibold text-gray-400">Maximo de 10 imagens.</div>
                                    <div class="fs-7 fw-semibold text-gray-400">O tamanho do arquivo deverá ser no
                                        máximo 4mb.</div>
                                    <div class="fs-7 fw-semibold text-gray-400">Para maior qualidade envie imagens no
                                        formato JPG ou PNG.</div>
                                </div>
                                <!--end::Info-->
                            </div>
                        </div>
                        <!--end::Dropzone-->
                    </div>
                    <!--end::Input group-->

                    <div class="row row-cols-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 g-9 mt-2">
                        <div class="col">
                            <label class="form-label">Video do produto</label>
                            <input type="text" wire:model='video_url' class="form-control mb-2"
                                placeholder="Ex: https://www.youtube.com/watch?v=yas11625qr" value="" />
                            <div class="text-muted fs-7">Informe aqui uma url valida.</div>
                        </div>
                    </div>

                </div>
                <!--end::Card header-->
            </div>
            <!--end::Media-->


            <!--begin::Pricing-->
            <div class="card card-flush shadow-sm">
                <div class="card-header">
                    <div class="card-title">
                        <h2>Precificação</h2>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-3 row-cols-xl-3 g-9 mb-2">
                        <div class="col">
                            <label class="form-label">Preço de custo</label>
                             <div class="input-group mb-5">
                                <span class="input-group-text" id="basic-addon1">R$</span>
                                <input type="text" wire:model='preco_custo' class="form-control" id="preco_custo" placeholder="0,00"
                                    value="" />
                             </div>
                        </div>
                        <div class="col">
                            <!--begin::Input group-->
                            <label class="required form-label">Preço de venda</label>
                            <div class="input-group mb-5">
                                <span class="input-group-text" id="basic-addon1">R$</span>
                                <input type="text" class="form-control" wire:model='preco_venda' wire:blur='realDolar()' id="preco_venda" placeholder="0,00" value="" />
                            </div>
                            @error('preco_venda')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col">
                            <label class="form-label">Preço promocional</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">R$</span>
                                <input type="text" wire:model='preco_promo' class="form-control" id="preco_promo" placeholder="0,00" value="" />
                            </div>
                        </div>
                    </div>

                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-2 g- mb-2">
                        <div class="col">
                            <label class="form-label">Preço de venda em Dolar</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">$</span>
                                <input type="text" wire:model='preco_venda_dolar' name="" class="form-control"
                                    placeholder="" value="" disabled />
                            </div>
                            <div class="text-muted fs-7">Valor em Real será convertido automaticamente.</div>
                        </div>
                        <div class="col">
                            <label class="form-label">Preço venda em EURO</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">&euro;</span>
                                <input type="text" name="" wire:model='preco_venda_euro' class="form-control" placeholder=""
                                    value="" disabled />
                            </div>
                            <div class="text-muted fs-7">Valor em Real será convertido automaticamente.</div>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1">
                        <div class="col">
                            <div
                                class="alert alert-dismissible bg-light-warning d-flex flex-column flex-sm-row w-100 py-2 px-5 border-warning border border-dashed">
                                <div class="d-flex flex-center flex-column pe-0 pe-sm-2">
                                    <span>Valor em Real será convertido para as moedas acima, de acordo com a contação
                                        do dia.</span>
                                </div>
                                <button type="button"
                                    class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                                    data-bs-dismiss="alert">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Pricing-->


            <!--begin::Estoque-->
            <div class="card card-flush shadow-sm">
                <div class="card-header">
                    <div class="card-title">
                        <h2>Codigos e Estoque</h2>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 row-cols-xl-4 g-9 mb-2">
                        <div class="col">
                            <label class="required form-label">Codigo do produto(SKU)</label>
                            <input type="text" wire:model='estoque_sku' class="form-control mb-2 relative sm" placeholder=""
                                value="" />
                            @error('estoque_sku')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col">
                            <label class="form-label">GTIN</label>
                            <input type="text" wire:model='estoque_gtin' class="form-control mb-2" placeholder=""
                                value="" />
                        </div>
                        <div class="col">
                            <label class="form-label">MPN</label>
                            <input type="text" wire:model='estoque_npm' class="form-control mb-2" placeholder="" value="" />
                        </div>
                        <div class="col">
                            <label class="form-label">NCM</label>
                            <input type="text" wire:model='estoque_ncm' class="form-control mb-2" placeholder="" value="" />
                        </div>
                    </div>

                    <div class="separator separator-dotted my-4"></div>

                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-2 g- mb-6">
                        <div class="col">
                            <div class="d-flex flex-column w-100 w-xl-300px">
                                <label class="form-label">Gerenciar estoque desse produto?</label>
                                <div
                                    class="form-check form-switch form-check-custom form-check-success form-check-solid">
                                    <input wire:model.live="gerenciar_estoque" name="ativo" class="form-check-input"
                                        type="checkbox" />
                                    <label class="form-check-label" for="kt_flexSwitchCustomDefault_1_1">
                                        @if ($gerenciar_estoque == 1)
                                            <span class="fw-bold">Sim </span>
                                        @else
                                            <span class="text-muted">Não</span>
                                        @endif
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3 mb-2">
                        
                        @if ($gerenciar_estoque)
                            <div class="col">
                                <label class="form-label">Quantidade</label>
                                <input type="text" wire:model='estoque_quantidade' class="form-control mb-2" placeholder="" value="" />
                            </div>   
                        @endif
                        <div class="col" wire:ignore>
                            <label class="form-label">Disponibilidade</label>
                            <select wire:model='disponibilidade_id' class="form-select mb-2 select_disponibilidade"
                                data-hide-search="true" data-placeholder="selecione uma opção" data-value-selected="{{ $disponibilidade_id }}">
                                <option></option>
                                @foreach ($disponibilidades_select as $disponibilidade)
                                    <option value="{{ $disponibilidade->id }}"
                                        {{-- {{ $disponibilidade->id == $disponibilidade_id ? "seleted" : "" }} --}}
                                        {{-- @if ($disponibilidade->id == $disponibilidade_id)
                                            
                                        @endif --}}
                                        
                                        >{{ $disponibilidade->descricao }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($gerenciar_estoque)
                        <div class="col" wire:ignore>
                            <label class="required form-label">Quando produto acabar em estoque</label>
                            <select wire:model='estoque_acabar_id' class="form-select mb-2 select_estoque_acabar"
                                data-hide-search="true" data-placeholder="Selecione uma opção" data-value-selected="{{ $estoque_acabar_id }}">
                                <option></option>
                                @foreach ($estoque_acabar_select as $estoque_cabar)
                                    <option value="{{ $estoque_cabar->id }}">{{ $estoque_cabar->descricao }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!--begin::Peso e Dimensões-->
            <div class="card card-flush shadow-sm">
                <div class="card-header">
                    <div class="card-title">
                        <h2>Peso e Dimensões</h2>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 row-cols-xl-4 g-9">
                        <div class="col">
                            <label class="form-label">Peso</label>
                            <div class="input-group">
                                <input wire:model='peso' type="text" class="form-control"
                                    placeholder="" value="" />
                                <span class="input-group-text" id="basic-addon1">Kg</span>
                            </div>
                        </div>
                        <div class="col">
                            <label class="form-label">Altura</label>
                            <div class="input-group">
                                <input type="text" wire:model='altura' class="form-control"
                                placeholder="" value="" />
                                <span class="input-group-text" id="basic-addon1">cm</span>
                            </div>
                        </div>
                        <div class="col">
                            <label class="form-label">Largura</label>
                            <div class="input-group">
                                <input type="text" wire:model='largura' class="form-control"
                                placeholder="" value="" />
                                <span class="input-group-text" id="basic-addon1">cm</span>
                            </div>
                        </div>
                        <div class="col">
                            <label class="form-label">profundidade</label>
                            <div class="input-group">
                                <input type="text" wire:model='profundidade' class="form-control"
                                placeholder="" value="" />
                                <span class="input-group-text" id="basic-addon1">cm</span>
                            </div>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 mt-4">
                        <div class="col">
                            <div
                                class="alert alert-dismissible bg-light-warning d-flex flex-column flex-sm-row w-100 py-2 px-5 border-warning border border-dashed">
                                <div class="d-flex flex-center flex-column pe-0 pe-sm-2">
                                    <span>Para o cálculo correto do envio, todos os valores devem ser preenchidos. Pese
                                        e meça seu produto com a embalagem que você normalmente utiliza
                                        despachar.</span>
                                </div>
                                <button type="button"
                                    class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                                    data-bs-dismiss="alert">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Peso e Dimensões-->


            <!--begin::Organização-->
            <div class="card card-flush shadow-sm">
                <div class="card-header">
                    <div class="card-title">
                        <h2>Organização</h2>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-2 g-9 mb-2">
                        <div class="col" wire:ignore wire:key="w_brands">
                            <label class="form-label">Categoria</label>
                            <select wire:model='categoria_id' class="form-select mb-2 select_categoria"
                                data-hide-search="true" data-placeholder="Selecione uma ou varias categorias" data-value-selected="{{ $categoria_id }}">
                                <option></option>
                                @foreach ($categorias_select as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col" wire:ignore>
                            <label class="form-label">Marca</label>
                            <div>
                                <select class="form-select mb-2 select_marca" data-hide-search="true"
                                    data-placeholder="Selecione uma marca" wire:model='marca_id' data-value-selected="{{ $marca_id }}">
                                    <option></option>
                                    @foreach ($marcas_select as $marca)
                                        <option value="{{ $marca->id }}">{{ $marca->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Organização-->

            <!--begin::SEO-->
            <div class="card card-flush shadow-sm">
                <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse"
                    data-bs-target="#kt_docs_card_collapsible">
                    <div class="card-title">
                        <h2>SEO</h2>
                    </div>
                    <div class="card-toolbar rotate-180">
                        <i class="fa-solid fa-angle-up"></i>
                    </div>
                </div>

                <div id="kt_docs_card_collapsible" class="collapse show">
                    <div class="card-body pt-0">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-2 g-9 mb-2">
                            <div class="col">
                                <label class="form-label">Tag Title</label>
                                <input type="text" wire:model='seo_tag_titulo' class="form-control mb-2"
                                    placeholder="Ex: liso lambido gold" value="" />
                            </div>
                            <div class="col">
                                <label class="form-label">URL do produto</label>
                                <input type="text" wire:model='seo_url'
                                    class="form-control mb-2" placeholder="" value="" />
                            </div>
                        </div>

                        <div class="row row-cols-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 g-9 mb-2">
                            <div class="col">
                                <label class="form-label">Meta Tag Description </label>
                                <textarea wire:model='seo_meta_tag_descricao' rows="4" class="form-control mb-2"
                                    placeholder="Ex: Produto ideal para voce que quer um alisamento perfeito."></textarea>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fa-solid fa-check mr-3"></i>
                        Salvar alterações
                    </button>
                    <a href="{{ route('produtos.index') }}" type="submit" class="btn btn-light btn-sm">
                        <i class="fa-solid fa-ban"></i>
                        Cancelar
                    </a>
                </div>
            </div>
            <!--end::SEO-->

        </div>
    </form>
</div>
{{-- @push('scripts') --}}
<script>
    document.addEventListener('livewire:init', function() {
        $('.select_categoria').select2();
        $('.select_marca').select2();
        $('.select_disponibilidade').select2();
        $('.select_estoque_acabar').select2();

        let categoria_id = $('.select_categoria').attr('data-value-selected');
        if (categoria_id != '') {
            $('.select_categoria').val(categoria_id);
            $('.select_categoria').trigger('change');    
        }

        let marca_id = $('.select_marca').attr('data-value-selected');
        if (marca_id != '') {
            $('.select_marca').val(marca_id);
            $('.select_marca').trigger('change');    
        }

        let disponiblidade_id = $('.select_disponibilidade').attr('data-value-selected');
        if (disponiblidade_id != '') {
            $('.select_disponibilidade').val(disponiblidade_id);
            $('.select_disponibilidade').trigger('change');    
        }

        let estoque_acabar_id = $('.select_estoque_acabar').attr('data-value-selected');
        if (estoque_acabar_id != '') {
            $('.select_estoque_acabar').val(estoque_acabar_id);
            $('.select_estoque_acabar').trigger('change');    
        }

        $('.select_categoria').on('change', function() {
            @this.set('categoria_id', $(this).val());
        });

        $('.select_marca').on('change', function() {
            @this.set('marca_id', $(this).val());
        });

        $('.select_disponibilidade').on('change', function() {
            @this.set('disponibilidade_id', $(this).val());
        });

        $('.select_estoque_acabar').on('change', function() {
            @this.set('estoque_acabar_id', $(this).val());
        });

        //var preco_custo = document.querySelector('#preco_custo').val;

        //console.log(preco_custo);
        
        Inputmask('numeric',{
        radixPoint: ",",
        groupSeparator: ".",
        autoGroup: true,
        digits: 2,
        digitsOptional: false,
        placeholder: "0",
        rightAlign: false
        }).mask('#preco_custo');

        Inputmask('numeric',{
        radixPoint: ",",
        groupSeparator: ".",
        autoGroup: true,
        digits: 2,
        digitsOptional: false,
        placeholder: "0",
        rightAlign: false
        }).mask('#preco_venda');

        Inputmask('numeric',{
        radixPoint: ",",
        groupSeparator: ".",
        autoGroup: true,
        digits: 2,
        digitsOptional: false,
        placeholder: "0",
        rightAlign: false
        }).mask('#preco_promo');


        // Inputmask({
        //     "mask" : "99/99/9999"
        // }).mask(numeroInput);
       

        // Inputmask({
        //     "mask" : "99/99/9999"
        // }).mask("#preco_custo");


        //CKEditor
        // ClassicEditor
        //     .create(document.querySelector('#descricao_produto'), {
        //         ckfinder: {
        //             uploadUrl: "/upload",
        //         }
        //     })
        //     .then(editor => {
        //         filebrowserUploadUrl: console.log(editor);
        //         editor.model.document.on('change:data', () => {
        //             @this.set('descricao', editor.getData());
        //         })
        //     })
        //     .catch(error => {
        //         console.error(error);
        //     });

        //DropZone
        var allImages = [];
        var myDropzone = new Dropzone("#imagens_produto", {
            url: "/uploadDz", // Set the url for your upload script location
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 10,
            maxFilesize: 4, // MB
            addRemoveLinks: true,
            uploadMultiple: true,
            acceptedFiles: ".jpeg,.jpg,.png",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            accept: function(file, done) {
                if (file.name == "wow.jpg") {
                    done("Naha, you don't.");
                } else {
                    done();
                }
            },
            success: function(file, response) {
                
               allImages.push(response); // Adiciona o arquivo ao array principal
  
                // Concatena os arrays internos em um único array aninhado
                let flattenedArray = allImages.reduce((accumulator, currentArray) => {
                    return accumulator.concat(currentArray);
                }, []);

                let arraySemRepetidos = flattenedArray.filter((value, index, self) => {
                    return self.indexOf(value) === index;
                });

                let imagens = arraySemRepetidos.reduce((accumulator, currentArray) => {
                    return accumulator.concat(currentArray);
                }, []);

                // console.log('array sem repetição',arraySemRepetidos); 

                // // console.log("Lista de imagens atualizada:");
                // // console.log(flattenedArray);

                @this.set('images_produto', imagens);

                //var caminhos1 = response.paths; // Array de caminhos do JSON

                // var uploadedFiles = [];
                // uploadedFiles.push(response);
                // let flattenedArray = [].concat(...uploadedFiles); // Mescla os arrays aninhados em um único array
                // console.log("Lista de imagens atualizada:");
                // console.log(flattenedArray); // Exibe as imagens no console
                // console.log("Lista de imagens atualizada:");
                // console.log(uploadedFiles);

                // // Iterar pelos caminhos e armazenar em outro array
                // caminhos1.forEach( => {
                //     uploadedFiles.push(response);
                //     console.log("Lista de imagens atualizada:");
                //     console.log(uploadedFiles);
                //     //@this.set('images_produto', novoArrayDeCaminhos);
                // });

                //console.log('Sucess Multiple',novoArrayDeCaminhos);


                //Here you can get your response.
                //@this.set('images_produto', novoArrayDeCaminhos);
                // let objetoPaths = response;

                // Extrair os caminhos e armazenar em uma variável separada
                // let caminhos = objetoPaths.paths;
                // console.log('Response', caminhos);
                //console.log('Response QTD', response.qtd);
                // console.log('Response File', file);
                // console.log('ALL IMAGES',JSON.stringify(flattenedArray));
            },
  
        });


        


        // TyneMCE
        tinymce.init({
            selector: 'textarea#descricao_produto',
            language: 'pt_BR',
            plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
            imagetools_cors_hosts: ['picsum.photos'],
            menubar: 'file edit view insert format tools table help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | insertfile image media template link anchor codesample | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | ltr rtl',
            toolbar_sticky: true,
            autosave_ask_before_unload: true,
            autosave_interval: "30s",
            autosave_prefix: "{path}{query}-{id}-",
            autosave_restore_when_empty: false,
            autosave_retention: "2m",
            image_advtab: true,
            importcss_append: true,
            image_title: true,
            automatic_uploads: true,
            images_upload_url: '/uploadTyneMCE',
            file_picker_types: 'image',
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.set('descricao', editor.getContent());
                });
            },
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function() {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), {
                            title: file.name
                        });
                    };
                };
                input.click();
            },
            template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
            template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
            height: 520,
            image_caption: true,
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
            noneditable_noneditable_class: "mceNonEditable",
            toolbar_mode: 'sliding',
            contextmenu: "link image imagetools table",
        });
    });
    
</script>
{{-- @endpush --}}

