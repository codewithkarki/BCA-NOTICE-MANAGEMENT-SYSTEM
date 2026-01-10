function handleComplaintType() {
    const type = document.getElementById('complaintType').value;
    const identityFields = document.getElementById('identityFields');
    const anonymousBox = document.getElementById('anonymousBox');
    const anonymousCheckbox = document.getElementById('anonymous');

    if (type === 'Harassment') {
        anonymousBox.style.display = 'block';

        if (anonymousCheckbox.checked) {
            identityFields.style.display = 'none';
            setRequired(false);
        } else {
            identityFields.style.display = 'block';
            setRequired(true);
        }
    } else {
        anonymousBox.style.display = 'none';
        anonymousCheckbox.checked = false;
        identityFields.style.display = 'block';
        setRequired(true);
    }
}

function toggleAnonymous() {
    const anonymousCheckbox = document.getElementById('anonymous');
    const identityFields = document.getElementById('identityFields');

    if (anonymousCheckbox.checked) {
        identityFields.style.display = 'none';
        setRequired(false);
    } else {
        identityFields.style.display = 'block';
        setRequired(true);
    }
}

function setRequired(required) {
    document.querySelector('input[name="name"]').required = required;
    document.querySelector('input[name="semester"]').required = required;
}

/* Optional safety validation */
function validateComplaint() {
    const type = document.getElementById('complaintType').value;
    const anonymous = document.getElementById('anonymous').checked;
    const desc = document.querySelector('textarea[name="description"]').value.trim();

    if (type === '') {
        alert('Please select complaint type');
        return false;
    }

    if (desc === '') {
        alert('Please enter complaint description');
        return false;
    }

    if (type === 'Harassment' && anonymous) {
        return true;
    }

    if (!anonymous) {
        const name = document.querySelector('input[name="name"]').value.trim();
        const semester = document.querySelector('input[name="semester"]').value.trim();

        if (name === '' || semester === '') {
            alert('Name and Semester are required');
            return false;
        }
    }

    return true;
}
