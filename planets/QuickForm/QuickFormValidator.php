<?php


namespace QuickForm;



class QuickFormValidator
{

    public function test($ruleName, array $ruleArgs, $subject)
    {
        switch ($ruleName) {
            case 'required':
                if (!is_array($subject)) {
                    if (trim($subject) === '') {
                        return "this field cannot be empty";
                    }
                    return true;
                } else {
                    $this->error("not implemented yet");
                }
                break;

            case 'minChar': // rulesArgs: [$minChar]
                if (!is_array($subject)) {
                    $length = mb_strlen(trim($subject));
                    if ($length < $ruleArgs[0]) {
                        return [
                            "this field must contain at least {minChar} characters",
                            ['minChar' => $ruleArgs[0]],
                        ];
                    }
                    return true;
                } else {
                    $this->error("not implemented yet");
                }
                break;
            default:
                $this->error('FormValidator: unknown rule ' . $ruleName);
                break;
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    private function error($m)
    {
        throw new \Exception($m);
    }
}