    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "berhasil") {
            echo "
                            <script>
                                Swal.fire({
									icon: 'success',
									title: 'Success...',
									text: 'Login Berhasil',
									showConfirmButton: false,
									timer: 1500
									})
                            </script>
                            ";
        } else if ($_GET['pesan'] == "berhasilinput") {
            echo "
                            <script>
                                Swal.fire({
									icon: 'success',
									title: 'Success...',
									text: 'Data Berhasil Di Tambahkan',
									showConfirmButton: false,
									timer: 1500
									})
                            </script>
                            ";
        } else if ($_GET['pesan'] == "berhasilhapus") {
            echo "
                            <script>
                                Swal.fire({
									icon: 'success',
									title: 'Deleted...',
									text: 'Data Berhasil Di Hapus',
									showConfirmButton: false,
									timer: 1500
									})
                            </script>
                            ";
        } else if ($_GET['pesan'] == "berhasilubah") {
            echo "
                            <script>
                                Swal.fire({
									icon: 'success',
									title: 'Changed...',
									text: 'Data Berhasil Di Ubah',
									showConfirmButton: false,
									timer: 1500
									})
                            </script>
                            ";
        } else if ($_GET['pesan'] == "berhasilverifikasi") {
            echo "
                            <script>
                                Swal.fire({
									icon: 'success',
									title: 'Verificated...',
									text: 'Data Berhasil Di Verifikasi',
									showConfirmButton: false,
									timer: 1500
									})
                            </script>
                            ";
        } else if ($_GET['pesan'] == "hapusfotoberhasil") {
            echo "
                            <script>
                                Swal.fire({
									icon: 'success',
									title: 'Deleted...',
									text: 'Foto Berhasil Di Hapus',
									showConfirmButton: false,
									timer: 1500
									})
                            </script>
                            ";
        } else if ($_GET['pesan'] == "uploadfotoberhasil") {
            echo "
                            <script>
                                Swal.fire({
									icon: 'success',
									title: 'Uploaded...',
									text: 'Foto Berhasil Di Tambahkan',
									showConfirmButton: false,
									timer: 1500
									})
                            </script>
                            ";
        } else if ($_GET['pesan'] == "uploadfotogagal") {
            echo "
                            <script>
                                Swal.fire({
									icon: 'error',
									title: 'Denied...',
									text: 'Upload Foto Gagal, File Tidak Seusai Atau Ukuran Melebihi Batas',
									showCancelButton: true,
                                    showConfirmButton: false
									})
                            </script>
                            ";
        } else if ($_GET['pesan'] == "berhasilhapuskomentar") {
            echo "
                            <script>
                                Swal.fire({
									icon: 'success',
									title: 'Deleted...',
									text: 'Komentar Berhasil Di Hapus',
									showConfirmButton: false,
									timer: 1500
									})
                            </script>
                            ";
        }
    }
    ?>
