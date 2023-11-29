<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
								
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" >
								<div class="dropdown-menu-header">
									<div class="position-relative">
									
									</div>
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
									
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												
											<div class="col-10 ps-2">
											
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
								
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                          <i data-feather="user"></i>  <span   class="text-dark"> {{ $user->name }} </span>



                
              </a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="{{ route ('profile.edit')}}"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
							
								<div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="{{ route('keluar') }}">Log Out</a>