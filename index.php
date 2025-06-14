<?php
include "config.php";

// Pastikan koneksi berhasil
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil semua data statistik dalam satu eksekusi
$sql = "
    SELECT 
        (SELECT COUNT(*) FROM items) AS total_items,
        (SELECT COUNT(*) FROM users) AS total_users,
        IFNULL(SUM(CASE WHEN status = 'dipinjam' THEN 1 ELSE 0 END), 0) AS total_dipinjam,
        IFNULL(SUM(CASE WHEN status = 'dikembalikan' THEN 1 ELSE 0 END), 0) AS total_dikembalikan
    FROM peminjaman
";

// Eksekusi query statistik
$result = $conn->query($sql);

if ($result) {
    $row = $result->fetch_assoc();
    $totalItems = $row['total_items'];
    $totalUsers = $row['total_users'];
    $totalDipinjam = $row['total_dipinjam'];
    $totalDikembalikan = $row['total_dikembalikan'];
} else {
    // Jika query gagal, set semua nilai ke 0
    $totalItems = $totalUsers = $totalDipinjam = $totalDikembalikan = 0;
}

// Query untuk mengambil data testimonial dari users
$sqlTestimonials = "SELECT username AS nama, profile_picture AS foto FROM users";
$resultTestimonials = $conn->query($sqlTestimonials);

// Tutup koneksi database setelah semua query selesai digunakan
$conn->close();
?>




















<!doctype html>
<!--
	Solution by GetTemplates.co
	URL: https://gettemplates.co
-->
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- awesone fonts css-->
    <link href="css/font-awesome.css" rel="stylesheet" type="text/css">
    <!-- owl carousel css-->
    <link rel="stylesheet" href="owl-carousel/assets/owl.carousel.min.css" type="text/css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <title>Solution - Free Responsive Agency Template using Bootstrap 4</title>
    <style>
    #preloader-svg {
      transition: opacity 0.7s;
    }
    </style>
</head>

<body>
    <!-- Preloader SVG -->
    <div id="preloader-svg" style="position:fixed;z-index:9999;top:0;left:0;width:100vw;height:100vh;background:#fff;display:flex;align-items:center;justify-content:center;">
      <svg width="180" height="180" viewBox="0 0 100 100">
        <circle cx="50" cy="50" r="40" stroke="url(#blue-gradient)" stroke-width="8" fill="none" stroke-linecap="round">
          <animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="1s" repeatCount="indefinite"/>
        </circle>
        <defs>
          <linearGradient id="blue-gradient" x1="0%" y1="0%" x2="100%" y2="0%">
            <stop offset="0%" stop-color="#0066FF" />
            <stop offset="100%" stop-color="#00AAFF" />
          </linearGradient>
        </defs>
        <text x="50%" y="55%" text-anchor="middle" font-family="Arial, sans-serif" font-size="18" font-weight="bold" fill="url(#blue-gradient)" opacity="0.8">
          <tspan>SIASET</tspan>
          <animate attributeName="opacity" values="0.2;1;0.2" dur="1.5s" repeatCount="indefinite"/>
        </text>
      </svg>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light bg-transparent" id="gtco-main-nav">
        <div class="container"><a class="navbar-brand">SiAset</a>
            <button class="navbar-toggler" data-target="#my-nav" onclick="myFunction(this)" data-toggle="collapse"><span
                class="bar1"></span> <span class="bar2"></span> <span class="bar3"></span></button>
            <div id="my-nav" class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    

                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#news">News</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <a href="login.php" class="btn btn-outline-dark my-2 my-sm-0 mr-3 text-uppercase">login</a> <a href="register.php" class="btn btn-info my-2 my-sm-0 text-uppercase">sign
                up</a>
                </form>
            </div>
        </div>
    </nav>
    <div class="container-fluid gtco-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                <h1> Kami siap memberikan solusi terbaik untuk inventaris SMK Negeri 5 Surakarta Dengan <span>SiAset</span></h1>
                <p><b>SiAset</b> adalah solusi digital yang dirancang khusus untuk mengelola inventaris di lingkungan SMK Negeri 5 Surakarta secara mudah dan efisien. Kami menyediakan fitur lengkap mulai dari pencatatan detail aset, pengelolaan peminjaman peralatan praktik, penjadwalan dan pencatatan pemeliharaan rutin, hingga pembuatan laporan inventaris secara real-time. Dengan <b>SiAset</b>, SMK Negeri 5 Surakarta dapat meningkatkan transparansi, mengoptimalkan ketersediaan aset, dan mempermudah pengelolaan seluruh inventaris sekolah.</p>
                  
                    <a href="#">Contact Us <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
                <div class="col-md-6">
                    <div class="card"><img class="card-img-top img-fluid" src="images/banner-img.png" alt=""></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid gtco-feature" id="services">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="cover">
                        <div class="card">
                            <svg class="back-bg" width="100%" viewBox="0 0 900 700" style="position:absolute; z-index: -1">
                            <defs>
                                <linearGradient id="PSgrad_01" x1="64.279%" x2="0%" y1="76.604%" y2="0%">
                                    <stop offset="0%" stop-color="rgb(1,230,248)" stop-opacity="1"/>
                                    <stop offset="100%" stop-color="rgb(29,62,222)" stop-opacity="1"/>
                                </linearGradient>
                            </defs>
                            <path fill-rule="evenodd" opacity="0.102" fill="url(#PSgrad_01)"
                                  d="M616.656,2.494 L89.351,98.948 C19.867,111.658 -16.508,176.639 7.408,240.130 L122.755,546.348 C141.761,596.806 203.597,623.407 259.843,609.597 L697.535,502.126 C748.221,489.680 783.967,441.432 777.751,392.742 L739.837,95.775 C732.096,35.145 677.715,-8.675 616.656,2.494 Z"/>
                        </svg>
                            <!-- *************-->

                            <svg width="100%" viewBox="0 0 700 500">
                            <clipPath id="clip-path">
                                <path d="M89.479,0.180 L512.635,25.932 C568.395,29.326 603.115,76.927 590.357,129.078 L528.827,380.603 C518.688,422.048 472.661,448.814 427.190,443.300 L73.350,400.391 C32.374,395.422 -0.267,360.907 -0.002,322.064 L1.609,85.154 C1.938,36.786 40.481,-2.801 89.479,0.180 Z"></path>
                            </clipPath>
                            <!-- xlink:href for modern browsers, src for IE8- -->
                            <image clip-path="url(#clip-path)" xlink:href="images/learn-img.jpg" width="100%"
                                   height="465" class="svg__image"></image>
                        </svg>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <h2> 📌 Apa Itu Sistem Inventaris Sekolah? </h2>
                    <p> Sistem Inventaris Sekolah adalah sebuah platform berbasis web yang dirancang untuk membantu sekolah dalam mengelola dan mencatat inventaris barang secara lebih efisien. Dengan sistem ini, sekolah dapat dengan mudah melakukan pencatatan,
                        pemantauan, dan pengelolaan aset sekolah, seperti meja, kursi, komputer, proyektor, buku, dan barang lainnya yang digunakan dalam kegiatan belajar mengajar. </p>
                    <p>
                        <small>
                    </small>
                    </p>
                    <a href="#">Learn More <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
            </div>
        </div>
    </div>
    <div class="container-fluid gtco-features" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                <h2> Jelajahi Layanan<br/> Kami di SMKN 5 Surakarta </h2>
<p>
    Di SMKN 5 Surakarta, kami menyediakan berbagai layanan unggulan untuk mendukung pengelolaan inventaris sekolah secara lebih mudah, cepat, dan efisien. Mulai dari pencatatan barang, peminjaman fasilitas, hingga pembuatan laporan inventaris yang rapi dan terstruktur — semua dirancang untuk memenuhi kebutuhan sekolah modern 🚀
</p>

                 
                    <a href="#">All Services <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
                <div class="col-lg-8">
                    <svg id="bg-services" width="100%" viewBox="0 0 1000 800">
                    <defs>
                        <linearGradient id="PSgrad_02" x1="64.279%" x2="0%" y1="76.604%" y2="0%">
                            <stop offset="0%" stop-color="rgb(1,230,248)" stop-opacity="1"/>
                            <stop offset="100%" stop-color="rgb(29,62,222)" stop-opacity="1"/>
                        </linearGradient>
                    </defs>
                    <path fill-rule="evenodd" opacity="0.102" fill="url(#PSgrad_02)"
                          d="M801.878,3.146 L116.381,128.537 C26.052,145.060 -21.235,229.535 9.856,312.073 L159.806,710.157 C184.515,775.753 264.901,810.334 338.020,792.380 L907.021,652.668 C972.912,636.489 1019.383,573.766 1011.301,510.470 L962.013,124.412 C951.950,45.594 881.254,-11.373 801.878,3.146 Z"/>
                </svg>
                    <div class="row">
                        <div class="col">
                            <div class="card text-center">
                                <div class="oval"><img class="card-img-top" src="images/web-design.png" alt=""></div>
                                <div class="card-body">
                                    <h3 class="card-title">Manajemen Invetaris</h3>
                                    <p class="card-text">Layanan ini memungkinkan sekolah untuk mencatat, mengelola, dan memantau semua barang yang ada di dalam lingkungan sekolah secara digital</p>
                                </div>
                            </div>
                            <div class="card text-center">
                                <div class="oval"><img class="card-img-top" src="images/marketing.png" alt=""></div>
                                <div class="card-body">
                                    <h3 class="card-title">Jasa Laporan & Analisis Inventaris</h3>
                                    <p class="card-text">Layanan laporan dan analisis inventaris untuk pemantauan aset yang lebih akurat dan pengambilan keputusan yang lebih efektif.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card text-center">
                                <div class="oval"><img class="card-img-top" src="images/pinjaman.png" alt=""></div>
                                <div class="card-body">
                                    <h3 class="card-title">Peminjaman Barang</h3>
                                    <p class="card-text">Layanan peminjaman barang sekolah yang mudah dan terorganisir.</p>
                                </div>
                            </div>
                            <div class="card text-center">
                                <div class="oval"><img class="card-img-top" src="images/th.jpg" alt=""></div>
                                <div class="card-body">
                                    <h3 class="card-title">Pemeliharaan Barang</h3>
                                    <p class="card-text">Layanan pemeliharaan inventaris sekolah agar tetap dalam kondisi baik dan siap digunakan.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid gtco-numbers-block">
        <div class="container">
            <svg width="100%" viewBox="0 0 1600 400">
            <defs>
                <linearGradient id="PSgrad_03" x1="80.279%" x2="0%"  y2="0%">
                    <stop offset="0%" stop-color="rgb(1,230,248)" stop-opacity="1" />
                    <stop offset="100%" stop-color="rgb(29,62,222)" stop-opacity="1" />

                </linearGradient>

            </defs>
            <!-- <clipPath id="clip-path3">

                                      </clipPath> -->

            <path fill-rule="evenodd"  fill="url(#PSgrad_03)"
                  d="M98.891,386.002 L1527.942,380.805 C1581.806,380.610 1599.093,335.367 1570.005,284.353 L1480.254,126.948 C1458.704,89.153 1408.314,59.820 1366.025,57.550 L298.504,0.261 C238.784,-2.944 166.619,25.419 138.312,70.265 L16.944,262.546 C-24.214,327.750 12.103,386.317 98.891,386.002 Z"></path>

            <clipPath id="ctm" fill="none">
                <path
                        d="M98.891,386.002 L1527.942,380.805 C1581.806,380.610 1599.093,335.367 1570.005,284.353 L1480.254,126.948 C1458.704,89.153 1408.314,59.820 1366.025,57.550 L298.504,0.261 C238.784,-2.944 166.619,25.419 138.312,70.265 L16.944,262.546 C-24.214,327.750 12.103,386.317 98.891,386.002 Z"></path>
            </clipPath>

            <!-- xlink:href for modern browsers, src for IE8- -->
            <image  clip-path="url(#ctm)" xlink:href="images/word-map.png" height="800px" width="100%" class="svg__image">

            </image>

        </svg>
            <div class="row">
                <!-- Card Total Items -->
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $totalItems; ?>
                            </h5>
                            <p class="card-text">Total Items</p>
                        </div>
                    </div>
                </div>
                <!-- Card Items Dipinjam -->
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $totalDipinjam; ?>
                            </h5>
                            <p class="card-text">Items Dipinjam</p>
                        </div>
                    </div>
                </div>
                <!-- Card Items Dikembalikan -->
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $totalDikembalikan; ?>
                            </h5>
                            <p class="card-text">Items Dikembalikan</p>
                        </div>
                    </div>
                </div>
                <!-- Card Total Users -->
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $totalUsers; ?>
                            </h5>
                            <p class="card-text">Total Users</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <div class="container-fluid gtco-testimonials">
    <div class="container">
    <h2>Apa yang orang katakan tentang kami</h2>
    <div class="owl-carousel owl-carousel1 owl-theme">
        <?php while($row = $resultTestimonials->fetch_assoc()) { ?>
        <div>
            <div class="card text-center">
                <img class="card-img-top" src="<?php echo $row['foto']; ?>" alt="Profile Picture">
                <div class="card-body">
                    <h5><?php echo $row['nama']; ?></h5>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

       
    </div>
    <div class="container-fluid gtco-features-list">
    <div class="container">
        <div class="row">
            <div class="media col-md-6 col-lg-4">
                <div class="oval mr-4"><img class="align-self-start" src="images/quality-results.png" alt=""></div>
                <div class="media-body">
                    <h5 class="mb-0">Hasil Berkualitas</h5>
                    SMKN 5 Surakarta menghadirkan sistem inventaris sekolah yang akurat dan efisien untuk memastikan setiap aset dikelola secara optimal.
                </div>
            </div>
            <div class="media col-md-6 col-lg-4">
                <div class="oval mr-4"><img class="align-self-start" src="images/analytics.png" alt=""></div>
                <div class="media-body">
                    <h5 class="mb-0">Analisis Data Inventaris</h5>
                    Pantau dan analisis data inventaris secara menyeluruh melalui laporan yang terstruktur untuk mendukung pengambilan keputusan yang tepat.
                </div>
            </div>
            <div class="media col-md-6 col-lg-4">
                <div class="oval mr-4"><img class="align-self-start" src="images/affordable-pricing.png" alt=""></div>
                <div class="media-body">
                    <h5 class="mb-0">Efisien dan Ekonomis</h5>
                    Layanan inventaris di SMKN 5 Surakarta dirancang untuk memberikan hasil maksimal dengan efisiensi biaya tanpa mengorbankan kualitas.
                </div>
            </div>
            <div class="media col-md-6 col-lg-4">
                <div class="oval mr-4"><img class="align-self-start" src="images/easy-to-use.png" alt=""></div>
                <div class="media-body">
                    <h5 class="mb-0">Mudah Digunakan</h5>
                    Antarmuka yang user-friendly membuat seluruh civitas SMKN 5 Surakarta dapat mengelola inventaris dengan mudah dan cepat.
                </div>
            </div>
            <div class="media col-md-6 col-lg-4">
                <div class="oval mr-4"><img class="align-self-start" src="images/free-support.png" alt=""></div>
                <div class="media-body">
                    <h5 class="mb-0">Pendampingan Teknis</h5>
                    Tim kami siap memberikan dukungan penuh kapan pun dibutuhkan untuk memastikan sistem berjalan lancar di lingkungan SMKN 5 Surakarta.
                </div>
            </div>
            <div class="media col-md-6 col-lg-4">
                <div class="oval mr-4"><img class="align-self-start" src="images/effectively-increase.png" alt=""></div>
                <div class="media-body">
                    <h5 class="mb-0">Efisiensi Sekolah</h5>
                    Dengan sistem inventaris digital SMKN 5 Surakarta, pengelolaan aset menjadi lebih terstruktur, cepat, dan hemat waktu.
                </div>
            </div>
        </div>
    </div>
</div>





    <div class="container-fluid gtco-logo-area">
       
    </div>
    <div class="container-fluid gtco-news" id="news">
        <div class="container">
            <h2>Latest News & Articles</h2>
            <div class="owl-carousel owl-carousel2 owl-theme">
                <div>
                    <div class="card text-center"><img class="card-img-top" src="images/news1.jpg" alt="">
                        <div class="card-body text-left pr-0 pl-0">
                            <h5>Aenean ultrices lorem quis blandit tempor urabitur accumsan. </h5>
                            <p class="card-text">Donec non sem mi. In hac habitasse platea dictumst. Nullam a feugiat augue, et porta metus. Nulla mollis lobortis leet. Maecenas tincidunt, arcu sed ornare purus risus . . . </p>
                            <a href="#">READ MORE <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
                    </div>
                </div>
                <div>
                    <div class="card text-center"><img class="card-img-top" src="images/news2.jpg" alt="">
                        <div class="card-body text-left pr-0 pl-0">
                            <h5> Nam vel nisi eget odio pulvinar iaculis. Fusce aliquet. </h5>
                            <p class="card-text">Donec non sem mi. In hac habitasse platea dictumst. Nullam a feugiat augue, et porta metus. Nulla mollis lobortis leet. Maecenas tincidunt, arcu sed ornare purus risus . . . </p>
                            <a href="#">READ MORE <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
                    </div>
                </div>
                <div>
                    <div class="card text-center"><img class="card-img-top" src="images/news3.jpg" alt="">
                        <div class="card-body text-left pr-0 pl-0">
                            <h5>Morbi faucibus odio sollicitudin risus scelerisque dignissim. </h5>
                            <p class="card-text">Donec non sem mi. In hac habitasse platea dictumst. Nullam a feugiat augue, et porta metus. Nulla mollis lobortis leet. Maecenas tincidunt, arcu sed ornare purus risus . . . </p>
                            <a href="#">READ MORE <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
                    </div>
                </div>
                <div>
                    <div class="card text-center"><img class="card-img-top" src="images/news1.jpg" alt="">
                        <div class="card-body text-left pr-0 pl-0">
                            <h5>Aenean ultrices lorem quis blandit tempor urabitur accumsan. </h5>
                            <p class="card-text">Donec non sem mi. In hac habitasse platea dictumst. Nullam a feugiat augue, et porta metus. Nulla mollis lobortis leet. Maecenas tincidunt, arcu sed ornare purus risus . . . </p>
                            <a href="#">READ MORE <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
                    </div>
                </div>
                <div>
                    <div class="card text-center"><img class="card-img-top" src="images/news2.jpg" alt="">
                        <div class="card-body text-left pr-0 pl-0">
                            <h5> Nam vel nisi eget odio pulvinar iaculis. Fusce aliquet. </h5>
                            <p class="card-text">Donec non sem mi. In hac habitasse platea dictumst. Nullam a feugiat augue, et porta metus. Nulla mollis lobortis leet. Maecenas tincidunt, arcu sed ornare purus risus . . . </p>
                            <a href="#">READ MORE <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
                    </div>
                </div>
                <div>
                    <div class="card text-center"><img class="card-img-top" src="images/news3.jpg" alt="">
                        <div class="card-body text-left pr-0 pl-0">
                            <h5>Morbi faucibus odio sollicitudin risus scelerisque dignissim. </h5>
                            <p class="card-text">Donec non sem mi. In hac habitasse platea dictumst. Nullam a feugiat augue, et porta metus. Nulla mollis lobortis leet. Maecenas tincidunt, arcu sed ornare purus risus . . . </p>
                            <a href="#">READ MORE <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="container-fluid" id="gtco-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6" id="contact">
                    <h4> Contact Us </h4>
                    <input type="text" class="form-control" placeholder="Full Name">
                    <input type="email" class="form-control" placeholder="Email Address">
                    <textarea class="form-control" placeholder="Message"></textarea>
                    <a href="#" class="submit-button">READ MORE <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-6">
                            <h4>Company</h4>
                            <ul class="nav flex-column company-nav">
                                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">News</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">FAQ's</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                            </ul>
                            <h4 class="mt-5">Fllow Us</h4>
                            <ul class="nav follow-us-nav">
                                <li class="nav-item"><a class="nav-link pl-0" href="#"><i class="fa fa-facebook"
                                                                                      aria-hidden="true"></i></a></li>
                                <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-twitter"
                                                                                 aria-hidden="true"></i></a></li>
                                <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-google"
                                                                                 aria-hidden="true"></i></a></li>
                                <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-linkedin"
                                                                                 aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <h4>Services</h4>
                            <ul class="nav flex-column services-nav">
                                <li class="nav-item"><a class="nav-link" href="#">Peminjaman Barang</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Manajemen Invetaris</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Pemeliharaan Barang</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Jasa Laporan & Analisis Inventaris</a></li>
                            </ul>
                        </div>
                        <div class="col-12">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- owl carousel js-->
    <script src="owl-carousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script>
    window.addEventListener('DOMContentLoaded', function() {
      setTimeout(function() {
        document.getElementById('preloader-svg').style.opacity = 0;
        setTimeout(function() {
          document.getElementById('preloader-svg').style.display = 'none';
        }, 700);
      }, 5000); // tampil selama 5 detik
    });
    </script>
</body>

</html>