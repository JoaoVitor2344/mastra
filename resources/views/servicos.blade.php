<!DOCTYPE html>
<html lang="pt-br">
<head>@include('header')</head>
<body style="background: #f1f1f1;">
    @include('navbar')

    <section class="d-flex justify-content-center" style="margin-top: 65px;">
        <div class="d-flex flex-column align-items-end" style="width: 1200px;">
            <div class="d-flex">
                <div class="col-4 d-flex flex-column">
                    @foreach($servicos as $key)
                        <div class="servicos">{{ $key->titulo }}</div>
                    @endforeach
                </div>
                <div class="col-8">
                    <h1 class="titulo">{{ $servico->titulo }}</h1>
                    <p class="conteudo">{{ $servico->conteudo }}</p>
                    @if($servico->imagens != "")
                        <br>
                        <div></div>
                    @endif
                </div>
            </div>
            <div class="d-flex mt-5 col-8">
                <?php for ($i=0; $i < 2; $i++) { ?>
                    <div class="col-6 me-3 d-flex flex-column justify-content-between extra">
                        <h3>Conheça nossos cases.</h3>
                        <button>Saiba mais ></button>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    @include('footer')
</body>
</html>