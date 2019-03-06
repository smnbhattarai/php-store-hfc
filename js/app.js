ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );


// Confirm product delete by admin
const adminDelBtns = document.querySelectorAll('.admin-product-delete');