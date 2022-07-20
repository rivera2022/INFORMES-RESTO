<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Mtrabajador extends CI_Model {
  function __construct(){
    parent:: __construct();
    $this->load->library('session');
  }

}
