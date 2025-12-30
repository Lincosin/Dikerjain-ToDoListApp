<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Edit Task</title>
    <style>
        *, html {
            margin: 0px;
            padding: 0px;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background-color: #def1fbff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 50%;
        }

        .card {
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            border-radius: 20px;
            padding: 40px;
            width: 400px;
        }

        .cardbody {
            display: block;
            justify-content: center;
            align-items: center;
            background-color: #F0FFFF;
            border: 2px solid lightblue;
            border-radius: 20px;
            padding: 20px;
        }

        .inputtask {
            display: block;
            border: 2px solid #ddd;
            border-radius: 10px;
            padding: 10px;
            margin-bottom: 20px;
            width: 92%;
        }

        .tombol {
            display: flex;
            justify-content: end;
            gap: 10px;
            margin-top: 20px;
        }

        .tombolmasuk {
            background-color: blue;
            color: white;
            border: none;
            padding: 5px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .tombolkeluar:hover {
            background-color: darkred;
        }

        .tombolkeluar {
            background-color: red;
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
        <div class="card">
            <div class="cardbody">
                <h2 style="text-align: center; margin-bottom: 20px;">Edit Task</h2>
                <form action="" method="post">
                    <div class="cardinput">
                        <input class="inputtask" type="text" name="title" id="" required>
                        <input class="inputtask" type="date" name="date" id="" required>
                    </div>
                    <div class="tombol">
                        <a href="homepage.php">
                            <button class="tombolkeluar" type="button">Batal</button>
                        </a>
                        <button class="tombolmasuk" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>