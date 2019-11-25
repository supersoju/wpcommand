<?php

class WPRP_Theme_Upgrader_Skin extends Theme_Installer_Skin {

    var $feedback;
    var $error;

    function error( $error ) {
        $this->error = $error;
    }

    function before() { }

    function after() { }

    function header() { }

    function footer() { }

}
