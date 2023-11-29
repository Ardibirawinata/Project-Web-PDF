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
<style>
    #inputfile1 {
      display: none;
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
<body>


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

					<h1 class="h3 mb-3">Split PDF</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
								<center> <br>
								<p>Extract the specified range of pages.</p>
    <p id="errmsg" style="color:red;"></p>
    <p id="p1">Select PDF</p>
 
    <label class="btn btn-primary" for="inputfile1">Select PDF File</label>
    <input class="form-control" type="file" id="inputfile1" accept="application/pdf" onchange="onChangeFile(event)"><br> 
    
  </center>

  
    <br>
 
    <br>
    <center>
    <button class="btn btn-primary" id="run" style="width:200px;height:40px;" onclick="run();">START</button> </center>

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
	<script src="/assets/js/pdf-designer.js"></script>

</body>

</html>