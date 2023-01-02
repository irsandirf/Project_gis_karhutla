<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <<link href="<?= base_url("assets/") ?>css/laporan.css" rel="stylesheet"/>
</head>

<body>
    <div class="container">

        <div class="card-container">
            <div class="left">
                <div class="left-container">
                    <h2>Tentang Kami</h2>
                    <p>Pengendalian karhutla meliputi usaha/kegiatan/tindakan pengorganisasian, pengelolaaan Sumber Daya Manusia (SDM) dan sarana prasarana serta operasional pencegahan.</p>
                    <br>
                    <p>pemadaman, penanganan pascakebakaran, dukungan evakuasi dan penyelamatan, dan dukungan manajemen pengendalian kebakaran hutan dan/atau lahan23.</p>
                </div>
            </div>
            <div class="right">
                <div class="right-container">
                    <form action="<?php echo base_url('laporan/masukdata')?>" method="POST">
                        <h2 class="lg-view">Hubungi Kami</h2>
                        <h2 class="sm-view">Hubungi Kami</h2>
                        <input type="text" name="nama" placeholder="Nama Pelapor">
                        <input type="phone" name="telepon" placeholder="Telepon Pelapor">
                        <input type="text"  name="lokasi" placeholder="Lokasi Kejadian" autocomplete="off">
                        <input type="text"  name="tglkejadian" placeholder="Tanggal Kejadian" autocomplete="off">
                        <textarea rows="10"  name="isi" placeholder="Isi Laporan"></textarea>
                        <button>Kirim</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>

</html>