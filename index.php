<?php
require_once 'layouts/layout.html';
?>
  <body>
<div class="container">
  <table class="table table-bordered">
    <!-- Tambahkan tombol dan input type text ke dalam HTML -->
<center>
  <button onclick="ubahJudul()">Ubah Judul</button>
  <input type="text" id="input_judul" style="display:none;">
  <h1><div id="daftar_barang" class="mt-2 pb-2 bg-warning">Daftar Barang</div></h1> 
</center>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Harga Beli</th>
      <th scope="col">Harga Jual</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php   
		include_once 'koneksi.php';
		$no = 1;
		$data = mysqli_query($koneksi,"SELECT * FROM daftar_barang");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['nama_barang']; ?></td>
				<td><?php echo $d['harga_beli']; ?></td>
				<td><?php echo $d['harga_jual']; ?></td>
				<td>
					<a href="edit.php?id=<?php echo $d['id']; ?>">EDIT</a>
					<a href="hapus.php?id=<?php echo $d['id']; ?>">HAPUS</a>
				</td>
			</tr>
			<?php 
		}
		?>
  </tbody>
</table>
</div>
<script>
  function ubahJudul() {
    // Ambil element judul
    var judul = document.getElementById("daftar_barang");

    // Ambil element input
    var inputJudul = document.getElementById("input_judul");

    // Jika input belum ditampilkan, tampilkan input dan set focus
    if (inputJudul.style.display === "none") {
      inputJudul.style.display = "inline-block";
      inputJudul.value = judul.innerHTML;
      inputJudul.focus();
    } else {
      // Jika input sudah ditampilkan, ubah judul dengan nilai input
      judul.innerHTML = inputJudul.value;
      inputJudul.style.display = "none";
    }
  }
</script>
  