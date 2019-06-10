<?php
/**
 * Created by PhpStorm.
 * User: Альберт
 * Date: 24.05.2019
 * Time: 17:44
 */

namespace App\Updaters;


use App\Entity\Informer;

class UpdaterFactory
{
    /**
     * @param Informer $informer
     * @return InformerUpdaterInterface
     */
    public function getUpdater(Informer $informer){
        switch ($informer->getType()->getCode()){
            default:
                return new InformerUpdaterExample();
        }
    }
}