window.onload = () => {
  let themeLink = document.getElementById("theme-link");
  let themeSelect = document.getElementById("theme");

  const themeSwitch = () => {
    if (themeSelect.value === "1") {
      themeLink.href = "../Styles/login.css";
    } else if (themeSelect.value === "2") {
      themeLink.href = "../Styles/login-dark.css";
    }
  };

  themeSelect.onchange = themeSwitch;
};
