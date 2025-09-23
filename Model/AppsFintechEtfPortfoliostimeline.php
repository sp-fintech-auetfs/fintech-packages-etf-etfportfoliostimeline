<?php

namespace Apps\Fintech\Packages\Etf\Portfoliostimeline\Model;

use System\Base\BaseModel;

class AppsFintechEtfPortfoliostimeline extends BaseModel
{
    public $id;

    public $portfolio_id;

    public $recalculate;

    public $recalculate_from_date;

    public $snapshots_ids;

    // public $performance_chunks_id;

    // public $mode;

    // public $monthly_months;

    // public $monthly_day;

    // public $weekly_days;
}