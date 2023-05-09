<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/wpcommand-compiler>
 * <https://en.michaeluno.jp/wpcommand>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class WPCAC_AdminPageFramework_FieldType_file extends WPCAC_AdminPageFramework_FieldType_text {
    public $aFieldTypeSlugs = array( 'file', );
    protected $aDefaultKeys = array( 'attributes' => array( 'accept' => 'audio/*|video/*|image/*|MIME_type', ), );
    protected function getField($aField)
    {
        return parent::getField($aField) . $this->getHTMLTag('input', array( 'type' => 'hidden', 'value' => '', 'name' => $aField[ 'attributes' ][ 'name' ] . '[_dummy_value]', )) . $this->getHTMLTag('input', array( 'type' => 'hidden', 'name' => '__unset_' . $aField[ '_structure_type' ] . '[' . $aField[ '_input_name_flat' ] . '|_dummy_value' . ']', 'value' => $aField[ '_input_name_flat' ] . '|_dummy_value', 'class' => 'unset-element-names element-address', ));
    }
}
