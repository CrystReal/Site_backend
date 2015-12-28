<?php

/**
 * Created by Alex Bond.
 * Date: 14.11.13
 * Time: 19:58
 */
class SupportModule extends CWebModule
{
    public function init(){
        $this->setImport([
            "support.models.*"
        ]);
    }
} 