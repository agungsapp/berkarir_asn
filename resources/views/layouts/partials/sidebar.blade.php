<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
		<div class="app-brand demo">
				<a href="index.html" class="app-brand-link">

						<img src="{{ asset('images/logo.png') }}" class="img-fluid w-100 mx-auto" alt="logo" srcset="">
						{{-- <span class="app-brand-text demo menu-text fw-bolder ms-2"></span> --}}
				</a>

				<a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large d-block d-xl-none ms-auto">
						<i class="bx bx-chevron-left bx-sm align-middle"></i>
				</a>
		</div>

		<div class="menu-inner-shadow"></div>

		<ul class="menu-inner py-1">
				<!-- Dashboard -->
				<li class="menu-item {{ Route::is('admin.dashboard.*') ? 'active' : '' }}">
						<a href="{{ route('admin.dashboard.index') }}" class="menu-link">
								<i class="menu-icon tf-icons bx bx-home-circle"></i>
								<div data-i18n="Analytics">Dashboard</div>
						</a>
				</li>


				{{-- <li class="menu-header small text-uppercase">
						<span class="menu-header-text">Master</span>
				</li> --}}

				<!-- User interface -->
				<li class="menu-item {{ Route::is('admin.master.*') ? 'open active' : '' }}">
						<a href="javascript:void(0)" class="menu-link menu-toggle">
								<i class="menu-icon tf-icons bx bx-box"></i>
								<div>Data Master</div>
						</a>
						<ul class="menu-sub">
								<li class="menu-item {{ Route::is('admin.master.jenis-ujian.index') ? 'active' : '' }}">
										<a href="{{ route('admin.master.jenis-ujian.index') }}" class="menu-link">
												<div>Jenis Ujian</div>
										</a>
								</li>
								<li class="menu-item {{ Route::is('admin.master.tipe-ujian.index') ? 'active' : '' }}">
										<a href="{{ route('admin.master.tipe-ujian.index') }}" class="menu-link">
												<div>Tipe Ujian</div>
										</a>
								</li>
								<li class="menu-item">
										<a href="ui-accordion.html" class="menu-link">
												<div>Data Pengguna</div>
										</a>
								</li>
								<li class="menu-item">
										<a href="ui-badges.html" class="menu-link">
												<div>Badges</div>
										</a>
								</li>

						</ul>
				</li>


				<!-- Components -->
				{{-- <li class="menu-header small text-uppercase"><span class="menu-header-text">Components</span></li> --}}
				<!-- Cards -->
				<li class="menu-item">
						<a href="cards-basic.html" class="menu-link">
								<i class="menu-icon tf-icons bx bx-collection"></i>
								<div data-i18n="Basic">Cards</div>
						</a>
				</li>


		</ul>
</aside>
