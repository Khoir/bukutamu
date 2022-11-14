<?php
// session start
session_start();

// hilangkan session yang sudah di set_error_handler
unset($_SESSION['id_user']);
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['nama_pengguna']);

session_destroy();
echo "<script>
    alert('anda telah keluar dari halaman administrator');
    document.location='index.php';
    </script>";
?>