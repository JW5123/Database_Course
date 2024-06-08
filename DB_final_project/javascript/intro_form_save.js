var form = document.getElementById('data-form');
var saveButton = document.getElementById('save-button');

window.onload = function() {
    var formData = JSON.parse(localStorage.getItem('formData'));
    if (formData) {
        document.getElementById('name').value = formData.name || '';
        document.getElementById('en_name').value = formData.en_name || '';
        document.getElementById('position').value = formData.position || '';
        document.getElementById('phone').value = formData.phone || '';
        document.getElementById('mail').value = formData.mail || '';
        document.getElementById('office').value = formData.office || '';
        document.getElementById('introduce').value = formData.introduce || '';
    }
};

saveButton.addEventListener('click', function() {
    var formData = {
        name: document.getElementById('name').value,
        en_name: document.getElementById('en_name').value,
        position: document.getElementById('position').value,
        phone: document.getElementById('phone').value,
        mail: document.getElementById('mail').value,
        office: document.getElementById('office').value,
        introduce: document.getElementById('introduce').value
    };
    localStorage.setItem('formData', JSON.stringify(formData));
});

