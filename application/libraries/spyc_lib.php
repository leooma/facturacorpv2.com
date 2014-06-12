<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of my_spyc
 *
 * @author desarrollo5
 */
class spyc_lib {
    public function __construct() {
        require_once(str_replace("\\","/",APPPATH).'libraries/spyc'.EXT); //If we are executing this script on a Windows server
    }
}

?>
