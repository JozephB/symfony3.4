<?php
# https://www.youtube.com/watch?v=j0ijWbv9a7Q&t=1084s

namespace AppBundle\Twig\Runtime;


use Twig\Extension\RuntimeExtensionInterface;

class TwigBootstrapRuntime implements RuntimeExtensionInterface{
    
    public function __construct()
    {
        // this simple example doesn't define any dependency, but in your own
        // extensions, you'll need to inject services using this constructor
    }
    
    /**
     * 
     * @param string $content
     * @param array $options
     * @return string
     */
    public function badgeFilter($content, array $options = [])
    {
        $defaultOptions = [
            'color' => 'primary',
            'rounded' => false,
        ];
        
        $options = array_merge($defaultOptions, $options);
        $pill = $options['rounded'] ? 'badge-pill' : '';
        
        $template = '<span class="badge badge-%s %s">%s</span>';
        
        return sprintf($template, $options['color'], $pill, $content);
    }
    
    /**
     * 
     * @param unknown $content
     * @param array $options
     */
    public function booleanBadgeFilter($content, array $options = []){
        
        $defaultOptions = [
            'trueText'  => 'oui',
            'falseText' => 'Non'
        ];
        
        $options = array_merge($defaultOptions, $options);
        
        if($content)
            $this->badgeFilter($options['trueText']);
        else 
            $this->badgeFilter($options['falseText'], ['color' => 'danger']);
        
    }
}