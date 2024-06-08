<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<link rel="icon" href="{{ asset('assets/icon.png') }}" />
	<link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" >
	<title>Dashboard Admin</title>
</head>
<body>
	<div class="sidebar">
		<div class="logo-details">
			<i class="bx bxs-window-alt"></i>
			<span class="logo_name">TechByte</span>
		</div>
		<ul class="nav-links">
			<li>
				<a href="{{'/'}}">
					<i class=" bx bxs-dashboard"></i>
					<span class="links_name">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="{{'news'}}">
					<i class="bx bxs-news"></i>
					<span class="links_name">Berita</span>
				</a>
			</li>
			<li>
				<a href="hire.php">
					<i class="bx bx-news"></i>
					<span class="links_name">Hire</span>
				</a>
			</li>
			<li>
				<a href="Logout.php"> <!-- Logout link -->
					<i class="bx bx-log-out-circle"></i>
					<span class="links_name">Log out</span>
				</a>
			</li>
		</ul>
	</div>
	<section class="home-section">
		<nav>
			<div class="sidebar-button">
				<i class="bx bx-menu sidebarBtn"></i>
			</div>
			<div class="profile-details">
			<h1 id="text">
			</h1>
			</div>
		</nav>
		<div class="home-content">
			<h1>Welcome Back Wahyu</h1> <!-- Welcome message -->
		</div>
	</section>
	<script>
		let sidebar = document.querySelector(".sidebar");
		let sidebarBtn = document.querySelector(".sidebarBtn");
		sidebarBtn.onclick = function () {
			sidebar.classList.toggle("active");
			if (sidebar.classList.contains("active")) {
				sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
			} else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
		};
	</script>
</body>
</html>