<?php


namespace Umail\VarLoader;


class ExampleVarLoader implements VarLoaderInterface
{


    public function getVariables($email)
    {
        return [
            "name" => $this->getName($email),
            "website" => "My Website",
        ];
    }

    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    private function getName($email)
    {
        $p = explode('.', $email);
        return $p[0];
    }

}