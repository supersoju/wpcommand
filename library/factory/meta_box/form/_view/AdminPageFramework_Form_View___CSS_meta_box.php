<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/wpcommand-compiler>
 * <https://en.michaeluno.jp/wpcommand>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class WPCAC_AdminPageFramework_Form_View___CSS_meta_box extends WPCAC_AdminPageFramework_Form_View___CSS_Base {
    protected function _get()
    {
        return $this->_getRules();
    }
    private function _getRules()
    {
        return <<<CSSRULES
.postbox .title-colon{margin-left:.2em}.postbox .wpcommand-section .form-table>tbody>tr>td,.postbox .wpcommand-section .form-table>tbody>tr>th{display:inline-block;width:100%;padding:0;float:right;clear:right}.postbox .wpcommand-field{width:auto}.postbox .wpcommand-field{max-width:100%}.postbox .sortable .wpcommand-field{max-width:84%;width:auto}.postbox .wpcommand-section .form-table>tbody>tr>th{font-size:13px;line-height:1.5;margin:1em 0;font-weight:700}#poststuff .metabox-holder .postbox-container .wpcommand-section-title h3{border:none;font-weight:700;font-size:1.12em;margin:1em 0;padding:0;font-family:'Open Sans',sans-serif;cursor:inherit;-webkit-user-select:inherit;-moz-user-select:inherit;user-select:inherit;text-shadow:none;-webkit-box-shadow:none;box-shadow:none;background:none}#poststuff .metabox-holder .postbox-container .wpcommand-collapsible-title h3{margin:0}#poststuff .metabox-holder .postbox-container h4{margin:1em 0;font-size:1.04em}#poststuff .metabox-holder .postbox-container .wpcommand-section-tab h4{margin:0}@media screen and (min-width:783px){#poststuff #post-body.columns-2 #side-sortables .postbox .wpcommand-section .form-table input[type=text]{width:98%}}
CSSRULES;
    }
}
