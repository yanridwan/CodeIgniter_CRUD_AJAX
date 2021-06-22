<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <title>CRUD-AJAX | CodeIgniter</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-4" style="padding-bottom: 5%; ">
                <h1 align="center" style="padding-top:20%">CRUD-AJAX</h1>
                <!-- <p style="padding-left:20%;font-family:Brush Script MT">by Yan Ridwan</p> -->
            </div>
            <div class="col-md-12">
                <div class="nav justify-content-end" style="padding-bottom:2%">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#tambahData">Tambah Data</button>
                </div>
                <table class="table table-striped" border="1px">
                    <thead align="center">
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th style="width: 20%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody align="center" id="tampil_barang">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="tambahData" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="tambahForm" method="POST">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Nama Barang</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_barang" id="namaBarang">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Harga</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="harga_barang" id="hargaBarang">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="editData" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editForm" method="POST" action="<?= site_url('API/editBarang') ?>">
                    <input type="hidden" name="id_barang" id="idBarangEdit">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Nama Barang</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_barang" id="namaBarangEdit">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Harga</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="harga_barang" id="hargaBarangEdit">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Hapus-->
    <div class="modal fade" id="hapusData" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Menghapus Data?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script> -->
    <script src="<?= base_url('assets/jquery-3.6.0.min.js') ?>"></script>
    <script src="<?= base_url('assets/jquery-3.6.0.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.js') ?>"></script>

    <script>
        function formatRupiah(angka, prefix) {
            var number_string = angka.toString().replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        function getdata() {
            $.ajax({
                type: 'POST',
                // url: "http://localhost/yan/api/API/getuser", dari aplikasi lain
                url: "<?= site_url('API/getBarang') ?>",
                dataType: 'JSON',
                success: function(data) {
                    console.log(data);

                    var html = '';
                    for (let i = 0; i < data.length; i++) {
                        html += "\
                        <tr>\
                            <td>" + (i + 1) + "</td>\
                            <td>" + data[i].barang_nama + "</td>\
                            <td> Rp" + formatRupiah(data[i].barang_harga) + "</td>\
                            <td>\
                                <button onClick='update(" + data[i].barang_id + ")' class='btn btn-secondary' style='width: 80px;'>Edit</button>\
                                <button onClick='hapus(" + data[i].barang_id + ")' class='btn btn-danger' style='width: 80px;'>Hapus</button>\
                            </td>\
                        </tr>\
                        ";
                    }

                    $("#tampil_barang").html(html);

                }
            });
        }

        function update(id) {
            $.ajax({
                type: 'POST',
                data: {
                    id: id,
                },
                url: "<?= site_url('API/getBarangById') ?>",
                dataType: "JSON",
                success: function(data) {
                    console.log(data);
                    if (data != 'false') {
                        $('#editData').modal('toggle');
                        $('#idBarangEdit').val(data.barang_id);
                        $('#namaBarangEdit').val(data.barang_nama);
                        $('#hargaBarangEdit').val(data.barang_harga);
                    }
                }
            });
        }

        function hapus(id) {
            $.ajax({
                type: 'POST',
                data: {
                    id: id,
                },
                url: "<?= site_url('API/hapus') ?>",
                dataType: "JSON",
                success: function(data) {
                    if (data == 'true') {
                        getdata();
                        alert('Data Berhasil Dihapus');
                    } else {
                        alert('Data Gagal Dihapus');
                    }
                }
            });
        }

        $(document).ready(function() {
            getdata()

            $('#tambahForm').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    data: $('#tambahForm').serialize(),
                    url: "<?= site_url('API/tambah') ?>",
                    dataType: "JSON",
                    success: function(data) {
                        if (data == 'true') {
                            getdata();

                            $('#namaBarang').val('');
                            $('#hargaBarang').val('');
                            $('#tambahData').modal('toggle');
                            alert('Data Berhasil Ditambah');
                        } else {
                            alert('Data Gagal Ditambah')
                        }
                    }
                });
            });

            $('#editForm').submit(function(e) {
                // console.log('submit update ditekan');
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    data: $('#editForm').serialize(),
                    url: "<?= site_url('API/edit') ?>",
                    dataType: "JSON",
                    success: function(data) {
                        console.log(data);
                        if (data == 'true') {
                            getdata();
                            $('#namaBarangEdit').val('');
                            $('#hargaBarangEdit').val('');

                            $('#editData').modal('toggle');
                            alert('Data Berhasil Di Ubah');
                        } else {
                            alert('Data gagal di Ubah')
                        }
                    }
                })
            });
        });
    </script>

</body>

</html>