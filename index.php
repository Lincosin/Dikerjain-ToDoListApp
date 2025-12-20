<?php
  session_start();
  if (isset($_SESSION['login'])) {
      header('Location: /public/homepage.php');
      exit();
  }

  if(isset($_POST['login'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];

      if($username === 'user' && $password === 'pw') {
          $_SESSION['login'] = true;
          header('Location: /public/homepage.php');
          exit();
      } else {
          $error = "Username atau password salah.";
      }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to ToDo List App</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="min-h-screen flex items-center justify-center bg-[#94B4C1]">
        <div class="flex w-full max-w-3xl max-h-screen bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="w-1/2 bg-white text-white p-10 flex flex-col justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-16 mb-6">
                <circle cx="6" cy="12" r="1.5" fill="red" />
                <circle cx="12" cy="12" r="1.5" fill="orange" />
                <circle cx="18" cy="12" r="1.5" fill="green" />
            </svg>
            <img src="src/img/ilust1.jpg" alt="Illustration" class="w-full h-auto mb-4">
            <p class="text-md text-black font-md text-center mb-4">Stay organized. Stay ahead.</p>
            </div>

            <div class="flex flex-col px-5 w-1/2">
                <div class="pt-10">
                    <h2 class="text-3xl font-bold text-center text-black">Hola Amigo!</h2>
                    <p class="text-md text-center text-gray-600">Login to your account to continue</p>
                </div>
                <form action="" method="POST" class="p-10 flex flex-col gap-2 space-y-2">
                    <p class="text-md font-semibold">Username</p>
                    <input type="text" name="username" class="border border-gray-300 py-2 px-4 w-full rounded-sm focus:outline-none focus:border-blue-400 focus:ring-2 focus:ring-blue-100" placeholder="Masukkan Username...">
                    <p class="text-md font-semibold">Password</p>
                    <input id="password" type="password" name="password" class="border border-gray-300 py-2 px-4 w-full rounded-sm focus:outline-none focus:border-blue-400 focus:ring-2 focus:ring-blue-100" placeholder="Masukkan Password...">

                    <label class="inline-flex items-center">
                        <input type="checkbox" id="togglePassword" class="form-checkbox h-5 w-5 text-black">
                        <span class="ml-2 text-gray-700">Show Password</span>
                    </label>
                    <button type="submit" name="login" class="w-full cursor-pointer bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">Login</button>
                    
                    <div class=" text-center text-sm text-gray-600">
                    Don't have an account? <a href="public/signup.php" class="text-blue-600 font-semibold hover:underline">Sign up</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>
</html>

<script>
    const passwordInput = document.getElementById("password");
    const togglePassword = document.getElementById("togglePassword");

    togglePassword.addEventListener("change", function() {
        if (this.checked) {
        passwordInput.type = "text";   // tampilkan password
        } else {
        passwordInput.type = "password"; // sembunyikan password
        }
    });
</script>