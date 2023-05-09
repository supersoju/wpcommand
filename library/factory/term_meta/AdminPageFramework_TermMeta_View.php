<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/wpcommand-compiler>
 * <https://en.michaeluno.jp/wpcommand>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

abstract class WPCAC_AdminPageFramework_TermMeta_View extends WPCAC_AdminPageFramework_TermMeta_Model {
    public function _replyToGetInputNameAttribute()
    {
        $_aParams = func_get_args() + array( null, null, null );
        return $_aParams[ 0 ];
    }
    public function _replyToGetFlatInputName()
    {
        $_aParams = func_get_args() + array( null, null, null );
        return $_aParams[ 0 ];
    }
}
