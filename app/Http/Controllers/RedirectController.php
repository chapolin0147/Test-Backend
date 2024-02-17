<?php

namespace App\Http\Controllers;
use App\Http\Middleware\HttpsProtocol;
use App\Models\DatasourceUrl;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;
use Exception;

class RedirectController extends Controller
{
    public function redirect($codigo)
    {
        $datasources = DatasourceUrl::find(Hashids::decode($codigo)[0]);
        if(response($datasources->getUrl())->getStatusCode() != '200' || !$this->checkHost($datasources->getUrl()) || !$this->checkHttps($datasources->getUrl()) ) {
            dd('Erro 200');
            return null;
        }
        //return redirect($datasources->getUrl());
    }
    public function checkHttps($url) {
        $url = parse_url($url, PHP_URL_SCHEME);
        if ($url == 'https') {
            return true;
        }
        return false;
    }

    public function checkHost($url) {
        $host = $_SERVER['HTTP_HOST'];
        if ($host != $url) {
            return true;
        }
        return false;
    }
}
