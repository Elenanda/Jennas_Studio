<?php
include "koneksi.php"; 
?>

<!doctype html>
<html lang="en" id="htmlPage">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Jennas's Studio</title>
        <link rel="icon" href="img/foto-logo.png"/>
        <link 
          rel="stylesheet" 
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        />
        <link 
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
            crossorigin="anonymous"
        />
        <style>
          html {
              scroll-behavior: smooth;
          }
          .icon-dark-mode {
              color: #000; /* Warna untuk mode light */
              transition: color 0.3s;
          }

          [data-bs-theme="dark"] .icon-dark-mode {
              color: whitesmoke; /* Warna untuk mode dark*/
          }

          .checkbox {
            opacity: 0;
            position: absolute;
            display: none !important;
          }
          .checkbox-label {
            background-color: #111;
            width: 50px;
            height: 26px;
            border-radius: 50px;
            position: relative;
            padding: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
          }
          .bi-moon {color: whitesmoke;}
          .bi-brightness-high {color: rgb(255, 75, 75);}
          .checkbox-label .ball {
            background-color: #fff;
            width: 22px;
            height: 22px;
            position: absolute;
            left: 2px;
            top: 2px;
            border-radius: 50%;
            transition: transform 0.2s liniear;
          }
          .checkbox:checked + .checkbox-label .ball {
            transform: translateX(24px);
          }
          #checkbox {display: none;}
        </style>
    </head>
    <body>
        <!--nav begin-->
        <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
            <div class="container">
              <a class="navbar-brand" href="#">
                <img src="img/foto-logo.png" alt="Logo" width="60" height="60" class="d-inline-block align-text-center me-2">
                Jenna's Studio
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-dark">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#article">History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#schedule">Schedule</a>
                   </li>
                   <li class="nav-item">
                      <a class="nav-link" href="#aboutme">About Me</a>
                      <li class="nav-item">
                        <a class="nav-link" href="login.php" target="_blank">Login</a>
                      </li>
                   </li>
                    <!-- Switch Dark Mode -->
                    <li class="nav-item">
                        <input type="checkbox" class="checkbox" id="checkbox">
                        <label for="checkbox" class="checkbox-label">
                            <i class="bi bi-moon"></i>
                            <i class="bi bi-brightness-high"></i>
                            <span class="ball"></span>
                        </label>
                    </li>
                </ul>
            </div>
            
              </div>
            </div>
          </nav>
        <!--nav end-->
        <!--hero begin-->
        <section id="hero" class="text-center p-5 bg-danger-subtle text-sm-start">
          <div class="container">
            <div class="d-sm-flex flex-sm-row-reverse align-items-center">
              <img src="img/foto-1.jpeg" class="img-fluid" width="600">
              <div>
                <h1 class="fw-bold display-4">Welcome To Jenna's Studio</h1>
                <h4 class="lead display-6">We Are Ready For Take Your Moment &ensp;&ensp;&ensp;</h4>
                <h6>
                  <span id="tanggal"></span>
                  <span id="jam"></span>
                </h6>
              </div>
            </div>
          </div>
        </section>
        <!--hero end-->

        <!--article begin-->
          <section id="article" class="text-center p-5">
            <div class="container">
              <h1 class="fw-bold display-4 pb-3">History</h1>
              <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
                <?php
                $sql = "SELECT * FROM article ORDER BY tanggal DESC";
                $hasil = $conn->query($sql); 

                while($row = $hasil->fetch_assoc()){
                ?>
                  <div class="col">
                    <div class="card h-100">
                      <img src="img/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
                      <div class="card-body">
                        <h5 class="card-title"><?= $row["judul"]?></h5>
                        <p class="card-text">
                          <?= $row["isi"]?>
                        </p>
                      </div>
                      <div class="card-footer">
                        <small class="text-body-secondary">
                          <?= $row["tanggal"]?>
                        </small>
                      </div>
                    </div>
                  </div>
                  <?php
                }
                ?> 
              </div>
            </div>
          </section>
        <!-- article end -->
        
        <!--gallery begin-->
        <section id="gallery" class="text-center p-5 bg-danger-subtle">
          <div class="container">
            <h1 class="fw-bold display-4 pb-3">Gallery</h1>
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $sql = "SELECT * FROM gallery ORDER BY tanggal DESC";
                    $hasil = $conn->query($sql);

                    $activeClass = "active";
                    while ($row = $hasil->fetch_assoc()) {
                        ?>
                        <div class="carousel-item <?= $activeClass ?>">
                            <div class="col">
                                <div class="card h-100">
                                    <img src="img/<?= $row["gambar"] ?>" class="card-img-top" alt="Gallery Image" />
                                </div>
                            </div>
                        </div>
                        <?php
                        $activeClass = "";
                    }
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
         </div>
        </section>
        <!--gallery end-->
        <!--schedule-->
        <section id="schedule" class="text-center">
          <div class="container p-5">
              <h1 class=" fw-bold display-6 pb-3">Schedule</h1>
              <div class="row row-cols-1 row-cols-md-4 g-3 justify-content-center">
                  <div class="col">
                      <div class="card h-100">
                          <div class="card-header bg-danger">
                              <h5 class="card-title text-white">SENIN</h5>
                          </div>
                          <ul class="list-group list-group-flush">
                              <li class="list-group-item">
                                  Rekayasa Perangkat Lunak
                                  <p>09:30 - 12:00 | H.5.6</p>
                              </li>
                              <li class="list-group-item">
                                Sistem Operasi
                                <p>12:30 - 15:00 | H.4.9</p>
                              </li>
                          </ul>
                      </div>
                  </div>
                  <div class="col">
                      <div class="card h-100">
                          <div class="card-header bg-danger">
                              <h5 class="card-title text-white">SELASA</h5>
                          </div>
                          <ul class="list-group list-group-flush">
                              <li class="list-group-item">
                                  Sistem Informasi
                                  <p>09:30 - 12:00 | H.4.2</p>
                              </li>
                              <li class="list-group-item">
                                  Basis Data (Praktek)
                                  <p>12:30 - 14:10 | D.3.M</p>
                              </li>
                              <li class="list-group-item">
                                Pendidikan Kewarganegaraan
                                <p>18:30 - 20:10 | Aula E.3.1</p>
                              </li>
                          </ul>
                      </div>
                  </div>
                  <div class="col">
                      <div class="card h-100">
                          <div class="card-header bg-danger">
                              <h5 class="card-title text-white">RABU</h5>
                          </div>
                          <ul class="list-group list-group-flush">
                              <li class="list-group-item">
                                  Logika Informatika
                                  <p>12:30 - 15:00 | H.4.10</p>
                              </li>
                              <li class="list-group-item">
                                  Probabilitas dan Statistik
                                  <p>15:30 - 18:00 | H.4.8</p>
                              </li>
                          </ul>
                      </div>
                  </div>
                  <div class="col">
                      <div class="card h-100">
                          <div class="card-header bg-danger">
                              <h5 class="card-title text-white">KAMIS</h5>
                          </div>
                          <ul class="list-group list-group-flush">
                              <li class="list-group-item">
                                  Basis Data (Teori)
                                  <p>07:00 - 08:40 | H.5.1</p>
                              </li>
                              <li class="list-group-item">
                                  Pemrograman Berbasis Web
                                  <p>08:40 - 10:20 | D.2.J</p>
                          </ul>
                      </div>
                  </div>
                  <div class="col">
                      <div class="card h-100">
                          <div class="card-header bg-danger">
                              <h5 class="card-title text-white">JUMAT</h5>
                          </div>
                          <ul class="list-group list-group-flush">
                              <li class="list-group-item">
                                  Free
                              </li>
                          </ul>
                      </div>
                  </div>
                  <div class="col">
                      <div class="card h-100">
                          <div class="card-header bg-danger">
                              <h5 class="card-title text-white">SABTU</h5>
                          </div>
                          <ul class="list-group list-group-flush">
                              <li class="list-group-item">Free</li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </section>
        <!--schedule-->
        <!--about me-->
        <section id="aboutme" class=" text-center p-5 bg-danger-subtle">
          <div class="container">
              <div class="d-lg-flex flex-md-row align-items-center justify-content-evenly">
                  <img
                      src="https://thumbs.dreamstime.com/b/letter-j-s-js-logo-design-template-minimal-monogram-initial-based-logotype-trendy-letter-j-s-js-logo-design-template-307943940.jpg"
                      alt="default"
                      class="img-fluid rounded-circle"
                      width="300"
                  />
                  <div class="p-2">
                      <p class="text-md-start">A11.2023.15141</p>
                      <h1 class="fw-bold display-4 text-md-start">Elenanda Steavanus Yosawabi</h1>
                      <h5 class="lead text-md-start">Program Studi Teknik Informatika</h5>
                      <a
                          href="https://portal.dinus.ac.id/" target = "_blank"
                          class="text-md-start text-decoration-none text-dark "
                          ><h5>Universitas Dian Nuswantoro</h5></a>
                  </div>
              </div>
          </div>
      </section>
        <!--about me-->
        <!--footer begin-->
        <footer class="text-center p-5">
    <a href="https://www.instagram.com/just.xyzel/profilecard/?igsh=YzBpNTQwZzMzNm16"><i class="bi bi-instagram h2 p-2 icon-dark-mode"></i></a>
    <a href="https://wa.me/+6282245523911"><i class="bi bi-whatsapp h2 p-2 icon-dark-mode"></i></a>
    <a href="https://x.com/i/flow/login"><i class="bi bi-twitter-x h2 p-2 icon-dark-mode"></i></a>
    <br>
    <br>
    <div>
        Elenanda Steavanus Yosawabi &copy; 2024
    </div>
</footer>
        <!--footer end-->
        <script 
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
            crossorigin="anonymous"
        ></script>
        <script type="text/javascript">
          window.setTimeout("tampilWaktu()", 1000);

          function tampilWaktu() {
            var waktu = new Date();
            var bulan = waktu.getMonth() + 1;

            setTimeout("tampilWaktu()", 1000);
            document.getElementById("tanggal").innerHTML = waktu.getDate() + "/" + bulan + "/" + waktu.getFullYear();
            document.getElementById("jam").innerHTML = waktu.getHours() + ":" + waktu.getMinutes() + ":" + waktu.getSeconds();
          }
        </script>
        <script>
          const html = document.getElementById("htmlPage");
          const checkbox = document.getElementById("checkbox")
          checkbox.addEventListener("change", () => {
            if (checkbox.checked) {
              html.setAttribute("data-bs-theme", "dark");
            } else {
              html.setAttribute("data-bs-theme", "light");
            }
          });
        </script>
    </body>
</html>
