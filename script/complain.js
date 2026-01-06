function handleComplaintType() {
    const type = document.getElementById("complaintType").value;
    const anonBox = document.getElementById("anonymousBox");
    const anonCheck = document.getElementById("anonymous");
    const identity = document.getElementById("identityFields");

    if (type === "Harassment") {
        anonBox.style.display = "block";
        identity.style.display = "block";
    } else {
        // RESET EVERYTHING
        anonBox.style.display = "none";
        anonCheck.checked = false;
        identity.style.display = "block";
    }
}

function toggleAnonymous() {
    const anon = document.getElementById("anonymous").checked;
    const identity = document.getElementById("identityFields");

    identity.style.display = anon ? "none" : "block";
}

function validateComplaint() {
    const type = document.getElementById("complaintType").value;
    const anon = document.getElementById("anonymous").checked;
    const name = document.getElementById("name").value.trim();
    const sem = document.getElementById("semester").value.trim();

    if (type !== "Harassment" && (name === "" || sem === "")) {
        alert("Please fill your name and semester.");
        return false;
    }

    if (type === "Harassment" && !anon && (name === "" || sem === "")) {
        alert("Fill name & semester or choose anonymous.");
        return false;
    }

    return true;
}
