<?php defined('BASEPATH') OR exit('No direct script access allowed');

// membuat class overview
class Overview extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
	}

	public function index()
	{
        // menampilkan tampilan overview
        $this->load->view("admin/overview");
	}
}
