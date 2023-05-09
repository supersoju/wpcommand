<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/wpcommand-compiler>
 * <https://en.michaeluno.jp/wpcommand>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class WPCAC_AdminPageFramework_Form_View___CSS_term_meta extends WPCAC_AdminPageFramework_Form_View___CSS_Base {
    protected function _get()
    {
        return $this->_getRules();
    }
    private function _getRules()
    {
        return <<<CSSRULES
.wpcommand-form-table-outer-row-term_meta,.wpcommand-form-table-outer-row-term_meta>td{margin:0;padding:0}.wpcommand-form-table-term_meta>tbody>tr>td{margin-left:0;padding-left:0}.wpcommand-form-table-term_meta .wpcommand-sectionset,.wpcommand-form-table-term_meta .wpcommand-section{margin-bottom:0}.wpcommand-form-table-term_meta.add-new-term .title-colon{margin-left:.2em}.wpcommand-form-table-term_meta.add-new-term .wpcommand-section .form-table>tbody>tr>td,.wpcommand-form-table-term_meta.add-new-term .wpcommand-section .form-table>tbody>tr>th{display:inline-block;width:100%;padding:0;float:right;clear:right}.wpcommand-form-table-term_meta.add-new-term .wpcommand-field{width:auto}.wpcommand-form-table-term_meta.add-new-term .wpcommand-field{max-width:100%}.wpcommand-form-table-term_meta.add-new-term .sortable .wpcommand-field{width:auto}.wpcommand-form-table-term_meta.add-new-term .wpcommand-section .form-table>tbody>tr>th{font-size:13px;line-height:1.5;margin:0;font-weight:700}.wpcommand-form-table-term_meta .wpcommand-section-title h3{border:none;font-weight:700;font-size:1.12em;margin:0;padding:0;font-family:'Open Sans',sans-serif;cursor:inherit;-webkit-user-select:inherit;-moz-user-select:inherit;user-select:inherit}.wpcommand-form-table-term_meta .wpcommand-collapsible-title h3{margin:0}.wpcommand-form-table-term_meta h4{margin:1em 0;font-size:1.04em}.wpcommand-form-table-term_meta .wpcommand-section-tab h4{margin:0}
CSSRULES;
    }
}
