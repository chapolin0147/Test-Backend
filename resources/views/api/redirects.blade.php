<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Datasources</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
</head>
<body class="p-3">
<div class="container-fluid">
    <div class="row">
        <div class="col-4">
            <a href="{{route('api.create')}}" class="btn btn-primary mb-3 mt-2 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Novo
            </a>
        </div>
        <table id="table" class="table table-striped table-hover ">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>URL</th>
                <th>Criado em</th>
                <th>Última Atualização</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody class="items">

            @foreach($datasources as $datasource)
                <tr>
                    <td>{{$datasource->getCodigo()}}</td>
                    <td><a href="{{route('r.redirect', $datasource->getCodigo())}}">{{$datasource->getName()}}</a></td>
                    <td><a href="{{route('r.redirect', $datasource->getCodigo() . '?params=' . $datasource->getUrl())}}" href="">{{$datasource->getUrl()}}</a></td>
                    <td>{{date('d/m/Y H:i:s', strtotime($datasource->created_at))}}</td>
                    <td>{{date('d/m/Y H:i:s', strtotime($datasource->updated_at))}}</td>
                    <td><a href="{{route('api.stats', $datasource->getCodigo())}}">stats</a></td>
                    <td>logs</td>
                    <td><a class="btn btn-primary" href="{{route('api.edit', $datasource->getCodigo())}}"><i class="bi bi-pencil-square"></i></a> |  <a class="btn btn-danger" type="button" data-toggle="modal" data-target="#deleteModal" data-whatever="" href="{{route('api.delete', $datasource->getCodigo())}}"><i class="bi bi-trash"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excluir Datasource <strong></strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="delete">
                    <p>Tem certeza que deseja excluir o datasource <strong></strong>?</p>
                    <small>Após a exclusão não será possivel recuperar os dados.</small>
                </div>
                <div class="category">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="dsType_name" class="form-label">Nome da Categoria</label>
                            <input class="form-control" id="dsType_slug" readonly required name="dsType_slug" type="hidden" value="">
                        </div>
                        <div class="form-group">
                            <div class="datasource-category-field">
                                <input class="form-control label" required readonly name="name_label[]" type="hidden" value="Publicações">
                                <input class="form-control label" required readonly name="name_field[]" type="hidden" value="container">
                                <input class="form-control label" readonly required name="label_img[]"  type="hidden" value="0">
                            </div>
                            <button class="btn btn-secondary" type="button" onclick="addField()"><i class="bi bi-plus"></i></button>
                        </div>
                        <button class="btn btn-primary mt-2" id="btn" type="submit">Salvar</button>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-danger btn-ok" >Excluir</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
