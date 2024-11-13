<?php
if (isset($_GET['nip'])) {
    $nip = $_GET['nip'];
    $sql = "SELECT * FROM guru WHERE nip='$nip'";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $nip = $_POST['nip'];
    $nm_guru = $_POST['nm_guru'];
    $jns_kelamin = $_POST['jns_kelamin'];
    $mata_pelajaran = $_POST['mata_pelajaran'];
    $usia = $_POST['usia'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];

    $sql = "UPDATE guru SET nm_guru='$nm_guru', jns_kelamin='$jns_kelamin', mata_pelajaran='$mata_pelajaran', usia='$usia', no_telp='$no_telp', alamat='$alamat' WHERE nip='$nip'";

    if ($conn->query($sql) === TRUE) {
        echo "Data guru berhasil diperbarui.";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>
