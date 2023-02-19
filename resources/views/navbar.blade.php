<section class="d-flex justify-content-center" style="background: white; box-shadow: 0px 0px 1px grey;">
    <div class="d-flex justify-content-between align-items-center w-100" style="padding: 5px 20px;">
        <div class="col-4"><a href="/"><img src="/assets/image/logo.png"></a></div>
        <div class="col-4 d-flex justify-content-between links" style="font-size: 18px; font-weight: 700;">
        @php 
        use Illuminate\Support\Facades\DB;
        $topicos = DB::table('topicos')->where('status', 1)->get();
        @endphp
        @foreach($topicos as $topico)
            <a href="/{{ $topico->pagina }}" style="cursor: pointer; color: black; text-decoration: none;">Serviços</a>
        @endforeach
        </div>  
        <div class="col-4"><buttson class="orcamento" style="float: right; width: 200px; height: 80px; border: none; background: red; color: white; font-size: 18px; font-weight: 700;">Orçamento</button></div>
    </div>
</section>

<style>
    .links a { transition-duration: 0.5s; }
    .links a:hover { color: red!important; }

    .orcamento {
        transition-duration: 0.5s;
    }
    .orcamento:hover {
        background: #951717!important;
    }
</style>