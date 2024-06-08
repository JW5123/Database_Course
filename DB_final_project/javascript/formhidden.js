function showForm(type) {
    document.getElementById('dynamicForm').style.display = 'block';
    document.getElementById('specialtyFields').style.display = 'none';
    document.getElementById('educationFields').style.display = 'none';

    if (type === 'specialty') {
        document.getElementById('specialtyFields').style.display = 'flex';
    } else if (type === 'education') {
        document.getElementById('educationFields').style.display = 'flex';
    }
}

function hideForm() {
    document.getElementById('dynamicForm').style.display = 'none';
}

function handleSubmit(event) {
    event.preventDefault();

    hideForm();

    // alert('表单提交成功！');
    // console.log('表单数据已提交');
}