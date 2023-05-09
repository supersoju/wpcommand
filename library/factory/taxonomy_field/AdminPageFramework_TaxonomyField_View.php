<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/wpcommand-compiler>
 * <https://en.michaeluno.jp/wpcommand>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

abstract class WPCAC_AdminPageFramework_TaxonomyField_View extends WPCAC_AdminPageFramework_TaxonomyField_Model {
    public function content($sContent)
    {
        return $sContent;
    }
    public function _replyToGetInputNameAttribute()
    {
        $_aParams = func_get_args() + array( null, null, null );
        $_aField = $_aParams[ 1 ];
        $_sKey = ( string ) $_aParams[ 2 ];
        $_sKey = $this->oUtil->getAOrB('0' !== $_sKey && empty($_sKey), '', "[{$_sKey}]");
        return $_aField['field_id'] . $_sKey;
    }
    public function _replyToGetFlatInputName()
    {
        $_aParams = func_get_args() + array( null, null, null );
        $_aField = $_aParams[ 1 ];
        $_sKey = ( string ) $_aParams[ 2 ];
        $_sKey = $this->oUtil->getAOrB('0' !== $_sKey && empty($_sKey), '', "|{$_sKey}");
        return "{$_aField['field_id']}{$_sKey}";
    }
    public function _replyToPrintFieldsWOTableRows($oTerm)
    {
        echo $this->_getFieldsOutput(isset($oTerm->term_id) ? $oTerm->term_id : null, false);
    }
    public function _replyToPrintFieldsWithTableRows($oTerm)
    {
        echo $this->_getFieldsOutput(isset($oTerm->term_id) ? $oTerm->term_id : null, true);
    }
    private function _getFieldsOutput($iTermID, $bRenderTableRow)
    {
        $_aOutput = array();
        $_aOutput[] = wp_nonce_field($this->oProp->sClassHash, $this->oProp->sClassHash, true, false);
        $this->_setOptionArray($iTermID, $this->oProp->sOptionKey);
        $_aOutput[] = $this->oForm->get($bRenderTableRow);
        $_sOutput = $this->oUtil->addAndApplyFilters($this, 'content_' . $this->oProp->sClassName, $this->content(implode(PHP_EOL, $_aOutput)));
        $this->oUtil->addAndDoActions($this, 'do_' . $this->oProp->sClassName, $this);
        return $_sOutput;
    }
    public function _replyToPrintColumnCell($vValue, $sColumnSlug, $sTermID)
    {
        $_sCellHTML = '';
        $_sTaxonomy = $this->oUtil->getHTTPQueryGET('taxonomy');
        if (isset($_sTaxonomy)) {
            $_sCellHTML = $this->oUtil->addAndApplyFilter($this, "cell_{$_sTaxonomy}", $vValue, $sColumnSlug, $sTermID);
        }
        $_sCellHTML = $this->oUtil->addAndApplyFilter($this, "cell_{$this->oProp->sClassName}", $_sCellHTML, $sColumnSlug, $sTermID);
        $_sCellHTML = $this->oUtil->addAndApplyFilter($this, "cell_{$this->oProp->sClassName}_{$sColumnSlug}", $_sCellHTML, $sTermID);
        echo $_sCellHTML;
    }
}
