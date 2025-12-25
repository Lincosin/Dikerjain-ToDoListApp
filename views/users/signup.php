<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="min-h-screen flex items-center justify-center bg-[#EAE0CF]">
        <div class="flex w-full max-w-4xl max-h-screen bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="w-1/2 bg-white text-white p-10 flex flex-col justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-16 mb-5">
                <circle cx="6" cy="12" r="1.5" fill="red" />
                <circle cx="12" cy="12" r="1.5" fill="orange" />
                <circle cx="18" cy="12" r="1.5" fill="green" />
            </svg>
            <img src="../src/img/ilust2.jpg" alt="Illustration" class="w-full h-auto mb-4">
            <p class="text-md text-black font-md text-center mb-4">Stay organized. Stay ahead.</p>
            </div>

            <div class="flex flex-col px-5 w-1/2">
                <div class="pt-10">
                    <h2 class="text-3xl font-bold text-center text-black">Howdy There!</h2>
                    <p class="text-md text-center text-gray-600">Let's start our new journey.</p>
                </div>
                <?php if (isset($error)): ?> 
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded relative"> <?php echo htmlspecialchars($error); ?> 
                </div> 
                <?php endif; ?>

                <form action="../index.php?page=user&action=register" method="POST" class="p-10 flex flex-col gap-2 space-y-2">
                    <p class="text-md font-semibold">Create New Username</p>
                    <input type="text" name="username" class="border border-gray-300 py-2 px-4 w-full rounded-sm focus:outline-none focus:border-[#EAE0CF] focus:ring-2 focus:ring-[#efe9df]" placeholder="Insert New Username...">
                    <p class="text-md font-semibold">Insert New Email</p>
                    <input type="text" name="email" class="border border-gray-300 py-2 px-4 w-full rounded-sm focus:outline-none focus:border-[#EAE0CF] focus:ring-2 focus:ring-[#efe9df]" placeholder="Insert New Email...">
                    <p class="text-md font-semibold">Create New Password</p>
                    <input id="password" type="password" name="password" class="border border-gray-300 py-2 px-4 w-full rounded-sm focus:outline-none focus:border-[#EAE0CF] focus:ring-2 focus:ring-[#efe9df]" placeholder="Insert New Password...">
                    <p class="text-md font-semibold">Confirm New Password</p>
                    <input id="password" type="password" name="confirm_password" class="border border-gray-300 py-2 px-4 w-full rounded-sm focus:outline-none focus:border-[#EAE0CF] focus:ring-2 focus:ring-[#efe9df]" placeholder="Confirm New Password...">

                    <label class="inline-flex items-center">
                        <input type="checkbox" id="togglePassword" class="form-checkbox h-5 w-5 text-black">
                        <span class="ml-2 text-gray-700">Show Password</span>
                    </label>
                    <button type="submit" class="w-full cursor-pointer bg-[#CA7842] text-white py-2 rounded-md hover:bg-[#4B352A] transition">Sign Up</button>
                    
                    <div class=" text-center text-sm text-gray-600">
                    already have an account? <a href="../index.php" class="text-[#CA7842] font-semibold hover:underline">Log in</a>
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