<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/wpcommand-compiler>
 * <https://en.michaeluno.jp/wpcommand>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class WPCAC_AdminPageFramework_Resource_taxonomy_field extends WPCAC_AdminPageFramework_Resource_post_meta_box {
    protected function _enqueueSRCByCondition($aEnqueueItem)
    {
        $this->_enqueueSRC($aEnqueueItem);
    }
}
