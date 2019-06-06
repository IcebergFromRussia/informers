<?php
/**
 * Created by PhpStorm.
 * User: Альберт
 * Date: 05.06.2019
 * Time: 22:53
 */

namespace App\Constraints;


use JsonSchema\Validator;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class JsonSchemaValidator extends ConstraintValidator
{
    /**
     * @var ExpressionLanguage
     */
    private $expressionLanguage;

    public function __construct(ExpressionLanguage $expressionLanguage = null)
    {
        $this->expressionLanguage = empty($expressionLanguage)? new ExpressionLanguage():$expressionLanguage;
    }

    /**
     * Checks if the passed value is valid.
     *
     * @param mixed $value The value that should be validated
     * @param Constraint $constraint The constraint for the validation
     */
    public function validate($value, Constraint $constraint)
    {
        /**
         * @var JsonSchema $constraint
         */
        $variables = [];
        $variables['value'] = $value;
        $variables['this'] = $this->context->getObject();
        $schema = json_decode($this->expressionLanguage->evaluate($constraint->schema, $variables));
        $data = $constraint->data;

        $validator = new Validator;
        $validator->validate($data, $schema);
        if (!$validator->isValid()) {
            $error = '';
            foreach ($validator->getErrors() as $error) {
                $error .= sprintf("[%s] %s\n", $error['property'], $error['message']);
            }
            $this->context->addViolation($error);
        }
    }
}