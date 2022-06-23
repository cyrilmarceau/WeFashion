window.addEventListener("load", function(event) {

    // Product modal
    const form = document.getElementById("formDelete");
    const validateDelete = document.querySelector('.validateDelete');

    if (validateDelete !== null) {
        validateDelete.addEventListener('click', (e) => {
            form.submit();
        })
    }
});
