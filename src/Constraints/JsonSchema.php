<?php
/**
 * Created by PhpStorm.
 * User: Альберт
 * Date: 05.06.2019
 * Time: 22:45
 */

namespace App\Constraints;


use Symfony\Component\Validator\Constraint;

/**
 * Class JsonSchema
 * @Annotation
 * @Target({"CLASS", "PROPERTY"})
 *
 * @package App\Constraints
 */
class JsonSchema extends Constraint
{
    public $schema;
    public $data;

    public $message = 'Невалидный json';

    public function getDefaultOption()
    {
        return ['schema', 'data'];
    }

    public function getTargets()
    {
        return [self::CLASS_CONSTRAINT, self::PROPERTY_CONSTRAINT];
    }
}