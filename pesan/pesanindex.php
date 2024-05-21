<?php
if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == "gagal") {
        echo "
                            <script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Email Atau Password Yang Anda Masukkan Salah, Silahkan Coba Lagi',
                                })
                            </script>
                            ";
    } else if ($_GET['pesan'] == "belum_login") {
        echo "
                            <script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Anda Harus Login Untuk Mengakses Halaman Super Admin',
                                })
                            </script>
                            ";
    } else if ($_GET['pesan'] == "belum_verifikasi") {
        echo "
                            <script>
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Warning!',
                                    text: 'Data Anda Belum Diverifikasi Petugas, Silahkan Hubungi Petugas Untuk Verifikasi Data Anda.',
                                    showDenyButton: true,
                                    showCancelButton: false,
                                    confirmButtonText: `<i style='font-size:15px' class='fa'>&#xf2b9;</i>&nbsp;Kontak Admin`,
                                    denyButtonText: `Nanti`,
                                    }).then((result) => {
                                    if (result.isConfirmed) {
                                        Swal.fire({
                                            icon: 'info',
                                            title: 'Kontak Admin Melalui?',
                                            showDenyButton: true,
                                            showCancelButton: true,
                                            cancelButtonColor: '#dc3545',
                                            confirmButtonText: `<i style='font-size:15px' class='far'>&#xf0e0;</i>&nbsp;Email`,
                                            denyButtonText: `<i style='font-size:17px' class='fab'>&#xf232;</i>&nbsp;WhatsApp`,
                                            denyButtonColor: '#28a745',
                                            }).then((result) => {
                                            /* Read more about isConfirmed, isDenied below */
                                            if (result.isConfirmed) {
                                                window.open(
                                                    'mailto:sayid.vision.wisak@gmail.com?subject=Permintaan Verifikasi&body=Dear Admin. Saya ingin mengajukan permintaan Verifikasi akun. Berikut ini adalah data saya: ',
                                                    '_blank'
                                                );
                                            } else if (result.isDenied) {
                                                window.open(
                                                    'https://api.whatsapp.com/send?phone=628113823615&text=Dear Admin. Saya ingin mengajukan permintaan Verifikasi akun. Berikut ini adalah data saya: ',
                                                    '_blank'
                                                    );
                                            }
                                            })
                                    }
                                    })
                            </script>
                            ";
    } else if ($_GET['pesan'] == "berhasil") {
        echo "
                            <script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: 'Data Anda Telah Diterima, Silahkan Hubungi Petugas Untuk Verifikasi Data Anda.',
                                    showDenyButton: true,
                                    showCancelButton: false,
                                    confirmButtonText: `<i style='font-size:15px' class='fa'>&#xf2b9;</i>&nbsp;Kontak Admin`,
                                    denyButtonText: `Nanti`,
                                    }).then((result) => {
                                    if (result.isConfirmed) {
                                        Swal.fire({
                                            icon: 'info',
                                            title: 'Kontak Admin Melalui?',
                                            showDenyButton: true,
                                            showCancelButton: true,
                                            cancelButtonColor: '#dc3545',
                                            confirmButtonText: `<i style='font-size:15px' class='far'>&#xf0e0;</i>&nbsp;Email`,
                                            denyButtonText: `<i style='font-size:17px' class='fab'>&#xf232;</i>&nbsp;WhatsApp`,
                                            denyButtonColor: '#28a745',
                                            }).then((result) => {
                                            /* Read more about isConfirmed, isDenied below */
                                            if (result.isConfirmed) {
                                                window.open(
                                                    'mailto:sayid.vision.wisak@gmail.com?subject=Permintaan Verifikasi&body=Dear Admin. Saya ingin mengajukan permintaan Verifikasi akun. Berikut ini adalah data saya: ',
                                                    '_blank'
                                                );
                                            } else if (result.isDenied) {
                                                window.open(
                                                    'https://api.whatsapp.com/send?phone=628113823615&text=Dear Admin. Saya ingin mengajukan permintaan Verifikasi akun. Berikut ini adalah data saya: ',
                                                    '_blank'
                                                    );
                                            }
                                            })
                                    }
                                    })
                            </script>
                            ";
    } else if ($_GET['pesan'] == "emailberhasil") {
        echo "
                            <script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil...',
                                    text: 'Konfirmasi Berhasil, Silahkan Cek Email Anda.',
                                })
                            </script>
                            ";
    } else if ($_GET['pesan'] == "emailgagal") {
        echo "
                            <script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Email Yang Anda Masukkan Tidak Terdaftar, Silahkan Masukkan Email Yang Terdaftar.',
                                })
                            </script>
                            ";
    }
}
