<?php
/**
 * Created by PhpStorm.
 * User: Альберт
 * Date: 24.05.2019
 * Time: 17:37
 */

namespace App\Entity;


class InformerStatus
{
    public const NEED_TO_UPDATE  = 1;
    public const UPDATED         = 2;
    public const ERROR           = 3;
}