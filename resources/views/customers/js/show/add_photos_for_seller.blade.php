<script type="text/javascript">
	

	  $( document ).delegate( ".add_photos_for_seller", "click", function() {

	  	 // get transaction id from div
         var seller_id =$(this).attr('seller_id');

         //call by ajax
         $.post( '{{url("sellers/add_photos_for_seller")}}', {seller_id:seller_id})
          .done(function( data ) {


                          //remove model form html dom if exist
                $('#add_photos_for_seller_modal').remove();

                //append model to html dom
                $( "body").append( data );

                //popup a model
                $('#add_photos_for_seller_modal').modal();


             

            }); 

	  });

$( document ).delegate( ".add_photos_for_seller_form", "submit", function() {




var formData = new FormData(this);
 
 
 
$.ajax({
 
   type:'POST',
 
   url: '{{url("sellers/add_photos_for_seller_post")}}',
 
   data:formData,
 
   cache:false,
 
   contentType: false,
 
   processData: false,
 
   success:function(data){
 
       document.location ="";
 
   },
 
   error: function(xhr){
 


             if( xhr.status === 401 ) 
              { 
                document.location= "{{url('login')}}";
              }
              else if( xhr.status === 422 ) 
              {

            
                let errors = xhr.responseJSON;
                let errorsHtml ='<ul>';

                   $.each( errors.errors , function( key, value ) {
                      errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
                  });
                    errorsHtml+='</ul>';
                    $('.add_photos_for_seller_errors').removeClass('d-none');
                    $('.add_photos_for_seller_errors').html(errorsHtml);

               }
               else
               {
                   $('.add_photos_for_seller_errors').removeClass('d-none');
                   $('.add_photos_for_seller_errors').html(error);
               }
 
   }
 
});


          return false;

	  });


$( document ).delegate( "#fileupload", "change", function() {
  
        $('div.gallery').html('');
        
        imagesPreview(this, 'div.gallery');


});

    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img class="img-thumbnail rounded  m-1" style="height:90px;">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

</script>