<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class DatasourceUrl extends Model
{
    public function getId()
    {
        return $this->getAttribute('id');
    }

    public function setId($id): void
    {
        $this->setAttribute('id', $id);
    }


    public function getName()
    {
        return $this->attributes['name'];
    }

    public function setName($name): void
    {
        $this->attributes['name'] = $name;
    }
    public function getUrl()
    {
        return $this->attributes['url'];
    }

    public function setUrl($url): void
    {
        $this->attributes['url'] = $url;
    }

    public function getCodigo()
    {
        return $this->attributes['codigo'];
    }

    public function setCodigo($codigo): void
    {
        $this->attributes['codigo'] = $codigo;
    }

    public function getStatus()
    {
        return $this->attributes['status'];
    }

    public function setStatus($status): void
    {
        $this->attributes['status'] = $status;
    }
}
