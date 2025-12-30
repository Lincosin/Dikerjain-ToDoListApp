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

    <!-- Halaman Daftar Task -->
        <div class="daftartask">
            <!-- Pembungkus dari halaman Task -->
            <div class="tasksimple">
                <!-- semua data di daftar task -->
                <div class="simpletaskitems">
                    <!-- checkbox di daftar task -->
                    <div class="taskcheck">
                        <input type="checkbox" name="" id="">
                    </div>
                    <!-- header di daftar task -->
                    <div class="taskheader">
                        <p class="taskDate" style="margin-bottom: 5px;"></p>
                    </div>
                    <!-- isi task -->
                    <div class="tasktitle">
                        <h3 style="margin-bottom: 5px;"></h3>
                    </div>
                    <!-- footer di daftar task -->
                    <div class="simpletaskfooter">
                        <!-- tombol untuk edit dan hapus task -->
                        <div class="taskactions">
                            <a href="simple-edit.php" style="color: blue;">Edit</a>
                            <a href="#" style="color: red;">Hapus</a>
                        </div>
                        <!-- status dari task -->
                        <div class="taskstatus">
                            <span class="pending">Pending</span>
                            <!-- muncul jika task sudah selesai -->
                            <span class="done">Done</span>
                        </div>
                    </div>
                </div>
                <!-- muncul disaat belum ada task simple -->
                <p style="color:gray;margin-left:20px;">Belum ada task.</p>
            </div>
            <hr style="margin: 20px 0px; border: 2px solid lightblue;">
            <!-- Pembungkus dari halaman Task -->
            <div class="taskadvance">
                <!-- semua data di daftar task -->
                <div class="advtaskitems">
                    <!-- checkbox di daftar task -->
                    <div class="taskcheck">
                        <input type="checkbox" name="" id="">
                    </div>
                    <!-- header di daftar task -->
                    <div class="taskheader">
                        <p class="taskDate" style="margin-bottom: 5px;"></p>
                    </div>
                    <!-- isi task -->
                    <div class="tasktitle">
                        <h3 style="margin-bottom: 5px;"></h3>
                    </div>
                    <div class="taskdescription">
                        <p style="margin-bottom: 5px;"></p>
                    </div>
                    <!-- footer di daftar task -->
                    <div class="advtaskfooter">
                        <!-- tombol untuk edit dan hapus task -->
                        <div class="taskactions">
                            <a href="advance-edit.php" style="color: blue;">Edit</a>
                            <a href="#" style="color: red;">Hapus</a>
                        </div>
                        <!-- status dari task -->
                        <div class="taskstatus">
                            <span class="pending">Pending</span>
                            <!-- muncul jika task sudah selesai -->
                            <span class="done">Done</span>
                        </div>
                    </div>
                </div>
                <!-- muncul disaat belum ada task advance -->
                <p style="color:gray;margin-left:20px;">Belum ada advance task.</p>
            </div>
            </div>
        </div>
</body>
</html>