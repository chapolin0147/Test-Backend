<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RedirectStats extends Model
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
        return $this->getAttribute('url_id');
    }

    public function setIdUrl($id): void
    {
        $this->setAttribute('url_id', $id);
    }

    public function getUniqueIp()
    {
        return $this->getAttribute('unique_ip');
    }

    public function setUniqueIp($unique_ip): void
    {
        $this->setAttribute('unique_ip', $unique_ip);
    }

    public function getTotalAccess()
    {
        return $this->getAttribute('acess_total');
    }

    public function setTotalAccess($acess_total): void
    {
        $this->setAttribute('acess_total', $acess_total);
    }
    public function getTopReferrers()
    {
        return $this->getAttribute('top_referrers');
    }

    public function setTopReferrers($top_referrers): void
    {
        $this->setAttribute('top_referrers', $top_referrers);
    }

}
