<div>
    @if(session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <h1>Lista de Marcas</h1>
    <a href="/marcas/create" class="btn btn-primary">Nova marca</a>
    {{-- <a wire:navigate href="/marcas/create" class="btn btn-primary">Nova Marca</a> --}}

    @if(count($marcas) > 0)
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Ativo</th>
                    <th>Destaque</th>
                    <th>Logo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($marcas as $marca)
                    <tr>
                        <td>{{ $marca->id }}</td>
                        <td>{{ $marca->nome }}</td>
                        <td>{{ $marca->descrição }}</td>
                        <td>{{ $marca->ativo }}</td>
                        <td>{{ $marca->destaque }}</td>
                        <td>
                            @if ($marca->logo)
                                <img src="{{ asset('storage/' . $marca->logo) }}" alt="Logo" width="50">
                            @else
                                Sem logo
                            @endif
                        </td>
                        <td>
                            <a wire:click="edit({{ $marca->id }})" class="btn btn-primary">Editar</a>
                            <a wire:click="delete({{ $marca->id }})" class="btn btn-danger">Excluir</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="card-px text-center py-20 my-10">
            <!--begin::Title-->
            <h2 class="fs-2x fw-bolder mb-10">Marcas</h2>
            <!--end::Title-->
            <!--begin::Description-->
            <p class="text-gray-400 fs-4 fw-normal mb-10">Nenhuma marca cadastrada.
                <br>Clique no botão abaixo para adicionar uma ou varias.
            </p>
            <!--end::Description-->
            <!--begin::Action-->
            <a href="#" class="btn btn-primary btn-sm">Adicionar marca</a>
            <!--end::Action-->
        </div>
    @endif
</div>
