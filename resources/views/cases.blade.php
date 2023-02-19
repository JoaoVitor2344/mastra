<!DOCTYPE html>
<html lang="pt-br">
<head>
    @include('header')
</head>
<body style="background: #f1f1f1;">
    @include('navbar')

    <section class="d-flex flex-column align-items-center" style="margin-top: 65px;">
        <div class="d-flex" style="width: 1200px;">
            <h1 style="font-size: 45px; font-weight: 700; margin-bottom: 20px;">Cases</h1>
        </div>
        @if(!isset($case))
            <div class="d-flex flex-wrap col-12 justify-content-center">
                @for($i = 0; $i < 12; $i++) 
                    <a href="/cases/{{ $i }}">
                        <div class="case">
                            <img class="w-100" src="uploads/cases/teste.jpg">
                            <div class="overlay">teste</div>
                        </div>
                    </a>
                @endfor
            </div>
        @else
            <div class="d-flex justify-content-between" style="width: 1200px;">
                <div class="col-9 d-flex flex-wrap">
                    @for($i = 0; $i < count($case->imagens); $i++)
                        <div class="col-6 images"><img class="w-100" id="image{{ $i }}" src="/uploads/cases/teste/{{ $case->imagens[$i] }}" style="padding: 0 20px 20px 0;"></div>
                    @endfor
                </div>
                <div class="col-3">
                    <div>
                        <h6 style="font-size: 14px; font-weight: 800;">DESCRIÇÃO DO PROJETO</h6>
                        <div style="font-size: 18px; font-weight: 600; color: grey;">{{ $case->descricao }}</div>
                    </div>
                    <div class="mt-4">
                        <h6 style="font-size: 14px; font-weight: 800;">DETALHES DO PROJETO</h6>
                        <div>
                            <div class="d-flex">
                                <h6 class="me-3">Projeto: </h6> 
                                <div style="font-weight: 600; color: grey;">{{ $case->detalhes->projeto }}</div>
                            </div>
                            <div class="d-flex">
                                <h6 class="me-3">Categorias: </h6> 
                                <div style="font-weight: 600; color: grey;">{{ $case->detalhes->categoria }}</div>
                            </div>
                            <div class="d-flex">
                                <h6 class="me-3">Cliente: </h6> 
                                <div style="font-weight: 600; color: grey;">{{ $case->detalhes->cliente }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>

    @include('footer')
</body>
</html>