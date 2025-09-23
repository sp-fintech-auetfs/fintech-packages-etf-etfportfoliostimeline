<?php

namespace Apps\Fintech\Packages\Etf\Portfoliostimeline\Install;

use Apps\Fintech\Packages\Etf\Portfoliostimeline\Install\Schema\EtfPortfoliostimeline;
use Apps\Fintech\Packages\Etf\Portfoliostimeline\Install\Schema\EtfPortfoliostimelinePerformanceChunks;
use Apps\Fintech\Packages\Etf\Portfoliostimeline\Install\Schema\EtfPortfoliostimelineSnapshots;
use Apps\Fintech\Packages\Etf\Portfoliostimeline\Model\AppsFintechEtfPortfoliostimeline;
use Apps\Fintech\Packages\Etf\Portfoliostimeline\Model\AppsFintechEtfPortfoliostimelinePerformanceChunks;
use Apps\Fintech\Packages\Etf\Portfoliostimeline\Model\AppsFintechEtfPortfoliostimelineSnapshots;
use System\Base\BasePackage;
use System\Base\Providers\ModulesServiceProvider\DbInstaller;

class Install extends BasePackage
{
    protected $databases;

    protected $dbInstaller;

    public function init()
    {
        $this->databases =
            [
                'apps_fintech_etf_portfoliostimeline'  => [
                    'schema'        => new EtfPortfoliostimeline,
                    'model'         => new AppsFintechEtfPortfoliostimeline
                ],
                'apps_fintech_etf_portfoliostimeline_snapshots'  => [
                    'schema'        => new EtfPortfoliostimelineSnapshots,
                    'model'         => new AppsFintechEtfPortfoliostimelineSnapshots
                ],
                'apps_fintech_etf_portfoliostimeline_performance_chunks'  => [
                    'schema'        => new EtfPortfoliostimelinePerformanceChunks,
                    'model'         => new AppsFintechEtfPortfoliostimelinePerformanceChunks
                ]
            ];

        $this->dbInstaller = new DbInstaller;

        return $this;
    }

    public function install()
    {
        $this->preInstall();

        $this->installDb();

        $this->postInstall();

        return true;
    }

    protected function preInstall()
    {
        return true;
    }

    public function installDb()
    {
        $this->dbInstaller->installDb($this->databases);

        return true;
    }

    public function postInstall()
    {
        //Do anything after installation.
        return true;
    }

    public function truncate()
    {
        $this->dbInstaller->truncate($this->databases);
    }

    public function uninstall($remove = false)
    {
        if ($remove) {
            //Check Relationship
            //Drop Table(s)
            $this->dbInstaller->uninstallDb($this->databases);
        }

        return true;
    }
}