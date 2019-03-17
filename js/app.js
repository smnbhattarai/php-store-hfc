ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );


const adminDelBtns = document.querySelectorAll('.admin-product-delete');
adminDelBtns.forEach(function(btn){
    btn.addEventListener('click', function(e){
        if(!confirm("Are you sure you want to delete this product?")) {
            e.preventDefault();
        }
    });
});


// confirm remove from cart action
const removeItemBtn = document.querySelectorAll('.remove-cart-item');
removeItemBtn.forEach(function(btn){
    btn.addEventListener('click', function(e){
        if(!confirm("Are you sure you want to remove this item from cart?")){
            e.preventDefault();
        }
    });
});