<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/wpcommand-compiler>
 * <https://en.michaeluno.jp/wpcommand>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

abstract class WPCAC_AdminPageFramework_TaxonomyField_Model extends WPCAC_AdminPageFramework_TaxonomyField_Router {
    public function _replyToManageColumns($aColumns)
    {
        return $this->_getFilteredColumnsByFilterPrefix($this->oUtil->getAsArray($aColumns), 'columns_', $this->oUtil->getHTTPQueryGET('taxonomy', ''));
    }
    public function _replyToSetSortableColumns($aSortableColumns)
    {
        return $this->_getFilteredColumnsByFilterPrefix($this->oUtil->getAsArray($aSortableColumns), 'sortable_columns_', $this->oUtil->getHTTPQueryGET('taxonomy', ''));
    }
    private function _getFilteredColumnsByFilterPrefix(array $aColumns, $sFilterPrefix, $sTaxonomy)
    {
        if ($sTaxonomy) {
            $aColumns = $this->oUtil->addAndApplyFilter($this, $sFilterPrefix . $this->oUtil->getHTTPQueryGET('taxonomy', ''), $aColumns);
        }
        return $this->oUtil->addAndApplyFilter($this, "{$sFilterPrefix}{$this->oProp->sClassName}", $aColumns);
    }
    public function _replyToGetSavedFormData()
    {
        return array();
    }
    protected function _setOptionArray($iTermID=null, $sOptionKey=null)
    {
        $this->oForm->aSavedData = $this->_getSavedFormData($iTermID, $sOptionKey);
    }
    private function _getSavedFormData($iTermID, $sOptionKey)
    {
        return $this->oUtil->addAndApplyFilter($this, 'options_' . $this->oProp->sClassName, $this->_getSavedTermFormData($iTermID, $sOptionKey));
    }
    private function _getSavedTermFormData($iTermID, $sOptionKey)
    {
        $_aSavedTaxonomyFormData = $this->_getSavedTaxonomyFormData($sOptionKey);
        return $this->oUtil->getElementAsArray($_aSavedTaxonomyFormData, $iTermID);
    }
    private function _getSavedTaxonomyFormData($sOptionKey)
    {
        return get_option($sOptionKey, array());
    }
    public function _replyToValidateOptions($iTermID)
    {
        if (! $this->_shouldProceedValidation()) {
            return;
        }
        $_aTaxonomyFormData = $this->_getSavedTaxonomyFormData($this->oProp->sOptionKey);
        $_aSavedFormData = $this->_getSavedTermFormData($iTermID, $this->oProp->sOptionKey);
        $_aSubmittedFormData = $this->oForm->getSubmittedData($this->oForm->getHTTPRequestSanitized($_POST));
        $_aSubmittedFormData = $this->oUtil->addAndApplyFilters($this, 'validation_' . $this->oProp->sClassName, call_user_func_array(array( $this, 'validate' ), array( $_aSubmittedFormData, $_aSavedFormData, $this )), $_aSavedFormData, $this);
        $_aTaxonomyFormData[ $iTermID ] = $this->oUtil->uniteArrays($_aSubmittedFormData, $_aSavedFormData);
        update_option($this->oProp->sOptionKey, $_aTaxonomyFormData);
    }
    protected function _shouldProceedValidation()
    {
        if (! isset($_POST[ $this->oProp->sClassHash ])) {
            return false;
        }
        if (! wp_verify_nonce($_POST[ $this->oProp->sClassHash ], $this->oProp->sClassHash)) {
            return false;
        }
        return true;
    }
}
