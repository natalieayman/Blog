document
  .getElementById("commentForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();

    let formData = new FormData(this);

    fetch("add-comment.php", {
      method: "POST",
      body: formData,
    })
      .then(function (response) {
        return response.text();
      })
      .then(function (data) {
        document.getElementById("commentsList").innerHTML += data;

        document.querySelector("textarea[name='comment']").value = "";
      });
  });
