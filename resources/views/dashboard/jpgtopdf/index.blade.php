<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />

	<title>Blank Page | AdminKit Demo</title>

	<link href="/assets/css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>

<style>#inputGroupFile01 {
      display: none; /* Sembunyikan input file asli */
    }
    </style>
		@include('layouts.pinggir')
						</div>
					</div>
				</div>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				@include('layouts.profile')
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">JPG To PDF</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
                                <center>
                                <p>JPG To PDF</p>
<label class="btn btn-primary" for="inputGroupFile01">Select PDF File</label>
<input type="file" onChange="loadFile(event)" name="" accept=".png, .jpg, .jpeg"  class="form-control" id="inputGroupFile01" multiple>
<br><br>
<br><br>
<button class="btn btn-primary" style="width:200px;height:40px;" onClick="pdfDown()">Convert To PDF</button>
  </center>
<script>
document.getElementById('inputGroupFile01').addEventListener('change', function() {
  var fileName = this.value.split('\\').pop();
  var label = document.querySelector('.custom-upload-btn');
  
  if (fileName) {
    label.textContent = fileName;
  } else {
    label.textContent = 'Upload';
  }
});

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
<script>
var images = []; // array untuk menyimpan elemen img

function loadFile(event) {
  var files = event.target.files;

  for (var i = 0; i < files.length; i++) {
    var newImage = document.createElement('img');
    newImage.src = URL.createObjectURL(files[i]);
    
    images.push(newImage);
  }
}

function pdfDown(){
  var doc = new jsPDF();
  
  // Loop lewat array gambar dan tambahkan setiap gambar ke PDF
  for (var i = 0; i < images.length; i++) {
    var imgWidth = images[i].width;
    var imgHeight = images[i].height;
    
    var pdfWidth = 210; // ukuran gambar
    var pdfHeight = (imgHeight * pdfWidth) / imgWidth;
    
    doc.addImage(images[i], 'JPEG', 5, 5, pdfWidth - 10, pdfHeight - 10);
    
    if (i < images.length - 1) {
      doc.addPage(); // halaman baru untuk setiap gambar kecuali yang terakhir
    }
  }

  doc.save('ImagesToPDF.pdf');
}
</script>
								</div>
								<div class="card-body">
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
					
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="/assets/js/app.js"></script>

</body>

</html>