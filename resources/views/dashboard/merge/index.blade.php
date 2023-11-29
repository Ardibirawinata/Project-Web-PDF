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
  <script src="/assets/js/pdf-designer.js" type="text/javascript"></script>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

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

					<h1 class="h3 mb-3">Merge PDF</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
						
								</div>
								<div class="card-body">
									<center>
										<p>Two PDF files, please select.</p>
										<p id="errmsg" style="color:red;"></p>   
										<p id="p1">File 1</p>
										<label class="btn btn-primary" for="inputfile01">Select PDF File</label>
										<input type="file" id="inputfile01" accept="application/pdf" onchange="onChangeFile(event,0)"><br>
										<br>
										<p id="p2">File 2</p>
										<label id="p2" class="btn btn-primary" for="inputfile02">Select PDF File</label>
										<input type="file" id="inputfile02" accept="application/pdf" onchange="onChangeFile(event,1)"><br>
										<br>
										<br>
										<br>
										<button id="run" class="btn btn-primary" style="width:200px;height:40px;" onclick="run();">Merge</button>
										  </center>
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