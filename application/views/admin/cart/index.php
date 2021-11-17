<!DOCTYPE html>
<html lang="en">

<!-- Include jQuery library -->
<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>

<script>
  // Update item quantity
  function updateCartItem(obj, rowid) {
    $.get("<?php echo base_url('cart/updateItemQty/'); ?>", {
      rowid: rowid,
      qty: obj.value
    }, function(resp) {
      if (resp == 'ok') {
        location.reload();
      } else {
        alert('Cart update failed, please try again.');
      }
    });
  }
</script>

<head>
  <!-- menampilkan tampilan head -->
  <?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

  <!-- menampilkan tampilan navbar -->
  <?php $this->load->view("admin/_partials/navbar.php") ?>
  <div id="wrapper">

    <!-- menampilkan tampilan sidebar -->
    <?php $this->load->view("admin/_partials/sidebar.php") ?>

    <div id="content-wrapper">

      <div class="container-fluid">
        <!-- menampilkan tampilan breadcrumb -->
        <?php $this->load->view("admin/_partials/breadcrumb.php") ?>

        <h1>SHOPPING CART</h1>

        <!-- DataTables -->
        <div class="card mb-3">
          <!-- <div class="card-header"> -->
          <!-- <a href="<?php echo site_url('admin/PencatatanRT/add') ?>"><i class="fas fa-plus"></i> Add New</a> -->
          <!-- </div> -->
          <div class="card-body">

            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <!-- menampilkan tulisan yang dibuat dengan list dibawah ini -->
                    <th width="10%"></th>
                    <th width="30%">Product</th>
                    <th width="15%">Price</th>
                    <th width="13%">Quantity</th>
                    <th width="20%" class="text-right">Subtotal</th>
                    <th width="12%"></th>
                  </tr>
                </thead>
                <tbody>
                  <!-- jika total item lebih dari 0 maka lakukan perulangan foreacg -->
                  <?php if ($this->cart->total_items() > 0) {
                    foreach ($cartItems as $item) {    ?>
                      <tr>
                        <td>
                          <!-- memasukkan gambar atau image -->
                          <?php $imageURL = !empty($item["image"]) ? base_url('uploads/product_images/' . $item["image"]) : base_url('assets/images/pro-demo-img.jpeg'); ?>
                          <img src="<?php echo $imageURL; ?>" width="50" />
                        </td>
                        <!-- menampilkan nama item -->
                        <td><?php echo $item["name"]; ?></td>
                        <!-- menampilkan harga item -->
                        <td><?php echo rupiah($item["price"]) ?></td>
                        <!-- menampilkan update item -->
                        <td><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
                        <!-- menampilkan subtotal item -->
                        <td class="text-right"><?php echo rupiah($item["subtotal"]) ?></td>
                        <!-- tombol delete -->
                        <td class="text-right"><button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete item?')?window.location.href='<?php echo site_url('admin/Cart/removeItem/' . $item["rowid"]); ?>':false;"><i class="itrash"></i>Delete</button> </td>
                      </tr>
                      <!-- jika data kosong maka tampilkan dibawah ini -->
                    <?php }
                  } else { ?>
                    <tr>
                      <td colspan="6">
                        <p>Your cart is empty.....</p>
                      </td>
                    <?php } ?>
                    <!-- jika total item lebih dari 0 -->
                    <?php if ($this->cart->total_items() > 0) { ?>
                      <!-- maka jalankan dibawah ini dan cetak totalnya -->
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><strong>Cart Total</strong></td>
                      <td class="text-right"><strong><?php echo rupiah($this->cart->total()) ?></strong></td>
                      <td></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <?php $this->load->view("admin/_partials/footer.php") ?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- menampilkan halaman scrolltop -->
  <!-- menampilkan dan menjalankan program yang ada di file js.php -->
  <?php $this->load->view("admin/_partials/scrolltop.php") ?>
  <?php $this->load->view("admin/_partials/modal.php") ?>
  <?php $this->load->view("admin/_partials/js.php") ?>
</body>

</html>
