<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/wpcommand-compiler>
 * <https://en.michaeluno.jp/wpcommand>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

abstract class WPCAC_AdminPageFramework_View_Page extends WPCAC_AdminPageFramework_Model_Page {
    public function _replyToSetAdminPageTitleForTab($sAdminTitle, $sTitle)
    {
        $_sTabTitle = $this->oUtil->getElement($this->oProp->aInPageTabs, array( $this->oProp->getCurrentPageSlug(), $this->oProp->getCurrentTabSlug(), 'title' ));
        if (! $_sTabTitle) {
            return $sAdminTitle;
        }
        return $_sTabTitle . ' &lsaquo; ' . $sAdminTitle;
    }
    public function _replyToEnablePageMetaBoxes()
    {
        new WPCAC_AdminPageFramework_View__PageMetaboxEnabler($this);
    }
    public function _replyToEnqueuePageAssets()
    {
        new WPCAC_AdminPageFramework_View__Resource($this);
    }
    public function _replyToRenderPage()
    {
        $_sPageSlug = $this->oProp->getCurrentPageSlug();
        $this->_renderPage($_sPageSlug, $this->oProp->getCurrentTabSlug($_sPageSlug));
    }
    protected function _renderPage($sPageSlug, $sTabSlug=null)
    {
        $_oPageRenderer = new WPCAC_AdminPageFramework_View__PageRenderer($this, $sPageSlug, $sTabSlug);
        $_oPageRenderer->render();
    }
}
