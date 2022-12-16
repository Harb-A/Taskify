window.onload = () => {
  const form = document.getElementById("pForm");

  form.addEventListener("submit", async function (e) {
    e.preventDefault();

    const data = new FormData(form);
    const token = localStorage.getItem("token");

    try {
      const res = await axios.post(
        "http://localhost:8000/api/createProject",
        data,
        {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        }
      );
      if (res.data.status == "success") {
        alert("Created project successfuly!");
        //location.replace("http://127.0.0.1:5500/Pages/login.html");
      } else {
        alert("Email already exists!");
      }
    } catch (err) {
      console.log(err);
    }
  });
};
