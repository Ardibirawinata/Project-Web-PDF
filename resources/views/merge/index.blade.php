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
      #inputGroupFile {
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
<script type="text/javascript">
var Analysts = new Array();    
 
function onChangeFile(event,index) {
  var reader = new FileReader();
  var file = event.target.files;
  
  document.getElementById("errmsg").innerHTML = '';
  
  reader.onload = function (event) {
    var Stream = new Uint8Array(reader.result);
    
    Analysts[index] = new TPDFAnalyst();
    
    try {
      
      Analysts[index].LoadFromStream(Stream);
      
      if (Analysts[index].Encrypt) {
        document.getElementById("p"+(index+1)).innerHTML =
           'No' + (index+1) + ' PDF File - Unsupported';
        document.getElementById("errmsg").innerHTML = 
           'It does not support encrypted files.';
      } else {
        document.getElementById("p"+(index+1)).innerHTML = 
           'No' + (index+1) + ' PDF File - [' + Analysts[index].PageCount +
          ' Pages / PDF' + Analysts[index].Version + ']';
      }
    } catch (e) {
      Analysts[index] = null;
      document.getElementById("p"+(index+1)).innerHTML =
         'No' + (index+1) + ' PDF File - Unsupported';      
      document.getElementById("errmsg").innerHTML =
         'No' + (index+1) +' PDF File is Not supported.';
    }
  }
  reader.readAsArrayBuffer(file[0]);
}
 
function run() {        
  var PDFCombine = new TPDFCombine();
 
  if (Analysts[0] != null && Analysts[1] != null) {
    try {
      
      // PDF_GetDateTime_Now() return the current date and time.
      PDFCombine.SaveToFile(PDF_GetDateTime_Now() + '.pdf', Analysts);
      
    } catch (e) {
      Analysts[0] = null;
      Analysts[1] = null;
      
      document.getElementById("errmsg").innerHTML = 
        'failed in the convert of the PDF file.';
    }
  } else {
    document.getElementById("errmsg").innerHTML =
      'Two PDF files, please select.';
  }
}
</script>


<center>
<p>Two PDF files, please select.</p>
<p id="errmsg" style="color:red;"></p>   
<p id="p1">File 1</p>
<label class="custom-upload-btn" for="inputfile01">Select PDF File</label>
<input type="file" id="inputfile01" accept="application/pdf" onchange="onChangeFile(event,0)"><br>
<br>
<p id="p2">File 2</p>
<label id="p2" class="custom-upload-btn" for="inputfile02">Select PDF File</label>
<input type="file" id="inputfile02" accept="application/pdf" onchange="onChangeFile(event,1)"><br>
<br>
<br>
<br>
<button id="run" class="custom-upload-btn" style="width:200px;height:40px;" onclick="run();">Merge</button>
  </center>
</body>

</html>