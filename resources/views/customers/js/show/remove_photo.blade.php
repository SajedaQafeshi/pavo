<script type="text/javascript">
	
	  $( document ).delegate( ".remove_photo", "click", function() {

	  	 // get transaction id from div
         var media_id =$(this).attr('media_id');
  var c = confirm("@lang('main.confirm_remove_photo')");
if(c==true)
{

         //call by ajax
         $.post( '{{url("sellers/remove_photo")}}', {media_id:media_id})
          .done(function( data ) {


                   document.location ="";
             

            }); 
}


	  });

</script>