<?php
if (isset($_GET['nip'])) {
    $nip = $_GET['nip'];
    $sql = "DELETE FROM guru WHERE nip='$nip'";

    if ($conn->query($sql) === TRUE) {
        echo "Data guru berhasil dihapus.";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
