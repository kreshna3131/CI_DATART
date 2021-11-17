<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

// pengkondisian jika tidak sama dengan function dari dateindo
if (!function_exists('dateindo')) {
  // maka jalankan fungsi dateindo atau tanggal
  function dateindo($date)
  {
    // jika date sama dengan 0000-00-00
    if ($date == '0000-00-00') {
      // maka kembalikan nilai kosong
      return $kosong = '-';
      // jika else maka
    } else {
      // deklarasi bulanindo yang diisi dengan array nama bulan
      $bulanindo = array(
        "Januari", "Februari", "Maret",
        "April", "Mei", "Juni",
        "Juli", "Agustus", "September",
        "Oktober", "November", "Desember"
      );

      // deklarasi tahun bulan tanggal dan memisahkan format menggunakan substring
      $tahun = substr($date, 0, 4);
      $bulan = substr($date, 5, 2);
      $tgl   = substr($date, 8, 2);

      // nilai result diisi dengan bulan tahun dan tanggal
      $result = (int)$tgl . " " . $bulanindo[(int)$bulan - 1] . " " . $tahun;
      return $result;
    }
  }
}

// membuat function untuk matauang rupiah
// pengkondisian jika function tidak sama
if (!function_exists('rupiah')) {
  // maka jalankan function rupiah depan parameter $angka
  function rupiah($angka)
  {
    // kondisi if jika $angka sama dengan null
    if ($angka == null) {
      // maka mengembalikan tulisan kosong
      return "Kosong";
      // jika else
    } else {
      // maka deklarasi dibawah ini
      $jumlah_desimal = "0";
      $pemisah_desimal = ",";
      $pemisah_ribuan = ".";
      // dan mengembalikan nilai $rupiah
      return  $rupiah = "Rp. " . number_format($angka, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan) . ",-";
    }
  }
}
