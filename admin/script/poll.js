function addOption() {
    const container = document.getElementById("optionsContainer");
    const input = document.createElement("input");
    input.type = "text";
    input.placeholder = "New Option";
    input.required = true;
    container.appendChild(input);
}

document.getElementById("createPollForm").addEventListener("submit", function(e) {
    e.preventDefault();
    alert("Poll created successfully (UI only)");
});
