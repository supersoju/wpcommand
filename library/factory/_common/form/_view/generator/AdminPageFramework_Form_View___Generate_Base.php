<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/wpcommand-compiler>
 * <https://en.michaeluno.jp/wpcommand>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

abstract class WPCAC_AdminPageFramework_Form_View___Generate_Base extends WPCAC_AdminPageFramework_FrameworkUtility {
    public $aArguments = array();
    public function __construct()
    {
        $_aParameters = func_get_args() + array( $this->aArguments, );
        $this->aArguments = $_aParameters[ 0 ];
    }
    public function get()
    {
        return '';
    }
}
