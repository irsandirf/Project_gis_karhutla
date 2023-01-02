<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>Grayscale - Start Bootstrap Theme</title>
	<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
	<!-- Font Awesome icons (free version)-->
	<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
	<!-- Google fonts-->
	<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
	<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet" />
	<!-- Core theme CSS (includes Bootstrap)-->
	<link href="<?= base_url("assets/") ?>css/style.css" rel="stylesheet" />

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

pantek

<body id="page-top">
<div id="map" class="map"></div>
	<script type="text/javascript">
		// Kode untuk menampilkan data karhutla pada provinsi riau
		<?php foreach ($maps as $m) :?>
		const iconFeature = new Feature({
            lokasi: new Point([<?= $m['Lat'], $m['Long']?>]),
            kecamatan: <?= $m['Kecamatan'] ?>
            kabupaten: <?= $m['Kabupaten'] ?>
            provinsi: <?= $m['Provinsi'] ?>
            tk: <?= $m['TK'] ?>
            tempat: <?= $m['Gambar'] ?>
        })
        <?php endforeach; ?>
        
        const iconStyle = new Style({
            image: new Icon({
                anchor: [0.5, 46],
                anchorXUnits: 'fraction',
                anchorYUnits: 'pixels',
                <?php if ($maps['TK'] >= 0 && $maps['TK'] <= 30) { ?>
                    src: '<?= base_url('assets/icon/ringan.png') ?>',
                
                <?php } else if ($maps['TK'] >= 31 && $maps['TK'] <= 80 ) { ?>
                    src: '<?= base_url('assets/icon/sedang.png') ?>',

                <?php } else if ($maps['TK'] >= 81 && $maps['TK'] <= 100) { ?>
                    src: '<?= base_url('assets/icon/parah.png') ?>',
                <?php } ?>
            })
            
        })

        iconFeature.setStyle(iconStyle);

        const vectorSource = new VectorSource({
            features: [iconFeature],
        });

        const vectorLayer = new VectorLayer({
            source: vectorSource,
        });

        const rasterLayer = new TileLayer({
            source: new TileJSON({
                url: 'https://a.tiles.mapbox.com/v3/aj.1x1-degrees.json?secure=1',
                crossOrigin: '',
            }),
        });

        const map = new Map({
            layers: [rasterLayer, vectorLayer],
            target: document.getElementById('map'),
            view: new View({
                center: [101.438309, 0.510440],
				zoom: 8,
            }),
        });


	</script>
      </section>
    <!-- Footer-->
    <footer class="footer bg-black small text-center text-white-50">
        <div class="container px-4 px-lg-5">Copyright &copy; Your Website 2022</div>
    </footer>
    <!-- Bootstrap core JS-->
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/elm-pep@1.0.6/dist/elm-pep.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
