<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Compress PDF - Smaller PDFs in your browser!</title>
  <meta name="description"
    content="Free, In-browser, Privacy friendly PDF Compressor. Your files doesn't leave your browser." />
  <link rel="shortcut icon" type="image/x-icon" href="compresspdf-favicon.ico" />
  <link rel="icon" type="image/x-icon" href="compresspdf-favicon.ico" />
  <script defer src="/assets/js/pdfkit-standalone-0.10.0.js"></script>
  <script defer src="/assets/js/blob-stream-0.1.3.js"></script>
  <script src="/assets/js/pdf.min-2.5.207.js"></script>
  <script src="/assets/js/FileSaver.min-2.0.4.js"></script>
  <script src="/assets/js/sortable.min.1.10.2.js"></script>
</head>

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <script src="/assets/js/pdf-designer.js" type="text/javascript"></script>

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Impact
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>


      @include('layouts.navbar')
  </header><!-- End Header -->
  <!-- End Header -->

<body>
  <style>
      #inputGroupFile01 {
      display: none; /* Sembunyikan input file asli */
    }

    .custom-upload-btn {
      cursor: pointer;
      background-color: #19be4e;
      display: inline-flex;
      font-size: 22px;
      border-radius: 12px;
      box-shadow: 0 3px 6px 0 rgba(0,0,0,.14);
      min-height: 80px;
    min-width: 330px;
    justify-content: center;
    align-items: center;
    
      max-width: 60vw;
      text-align : center;
      padding: 24px 32px;
      font-size: 14px;
      margin-bottom: 12px;
      text-decoration: none;
      font-weight: normal;
      line-height: 1.42857143;
      text-align: center;
      white-space: nowrap;
      color: #fff!important;
      vertical-align: middle;
      -ms-touch-action: manipulation;
      touch-action: manipulation;
      cursor: pointer;
      border: 1px solid #ccc;
      border-radius: 4px;
       
      }
      
    
      #file-type-label {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #fff; /* Sesuaikan dengan warna latar belakang kontainer input Anda */
      opacity: 0; /* Sembunyikan teks */
      z-index: 2;
    }

   </style>
   <br><br><br><br><br><br>
   <style>

#inputfile01 {
    display: none; /* Sembunyikan input file asli */
  }

  #inputfile02 {
    display: none; /* Sembunyikan input file asli */
  }
  </style>
<body>
	<center>
		<label class="custom-upload-btn" for="inputGroupFile01">Select PDF File</label>
		<input type="file" onChange="loadFile(event)" name="" accept=".png, .jpg, .jpeg"  class="form-control" id="inputGroupFile01" multiple>
		<br><br>
		<button class="custom-upload-btn" onClick="pdfDown()">Convert To PDF</button>
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
		  
		  // Loop melalui array gambar dan tambahkan setiap gambar ke PDF
		  for (var i = 0; i < images.length; i++) {
			var imgWidth = images[i].width;
			var imgHeight = images[i].height;
			
			var pdfWidth = 210; // misalnya, lebar A4
			var pdfHeight = (imgHeight * pdfWidth) / imgWidth;
			
			doc.addImage(images[i], 'JPEG', 5, 5, pdfWidth - 10, pdfHeight - 10);
			
			if (i < images.length - 1) {
			  doc.addPage(); // tambahkan halaman baru untuk setiap gambar kecuali yang terakhir
			}
		  }
		
		  doc.save('ImagesToPDF.pdf');
		}
		</script>
</body>

</html>