<?php
defined('BASEPATH') or exit('No direct script access allowed');
// membuat class produk
class Products extends CI_Controller
{

	function  __construct()
	{
		parent::__construct();

		// menampilkan cart library
		$this->load->library('cart');

		// menampilkan product model
		$this->load->model('product');
	}

	// membuat fungsi index
	function index()
	{
		// deklarasi data dimasukkan ke array
		$data = array();

		// mengambil data dari database
		$data['products'] = $this->product->getRows();

		// menampilkan product list view
		$this->load->view('admin/products/index', $data);
	}

	// membuat fungsi tambah barang
	function addToCart($proID)
	{

		// mencari produk dari ID
		$product = $this->product->getRows($proID);

		// menambahkan produk dengan id
		$data = array(
			'id'    => $product['id'],
			'qty'    => 1,
			'price'    => $product['price'],
			'name'    => $product['name'],
			'image' => $product['image']
		);
		$this->cart->insert($data);

		// mengarahkan ke halaman cart
		redirect('admin/cart/');
	}
}
