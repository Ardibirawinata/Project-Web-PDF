
<div class="wrapper">

<nav id="sidebar" class="sidebar js-sidebar">
	<div class="sidebar-content js-simplebar">
		<a class="sidebar-brand" href="index.html">
  <span class="align-middle">Dashboard</span>
</a>

		<ul class="sidebar-nav">
			<li class="sidebar-header">
				Pages
			</li>
		

<li class="sidebar-item {{ Request::is('dashboard') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{route ('dashboard')}}">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
					</li>

					
					<li class="sidebar-item {{ Request::is('profile') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{route ('profile.edit')}}">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
            </a>
					</li>

					<li class="sidebar-item {{ Request::is('dashboard/payment') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{route ('dashboard.payment.index')}}">
              <i class="align-middle" data-feather="credit-card"></i> <span class="align-middle">Payment</span>
            </a>
					</li>

					
            </a>
					</li>

					<li class="sidebar-header">
						Tools
					</li>

					<li class="sidebar-item {{ Request::is('dashboard/merge') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{route ('dashboard.merge.index')}}">
              <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Merge PDF</span>
            </a>
					</li>

					<li class="sidebar-item {{ Request::is('dashboard/split') ? 'active' : '' }}">
					<a class="sidebar-link" href="{{route ('dashboard.split.index')}}">
              <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Split PDF</span>
            </a>
					</li>

					<li class="sidebar-item {{ Request::is('dashboard/compress') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{route ('dashboard.compress.index')}}">
              <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Compress PDF</span>
            </a>
					</li>

					<li class="sidebar-item {{ Request::is('dashboard/jpgtopdf') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{route ('dashboard.jpgtopdf.index')}}">
              <i class="align-middle" data-feather="file"></i> <span class="align-middle">JPG to PDF</span>
            </a>
					</li>

					

					<li class="sidebar-header">
						FITUR PRO
					</li>

					<li class="sidebar-item {{ Request::is('dashboard/pro') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{route ('prouser.compress.index')}}">
              <i class="align-middle" data-feather="file"></i> <span class="align-middle">Compress PDF</span>
            </a>
					</li>

					<li class="sidebar-item {{ Request::is('dashboard/pro/delete') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{route ('prouser.delete')}}">
              <i class="align-middle" data-feather="file"></i> <span class="align-middle">Delete PDF</span>
            </a>
					</li>
					<li class="sidebar-item {{ Request::is('dashboard/pro/rotate') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{route ('prouser.rotate')}}">
              <i class="align-middle" data-feather="file"></i> <span class="align-middle">Rotate PDF</span>
            </a>
					</li>
				</ul>
				

				<div class="sidebar-cta">
				<div>
				
						<div class="mb-3 text-sm">
					
						</div>
						<div class="d-grid">
	