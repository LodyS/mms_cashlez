<nav class="navbar" >
	<a href="#" class="sidebar-toggler">
		<i data-feather="menu"></i>
	</a>

    <div class="navbar-content" >
		<ul class="navbar-nav">
			<li class="nav-item dropdown nav-profile">
				<a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img src="https://via.placeholder.com/30x30" alt="profile">
				</a>

                <div class="dropdown-menu" aria-labelledby="profileDropdown">
					<div class="dropdown-header d-flex flex-column align-items-center">
						<div class="figure mb-3">
							<img src="https://via.placeholder.com/80x80" alt="">
						</div>

                        <div class="info text-center">
							<h4 class="name font-weight-bold mb-0">{{ Auth::user()->name ?? '' }}</h4>
							<h7 class="name font-weight-bold mb-0">{{ ucwords(strtolower(\App\Models\User::jabatan_user(Auth::user()->privilege_user_id)->privilege_title ?? 'Superadmin'))  }}</h7>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
</nav>
