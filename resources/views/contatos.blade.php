<!DOCTYPE html>
<html lang="pt-br">
<head>@include('header')</head>
<body>
    @include('navbar')

    <section class="d-flex justify-content-center" style="margin-top: 65px;">
        <div class="d-flex justify-content-between" style="width: 1200px;">
            <div class="col-6 d-flex flex-column">
                <h1 style="font-size: 45px; font-weight: 700; margin-bottom: 20px;">Contatos</h1>
                <div class="col-6 mt-5">
                    <h4>Mastra</h4>
                    <div class="mt-3">– Sede Curitiba – Rua João Tschannerl, 411, Sala 02 – Vista Alegre – Curitiba-PR – 80820-010</div>
                    <hr>
                </div>
                <div class="col-6 mt-5">
                    <h4>Telefone</h4>
                    <div class="mt-3">(44) 9 9940-3274</div>
                    <div class="mt-2">(44) 9 9940-3274</div>
                    <hr>
                </div>
                <div class="col-6 mt-5">
                    <h4>Redes Sociais</h4>
                    <div class="d-flex align-items-center mt-2">
                        <div style="cursor: pointer; margin-right: 20px;"><i class="fa-brands fa-square-facebook" style="font-size: 30px;"></i></div>
                        <div style="cursor: pointer; margin-right: 20px;"><i class="fa-brands fa-square-whatsapp" style="font-size: 30px;"></i></div>
                        <div style="cursor: pointer;"><i class="fa-solid fa-square-envelope" style="font-size: 30px;"></i></div>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="col-6">
                <div id="googleMap" style="width:100%;height:400px;"></div>
            </div>
            <script>
                function myMap() {
                var mapProp= {
                center:new google.maps.LatLng(51.508742,-0.120850),
                zoom:5,
                };
                var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
                }
            </script>

            <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
        </div>
    </section>

    @include('footer')
</body>
</html>