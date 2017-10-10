<?php


namespace OnTheFlyForm\Validator;


interface ValidatorInterface
{
    /**
     * @param array $validationRules , array of id => validationRules
     *          - validationRules: array of validationRule
     *          - validationRule: string,
     *                      validationRule: <ruleId> (<:> <argN>)*
     *                      ruleId: string representing the rule to test (for instance, minLength)
     *                      argN: argument for applying the rule test, depending on the ruleId,
     *                              see concrete implementation for more details.
     *
     *
     *
     *
     * @param array $model , the onTheFlyForm model, see documentation for more info
     *              The model is updated according to the rules tested.
     *              If a rule fails, it will fill the corresponding error field.
     *              For a given field, only the first validation error is considered (subsequent
     *              validation errors on the same fields are ignored).
     *
     *              For instance, if the validation rule with id=email fails,
     *              then the model will contain the errorEmail key filled with an error message.
     *              The error message can use tags, using the {tag} notation.
     *              Tags can be either:
     *                  - argument names, if the validation rules accept arguments
     *                  - field, if the model has labels, the label is used, otherwise the id is used.
     *                              Since ids are not particularly human friendly, it is always
     *                              recommended to set the labels, or to not use the {field} tag.
     *
     *
     *              The model also sets an extra _formErrors fields: an array containing
     *              every validation error message.
     *
     *
     *
     *
     *
     *
     *
     * @return bool
     */
    public function validate(array $validationRules, array &$model);
}