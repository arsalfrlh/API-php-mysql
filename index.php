<?php
$sumber = 'http://localhost/api/api.php';
$konten = file_get_contents($sumber);
$data = json_decode($konten, true);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>API</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
        <div class="row">
        <div class="col-md-12">
        <div class="container">
        <h1 class="text-center mt-3">Daftar Barang</h1>

        <!-- Form Tambah Barang -->
        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#tambahBarangModal">Tambah Barang</button>

        <!-- Daftar Barang -->
        <div class="row row-cols-1 row-cols-md-5 g-4">
            <?php foreach($data AS $barang){ ?>
            <div data-aos="fade-up" data-aos-anchor-placement="top-center">
            <div class="col mt-3" style="height: 100%;">
                <div class="card" style="width: 13rem;">
                <img class="card-img-top" src="<?php echo $barang['gambar'] ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $barang['nama_barang'] ?></h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php echo $barang['merk'] ?></li>
                    <li class="list-group-item"><?php echo $barang['harga'] ?></li>
                    <li class="list-group-item"><?php echo $barang['stok'] ?></li>
                </ul>
                <div class="card-body">
                    <button class="btn btn-primary" onclick="editBarang('<?php echo $barang['id_barang']; ?>')">Edit</button>
                    <button class="btn btn-danger" onclick="hapusBarang('<?php echo $barang['id_barang']; ?>')">Hapus</button>
                </div>
                </div>
            </div>
            </div>
            <?php } ?>
        </div>
        </div>
        </div>
        </div>

        <!-- Modal Tambah Barang -->
        <div class="modal fade" id="tambahBarangModal" tabindex="-1" aria-labelledby="tambahBarangModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="tambahBarangModalLabel">Tambah Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form id="formTambahBarang">
                  <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar URL</label>
                    <input type="text" class="form-control" id="gambar" name="gambar">
                  </div>
                  <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                  </div>
                  <div class="mb-3">
                    <label for="merk" class="form-label">Merk</label>
                    <input type="text" class="form-control" id="merk" name="merk">
                  </div>
                  <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga">
                  </div>
                  <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok">
                  </div>
                  <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
              </div>
            </div>
          </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
      // Fungsi untuk tambah barang
      document.getElementById('formTambahBarang').addEventListener('submit', function(e){
        e.preventDefault();

        let formData = new FormData(this);

        fetch('http://localhost/api/api.php', {
          method: 'POST',
          body: formData
        })
        .then(response => response.json())
        .then(data => {
          alert(data[0].status);
          location.reload();  // Reload halaman setelah berhasil tambah barang
        })
        .catch(error => console.error('Error:', error));
      });

      // Fungsi untuk hapus barang
      function hapusBarang(id) {
        if(confirm("Anda yakin ingin menghapus barang ini?")) {
          fetch(`http://localhost/api/api.php?id=${id}`, {
            method: 'DELETE'
          })
          .then(response => response.json())
          .then(data => {
            alert(data[0].status);
            location.reload();  // Reload halaman setelah berhasil hapus barang
          })
          .catch(error => console.error('Error:', error));
        }
      }

      // Fungsi untuk edit barang (buat fetch data untuk ditampilkan di modal edit)
      function editBarang(id) {
        let gambar = prompt("Masukkan URL gambar:");
        let nama_barang = prompt("Masukkan nama barang:");
        let merk = prompt("Masukkan merk:");
        let harga = prompt("Masukkan harga:");
        let stok = prompt("Masukkan stok:");

        fetch(`http://localhost/api/api.php?id=${id}&gambar=${gambar}&nama_barang=${nama_barang}&merk=${merk}&harga=${harga}&stok=${stok}`, {
          method: 'PUT'
        })
        .then(response => response.json())
        .then(data => {
          alert(data[0].status);
          location.reload();  // Reload halaman setelah berhasil edit barang
        })
        .catch(error => console.error('Error:', error));
      }
    </script>
  </body>
</html>
