<?php

// src/AppBundle/Twig/Extension/AppExtension.php
namespace AppBundle\Twig\Extension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;
use AppBundle\Twig\Runtime\AppRuntime;

class AppExtension extends AbstractExtension
{
    public function getFilters()
    {
        return array(
            # new TwigFilter('price', array($this, 'formatPrice')),
            # the logic of this filter is now implemented in a different class
            new TwigFilter('price', array(AppRuntime::class, 'priceFilter'), array('is_safe' => array('html')))
        );
    }  
    
    public function getFunctions()
    {
        return array(
            new TwigFunction('area', array($this, 'calculateArea')),
        );
    }
    
    public function calculateArea(int $width, int $length)
    {
        return $width * $length;
    }
}