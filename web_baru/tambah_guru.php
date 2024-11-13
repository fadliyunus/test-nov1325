<?php
if (isset($_POST['tambah'])) {
    $nip = $_POST['nip'];
    $nm_guru = $_POST['nm_guru'];
    $jns_kelamin = $_POST['jns_kelamin'];
    $mata_pelajaran = $_POST['mata_pelajaran'];
    $usia = $_POST['usia'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO guru (nip, nm_guru, jns_kelamin, mata_pelajaran, usia, no_telp, alamat)
            VALUES ('$nip', '$nm_guru', '$jns_kelamin', '$mata_pelajaran', '$usia', '$no_telp', '$alamat')";

    if ($conn->query($sql) === TRUE) {
        echo "Data guru berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
