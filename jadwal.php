<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Aplikasi Tiket Bioskop</title>
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet" />

  <!-- css -->
  <link rel="stylesheet" href="style.css" />

  <style>
    .poster-film {
      width: 100%;
      height: 270px;
      object-fit: cover;
    }
  </style>

  <!-- AOS (animate on scroll) -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

  <!-- bootstrap icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>

<body>

  <!-- Navbar -->
  <?php include "navbar.php" ?>

  <!-- Jadwal -->
  <section class="jadwal text-light py-5">
    <div class="container">
      <div class="row-mb-5">
        <div class="col">
          <h2>Jadwal Film</h2>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-12 col-sm-12">
          <ul class="list-unstyled">
            <?php

            include "koneksi.php";
            $jadwal = mysqli_query($connection, "SELECT j.id_jadwal, f.id_film, f.gambar, f.nama, f.rating, f.durasi, b.batasumur, j.waktu_tayang, c.cinema FROM jadwal j join cinema c on c.id_cinema=j.id_cinema join film f on f.id_film=j.id_film join batas_umur b on b.id_batasumur=f.id_batasumur");

            while ($show = mysqli_fetch_assoc($jadwal)) {

            ?>
              <li>
                <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top text-light" href="detailfilm.php?id_jadwal=<?php echo $show['id_jadwal']; ?>&id_film=<?php echo $show["id_film"] ?>">
                  <img class="img-fluid poster-film" src="admin/uploads/<?php echo $show['gambar'] ?>">
                  <div class="col-lg-8 col-sm-12 text-light">
                    <h5 class="mb-2"><?php echo $show['nama']; ?></h5>
                    <span class="badge text-bg-primary mb-3 me-1"><?php echo $show['batasumur']; ?></span>
                    <span class="badge text-bg-success mb-3"><i class="bi bi-star-fill me-1"></i><?php echo $show['rating']; ?></span>
                    <small class="showtime">
                      <p>SHOWTIME</p>
                      <?php
                      $dateTime = explode(' ', $show['waktu_tayang']);
                      $date = $dateTime[0];
                      $time = $dateTime[1];
                      ?>
                      <span class="badge text-bg-danger mb-2"><?php echo $date ?></span>
                      <br>
                      <span class="badge text-bg-warning mb-2"><?php echo $time ?></span>
                    </small>
                    <p>Teather : <?php echo $show['cinema'] ?></p>
                    <p><?php echo $show['durasi'] ?></p>
                  </div>
                </a>
              </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- AKhir jadwal -->

  <!-- Footer -->
  <footer class="py-5">
    <div class="container text-light">
      <div class="row d-flex justify-content-between">
        <div class="col-md-3 mb-3">
          <img src="logo-movitix-fp.png" width="100%" alt="...">
          <p>Aplikasi Pemesanan Tiket Bioskop Terbaik di Indonesia! Yuk mari kita pesan di Aplikasi kami</p>
        </div>

        <div class="col-md-2 mb-3">
          <ul class="nav flex-column mt-4">
            <li class="mb-3">
              <a href="#" class="p-0">Sedang Tayang</a>
            </li>
            <li class="mb-3">
              <a href="#" class="p-0">Trailer Film</a>
            </li>
            <li class="mb-3">
              <a href="#" class="p-0">Jadwal Film</a>
            </li>
          </ul>
        </div>

        <div class="col-md-3 mb-3">
          <ul class="nav flex-column mt-4">
            <li class="mb-3 ">
              <a href="#" class="p-0 text-body-dark">Contact Us</a>
            </li>
            <li class="mb-3">
              <a href="#" class="p-0 text-body-light">Privacy Policy</a>
            </li>
            <li class="mb-3">
              <a href="#" class="p-0 text-body-light">Terms & Conditions</a>
            </li>
          </ul>
        </div>

        <div class="col-md-2 mb-3 mt-4">
          <h6 class="mb-3">MoviTix Support</h6>
          <h6 class="mb-3">E-Mail: help@movitix.id</h6>

          <h6>FOLLOW US</h6>
          <ul class="list-unstyled d-flex">
            <li class="">
              <a class=" text-light" href="#">
                <i class="bi bi-twitter-x"></i>
              </a>
            </li>
            <li class="ms-3">
              <a class=" text-light" href="#">
                <i class="bi bi-instagram"></i>
              </a>
            </li>
            <li class="ms-3">
              <a class=" text-light" href="#">
                <i class="bi bi-facebook"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>


      <div class="d-flex flex-column flex-sm-row justify-content-between pt-4 border-top">
        <p>© 2024 MoviTix, Inc. All rights reserved.</p>
        <ul class="list-unstyled d-flex">
          <li class="ms-3">
            <a class=" text-light" href="#">
              <i class="bi bi-twitter-x"></i>
            </a>
          </li>
          <li class="ms-3">
            <a class=" text-light" href="#">
              <i class="bi bi-instagram"></i>
            </a>
          </li>
          <li class="ms-3">
            <a class=" text-light" href="#">
              <i class="bi bi-facebook"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </footer>


  <!-- Modal Login -->
  <?php include "modallogin.php" ?>

  <!-- Modal Sign Up -->
  <?php include "modalsignup.php" ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>