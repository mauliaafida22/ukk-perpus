<h1 class="mt-4">Ubah Kategori Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                        $id = $_GET['id'];
                        if(isset($_POST['submit'])) {
                            $nama_kategori= $_POST['nama_kategori'];

                            $query = mysqli_query($koneksi, "UPDATE kategori_buku SET nama_kategori = '$nama_kategori' WHERE id_kategori = $id");

                            if($query) {
                                echo '<script>alert("Tambah data berhasil.");</script>';
                            }else{
                                echo '<script>alert("Tambah data gagal.");</script>';
                            }
                        }
                            $id = $_GET['id'];
                            $query = mysqli_query($koneksi, "SELECT * FROM kategori_buku WHERE id_kategori = $id");
                            $data = mysqli_fetch_array($query);
                        ?>

                    <div class="row mb-3">
                        <div class="col-md-2" >Nama Kategori</div>
                            <div class="col-md-8"><input type="text" class="form-control" value="<?php echo $data['nama_kategori']; ?>" name="nama_kategori"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                                <div class="col-md-8">
                                <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <a href="?page=kategori" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
