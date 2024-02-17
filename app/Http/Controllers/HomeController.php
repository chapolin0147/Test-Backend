<?php

namespace App\Http\Controllers;

use App\Models\DatasourceUrl;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;
use Exception;

class HomeController extends Controller
{
    public function index()
    {
        $datasource = DatasourceUrl::all();

        return view('api.redirects', [
                'datasources' => $datasource
            ]
        );
    }

    public function create()
    {
         return view('api.create', [
            'datasource' => new DatasourceUrl(),
        ]);
    }

    /**
     * @throws Exception
     */
    public function store(Request $request): RedirectResponse
    {
        $datasourceUrl = new DatasourceUrl();
        $datasourceUrl->setName($request->get('ds_name'));
        $datasourceUrl->setUrl($request->get('ds_url'));
        $datasourceUrl->setStatus($request->get('ds_status'));
        $datasourceUrl->save();
        if ($datasourceUrl->getId()) {
            $datasourceUrl->setCodigo(Hashids::encode($datasourceUrl->getId()));
            $datasourceUrl->save();
        }
        return redirect()->route('api.index');
    }


    public function update(Request $request): RedirectResponse
    {
        $datasource = DatasourceUrl::query()->where(['datasource_urls.codigo' => $request->get('ds_codigo')])->first();
        if (!$datasource) {
            throw new Exception('Datasource not found!');
        }

        DatasourceUrl::query()->where(['datasource_urls.codigo' => $request->get('ds_codigo')])
            ->update([
                    'name' => $request->get('ds_name'),
                    'url' => $request->get('ds_url'),
                    'status' => $request->get('ds_status')
            ]);

        return redirect()->route('api.index');
    }

    public function edit($codigo)
    {
        $datasources = DatasourceUrl::find(Hashids::decode($codigo)[0]);
        return view('api.edit', [
            'datasource' => $datasources,
        ]);
    }

    /**
     * @throws Exception
     */
    public function delete($codigo): RedirectResponse
    {
        $datasource = DatasourceUrl::find(Hashids::decode($codigo)[0]);
        DatasourceUrl::query()->where(['datasource_urls.id' => $datasource->getId()])->delete();

        return redirect()->route('api.index');
    }
}
