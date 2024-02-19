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
        <div class="col-12">
            <div class="xml-container">
                <span class="xml-tag">&lt;&gt;</span>
                <br>
                <span class="xml-tag" style="margin-left: 8ch">&lt;acess_total&gt;</span>
                <span class="xml-value xml-ds-title">{{$stats['acess_total']}}</span>
                <span class="xml-tag">&lt;/acess_total&gt;</span>

                <br>
                <span class="xml-tag" style="margin-left: 8ch">&lt;unique_ip&gt;</span>
                <span class="xml-value xml-ds-description">{{$stats['unique_ip']}}</span>
                <span class="xml-tag">&lt;/unique_ip&gt;</span>
                <br>
                <span class="xml-tag" style="margin-left: 8ch">&lt;top_referrers&gt;</span>
                <span class="xml-value xml-ds-lang">{{$stats['top_referrers']}}</span>
                <span class="xml-tag">&lt;/top_referrers&gt;</span>
                <br>
                <span class="xml-tag" style="margin-left: 8ch">&lt;10 dias&gt;</span>
                <span class="xml-value xml-ds-qty-items"></span>
                <span class="xml-tag">&lt;/10 dias&gt;</span>
                <br>
                <span class="xml-tag">&lt;&gt;</span>
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

