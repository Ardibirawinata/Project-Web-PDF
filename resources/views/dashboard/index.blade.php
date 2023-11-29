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
            <br> <br>
<center>
			<div class="row">
  <div class="col-sm-6">
    <div class="card text-center"  style="width: 24rem;">
      <div class="card-body" > 
        <h5 class="card-title">Merge PDF</h5>
        <p class="card-text">Combine PDFs in the order you want with the easiest PDF merger available.</p>
        <a href="{{route ('dashboard.merge.index')}}" class="btn btn-primary">Merge PDF </a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card" style="width: 24rem;">
      <div class="card-body">
        <h5 class="card-title">Compress PDF</h5>
        <p class="card-text">Reduce file size while optimizing for maximal PDF quality.</p>
        <a href="{{route ('dashboard.compress.index')}}" class="btn btn-primary">Compress PDF</a>
</center>
<center>
			<div class="row">
  <div class="col-sm-6">
    <div class="card text-center"  style="width: 24rem;">
      <div class="card-body" > 
        <h5 class="card-title">JPG To PDF</h5>
        <p class="card-text">Convert JPG images to PDF in seconds. Easily adjust orientation and margins.</p>
        <a href="{{route ('dashboard.jpgtopdf.index')}}" class="btn btn-primary">Convert Now</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card" style="width: 24rem;">
      <div class="card-body">
        <h5 class="card-title">Split</h5>
        <p class="card-text">Separate one page or a whole set for easy conversion into independent PDF files.</p>
        <a href="{{route ('dashboard.split.index')}}" class="btn btn-primary">Split PDF</a>
</center>
      </div>
    </div>
  </div>
</div>
    </div>
  </div>
</div>
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