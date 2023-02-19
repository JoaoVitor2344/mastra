<!DOCTYPE html>
<html lang="pt-br">
<head>
    @include('header')
</head>
<body>
    @include('navbar')

    <section class="d-flex flex-column align-items-center" style="margin-top: 60px;">
        <div class="d-flex justify-content-between" style="width: var(--main-width);">
            <div class="col-6 contatos">
                <div><h6 class="mb-5" style="font-size: 18px; font-weight: 700;">CONTATOS</h6></div>
                <div class="d-flex align-items-center">
                    <i class="fa-regular fa-envelope" style="font-size: 50px; padding-right: 10px"></i>
                    @php
                    use Illuminate\Support\Facades\DB;
                    $servico = DB::table('sistema')->first();
                    @endphp
                    <h6>{{ $servico->email }}</h6>
                </div>
                <div class="d-flex mt-4 align-items-center">
                    <i class="fa-brands fa-whatsapp" style="font-size: 50px; padding-right: 10px"></i>
                    @php
                    $servico = DB::table('sistema')->first();
                    @endphp
                    <h6>{{ $servico->telefone }}</h6>
                </div>
            </div>
            <div class="col-6 d-flex flex-column">
                <div><h6 class="mb-5" style="font-size: 18px; font-weight: 700;">SOLICITE UM SERVIÇO</h6></div>
                <div>
                    @if(session('mensagem'))
                        <script>
                            Swal.fire(
                                'Orçamento cadastrado',
                                '{{ session("mensagem") }}',
                                'success'
                            )
                        </script>
                    @endif
                    <form class="d-flex flex-column formOrcamento" action="/orcamento" method="post">
                        @csrf
                        <input type="text" name="nome" placeholder="Nome" value="{{ old('nome') }}" required>
                        <input type="text" name="email" placeholder="E-mail" value="{{ old('email') }}" required>
                        <input type="text" name="assunto" placeholder="assunto" value="{{ old('assunto') }}" required>
                        <textarea name="mensagem" cols="30" rows="5" placeholder="Mensagem" required></textarea>
                        <button style="float: right;">Enviar</button>
                        @if ($errors->any())
                            <ul class="alert alert-danger mt-3" style="padding: 20px 30px!important;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </section>

    @include('footer')
</body>
</html>