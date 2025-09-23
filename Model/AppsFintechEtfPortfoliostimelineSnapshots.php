<?php

namespace Apps\Fintech\Packages\Etf\Portfoliostimeline\Model;

use System\Base\BaseModel;

class AppsFintechEtfPortfoliostimelineSnapshots extends BaseModel
{
    public $id;

    public $timeline_id;

    public $date;

    public $snapshot;
}