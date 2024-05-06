<?php
include 'koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="../galeri/img/tj.png" type="icon">
    <title>Beranda | SMK 1 TRIPLE 'J'</title>
</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand d-flex align-align-item" href="#">
                <img src="asset/tj.png" height="50" width="50" alt="logo"
                    class="d-inline-block align-text-top me-3">
                <div class="profile">
                    <h4 class="my-0">SMK DIGITAL INDNESIA</h4>
                    <P class="my-0">Maju seiring perkembangan zaman</P>
                </div>
            </a>
        </div>
    </nav>
    <div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="admin/img/sekolah.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="admin/img/bdp.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


      <br>
      <br>

            <div class="container px-4 px-lg-5">
                <!-- Featured Project Row-->
                <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                <div class="container">
  <div class="row">
      <div class="col-md-3"> 
        <div class="card mb-3">
            <?php
            // Mendapatkan foto terbaru berdasarkan timestamp
            $query = mysqli_query($conn, "SELECT * FROM foto ORDER BY id DESC LIMIT 1");
            while ($data = mysqli_fetch_array($query)) {
            ?>
                <!-- Perbaikan pada cara menampilkan gambar -->
                <img src="admin/img/<?php echo $data['file']; ?>"/>
            <?php
            }
            ?>
        </div>
      </div>
      <div class="col-md-9">
      <h2>Galeri Kegiatan</h2>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with 
        desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
    </div>
    <div class="card fluid mb-3 mb-lg-0 col-xl-6 col-lg-5 align-items-center">
    <h2>INFORMASI TERKINI</h2>
    <br>
    <b><p>Job Fair SMK 1 Triple "J"</p></b>
    <img src="admin/img/tes.jpg" class="d-block w-100" alt="..."><br>
    <div class="align-items-center">
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with 
        desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
    </div>
    </div>
    <div class="col-xl-6 col-lg-7">
        <div class="featured-text text-center text-lg-left">

            <h4>AGENDA SEKOLAH</h4>
            <p class="text-black-50 mb-0">    <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th scope="col"><h6>Nomor</h6></th>
            <th scope="col"><h5>Nama Agenda</h5></th>
            <th scope="col"><h5>Kegiatan</h5></th>
          </tr>
        </thead>
        <?php
                                        $q = $conn->query("SELECT * FROM profile");
                                        $no = 1;
                                        while ($d = $q->fetch_assoc()) :
                                        ?>
                                        
                                    <tbody>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $d['judul']?></td>
                                            <td><?php echo $d['isi']?></td>
                                            <?php endwhile;?>
                                        </tr>
        </tbody>  
      </table></p>
                        </div>
                    </div>
                </div>
                <!-- Project One Row-->
                           
                <br>
                <div class="row">
                <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                    <div class="card col-lg-6 align-items-center">
                    <h4>PETA SEKOLAH</h4>
                    <br>
                    <h4>SMK 1 Triple "J"</h4>
                    <p>(021) 8757384</p>
                    <p>smktj1@gmail.com</p>

                        
                    </div>
                        <div class="col-lg-6">
                        <div class="bg-dark text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-left">              
                                <iframe src="https://maps.google.com/maps?q=smks 1 triple j&amp;t=&amp;z=10&amp;ie=UTF8&amp;iwloc=&amp;output=embed" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Project Two Row-->
                
   
</body>

</html>
