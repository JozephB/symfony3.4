<?php

namespace AppBundle\Twig\Extension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use AppBundle\Twig\Runtime\TwigBootstrapRuntime;

class TwigBootstrapExtension extends AbstractExtension{
    
    public function getFilters()
    {
        return array(
            new TwigFilter('badge', array(TwigBootstrapRuntime::class, 'badgeFilter'), array('is_safe' => array('html'))),
            new TwigFilter('booleanBadge', array(TwigBootstrapRuntime::class, 'booleanBadgeFilter'), array('is_safe' => array('html')))
        );
    } 
}