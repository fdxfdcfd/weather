<?php

namespace Cms\Controller;

class Index implements \Framework\App\ActionInterface
{
    public function execute()
    {
        $block = new \Cms\Block\Index();
        echo $block->toHtml();
    }
}