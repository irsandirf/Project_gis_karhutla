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

<body id="page-top">
<div id="map" class="map"></div>
	<script type="text/javascript">
		// Kode untuk menampilkan data karhutla pada provinsi riau
		var hotspot = new ol.layer.Vector({
			source: new ol.source.Vector({
				format: new ol.format.GeoJSON(),
				url: '<?= base_url("assets/") ?>data/karhutla2.json'
			}),
			// Kode menampilkan icon sebagai titik data karhutla
			style: new ol.style.Style({
				image: new ol.style.Icon(({
					anchor: [0.5, 46],
					anchorXUnits: 'flaticon',
					anchorYUnits: 'pixels',
					src: '<?= base_url("assets/") ?>icon/location2.png'
				}))
			})
			// End koding icon
		})

		// Membuat variabel untuk layer / wilayah riau
		var riau = new ol.layer.Vector({
			source: new ol.source.Vector({
				format: new ol.format.GeoJSON()

			})
		});
		// End program layer Riau

		var map = new ol.Map({
			target: 'map',
			layers: [
				new ol.layer.Tile({
					source: new ol.source.OSM()
				}), riau, hotspot // menambahkan parameter riau sebagai wilayah
				// Provinsi Riau dan banjir sebagai data titik banjir di riau
			],
			// Bagian program untuk mengatur titik tengah awal petda dan kadar zoomnya
			view: new ol.View({
				center: ol.proj.fromLonLat([101.438309, 0.510440]),
				zoom: 8
			})
		});

	</script>
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
