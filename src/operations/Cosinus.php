<?php

namespace App\Calculator\Operations;

require_once("OperationInterface.php");

class Cosinus
{
    public function calculate($a)
    {
        
        return cos(deg2rad($a));
    }
}

?>