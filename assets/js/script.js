$(function () {
    $('#producerForm').hide();
    $(function showForm() {
        let viewForm = document.getElementById('produceForm');
        if (viewForm.style.display == 'block') {
            viewForm.style.display = 'none';
        } else {
            viewForm.style.display = 'block';
        }
    });
});
