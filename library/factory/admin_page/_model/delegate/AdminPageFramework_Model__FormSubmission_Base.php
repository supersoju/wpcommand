<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/wpcommand-compiler>
 * <https://en.michaeluno.jp/wpcommand>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

abstract class WPCAC_AdminPageFramework_Model__FormSubmission_Base extends WPCAC_AdminPageFramework_Form_Utility {
    protected function _getPressedSubmitButtonData(array $aPostElements, $sTargetKey='field_id')
    {
        foreach ($aPostElements as $_sInputID => $_aSubElements) {
            if (! isset($_aSubElements[ 'name' ])) {
                continue;
            }
            $_aNameKeys = explode('|', $_aSubElements[ 'name' ]);
            if (null === $this->getElement($_POST, $_aNameKeys, null)) {
                continue;
            }
            return $this->getElement($_aSubElements, $sTargetKey, null);
        }
        return null;
    }
    protected function _setSettingNoticeAfterValidation($bIsInputEmtpy)
    {
        if ($this->oFactory->hasSettingNotice()) {
            return;
        }
        $this->oFactory->setSettingNotice($this->getAOrB($bIsInputEmtpy, $this->oFactory->oMsg->get('option_cleared'), $this->oFactory->oMsg->get('option_updated')), 'updated', $this->oFactory->oProp->sOptionKey, false);
    }
}
