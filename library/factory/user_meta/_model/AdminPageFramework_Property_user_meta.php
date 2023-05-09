<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/wpcommand-compiler>
 * <https://en.michaeluno.jp/wpcommand>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class WPCAC_AdminPageFramework_Property_user_meta extends WPCAC_AdminPageFramework_Property_post_meta_box {
    public $_sPropertyType = 'user_meta';
    public $_sFormRegistrationHook = 'admin_enqueue_scripts';
    protected function _getOptions()
    {
        return array();
    }
}
