window.addEventListener("load", function(event) {

    // Product modal
    const form = document.getElementById("formDelete");
    const validateDelete = document.querySelector('.validateDelete')

    validateDelete.addEventListener('click', () => {
        form.submit()
    })

});
