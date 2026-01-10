function openComplaintModal(type, name, semester, anonymous, description, date) {
    document.getElementById('cType').innerText = type;
    document.getElementById('cName').innerText = name;
    document.getElementById('cSemester').innerText = semester;
    document.getElementById('cAnonymous').innerText = anonymous;
    document.getElementById('cDescription').innerText = description;
    document.getElementById('cDate').innerText = date;

    document.getElementById('complaintModal').style.display = 'flex';
}

function closeComplaintModal() {
    document.getElementById('complaintModal').style.display = 'none';
}