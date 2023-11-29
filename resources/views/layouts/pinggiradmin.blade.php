
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
		


					</li>

					
				
					</li>

					<li class="sidebar-item {{ Request::is('user') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{route ('user.index')}}">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">User Management</span>
            </a>
					</li>
                    <li class="sidebar-item {{ Request::is('dashboard') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{route ('keluar')}}">
              <i class="align-middle" data-feather="log-out"></i> <span class="align-middle">Logout</span>
            </a>
					
            </a>
					</li>

				
		
					<li class="sidebar-header">
		
				
				</ul>

				<div class="sidebar-cta">
					<div>
					
						<div class="mb-3 text-sm">
						
						</div>
						<div class="d-grid">
						