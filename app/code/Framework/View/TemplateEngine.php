<?php

namespace Framework\View;

use Framework\View\Element\BlockInterface;

class TemplateEngine
{
    protected $_currentBlock;

    public function render(BlockInterface $block, $fileName)
    {
        ob_start();
        try {
            $tmpBlock = $this->_currentBlock;
            $this->_currentBlock = $block;
            include $fileName;
            $this->_currentBlock = $tmpBlock;
        } catch (\Exception $exception) {
            ob_end_clean();
            throw $exception;
        }
        /** Get output buffer. */
        $output = ob_get_clean();
        return $output;
    }
}
