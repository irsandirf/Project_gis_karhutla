<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Grayscale - Start Bootstrap Theme</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"/>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= base_url("assets/") ?>css/style.css" rel="stylesheet"/>

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.9.0/css/ol.css" type="text/css">
    
    <style>
        .map {
            height: 800px;
            width: 100%;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.9.0/build/ol.js"></script>
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">Karhutla</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
            <form method="post" action="<?php echo base_url('home/search')  ?>">
                <div class="input-group rounded" style="width: 180%">
                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" name="key" aria-describedby="search-addon" />
                    <button class="input-group-text border-0" id="search-addon" type="submit" ><i class="fas fa-search"></i></button>	
                </div>
            </form>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#about">Map</a></li>
                    <li class="nav-item"><a class="nav-link" href="#projects">Tentang Kami</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('Auth/lapor') ?>">Laporan karhutla</a></li>
                    <?php if($this->session->userdata['email'] == true) { ?>
                        <li class="nav-item"><a class="nav-link" href="#"><?= $this->session->userdata['email'] ?></a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= site_url('Auth/logout') ?>">Logout</a></li>
					<?php }else{ ?>
                        <li class="nav-item"><a class="nav-link" href="<?= site_url('Auth/login') ?>">Login</a></li>
                    <?php } ?>
                      
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <h1 class="mx-auto my-0 text-uppercase">Karhutla</h1>
                        <h2 class="text-white-50 mx-auto mt-2 mb-5">Website yang berisikan informasi kebakaran hutan dan lahan yang ada di Riau</h2>
                        <a class="btn btn-primary" href="#about">Lihat Info</a>
                    </div>
                </div>
            </div>
        </header>

    <video autoplay loop muted plays-inline class="back-video">
        <source src="<?= base_url("assets/") ?>video/background.mp4">
    </video>

    
    <div class="row" style="margin-top: 1%; text-align: center;">
        <div class="card text-white bg-success  col-4" style="max-width: 34rem; margin-left: 1.5%; padding-bottom: 3%;">
           
                <div class="card-body">
                    <h4 class="card-title">Jumlah Titik Aman</h4>
                    <h1 class="card-text" style="margin-top: 10%">
                        
                        <?php $jml = 0; foreach ($maps as $c) : 
                            if($c['TK'] >= 0 && $c['TK'] <= 30) {
                                $jml += 1;
                            }
                        endforeach; 
                        echo $jml;
                        ?>
                    </h1>
                </div>
        </div>

        <div class="card text-white bg-warning col-4" style="max-width: 34rem; margin-left: 1%; padding-bottom: 3%;">
            
                <div class="card-body">
                    <h5 class="card-title">Jumlah Titik Rawan</h5>
                    <h1 class="card-text" style="margin-top: 10%">
                        
                        <?php $jml = 0; foreach ($maps as $c) : 
                            if($c['TK'] >= 31  && $c['TK'] <= 80) {
                                $jml += 1;
                            }
                        endforeach; 
                        echo $jml;
                        ?>
                    </h1>
            </div>
        </div>

        <div class="card text-white bg-danger  col-4" style="max-width: 34rem; margin-left: 1%; padding-bottom: 3%;">
           
                <div class="card-body">
                    <h5 class="card-title">Jumlah Titik Sangat Rawan</h5>
                    <h1 class="card-text" style="margin-top: 10%">
                        
                        <?php $jml = 0; foreach ($maps as $c) : 
                            if($c['TK'] >= 81 && $c['TK'] <= 100) {
                                $jml += 1;
                            }
                        endforeach; 
                        echo $jml;
                        ?>
                    </h1>
            </div>
        </div>
    </div>

    <!-- About-->
    <section class="map" id="about">
        <div id="map" class="map"></div>

            

        
        <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
            integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
            crossorigin="">
        </script>
        
        <script>
            var map = L.map('map', {
            center: [0.510440, 101.438309],
            zoom: 8
        });

        var rawan = L.icon({
            iconUrl: '<?php echo base_url("assets/icon/sedang.png")?>',
            iconSize:     [25]// size of the icon
        });

        var Srawan = L.icon({
            iconUrl: '<?php echo base_url("assets/icon/parah.png")?>',
            iconSize:     [30]// size of the icon
        });

        var Trawan = L.icon({
            iconUrl: '<?php echo base_url("assets/icon/ringan.png")?>',
            iconSize:     [30]// size of the icon
        });

        var layerRawan = L.layerGroup().addTo(map);
        var layerAman = L.layerGroup().addTo(map);
        var layerSangat = L.layerGroup().addTo(map);
        var semua = L.layerGroup().addTo(map);

        <?php foreach($maps as $m){?>

        <?php if ($m['TK'] >= 0 && $m['TK'] <= 30){ ?>
            var aman = L.marker([<?php echo $m['Lat']?>,<?php echo $m['Long']?>],{icon:Trawan}).bindPopup("<img src='<?= base_url("assets/gambar/".$m["Gambar"])?>' width='300px' height='150px'/> <br> Kecamatan : <?php echo $m["Kecamatan"]?> <br> Kabupaten : <?php echo $m["Kabupaten"]?> <br> Provinsi : <?php echo $m["Provinsi"]?> <br> Tingkat Kepercayaan : <?php echo $m["TK"]?>").openPopup().addTo(map);
            aman.addTo(layerAman);
            aman.addTo(semua);

        <?php } else if($m['TK'] >= 31  && $m['TK'] <= 80){ ?>
            var rawan = L.marker([<?php echo $m['Lat']?>,<?php echo $m['Long']?>]).bindPopup("<img src='<?= base_url("assets/gambar/".$m["Gambar"])?>' width='300px' height='150px'/> <br> Kecamatan : <?php echo $m["Kecamatan"]?> <br> Kabupaten : <?php echo $m["Kabupaten"]?> <br> Provinsi : <?php echo $m["Provinsi"]?> <br> Tingkat Kepercayaan : <?php echo $m["TK"]?>").openPopup().addTo(map);
            rawan.addTo(layerRawan);
            rawan.addTo(semua);

        <?php } else{ ?>
            var sangat = L.marker([<?php echo $m['Lat']?>,<?php echo $m['Long']?>],{icon:Srawan}).bindPopup("<img src='<?= base_url("assets/gambar/".$m["Gambar"])?>' width='300px' height='150px'/> <br> Kecamatan : <?php echo $m["Kecamatan"]?> <br> Kabupaten : <?php echo $m["Kabupaten"]?> <br> Provinsi : <?php echo $m["Provinsi"]?> <br> Tingkat Kepercayaan : <?php echo $m["TK"]?>").openPopup().addTo(map);
            sangat.addTo(layerSangat);
            sangat.addTo(semua);
        <?php }} ?>
        
        var baseLayers = {
            "Aman" : layerAman,
            "Rawan" : layerRawan,
            "Sangat Rawan" : layerSangat,
            "Semua" : semua
        };

        L.control.layers(baseLayers).addTo(map);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        </script>
    </section>
    <!-- Projects-->
    <section class="projects-section bg-light" id="projects">
        <div class="container px-4 px-lg-5">
            <!-- Featured Project Row-->
            <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="<?= base_url("assets/") ?>img/bg-masthead.jpg"
                        alt="..." /></div>
                <div class="col-xl-4 col-lg-5">
                    <div class="featured-text text-center text-lg-left">
                        <h4>Kebakaran Hutan</h4>
                        <p class="text-black-50 mb-0">Hutan merupakan warisan alam yang harus selalu kita pelihara kelestariannya. Selain sebagai nyawa bagi ekosistem, kehadiran hutan membantu penyerapan air, serta menjadi sumber makanan utama bagi makhluk hidup, termasuk manusia.
                            Sayangnya, dalam beberapa kurun waktu terakhir, pengerukan sumber daya alam secara besar-besaran semakin menjadi-jadi. Semakin lama, semakin tidak mempertimbangkan dampak apa yang akan terjadi akibat ulah mereka tersebut.</p>
                    </div>
                </div>
            </div>
            <!-- Project One Row-->
            <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                <div class="col-lg-6"><img class="img-fluid" src="<?= base_url("assets/") ?>img/demo-image-01.jpg" alt="..." /></div>
                <div class="col-lg-6">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-left">
                                <h4 class="text-white">Kabut Asap</h4>
                                <p class="mb-0 text-white-50">Kebakaran hutan tidak bisa disamakan dengan kebakaran lahan. Hal ini dikarenakan keduanya terjadi di dua kawasan yang berbeda.
                                    Apa itu kebakaran hutan? Pengertian Kebakaran hutan adalah suatu peristiwa terbakarnya hutan yang dapat memicu terjadinya bahaya hingga bisa mendatangkan bencana.</p>
                                <hr class="d-none d-lg-block mb-0 ms-0" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Project Two Row-->
            <div class="row gx-0 justify-content-center">
                <div class="col-lg-6"><img class="img-fluid" src="<?= base_url("assets/") ?>img/demo-image-02.jpg" alt="..." /></div>
                <div class="col-lg-6 order-lg-first">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-right">
                                <h4 class="text-white">Kebakaran Lahan</h4>
                                <p class="mb-0 text-white-50">Lahan adalah sumber daya alam yang penting, baik untuk kelangsungan hidup dan kesejahteraan umat manusia, dan untuk pemeliharaan semua arti ekosistem darat. Lebih dari ribuan tahun, orang menjadi semakin ahli dalam mengeksploitasi sumber daya tanah untuk tujuan mereka sendiri. 
                                    Seperti yang kita tahu bahwa ada kalanya sumber daya alam memiliki keterbatasan ditinjau dari segi kuantitasnya, tapi tuntutan manusia terhadapnya tidak terbatas.</p>
                                <hr class="d-none d-lg-block mb-0 me-0" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Signup-->
    <section class="signup-section" id="signup">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-10 col-lg-8 mx-auto text-center">
                    <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                    <h2 class="text-white mb-5">Masukan Dan Saran </h2>
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- * * SB Forms Contact Form * *-->
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- This form is pre-integrated with SB Forms.-->
                    <!-- To make this form functional, sign up at-->
                    <!-- https://startbootstrap.com/solution/contact-forms-->
                    <!-- to get an API token!-->

                    <form action="<?=base_url('Kritiksaran/masukdata')?>" method="POST">
                        <!-- Email address input-->
                        <div class="row input-group-newsletter">
                            <textarea rows="10" name="isi" placeholder="Silahkan di isi"></textarea>
                            <div class=" d-flex flex-row-reverse"><button class="btn btn-primary enable"
                                     type="submit">Kirim Pesan</button></div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <!-- Contact-->
    <section class="contact-section bg-black">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Address</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">4923 Market Street, Orlando FL</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Email</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50"><a href="#!">hello@yourdomain.com</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-mobile-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Phone</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">+1 (555) 902-8832</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="social d-flex justify-content-center">
                <a class="mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                <a class="mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                <a class="mx-2" href="#!"><i class="fab fa-github"></i></a>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer bg-black small text-center text-white-50">
        <div class="container px-4 px-lg-5">Copyright &copy; Your Website 2022</div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>