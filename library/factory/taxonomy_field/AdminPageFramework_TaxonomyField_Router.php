<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/wpcommand-compiler>
 * <https://en.michaeluno.jp/wpcommand>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

abstract class WPCAC_AdminPageFramework_TaxonomyField_Router extends WPCAC_AdminPageFramework_Factory {
    public function __construct($oProp)
    {
        parent::__construct($oProp);
        if (! $this->oProp->bIsAdmin) {
            return;
        }
        $this->oUtil->registerAction('wp_loaded', array( $this, '_replyToDetermineToLoad' ));
        add_action('set_up_' . $this->oProp->sClassName, array( $this, '_replyToSetUpHooks' ));
    }
    protected function _isInThePage()
    {
        if (! $this->oProp->bIsAdmin) {
            return false;
        }
        if ($this->oProp->bIsAdminAjax) {
            return $this->_isValidAjaxReferrer();
        }
        if (! in_array($this->oProp->sPageNow, array( 'edit-tags.php', 'term.php' ))) {
            return false;
        }
        if (isset($_GET[ 'taxonomy' ]) && ! in_array($_GET[ 'taxonomy' ], $this->oProp->aTaxonomySlugs)) {
            return false;
        }
        return true;
    }
    protected function _isValidAjaxReferrer()
    {
        $_aReferrer = parse_url($this->oProp->sAjaxReferrer) + array( 'query' => '', 'path' => '' );
        parse_str($_aReferrer[ 'query' ], $_aQuery);
        $_sBaseName = basename($_aReferrer[ 'path' ]);
        if (! in_array($_sBaseName, array( 'edit-tags.php', 'term.php' ))) {
            return false;
        }
        $_sTaxonomy = $this->oUtil->getElement($this->oProp->aQuery, array( 'taxonomy' ), '');
        return in_array($_sTaxonomy, $this->oProp->aTaxonomySlugs);
    }
    public function _replyToSetUpHooks($oFactory)
    {
        foreach ($this->oProp->aTaxonomySlugs as $_sTaxonomySlug) {
            add_action("created_{$_sTaxonomySlug}", array( $this, '_replyToValidateOptions' ), 10, 2);
            add_action("edited_{$_sTaxonomySlug}", array( $this, '_replyToValidateOptions' ), 10, 2);
            add_action("{$_sTaxonomySlug}_add_form_fields", array( $this, '_replyToPrintFieldsWOTableRows' ));
            add_action("{$_sTaxonomySlug}_edit_form_fields", array( $this, '_replyToPrintFieldsWithTableRows' ));
            add_filter("manage_edit-{$_sTaxonomySlug}_columns", array( $this, '_replyToManageColumns' ), 10, 1);
            add_filter("manage_edit-{$_sTaxonomySlug}_sortable_columns", array( $this, '_replyToSetSortableColumns' ));
            add_action("manage_{$_sTaxonomySlug}_custom_column", array( $this, '_replyToPrintColumnCell' ), 10, 3);
        }
        $this->_load();
    }
}
