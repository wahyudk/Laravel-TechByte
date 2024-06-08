<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<link rel="icon" href="{{ asset('assets/icon.png') }}" />
	<link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
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
				<a href="Admin.php" class="active">
					<i class=" bx bxs-dashboard"></i>
					<span class="links_name">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="Kategori.php">
					<i class="bx bxs-news"></i>
					<span class="links_name">Berita</span>
				</a>
			</li>
			<li>
				<a href="transaction/transaction.php">
					<i class="bx bx-news"></i>
					<span class="links_name">Input Berita</span>
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
        <h3>Edit Berita</h3>
        <div class="form-login">
        <form action="{{ url('/news/update/' . $berita->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <label for="kategori">Categories</label>
            <input class="input" type="text" name="kategori" id="kategori" placeholder="kategori"
            value="{{ old('kategori', $berita->kategori) }}" />
            @error('kategori')
            <p style="font-size: 10px; color: red">{{ $message }}</p>
            @enderror

            <label for="judul">Judul</label>
            <input class="input" type="text" name="judul" id="judul" placeholder="judul"
            value="{{ old('judul', $berita->judul) }}" />
            @error('judul')
            <p style="font-size: 10px; color: red">{{ $message }}</p>
            @enderror

            <label for="isi">Isi</label>
            <textarea class="input" name="isi" id="isi"
            placeholder="isi">{{ old('isi', $berita->isi) }}</textarea>
            @error('isi')
            <p style="font-size: 10px; color: red">{{ $message }}</p>  
            @enderror

            <label for="tanggal">Tanggal</label>
            <input class="input" type="date" name="tanggal" id="tanggal" placeholder="tanggal"
            value="{{ old('tanggal', $berita->tanggal) }}" />
            @error('tanggal')
            <p style="font-size: 10px; color: red">{{ $message }}</p>
            @enderror

            <label for="foto">Photo</label>
            <img src="{{ asset('img_categories/' . $berita->foto) }}" alt="" width="200px">
            <input type="file" name="foto" id="foto" />
            @error('foto')
            <p style="font-size: 10px; color: red">{{ $message }}</p>
            @enderror

            <button type="submit" class="btn btn-simpan" name="edit" style="margin-top: 50px">
            Edit
            </button>
        </form>

			</div>
		</div>

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
