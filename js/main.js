document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".faq-item button").forEach((button) => {
    button.addEventListener("click", () => {
      const item = button.closest(".faq-item");
      const isOpen = item.classList.contains("open");
      item.parentElement
        .querySelectorAll(".faq-item")
        .forEach((faq) => faq.classList.remove("open"));
      if (!isOpen) item.classList.add("open");
      button.setAttribute("aria-expanded", String(!isOpen));
    });
  });

  const form = document.getElementById("contact-form");
  if (form) {
    form.addEventListener("submit", (event) => {
      event.preventDefault();
      if (!form.checkValidity()) {
        form.classList.add("was-validated");
        return;
      }
      const alertBox = document.getElementById("form-success");
      if (alertBox) {
        alertBox.classList.remove("d-none");
        form.reset();
        form.classList.remove("was-validated");
      }
    });
  }
});
