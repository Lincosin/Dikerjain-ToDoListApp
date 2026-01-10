function applyTheme() {
  const theme = localStorage.getItem("theme");

  if (theme === "dark") {
    document.documentElement.classList.add("dark");
  } else {
    document.documentElement.classList.remove("dark");
  }

  updateLogo();
}

function updateLogo() {
  const logo = document.getElementById("logo");
  if (!logo) return;

  const isDark = document.documentElement.classList.contains("dark");
  logo.src = isDark
    ? "/src/img/logo-dark.png"
    : "/src/img/logo.jpeg";
}

// Saat halaman load
document.addEventListener("DOMContentLoaded", applyTheme);
