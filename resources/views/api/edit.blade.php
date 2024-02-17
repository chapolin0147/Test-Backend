<?php
use App\Models\DatasourceUrl;

?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Crawler</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <script src="{{asset('js/app.js')}}"></script>

    <style>
        body {
            font-family: sans-serif;
            font-size: 14px;
            margin: 0;
            background-color: #fafafa;
        }
        label {
            margin-bottom: 0;
        }
        .xml-container {
            white-space: nowrap;
            overflow-y: scroll;
            padding: 10px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 10px;
            margin-top: 20px;
        }
        .xml-tag {
            color: #0080ff;
        }
        .xml-value {
            color: #ff8000;
            font-weight: bold;
        }
    </style>
</head>
<body class="p-3">
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <a href="{{route('api.index')}}" class="btn btn-secondary mb-3 mt-2">Voltar</a>
        </div>
        <div class="col-6">
            <form action="{{route('api.update'), $datasource->getId()}}"
                  method="POST">
                @csrf
                <input id="ds_codigo" name="ds_codigo" type="hidden" value="{{$datasource->getCodigo()}}">
                <div class="mb-2">
                    <label for="ds_name" class="form-label">Nome</label>
                    <input class="form-control" id="ds_name" required name="ds_name" type="text" value="{{$datasource->getName()}}">
                </div>
                <div class="mb-2">
                    <label for="ds_url" class="form-label">URL</label>
                    <input class="form-control" id="ds_url" required name="ds_url" type="text" value="{{$datasource->getUrl()}}">
                </div>
                <div class="mb-2">
                    <label for="ds_status" class="form-label">Status</label>
                    <select class="form-control" id="ds_status" name="ds_status" aria-label="Default select example">
                        <option value="{{$datasource->getStatus()}}">{{$datasource->getStatus()}}</option>
                        <option value="Ativo">Ativo</option>
                        <option value="Inativo">Inativo</option>
                    </select>
                </div>

                <button class="btn btn-primary mt-1" id="btn" type="submit">Salvar</button>
            </form>
        </div>
        <div class="col-6">

            <div class="xml-container">
                <span class="xml-tag">&lt;rss version="2.0"&gt;</span>
                <br>
                <span class="xml-tag" style="margin-left: 8ch">&lt;url&gt;</span>
                <span class="xml-value xml-ds-title">{{$datasource['url']}}</span>
                <span class="xml-tag">&lt;/url&gt;</span>
                <br>
                <span class="xml-tag" style="margin-left: 8ch">&lt;status&gt;</span>
                <span class="xml-value xml-ds-description">{{$datasource['status']}}</span>
                <span class="xml-tag">&lt;/status&gt;</span>
                <br>
                <span class="xml-tag" style="margin-left: 8ch">&lt;last_access&gt;</span>
                <span class="xml-value xml-ds-lang">{{$datasource['last_access']}}</span>
                <span class="xml-tag">&lt;/last_access&gt;</span>
                <br>
                <span class="xml-tag" style="margin-left: 8ch">&lt;codigo&gt;</span>
                <span class="xml-value xml-ds-qty-items">{{$datasource['codigo']}}</span>
                <span class="xml-tag">&lt;/codigo&gt;</span>
                <br>
                <span class="xml-tag">&lt;/rss&gt;</span>
            </div>
        </div>
    </div>
</div>

<script>
</script>


<br>
<br>
<br>
</body>
</html>

