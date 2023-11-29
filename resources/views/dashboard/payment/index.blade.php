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
<style>
    #inputfile12 {
      display: none;
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

					<h1 class="h3 mb-3">Blank Page</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
								<form class="row g-3">
									<center>
									<form action="{{ route('konfirmasi') }}" method="post" enctype="multipart/form-data">
									@csrf
<h2> Dapatkan fitur premium hanya Rp 10.000 akses 1 bulan</h2>

<label for="bankSelect">Pilih Bank:</label>
  <select id="bankSelect" style="width:200px;height:40px;" class="form-select" aria-label="Default select example" onchange="updateForm()">
    <option selected disabled>BANK</option>
    <option value="1">BCA</option>
    <option value="2">BNI</option>
    <option value="3">BRI</option>
  </select>

  <input class="form-control" style="width:200px;height:40px;" type="text" id="textInput" placeholder="" aria-label="readonly input example" readonly>


<script>
  function updateForm() {
    var selectElement = document.getElementById("bankSelect");
    var inputElement = document.getElementById("textInput");

    if (selectElement.value === "1") {
      inputElement.value = "1234";
    } else if (selectElement.value === "2") {
      inputElement.value = "4321";
    } else if (selectElement.value === "3") {
      // Ganti dengan nilai yang sesuai untuk BRI
      inputElement.value = "5678";
    } else {
      // Jika opsi "BANK" atau yang lainnya dipilih, nonaktifkan input
      inputElement.value = "";
    }

    // Nonaktifkan atau aktifkan input berdasarkan nilai yang dipilih
    inputElement.disabled = selectElement.value === "BANK";
  }
</script>


<br><br>

  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Nama Rekening Pengirim</label>
    <input type="text"  class="form-control" id="Rekening" required>
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Nominal</label>
    <input type="text" value="10000" class="form-control" id="Nominal" readonly>
  </div> 
 <br><br> 
  <div class="col-md-6">

  
	
  </div>
  <br><br>
  <button type="submit" class="btn btn-primary"  style="width:200px;height:40px;">Konfirmasi</button>
 
</center>


						
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
							<p class="mb-0">
								<a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>AdminKit</strong></a> - <a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>Bootstrap Admin Template</strong></a>								&copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Terms</a>
								</li>
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