<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/wpcommand-compiler>
 * <https://en.michaeluno.jp/wpcommand>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class WPCAC_AdminPageFramework_Form_View___CSS_widget extends WPCAC_AdminPageFramework_Form_View___CSS_Base {
    protected function _get()
    {
        return $this->_getWidgetRules();
    }
    private function _getWidgetRules()
    {
        return <<<CSSRULES
.widget .wpcommand-section .form-table>tbody>tr>td,.widget .wpcommand-section .form-table>tbody>tr>th{display:inline-block;width:100%;padding:0;float:right;clear:right}.widget .wpcommand-field,.widget .wpcommand-input-label-container{width:100%}.widget .sortable .wpcommand-field{padding:4% 4.4% 3.2% 4.4%;width:91.2%}.widget .wpcommand-field input{margin-bottom:.1em;margin-top:.1em}.widget .wpcommand-field input[type=text],.widget .wpcommand-field textarea{width:100%}@media screen and (max-width:782px){.widget .wpcommand-fields{width:99.2%}.widget .wpcommand-field input[type='checkbox'],.widget .wpcommand-field input[type='radio']{margin-top:0}}
CSSRULES;
    }
    protected function _getVersionSpecific()
    {
        $_sCSSRules = '';
        if (version_compare($GLOBALS[ 'wp_version' ], '3.8', '<')) {
            $_sCSSRules .= <<<CSSRULES
.widget .wpcommand-section table.mceLayout{table-layout:fixed}
CSSRULES;
        }
        if (version_compare($GLOBALS[ 'wp_version' ], '3.8', '>=')) {
            $_sCSSRules .= <<<CSSRULES
.widget .wpcommand-section .form-table th{font-size:13px;font-weight:400;margin-bottom:.2em}.widget .wpcommand-section .form-table{margin-top:1em}
CSSRULES;
        }
        return $_sCSSRules;
    }
}
