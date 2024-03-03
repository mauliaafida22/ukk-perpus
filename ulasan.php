<div class="card">
    <div class="card-body">
    <h1 class="mt-4">Ulasan Buku</h1>
        <div class="row">
            <div class="col-md-12">
            <?php if ($_SESSION['user']['level'] != 'admin') { ?>
                <a href="?page=ulasan_tambah" class="btn btn-primary">Tambah Data</a>
                <?php } ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>  
                        <th>No</th>
                        <th>User</th>
                        <th>Buku</th>
                        <th>Ulasan</th>
                        <th>Rating</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    if ($_SESSION['user']['level'] == 'peminjam') {
                        $where = " WHERE user.id_user =".$_SESSION['user']['id_user'];
                    } else {
                        $where = "";
                    }
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM ulasan_buku
                                  LEFT JOIN user ON user.id_user = ulasan_buku.id_user 
                                  LEFT JOIN buku ON buku.id_buku = ulasan_buku.id_buku $where");
                    while($data = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $data['nama_lengkap']; ?></td>
                        <td><?php echo $data['judul']; ?></td>
                        <td><?php echo $data['ulasan']; ?></td>
                        <td><?php echo $data['rating']; ?></td>
                        <td>
                        <?php if ($_SESSION['user']['level'] != 'admin') { ?>
                            <a href="?page=ulasan_ubah&id=<?php echo $data['id_ulasan']; ?>" class="btn btn-info">Ubah</a>
                            <?php } ?>

                            <a onclick="return confirm('Apakah anda yakin menghapus data ini?');" href="?page=ulasan_hapus&id=<?php echo $data['id_ulasan']; ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
