<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'libraries/fpdf/fpdf.php';

class MyFPDF extends FPDF
{
    public function __construct()
    {
        parent::__construct();
    }
}
