<?php

namespace Framework\View\Element;

abstract class AbstractBlock extends \Framework\DataObject implements BlockInterface
{
    protected $templatePath = '';

    public function toHtml() {
        $templateEngine = new \Framework\View\TemplateEngine();
        $realpath = substr($this->templatePath, 0, strpos($this->templatePath, '::'));
        $realFileName = substr($this->templatePath, strpos($this->templatePath, '::') + 2);
        return $templateEngine->render(
            $this, BASE_DIR. 'code' . DIRECTORY_SEPARATOR . $realpath . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . $realFileName
        );
    }
}