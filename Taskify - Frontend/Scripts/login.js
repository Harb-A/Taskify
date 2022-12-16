window.onload = () => {
  // let themeLink = document.getElementById("theme-link");
  // let themeSelect = document.getElementById("theme");

  // const themeSwitch = () => {
  //   if (themeSelect.value === "1") {
  //     themeLink.href = "../Styles/login.css";
  //   } else if (themeSelect.value === "2") {
  //     themeLink.href = "../Styles/login-dark.css";
  //   }
  // };

  // themeSelect.onchange = themeSwitch;

  const form = document.getElementById("loginForm");

  form.addEventListener("submit", async function (e) {
    e.preventDefault();

    const data = new FormData(form);

    try {
      const res = await axios.post("http://localhost:8000/api/login", data);
      if (res.data.status == "success") {
        console.log(res.data.authorisation.token);
        alert("Logged in  successfuly!");
        form.reset();
      } else {
        alert("Email password mismatch");
      }
    } catch (err) {
      console.log(err);
    }
  });
};
