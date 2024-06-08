var form = document.getElementById('data-form2');
var saveButton = document.getElementById('save-button');

window.onload = function() {
    var formData = JSON.parse(localStorage.getItem('formData2'));
    if (formData) {
        document.getElementById('NSC').value = formData.name || '';
        document.getElementById('NSC_Quota').value = formData.en_name || '';
        document.getElementById('project').value = formData.position || '';
        document.getElementById('project_quota').value = formData.phone || '';
        document.getElementById('content').value = formData.mail || '';
    }
};

saveButton.addEventListener('click', function() {
    var formData = {
        name: document.getElementById('NSC').value,
        en_name: document.getElementById('NSC_Quota').value,
        position: document.getElementById('project').value,
        phone: document.getElementById('project_quota').value,
        mail: document.getElementById('content').value
    };
    localStorage.setItem('formData2', JSON.stringify(formData));
});

