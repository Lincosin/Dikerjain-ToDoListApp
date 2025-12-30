<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Menu Samping jika isi -->
    <aside>
        <nav>

        </nav>
    </aside>

    <!-- Halaman Utama -->
    <div class="container">
        <div class="header">
            <!-- Judul -->
            <header>
                <h1>📝 To-Do List</h1>
            </header>

            <!-- Tombol buat Task Simple -->
            <button class="tombolmasuk" type="button" onclick="document.getElementById('popup').style.display='block'">Tambah Task</button>
        </div>

        <!-- Halaman Pop Up -->
        <div class="popup" id="popup">
            <!-- Semua Halaman Input -->
            <div class="halamaninputpopup">
                <h2 style="text-align: center; margin-bottom: 20px;">Task Baru</h2>
                <form class="formpopup" action="homepage.php" method="post">
                    <input class="inputpopup" type="text" name="title" id="" required placeholder="Judul Task">
                    <input class="inputpopup" type="date" name="date" id="" required>

                    <!-- Halaman Tombol di Pop up -->
                    <div class="tombolpopup">
                        <button id="tombolbatalpopup" class="tombolkeluar"
                         type="button" onclick="document.getElementById('popup').style.display='none'">Batal</button>
                         <button id="tombolmasukpopup" class="tombolmasuk" type="submit">Simpan</button>
                    </div>

                    <!-- Untuk Memuat Halaman Advance Task -->
                    <a href="advance-task.php"
                     style="display: block; text-align: center; margin-top: 20px; text-decoration: none; color: blue;"
                     >Tambah Advance Task</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>