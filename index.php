<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body>
    <section class="d-flex justify-content-center" style="margin-top: 65px;">
        <div class="d-flex justify-content-between" style="width: 1200px;">
            <div class="col-4 d-flex flex-column">
                <?php  for ($i=0; $i < 10; $i++) { ?>
                    <div style="font-size: 18px; box-shadow: 0px -1px 4px grey; height: 45px; margin-right: 15px; padding: 10px; cursor: pointer;">Ponta Grossa – 1ª Vara Cível</div>
                <?php } ?>
            </div>
            <div class="col-8 d-flex flex-column">
                <div>
                    <h1 style="font-size: 35px; font-weight: 900; margin-bottom: 20px;">ASSISTÊNCIA TÉCNICA JUDICIAL E PERÍCIA JUDICIAL</h1>
                    <p style="font-size: 18px; font-weight: 600; color: grey;">A FB Laudos de Engenharia presta assistência técnica judicial, auxiliando no processo como um todo, promovendo um estudo preliminar dos autos, elaborando quesitos, acompanhando o Perito Judicial nomeado nas vistorias e na elaboração de pareceres técnicos.</p>
                    <br>
                    <p style="font-size: 18px; font-weight: 600; color: grey;">O engenheiro especialista da FB Laudos de Engenharia, além de assistente técnico, também atua como perito judicial em diversas comarcas do Estado do Paraná, como:</p>
                    <div class="d-flex flex-column">
                        <?php  for ($i=0; $i < 10; $i++) { ?>
                            <b style="margin-bottom: 17px; font-size: 18px;">Ponta Grossa – 1ª Vara Cível</b>
                        <?php } ?>
                    </div>
                </div>
                <div class="d-flex">
                    <?php for ($i=0; $i < 2; $i++) { ?>
                        <div class="col-6 me-3 d-flex flex-column justify-content-between" style="height: 300px; border: solid 4px red; padding: 30px;">
                            <h3 style="font-size: 40px; font-weight: 700;">Conheça nossos cases.</h3>
                            <button style="width: 160px; height: 65px; border: solid 1px; background: transparent;">Saiba mais ></button>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</body>
</html>