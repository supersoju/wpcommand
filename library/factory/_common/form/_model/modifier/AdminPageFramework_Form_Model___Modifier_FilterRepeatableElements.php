<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/wpcommand-compiler>
 * <https://en.michaeluno.jp/wpcommand>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class WPCAC_AdminPageFramework_Form_Model___Modifier_FilterRepeatableElements extends WPCAC_AdminPageFramework_Form_Model___Modifier_Base {
    public $aSubject = array();
    public $aDimensionalKeys = array();
    public function __construct()
    {
        $_aParameters = func_get_args() + array( $this->aSubject, $this->aDimensionalKeys, );
        $this->aSubject = $_aParameters[ 0 ];
        $this->aDimensionalKeys = array_unique($_aParameters[ 1 ]);
    }
    public function get()
    {
        foreach ($this->aDimensionalKeys as $_sFlatFieldAddress) {
            $this->unsetDimensionalArrayElement($this->aSubject, explode('|', $_sFlatFieldAddress));
        }
        return $this->aSubject;
    }
}
