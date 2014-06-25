<?php

namespace Giorgionetg\CmsLib;

use Giorgionetg\CmsLib\Installation;
use Giorgionetg\CmsLib\Router;
use Giorgionetg\CmsLib\Page;

class CmsTG {
    
    public function __construct(Installation $settings)
    {
        $this->Router = new Router($settings);
        $this->Page = new Page();
    }
    
    public function getContent($yourContentSlug = null)
    {
        if ($yourContentSlug === null) {
            $this->Page->setTitle('Generic Request');
            $this->Page->setDescription('Generic Description');
            $this->Page->setContent('Generic Content');
        } else {
            $route = $this->Router->isARoute($yourContentSlug);
            $this->BootStrap($route);
        }
        return $this->Page;
    }
    
    public function BootStrap(Router $route)
    {
        
    }
    
}