<?php
/**
 * Created by PhpStorm.
 * User: Альберт
 * Date: 24.05.2019
 * Time: 16:50
 */

namespace App\Updaters;


use App\Entity\Informer;
use App\Entity\InformerStatus;

class InformerUpdaterExample implements InformerUpdaterInterface
{

    public function update(Informer $informer)
    {
        $informer->setStatus(InformerStatus::UPDATED);
        $informer->setData(['informer'=>'updated']);
    }
}