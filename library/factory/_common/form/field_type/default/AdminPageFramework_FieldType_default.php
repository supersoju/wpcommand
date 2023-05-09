<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/wpcommand-compiler>
 * <https://en.michaeluno.jp/wpcommand>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class WPCAC_AdminPageFramework_FieldType_default extends WPCAC_AdminPageFramework_FieldType {
    public $aDefaultKeys = array();
    public function _replyToGetField($aField)
    {
        return $aField['before_label'] . "<div class='wpcommand-input-label-container'>" . "<label for='{$aField['input_id']}'>" . $aField['before_input'] . ($aField['label'] && ! $aField['repeatable'] ? "<span " . $this->getLabelContainerAttributes($aField, 'wpcommand-input-label-string') . ">" . $aField[ 'label' ] . "</span>" : "") . $aField['value'] . $aField['after_input'] . "</label>" . "</div>" . $aField['after_label'] ;
    }
}
