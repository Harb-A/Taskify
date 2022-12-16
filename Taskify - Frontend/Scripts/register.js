window.onload = () => {
  let themeLink = document.getElementById("theme-link");
  let themeSelect = document.getElementById("theme");

  const themeSwitch = () => {
    if (themeSelect.value === "1") {
      themeLink.href = "../Styles/register.css";
    } else if (themeSelect.value === "2") {
      themeLink.href = "../Styles/register-dark.css";
    }
  };

  themeSelect.onchange = themeSwitch;
  const form = document.getElementById("registerForm");

  form.addEventListener("submit", async function (e) {
    e.preventDefault();

    const data = new FormData(form);

    try {
      const res = await axios.post("http://localhost:8000/api/register", data);
      if (res.data.status == "success") {
        alert("Registered account successfuly!");
        location.replace("http://127.0.0.1:5500/Pages/login.html");
      } else {
        alert("Email already exists!");
      }
    } catch (err) {
      console.log(err);
    }
  });
};
