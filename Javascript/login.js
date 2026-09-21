// LOGIN FORM HANDLER - handled by PHP now
const loginForm = document.getElementById("loginForm");
// No JS interception needed for login, form action handles it.

// REGISTRATION FORM HANDLER
const registerForm = document.getElementById("registerForm");
if (registerForm) {
  registerForm.addEventListener("submit", function (e) {
    // Only prevent default if passwords don't match
    const pass = document.getElementById("password").value;
    const confirm = document.getElementById("confirmPassword").value;

    if (pass !== confirm) {
      e.preventDefault();
      alert("Passwords do not match!");
      return;
    }
    // If simple validation passes, let the form submit to PHP
  });
}
