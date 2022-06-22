window.addEventListener("load", function(event) {

  const test = document.querySelector('.delete');

  const attr = test.getAttribute('data-attr');
  console.log('attr', attr)
    test.addEventListener('click', (e) => {
      const modal = document.querySelector('#smallModal');

      modal.classList.toogle('show')
    })
    //  $(document).on('click','.delete',function(){
    //      let id = $(this).attr('data-id');
    //      $('#id').val(id);
    //      console.log('id', id)
    // });
});