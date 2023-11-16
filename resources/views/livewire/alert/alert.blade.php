<div>

    <div>
        @if($mostrarAlert && $type == 'success')
            <div class="notice d-flex flex-center bg-light-{{ $type }} rounded border-{{ $type }} border border-dashed mb-12 p-6">
                <span class="svg-icon svg-icon-2tx svg-icon-{{ $type }} me-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>
                        <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black"></rect>
                        <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black"></rect>
                    </svg>
                </span>
                <div class="d-flex flex-stack flex-grow-1">
                    <div class="fw-bold">
                        <h4 class="text-gray-900 fw-bolder">Sucesso!</h4>
                        <div class="fs-6 text-gray-700">{{ $message }}
                        {{-- <a href="{{ route('marcas.index') }}" class="fw-bolder" >listar marcas</a>.</div> --}}
                    </div>
                </div>
            </div>
        @endif
    </div>

    <div>
        @if($mostrarAlert && $type == 'danger')
            <div class="notice d-flex bg-light-{{ $type }} rounded border-{{ $type }} border border-dashed mb-12 p-6">
                <span class="svg-icon svg-icon-2tx svg-icon-{{ $type }} me-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>
                        <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black"></rect>
                        <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black"></rect>
                    </svg>
                </span>
                <div class="d-flex flex-stack flex-grow-1">
                    <div class="fw-bold">
                        <h4 class="text-gray-900 fw-bolder">Error!</h4>
                        <div class="fs-6 text-gray-700">{{ $message }}
                        </div>
                    </div>
                </div>
            </div>
        @endif 
    </div>
</div>