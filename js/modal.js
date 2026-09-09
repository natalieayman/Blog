function openAddBlog() {
  document.getElementById("addBlogModal").style.display = "block";
}

function closeAddBlog() {
  document.getElementById("addBlogModal").style.display = "none";
}

function openUpdate(id, title, content, category) {
  document.getElementById("updateModal").style.display = "block";

  document.getElementById("updateBlogId").value = id;
  document.getElementById("updateTitle").value = title;
  document.getElementById("updateContent").value = content;
  document.getElementById("updateCategory").value = category;
}

function closeUpdate() {
  document.getElementById("updateModal").style.display = "none";
}
