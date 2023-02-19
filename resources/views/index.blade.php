<!DOCTYPE html>
<html lang="pt-br">
<head>
    @include('header')
    <link rel="stylesheet" type="text/css" href="/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/slick/slick-theme.css"/>
</head>
<body>
    @include('navbar')

    <section class="d-flex flex-column align-items-center" style="margin-bottom: 60px;">  
        <div class="caousel w-100">
            @for($i = 0; $i < 3; $i++)
                <div class="div-carousel d-flex flex-column align-items-center">
                    <div><h1 class="col-4">Lorem ipsum dolor sit amet, consectetur adipiscing</h1></div>
                    <img src="/assets/image/banners/banner.png">
                </div>
            @endfor
        </div>
        <div class="d-flex flex-column" style="width: var(--main-width);">
            <div class="d-flex flex-wrap" style="margin-bottom: 60px;">
                @for($i = 0; $i < 9; $i++)
                    @foreach($servicos as $servico)
                        <div class="col-4 servico" onclick="window.location.href='/servico/{{ $servico->id }}'">
                            <i class="fa-light fa-user-helmet-safety" style="padding-bottom: 30px;"></i>
                            <h3 style="padding-bottom: 30px;">{{ $servico->titulo }}</h3>
                            <div style="text-align: justify; padding-bottom: 100px;">{{ $servico->subtitulo }}</div>
                        </div>
                    @endforeach
                @endfor
            </div>
        </div>
        <div class="d-flex w-100" style="background: white; box-shadow: 0px 0px 4px grey;">
            <div class="col-6"><img class="w-100 h-100" src="assets/image/porque.jpg"></div>
            <div class="col-6" style="padding: 50px;">
                <h1 style="font-size: 52px; font-weight: 700;">Porque nos escolher</h1>
                <p style="font-size: 20px;">Lorem ipsum dolor sit amet, consectetur adipiscing Lorem ipsum dolor sit amet, consectetur adipiscing Lorem ipsum dolor sit amet, consectetur adipiscing</p>
                <div class="d-flex flex-wrap destaque pt-3">
                    @for($i = 0; $i < 4; $i++)
                        <div class="col-6 pb-3">
                            <h4>Titulo</h4>
                            <div class="descricao">Lorem ipsum dolor sit amet, consectetur adipiscing Lorem ipsum dolor sit amet</div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
        <div class="w-100 d-flex justify-content-center" style="background: white; box-shadow: 0px 0px 4px grey; margin-top: 60px; ">
            <div class="d-flex flex-column trabalhamos" style="width: var(--main-width); padding: 30px 0;">
                <div class="col-12 text-center"><h2 style="font-size: 28px; font-weight: 700;">COMO TRABALHAMOS</h2></div>
                <div class="col-12 d-flex justify-content-evenly mt-5">
                    <ul class="col-4">
                        <li>Clareza em todas as etapas do processo</li>
                        <li>Equipe especializada e com ampla experiência</li>
                        <li>Garantia em todos os nosso trabalhos</li>
                        <li>Atendimento ágil e eficiente</li>
                        <li>Preço justo e qualidade Comprovada</li>
                    </ul>
                    <div class="col-4 d-flex justify-content-center align-items-center"><button onclick="window.location.href='/orcamento'">SOLICITAR ORÇAMENTO</button></div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript" src="/slick/slick.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.caousel').slick({
                dots: true,
                infinite: true,
                speed: 500,
                fade: true,
                cssEase: 'linear',
                autoplay: true
            });
        });
    </script>

    @include('footer')
</body>
</html>