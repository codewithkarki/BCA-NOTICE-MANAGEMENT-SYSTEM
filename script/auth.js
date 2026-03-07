function submitRegister() {

const name = document.getElementById("name").value.trim();
const phone = document.getElementById("phone").value.trim();
const regno = document.getElementById("regno").value.trim();
const password = document.getElementById("password").value;
const confirmPassword = document.getElementById("confirmPassword").value;

const namePattern = /^[A-Za-z ]+$/;
const phonePattern = /^9[78][0-9]{8}$/;
const regPattern = /^[0-9]+$/;
const passwordPattern = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/;

if (!namePattern.test(name)) {
alert("Full name should contain letters only.");
return false;
}

if (!phonePattern.test(phone)) {
alert("Enter valid Nepali phone number (98XXXXXXXX or 97XXXXXXXX).");
return false;
}

if (!regPattern.test(regno)) {
alert("Registration number should contain digits only.");
return false;
}

if (!passwordPattern.test(password)) {
alert(
"Password must contain:\n" +
"- Minimum 8 characters\n" +
"- 1 uppercase letter\n" +
"- 1 number\n" +
"- 1 special character"
);
return false;
}

if (password !== confirmPassword) {
alert("Passwords do not match.");
return false;
}

return true;
}