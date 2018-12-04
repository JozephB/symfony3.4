<?php

// src/AppBundle/Twig/Runtime/AppRuntime.php
namespace AppBundle\Twig\Runtime;

use Twig\Extension\RuntimeExtensionInterface;

class AppRuntime implements RuntimeExtensionInterface
{
    public function __construct()
    {
        // this simple example doesn't define any dependency, but in your own
        // extensions, you'll need to inject services using this constructor
    }
    
    public function priceFilter($number, $decimals = 0, $decPoint = '.', $thousandsSep = ',')
    {
        if(!is_numeric($number))
            return '<mark><b style="color:#f44242; font-size: 12px; font-style: italic">Invalid</b></mark>';
        
            
        $price = number_format($number, $decimals, $decPoint, $thousandsSep);
        $price = "<b>".$price." &euro;</b>";
        
        return $price;
    }
}