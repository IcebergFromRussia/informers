<?php
/**
 * Created by PhpStorm.
 * User: Альберт
 * Date: 24.05.2019
 * Time: 16:51
 */

namespace App\Updaters;


use App\Entity\Informer;

interface InformerUpdaterInterface
{
    public function update(Informer $informer);
}