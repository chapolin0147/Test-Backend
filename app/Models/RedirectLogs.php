<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RedirectLogs extends Model
{
    public function getId()
    {
        return $this->getAttribute('id');
    }

    public function setId($id): void
    {
        $this->setAttribute('id', $id);
    }
    public function getIdUrl()
    {
        return $this->getAttribute('urls_id');
    }

    public function setIdUrl($id): void
    {
        $this->setAttribute('urls_id', $id);
    }
    public function getRequestIp()
    {
        $this->getAttribute('request_ip');
    }

    public function setRequestIp($ip): void
    {
        $this->setAttribute('request_ip', $ip);
    }

    public function getUser()
    {
        $this->getAttribute('user_agent');
    }

    public function setUser($user): void
    {
        $this->setAttribute('user_agent', $user);
    }

    public function getReferer()
    {
        $this->getAttribute('user_agent');
    }

    public function setReferer($referer): void
    {
        $this->setAttribute('header_referer', $referer);
    }
    public function getParams()
    {
        $this->getAttribute('query_params');
    }

    public function setParams($params): void
    {
        $this->setAttribute('query_params', $params);
    }

    public function getAccess()
    {
        $this->getAttribute('access');
    }

    public function setAccess($access): void
    {
        $this->setAttribute('access', $access);
    }

}
