<?php
/**
 * Created by PhpStorm.
 * User: Альберт
 * Date: 24.05.2019
 * Time: 16:27
 */

namespace App\Service;


use App\Entity\Informer;
use App\Entity\InformerStatus;
use App\Updaters\UpdaterFactory;

class InformerUpdaterService
{

    /**
     * @var UpdaterFactory
     */
    private $updaterFactory;

    public function __construct(UpdaterFactory $updaterFactory)
    {
        $this->updaterFactory = $updaterFactory;
    }

    public function updateInformer(Informer $informer){
        $updater = $this->updaterFactory->getUpdater($informer);
        $updater->update($informer);
    }
}