<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/wpcommand-compiler>
 * <https://en.michaeluno.jp/wpcommand>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class WPCAC_AdminPageFramework_Form_View___Attribute_SectionTable extends WPCAC_AdminPageFramework_Form_View___Attribute_Base {
    public $sContext = 'section_table';
    protected function _getAttributes()
    {
        return array( 'id' => 'section_table-' . $this->aArguments[ '_tag_id' ], 'class' => $this->getClassAttribute('form-table', 'wpcommand-section-table'), );
    }
}
