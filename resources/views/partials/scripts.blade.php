   
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js" async defer></script>

    <script src="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/vendors/js/vendors.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyBToaaKJAoTl6Wa6ckuPP0QwTe34-6A4"  ></script>
    <script src="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
    <script src="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/vendors/js/extensions/jquery.knob.min.js"></script>
    <script src="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/vendors/js/extensions/unslider-min.js"></script>
    <script src="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/js/core/app-menu.min.js"></script>

    <script src="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/js/core/app.min.js"></script>
    

    <script src="{{url('/js/infobox.js')}}"></script>

  <script type="text/javascript">
      
      $('.menu-counter-text').text( $('.menu-counter li').length);
  </script>  
        <script src="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
      <script src="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/js/scripts/forms/select/form-select2.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

      <script type="text/javascript">
          
          $('.select2tags').select2({});

          $('.date').datepicker({  
       format: 'mm-dd-yyyy'
     });
     $( ".date" ).datepicker({
        format: "mm/dd/yy",
        weekStart: 0,
        calendarWeeks: true,
        autoclose: true,
        todayHighlight: true,
        rtl: true,
        orientation: "auto"
        });

        $(document).on('click', '.imageFullScreen', function() { 
            id = $(this).attr('data-id');
            var html="";
            $.ajax({
                url: '/product/zoom/'+ id,
                method:"GET",
                dataType:"json",
                success: function(data) {
                    var image = "/storage/product/"+ data.slug;
                    $("#fullScreenImage").attr("src", image);
                    $('#imageFullScreenModal').modal('show');
                }
            });
        });

      </script>

 <style>
     
     .bootstrap-datetimepicker-widget  .table{
    
         width:100% !important;
         padding:0px !important;
         margin:0px !important;
     }
        .bootstrap-datetimepicker-widget  .table *{
        
         width:100% !important;
         padding:0.3em !important;
        
     }
 </style>
  

  