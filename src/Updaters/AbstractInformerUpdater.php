<?php
/**
 * Created by PhpStorm.
 * User: Альберт
 * Date: 05.06.2019
 * Time: 7:39
 */

namespace App\Updaters;


use App\Entity\Informer;

abstract class AbstractInformerUpdater implements InformerUpdaterInterface
{

    public function update(Informer $informer)
    {
        // TODO: Implement update() method.
    }
}