<?php
include 'koneksi.php';

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $sql = "DELETE FROM profile WHERE id =$id";

    if ($conn->query($sql) == TRUE) {
        header("location: profil.php");
        exit();

    } else {
        echo "Error: ". $sql . "<br>" . $conn->error;
    }
} else {
   echo "ID tidak ditemukan";
}
$conn->close();

?>