<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/wpcommand-compiler>
 * <https://en.michaeluno.jp/wpcommand>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class WPCAC_AdminPageFramework_Form_post_meta_box extends WPCAC_AdminPageFramework_Form_Meta {
    public $sStructureType = 'post_meta_box';
    public function construct()
    {
        $this->_addDefaultResources();
    }
    private function _addDefaultResources()
    {
        $_oCSS = new WPCAC_AdminPageFramework_Form_View___CSS_meta_box;
        $this->addResource('internal_styles', $_oCSS->get());
    }
}
