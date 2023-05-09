<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/wpcommand-compiler>
 * <https://en.michaeluno.jp/wpcommand>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

abstract class WPCAC_AdminPageFramework_Model_Menu extends WPCAC_AdminPageFramework_Controller_Page {
    public function __construct($sOptionKey=null, $sCallerPath=null, $sCapability='manage_options', $sTextDomain='wpcommand')
    {
        parent::__construct($sOptionKey, $sCallerPath, $sCapability, $sTextDomain);
        new WPCAC_AdminPageFramework_Model_Menu__RegisterMenu($this);
    }
}
