<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/wpcommand-compiler>
 * <https://en.michaeluno.jp/wpcommand>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

abstract class WPCAC_AdminPageFramework_PostType extends WPCAC_AdminPageFramework_PostType_Controller {
    protected $_sStructureType = 'post_type';
    public function __construct($sPostType, $aArguments=array(), $sCallerPath=null, $sTextDomain='wpcommand')
    {
        if (empty($sPostType)) {
            return;
        }
        $_sPropertyClassName = isset($this->aSubClassNames[ 'oProp' ]) ? $this->aSubClassNames[ 'oProp' ] : 'WPCAC_AdminPageFramework_Property_' . $this->_sStructureType;
        $this->oProp = new $_sPropertyClassName($this, $this->_getCallerScriptPath($sCallerPath), get_class($this), 'publish_posts', $sTextDomain, $this->_sStructureType);
        $this->oProp->sPostType = WPCAC_AdminPageFramework_WPUtility::sanitizeSlug($sPostType);
        $this->oProp->aPostTypeArgs = $aArguments;
        parent::__construct($this->oProp);
    }
    private function _getCallerScriptPath($sCallerPath)
    {
        $sCallerPath = trim($sCallerPath);
        if ($sCallerPath) {
            return $sCallerPath;
        }
        if (! is_admin()) {
            return null;
        }
        $_sPageNow = WPCAC_AdminPageFramework_Utility::getElement($GLOBALS, 'pagenow');
        if (in_array($_sPageNow, array( 'edit.php', 'post.php', 'post-new.php', 'plugins.php', 'tags.php', 'edit-tags.php', 'term.php' ))) {
            return WPCAC_AdminPageFramework_Utility::getCallerScriptPath(__FILE__);
        }
        return null;
    }
}
