<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- Css -->
    <style>
        * {
            margin: 0;
            padding: 0;
            outline: none;
            box-sizing: none;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(cover.jpg);
            background-size: cover;
        }

        .wrapper {
            width: 450px;
            background: #fff;
            padding: 30px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .input-data {
            height: 40px;
            width: 100%;
            position: relative;
        }

        input {
            height: 100%;
            width: 100%;
            border: none;
            font-size: 17px;
            border-bottom: 2px solid silver;
        }

        input~label {
            transform: translateY(-20px);
            font-size: 16px;
            color: rgb(58, 58, 58);
        }

        label {
            position: absolute;
            bottom: 10px;
            left: 0;
            color: gray;
            pointer-events: none;
            transition: all 0.3 ease;
        }

        button {
            position: absolute;
            transform: translate(-35px, 5px);
            background: white;
            color: black;
            border: 2px solid #555555;
            width: 50px;
            height: 30px;
            font-size: 14px;
            border-radius: 8px;
        }

        button:hover {
            background-color: #555555;
            color: white;
        }

        .underline {
            position: absolute;
            bottom: 0px;
            height: 2px;
            width: 100%;
        }

        .underline::before {
            position: absolute;
            content: "";
            height: 100%;
            width: 100%;
        }
    </style>

</head>

<body>
    <!-- action = Menghubungkan File Ke index.php Dengan Menthod POST -->
    <form action="index.php" method="POST">
    <div class="wrapper">
        <div class="input-data">
            <input type="text" name="nme" placeholder="Masukkan Nama Anda" required>
            <div class="underline"></div>
            <label for="">Nama</label>
            <button type="submit">
                ENTER
            </button>
        </div>
    </div>
    </form>
</body>

</html>