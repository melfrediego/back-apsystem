
<!DOCTYPE html>
<html lang="pt-br">
    <!--begin::Head-->
    <head>
        <title>Login</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>      
        <meta property="og:locale" content="en_US" />
        <link rel="shortcut icon" href="assets/media/logos/favicon.png"/>

        <!--begin::Fonts(mandatory for all pages)-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>        
        <!--end::Fonts-->

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <style>
        .bg-login {
            background-image: url('assets/media/bg/bg-login-tigre.png');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            color: aqua;
        }
    </style>
<body>
        
 <div class="bg-white dark:bg-gray-900">
    <div class="flex justify-center h-screen">
        <!-- Container-Left | Form login -->
        <div class="flex flex-col w-full max-w-md mx-auto">
            <div class="flex-1 flex flex-col justify-center">
                <div class="lg:hidden md:block mb-8 text-center w-full flex flex-col">
                    <img src="assets/media/logos/logo-login.png" width={100} height={100} alt="Logo pagina login" class="w-40 ml-28" />
                </div>
                <div class="text-center md:text-left">
                    <h2 class="text-2xl font-bold text-yellow-600 dark:text-white">Seja bem vindos!</h2>
                    <p class="mt-3 text-slate-600 dark:text-gray-300 text-sm">Utilize o formulario abaixo para <br />
                        acessar o sistema.</p>
                    <p class="mt-8 text-gray-500 font-semibold">Login</p>
                </div>
                    @if ($errors->any())
                    <div class="bg-red-100 rounded p-2 flex items-center mt-1 gap-2.5">
                        {{-- <div>
                            ICON
                        </div> --}}
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-sm text-red-600">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="mt-4">
                    <form action="{{route('login.action')}}" method="POST">
                        @csrf
                        <div class="relative mb-8">
                            <label class="block pl-2 mb-1 text-xs text-gray-400 dark:text-gray-200">E-mail</label>
                            <div class="icon-user absolute inset-y-0 top-9 pl-4 z-20">
                                <!-- Criar component para SVG -->
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.23083 7.92308C8.14888 7.92308 9.02934 7.55838 9.6785 6.90922C10.3277 6.26005 10.6924 5.3796 10.6924 4.46154C10.6924 3.54348 10.3277 2.66303 9.6785 2.01386C9.02934 1.3647 8.14888 1 7.23083 1C6.31277 1 5.43231 1.3647 4.78315 2.01386C4.13398 2.66303 3.76929 3.54348 3.76929 4.46154C3.76929 5.3796 4.13398 6.26005 4.78315 6.90922C5.43231 7.55838 6.31277 7.92308 7.23083 7.92308Z"
                                        stroke="#BFC1CE" stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M7.23077 17.6154H1V16.8649C1.00888 16.0278 1.18597 15.2011 1.52074 14.4338C1.85552 13.6666 2.34115 12.9744 2.94876 12.3986C3.55637 11.8228 4.27356 11.375 5.05769 11.0818C5.84182 10.7887 6.67688 10.6563 7.51323 10.6923C8.34173 10.7315 9.15412 10.9353 9.90297 11.2919C10.6518 11.6485 11.3221 12.1507 11.8748 12.7692"
                                        stroke="#BFC1CE" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M19.0001 12.0769L13.4616 19L10.6924 16.9231" stroke="#BFC1CE"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="informe seu e-mail."
                                class="block w-full pl-11 pr-4 py-3 mt-1 text-gray-600 placeholder-gray-400 bg-white border border-gray-300 rounded dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-yellow-600 focus:border-yellow-600 dark:focus:border-yellow-600 focus:outline-none" />
                        </div>

                        <div class="relative">
                            <label class="block pl-2 mb-1 text-xs text-gray-400 dark:text-gray-200">Senha</label>
                            <div class="icon-user absolute inset-y-0 top-9 pl-4 z-20">
                                <!-- Criar component para SVG -->
                                <svg width="15" height="19" viewBox="0 0 15 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.7692 7.53846H2.30769C1.96087 7.53846 1.62825 7.67623 1.38301 7.92147C1.13777 8.16671 1 8.49933 1 8.84615V16.6923C1 17.0391 1.13777 17.3717 1.38301 17.617C1.62825 17.8622 1.96087 18 2.30769 18H12.7692C13.1161 18 13.4487 17.8622 13.6939 17.617C13.9391 17.3717 14.0769 17.0391 14.0769 16.6923V8.84615C14.0769 8.49933 13.9391 8.16671 13.6939 7.92147C13.4487 7.67623 13.1161 7.53846 12.7692 7.53846Z"
                                        stroke="#BFC1CE" stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M12.1153 7.53846V5.57692C12.1153 4.36305 11.6331 3.19889 10.7747 2.34055C9.91638 1.48221 8.75222 1 7.53835 1C6.32447 1 5.16032 1.48221 4.30198 2.34055C3.44364 3.19889 2.96143 4.36305 2.96143 5.57692V7.53846"
                                        stroke="#BFC1CE" stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M7.53837 13.4231C7.71178 13.4231 7.87809 13.3542 8.00071 13.2316C8.12333 13.1089 8.19221 12.9426 8.19221 12.7692C8.19221 12.5958 8.12333 12.4295 8.00071 12.3069C7.87809 12.1843 7.71178 12.1154 7.53837 12.1154C7.36496 12.1154 7.19865 12.1843 7.07603 12.3069C6.95341 12.4295 6.88452 12.5958 6.88452 12.7692C6.88452 12.9426 6.95341 13.1089 7.07603 13.2316C7.19865 13.3542 7.36496 13.4231 7.53837 13.4231Z"
                                        stroke="#BFC1CE" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <input type="password" name="password" id="password" placeholder="informe sua senha."
                                class="block w-full px-11 py-3 mt-1 text-gray-600 placeholder-gray-400 bg-white border border-gray-300 rounded dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-yellow-600 focus:border-yellow-600 dark:focus:border-yellow-600 focus:outline-none" />
                        </div>

                        <div class="mt-8 flex flex-col">
                            <button
                                class="w-full px-4 py-3 tracking-wide text-white transition-colors duration-200 transform bg-gradient-to-b from-yellow-500 to-yellow-600 bg-yellow-600 rounded hover:bg-yellow-700 focus:outline-none focus:bg-yellow-600 focus:ring focus:ring-yellow-600 focus:ring-opacity-50">
                                Acessar
                            </button>
                            {{-- <a href="/dashboard" class="text-xs text-center text-blue-500 hover:underline">Dashboard</Link> --}}
                        </div>
                    </form>
                    <p class="mt-6 text-sm text-center text-gray-400">Esqueceu sua senha? <a
                        href="/recupera-senha"
                        class="text-yellow-600 focus:outline-none focus:underline hover:underline">Clique
                        aqui</a>.</p>
                </div>
            </div>

            <div class="w-full mb-4">
                <p class="text-[11px] text-gray-500">©
                    A & P COSMETICA LTDA - CNPJ: 38.730.213/0001-41 © <br />
                    Todos os direitos reservados. 2023
                    .
                </p>
            </div>
        </div>

        <!-- Container-Left | background, logo, menssages -->
        <div class="hidden bg-login lg:block lg:w-2/3">
            <div class="flex flex-col justify-center items-center h-full px-20 bg-gray-900 bg-opacity-40">
                <img src="assets/media/logos/logo-login.png" alt="Logo pagina login" />
                <p class="max-w-xl mt-3 text-gray-300"></p>
                <ul class="flex gap-20 mt-8">
                    <li class="text-yellow-600">Vendas</li>
                    <li class="text-yellow-600">Financeiro</li>
                    <li class="text-yellow-600">Logistica</li>
                    <li class="text-yellow-600">Delivery</li>
                </ul>
            </div>
        </div>
    </div>
</div>
</body>
    <!--end::Body-->
</html>