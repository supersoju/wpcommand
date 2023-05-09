<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/wpcommand-compiler>
 * <https://en.michaeluno.jp/wpcommand>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class WPCAC_AdminPageFramework_Property_network_admin_page extends WPCAC_AdminPageFramework_Property_admin_page {
    public $_sPropertyType = 'network_admin_page';
    public $sStructureType = 'network_admin_page';
    public $sSettingNoticeActionHook = 'network_admin_notices';
    protected function _getOptions()
    {
        return $this->addAndApplyFilter($this->getElement($GLOBALS, array( 'aWPCAC_AdminPageFramework', 'aPageClasses', $this->sClassName )), 'options_' . $this->sClassName, $this->sOptionKey ? get_site_option($this->sOptionKey, array()) : array());
    }
    public function updateOption($aOptions=null)
    {
        if ($this->_bDisableSavingOptions) {
            return;
        }
        return update_site_option($this->sOptionKey, $aOptions !== null ? $aOptions : $this->aOptions);
    }
}
