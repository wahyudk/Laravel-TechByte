<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="{{ asset('assets/icon.png') }}" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <title>Dashboard Admin</title>
    <style>
        .btn-action {
            display: inline-block;
            margin-right: 10px;
            margin-bottom: 5px;
        }

        .btn-container {
            display: flex;
            gap: 5px;
        }

        .btn-primary a {
            color: #fff;
            text-decoration: none;
        }
    </style>
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
            <h3>Kategori Berita</h3>
            <button type="button" class="btn btn-primary">
                <a href="/news/tambah">Menambahkan Data</a>
            </button>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" style="width: 10%">Foto</th>
                        <th scope="col" style="width: 10%">Kategori</th>
                        <th scope="col" style="width: 10%">Judul</th>
                        <th scope="col" style="width: 10%">Isi</th>
                        <th scope="col" style="width: 10%">Tanggal</th>
                        <th scope="col" style="width: 10%">Langkah</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($berita as $category)
                <tr>
                    <td><img src="{{ asset('img_categories/'  . $category->foto) }}" alt="" width="300px"></td>
                    <td>{{ $category->kategori }}</td>
                    <td>{{ $category->judul }}</td>
                    <td>{{ $category->isi }}</td>
                    <td>{{ $category->tanggal }}</td>
                    <td>
                        <div class="btn-container">
                            <a class="btn btn-primary" href="/news/edit/{{ $category->id }}">Edit</a>
                            <a class="btn btn-primary" href="/news/hapus/{{ $category->id }}">Hapus</a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" align="center">Tidak ada data</td>
                </tr>
                @endforelse
                </tbody>
            </table>
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
