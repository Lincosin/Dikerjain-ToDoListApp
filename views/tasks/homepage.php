<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applikasi To Do List</title>
    <style>
        /* style awal */
        * {
            margin: 0px;
            padding: 0px;
            font-family: 'Segoe UI', sans-serif;
        }

        html, body {
            background-color: #def1fbff;

        }
        /* --------------------------------- */

        /* style Halaman Utama */
        .container {
            width: 100%;
            height: 100%;
        }

        .header {
            display: flex;
            flex-wrap: nowrap;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            background-color: white;
            border: 1px solid #ddd;
            height: 40px;
            padding: 20px;
        }
        /* -------------------------------------- */

        /* style seluruh daftar task */
        .daftartask {
            flex: 1;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            border-radius: 5px;
            margin: 20px 20px;
        }

        .tasksimple {
            display: flex;
            flex-wrap: wrap;
        }

        .simpletaskitems {
            display: block;
            border: 3px solid lightblue;
            border-radius: 20px;
            background-color: white;
            margin: 10px;
            padding: 20px;
            width: 300px;
        }

        .taskadvance {
            display: flex;
            flex-wrap: wrap;
        }

        .advtaskitems {
            display: block;
            border: 3px solid lightblue;
            border-radius: 20px;
            background-color: white;
            margin: 10px;
            padding: 20px;
            width: 300px;
        }

        .taskcheck {
            display: flex;
            justify-content: start;
            flex-direction: row;
        }

        .simpletaskfooter {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .advtaskfooter {
            display: flex;
            align-content: flex-end;
            flex-direction: row;
            justify-content: space-between;
            margin-top: 30px;
        }

        .taskactions {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 10px;
        }

        .taskactions a {
            text-decoration: none;
        }

        .pending {
            background-color: #fff3b0;
            color: #8a6300;
            padding: 5px 10px;
            border-radius: 10px;
        }

        .done {
            background-color: #d4f8d4;
            color: #0f7a1f;
            padding: 5px 10px;
            border-radius: 10px;
        }

        /* -------------------------------------- */

        /* style halaman popup */
        .popup {
            display: none;
            flex-direction: column;
            position: fixed;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            border-radius: 20px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            padding: 3%;
            z-index: 1000;

        }

        .halamaninputpopup {
            display: block;
            flex-direction: column;
            background-color: #F0FFFF;
            border: 2px solid lightblue;
            border-radius: 20px;
            padding: 5% 2%;
        }

        .inputpopup {
            display: block;
            width: 93%;
            margin-bottom: 3%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .tombolpopup {
            display: flex;
            flex-direction: row;
            gap: 10px;
            margin-top: 20px;
        }

        #tombolmasukpopup, #tombolbatalpopup {
            width: 48%;
        }

        .tombolmasuk {
            background-color: blue;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .tombolmasuk:hover {
            background-color: darkblue;
        }

        .tombolkeluar {
            background-color: red;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .tombolkeluar:hover {
            background-color: darkred;
        }
        /* ----------------------------------------- */
    </style>
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

        <!-- Halaman Daftar Task -->
        <div class="daftartask">
            <!-- Pembungkus dari halaman Task -->
            <div class="tasksimple">
                <!-- semua data di daftar task -->
                <div class="simpletaskitems">
                    <!-- checkbox di daftar task -->
                    <div class="taskcheck">
                        <input style="margin-bottom: 10px;"type="checkbox" name="" id="">
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
                        <input style="margin-bottom: 10px;" type="checkbox" name="" id="">
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