

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SWIFT PDF TOOLS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/main.css" rel="stylesheet">

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

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">
    <div class="container position-relative">
      <div class="row gy-5" data-aos="fade-in">
     
      <style>
    /* Set the background color to rgb(0, 131, 116) */
    body {
      background-color: rgb(0, 131, 116);
      text-align: center;
    }

    /* Center-align text within the p element */
    #hero p {
      text-align: center;
    }
  </style>
      
     <center>     <h2>Split PDF</span></h2>
     <p>Split(extraction) of PDF<p>
        
    </center>
    
</head>

<body>

<p id="errmsg" style="color:red;"></p>
    <p id="p1">Pilih File</p>
    <center>
    <label class="custom-upload-btn" for="inputfile1">Select PDF File</label>
    <input class="form-control" type="file" id="inputfile1" accept="application/pdf" onchange="onChangeFile(event)"><br> 
    <button class="custom-upload-btn" id="run" style="width:200px;height:10px;" onclick="run();">START</button> </center>
  </center>
<style>
    #inputfile1 {
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
  </style>
</head>
<body>
<script src="/assets/js/pdf-designer.js" type="text/javascript"></script>
    <script type="text/javascript">
        var Analyst = null;

        function onChangeFile(event) {
            var reader = new FileReader();
            var file = event.target.files;

            document.getElementById("errmsg").innerHTML = '';

            reader.onload = function (event) {
                var Stream = new Uint8Array(reader.result);

                Analyst = new TPDFAnalyst();

                try {

                    Analyst.LoadFromStream(Stream);

                    if (Analyst.Encrypt) {
                        document.getElementById("p1").innerHTML = 'PDF File - Unsupported';
                        document.getElementById("errmsg").innerHTML =
                            'It does not support encrypted files.';
                    } else {
                        document.getElementById("p1").innerHTML =
                            'PDF File - [' + Analyst.PageCount +
                            ' Pages / PDF' + Analyst.Version + ']';
                    }
                } catch (e) {
                    Analyst = null;
                    document.getElementById("p1").innerHTML = 'PDF File - Unsupported';
                    document.getElementById("errmsg").innerHTML = 'This File is Not supported.';
                }
            }
            reader.readAsArrayBuffer(file[0]);
        }

        function run() {
            var PDFKnife = new TPDFKnife();

            if (Analyst != null) {
                try {
                    var startPage = parseInt(prompt("Enter the start page:", "1"));
                    var endPage = parseInt(prompt("Enter the end page:", Analyst.PageCount));

                    if (startPage > 0 && startPage <= endPage && endPage <= Analyst.PageCount) {
                        PDFKnife.SaveToFile(PDF_GetDateTime_Now() + '.pdf', Analyst, startPage, endPage);
                    } else {
                        document.getElementById("errmsg").innerHTML = 'Invalid page range.';
                    }
                } catch (e) {
                    Analyst[0] = null;
                    Analyst[1] = null;

                    document.getElementById("errmsg").innerHTML =
                        'Failed in the convert of the PDF file. ';
                }
            } else {
                document.getElementById("errmsg").innerHTML =
                    'Please select a file.';
            }
        }
    </script>
</head>


  
    <br>
 
    <br>
    <center>
    

<script>
document.getElementById('inputFile01').addEventListener('change', function() {
  var fileName = this.value.split('\\').pop();
  var label = document.querySelector('.custom-upload-btn');
  
  if (fileName) {
    label.textContent = fileName;
  } else {
    label.textContent = 'Upload';
  }
});

</script>
<body>
   
  
  


</div>


            </div>  
          </div>
        </div>
      
       
        </div>
      </div>
    </div>




          

          
        </div>
    





  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/aos/aos.js"></script>
  <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>
  </section>
  <!-- End Hero Section -->

  

</body>

</html>