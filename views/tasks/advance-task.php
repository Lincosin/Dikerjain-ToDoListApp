<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advance Task</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background-color: #def1fbff;
        }

        .container {
            display: flex;
            flex-direction: column;
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); 
            margin: 200px auto;
            width: 40%;
            height: 60%;
        }

        .main-container {
            display: block;
            flex-direction: column;
            margin: 5%;
            padding: 2% 2%;
            background-color: #F0FFFF;
            border: 2px solid lightblue;
            border-radius: 20px;
        }

        .SemuaInput {
            display: block;
            flex-direction: column;
            margin: 3% 0px;
            padding: 20px 5px;
        }

        input {
            display: block;
            width: 100%;
            margin-bottom: 3%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 10px;
        }

        .row {
            display: flex;
            justify-content: end;
            gap: 10px;
            margin-top: 20px;
        }

        .tombolkeluar {
            background-color: red;
            color: white;
            border: none;
            padding: 5px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .tombolkeluar:hover {
            background-color: darkred;
        }

        .tombolmasuk {
            background-color: blue;
            color: white;
            border: none;
            padding: 5px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .tombolmasuk:hover {
            background-color: darkblue;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="main-container">
            <header style="text-align: center; font-size: 24px; font-weight: bold;">
                Advance Task
            </header>
            <div class="SemuaInput">
                <form action="" method="post">
                    <input type="text" name="title" id="" required placeholder="Judul Tugas">
                    <input id="inputdescripsi" type="text" name="description" id="" required placeholder="Keterangan">
                    <input type="date" name="date" id="" required>

                    <div class="row">
                        <a href="homepage.php">
                            <button class="tombolkeluar" type="button">Batal</button>
                        </a>
                        <button class="tombolmasuk" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>