<?php
defined('BASEPATH') or exit('No direct script access allowed');

// membuat class Cart
class Cart extends CI_Controller
{

  function  __construct()
  {
    parent::__construct();

    // menampilkan cart library
    $this->load->library('cart');

    // menampilkan product model
    $this->load->model('product');
  }

  // function index
  function index()
  {
    // deklarasi data dimasukkan ke array
    $data = array();
    // dari data dan masukkan ke contents
    $data['cartItems'] = $this->cart->contents();

    // menampilkan halaman cart view
    $this->load->view('admin/cart/index', $data);
  }

  // membuat fungsi update
  function updateItemQty()
  {
    $update = 0;

    // mengambil info cart item
    $rowid = $this->input->get('rowid');
    $qty = $this->input->get('qty');

    // update item pada cart item
    if (!empty($rowid) && !empty($qty)) {
      $data = array(
        'rowid' => $rowid,
        'qty'   => $qty
      );
      $update = $this->cart->update($data);
    }

    // mengembalikan nilai dengan respon
    echo $update ? 'ok' : 'err';
  }

  function removeItem($rowid)
  {
    // menghapus item dari cart
    $remove = $this->cart->remove($rowid);

    // mengarahkan ke halaman index
    redirect('admin/cart/index');
  }
}
