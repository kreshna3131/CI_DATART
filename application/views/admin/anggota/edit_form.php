<!DOCTYPE html>
<html lang="en">

<head>
  <!-- menampilkan tampilan header -->
  <?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">
  <!-- menampilkan tampilan navbar pada halaman -->
  <?php $this->load->view("admin/_partials/navbar.php") ?>
  <div id="wrapper">
    <!-- menampilkan bagian sidebar -->
    <?php $this->load->view("admin/_partials/sidebar.php") ?>

    <div id="content-wrapper">

      <div class="container-fluid">
        <!-- untuk menampilkan breadcrumb -->
        <?php $this->load->view("admin/_partials/breadcrumb.php") ?>
        <!-- jika session sukses maka tampilkan pesan sukses -->
        <?php if ($this->session->flashdata('success')) : ?>
          <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php endif; ?>

        <!-- Card  -->
        <div class="card mb-3">
          <div class="card-header">
            <!-- menampilkan tombol back -->
            <a href="<?php echo site_url('admin/PencatatanRT/') ?>"><i class="fas fa-arrow-left"></i>
              Back</a>
          </div>
          <div class="card-body">
            <!-- mengarahkan ke halaman anggota/edit -->
            <form action="<?php base_url(" admin/anggota/edit") ?>" method="post" enctype="multipart/form-data">
              <!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							oleh controller tempat vuew ini digunakan. Yakni index.php/admin/pencatatanRT/edit/ID --->
              <input type="hidden" name="id" value="<?php echo $anggota->id_kegiatan ?>" />

              <div class="form-group">
                <label for="nama_kegiatan">Nama Kegiatan</label>
                <!-- mengambil inputan yang dimana mengecek kegiatan error atau tidak kemudian valuenya ini kita cetak dari $anggota yang kita ambil kegiatan nya -->
                <input class="form-control <?php echo form_error('nama_kegiatan') ? 'is-invalid' : '' ?>" type="text" name="nama_kegiatan" placeholder="Nama Kegiatan" value="<?php echo $anggota->nama_kegiatan ?>" />
                <!-- jika invalid maka print form error dengan isinya nama kegiatan -->
                <div class="invalid-feedback">
                  <?php echo form_error('nama_kegiatan') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="name">Keterangan</label>
                <textarea class="form-control <?php echo form_error('keterangan') ? 'is-invalid' : '' ?>" name="keterangan" placeholder="Keterangan...."><?php echo $anggota->keterangan ?></textarea>
                <div class="invalid-feedback">
                  <?php echo form_error('keterangan') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input class="form-control <?php echo form_error('tanggal') ? 'is-invalid' : '' ?>" type="date" name="tanggal" placeholder="Tanggal" value="<?php echo $anggota->tanggal ?>" />
                <div class="invalid-feedback">
                  <?php echo form_error('tanggal') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="kas_masuk">Kas Masuk</label>
                <input class="form-control <?php echo form_error('kas_masuk') ? 'is-invalid' : '' ?>" type="number" name="kas_masuk" placeholder="Kas Masuk" value="<?php echo $anggota->kas_masuk ?>" />
                <div class="invalid-feedback">
                  <?php echo form_error('kas_masuk') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="kas_keluar">Kas Keluar</label>
                <input class="form-control <?php echo form_error('kas_keluar') ? 'is-invalid' : '' ?>" type="number" name="kas_keluar" placeholder="Kas Keluar" value="<?php echo $anggota->kas_keluar ?>" />
                <div class="invalid-feedback">
                  <?php echo form_error('kas_keluar') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="total">Total</label>
                <input class="form-control <?php echo form_error('total') ? 'is-invalid' : '' ?>" type="number" name="total" placeholder="Total" value="<?php echo $anggota->total ?>" />
                <div class="invalid-feedback">
                  <?php echo form_error('total') ?>
                </div>
              </div>


              <input class="btn btn-success" type="submit" name="btn" value="Save" />
            </form>

          </div>
          <!-- menampilkan tulisan pada bagian bawah -->
          <div class="card-footer small text-muted">
            * required fields
          </div>


        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <?php $this->load->view("admin/_partials/footer.php") ?>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <!-- menampilkan bagian scrolltop -->
    <?php $this->load->view("admin/_partials/scrolltop.php") ?>
    <!-- memanggil isi yang ada di js -->
    <?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
