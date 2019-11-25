<?php

class WPCAC_Plugin_Upgrader_Skin extends Plugin_Installer_Skin {

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
