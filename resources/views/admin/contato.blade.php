<!DOCTYPE html>
<html lang="pt-br">
<head>
    @include('admin.header')

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
        #editar input, select { margin-bottom: 10px; }
    </style>

    @if(session('mensagem')))
        <script>
            Swal.fire(
                'Sucesso',
                '{{session("mensagem")}}',
                'success'
            );
        </script>
    @endif
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('admin.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @include('admin.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    @if(!isset($method))
                        <div class="card shadow mb-4" id="table">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Título</th>
                                                <th>Categoria</th>
                                                <th>Imagens</th>
                                                <th>Status</th>
                                                <th>Opções</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Título</th>
                                                <th>Categoria</th>
                                                <th>Imagens</th>
                                                <th>Status</th>
                                                <th>Opções</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach($servicos as $servico)
                                                <tr>
                                                    <td>{{$servico->titulo}}</td>
                                                    <td>{{$servico->nome}}</td>
                                                    <td><img class="img-fluid" src="/uploads/servicos/{{$servico->imagem}}" alt="Imagem"></td>
                                                    <td><div class="rounded {{($servico->status == 1) ? 'bg-succes' : 'bg-warning'}}" style="background: green; padding: 2px; text-align: center; font-size: 14px; font-weight: 600; color: white;">{{($servico->status == 1) ? 'Ativo' : 'Inativo'}}</div></td>
                                                    <td class="d-flex">
                                                        <a href="/servico/{{$servico->id}}" target="_blank" style="text-decoration: none;"><button class="btn-circle bg-secondary" title="Editar" style="border: none; margin-right: 10px;"><i class="fa-solid fa-eye" style="color: white;"></i></button></a>
                                                        <a href="servicos/editar/{{$servico->id}}" style="text-decoration: none;"><button class="btn-circle bg-info" title="Editar" style="border: none; margin-right: 10px;"><i class="fas fa-info-circle" style="color: white;"></i></button></a>
                                                        <a href="servicos/editar/{{$servico->id}}" style="text-decoration: none;"><button class="btn-circle bg-danger" title="Editar" style="border: none; margin-right: 10px;"><i class="fa-solid fa-trash" style="color: white;"></i></button></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="d-flex justify-content-between">
                            <form class="d-flex flex-column shadow col-6" id="editar" action="/admin/servicos/editar/servico" method="post" enctype="multipart/form-data" style="padding: 20px;">
                                @csrf
                                <h3>Editar Serviço {{$servico->id}}</h3>
                                <input type="hidden" name="id" value="{{$servico->id}}">
                                <input class="form-control" type="text" name="titulo" placeholder="Digite título" value="{{$servico->titulo}}">
                                <input class="form-control" type="text" name="subtitulo" placeholder="Digite subtitulo" value="{{$servico->subtitulo}}">
                                <input class="form-control" type="text" name="conteudo" placeholder="Digite conteúdo" value="{{$servico->conteudo}}">
                                <select class="form-select" name="categoria" aria-label="Default select example">
                                    <option selected>Selecione a categoria</option>
                                    @foreach($categorias as $categoria)
                                        <option value="{{$categoria->id}}" <?php echo($categoria->id == $servico->categoria) ? 'selected' : '' ?>>{{$categoria->nome}}</option>
                                    @endforeach
                                </select>
                                <div class="input-group d-flex flex-column" style="margin-bottom: 10px;">
                                    <div class="custom-file w-100">
                                        <input type="file" class="custom-file-input" name="imagem" id="file"
                                        aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="file">Escolher imagem</label>
                                    </div>
                                    <div class="w-100 mt-3"><img class="img-fluid rounded imageDB" src="/uploads/servicos/{{$servico->imagem}}"></div>
                                </div>
                                <div class="input-group" style="margin-bottom: 10px;">
                                    <div class="form-check" style="margin-right: 10px;">
                                        <input class="form-check-input" type="checkbox" name="ativo" {{ ($servico->status == 1) ? 'checked' : ''}}>
                                        <label class="form-check-label" for="status">Ativo</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="inativo" {{ ($servico->status == 0) ? 'checked' : ''}}>
                                        <label class="form-check-label" for="status">Inativo</label>
                                    </div>
                                </div>
                                <button class="btn btn-success" style="font-size: 18px; font-weight: 700;">EDITAR</button>
                            </form>

                            @if ($errors->any())
                                <div class="col-6">
                                    <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>

                        <script>
                            $("input[type='checkbox']").click(function() {
                                $("input[type='checkbox']").prop('checked', false);
                                $(this).prop('checked', true);
                            });

                            $('#file').on('change', function() {
                                // carrega a imagem selecionada no elemento <img>
                                var file = this.files[0];
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    $('.imageDB').attr('src', e.target.result);
                                };
                                reader.readAsDataURL(file);
                            });

                            $(document).ready(function() {
                                var file = this.files[0];
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    $('.imageDB').attr('src', e.target.result);
                                };
                                reader.readAsDataURL(file);
                            });
                        </script>
                    @endif
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/assets/admin/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/assets/admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/assets/admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/assets/admin/js/demo/datatables-demo.js"></script>

</body>

</html>