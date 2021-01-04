
<!DOCTYPE html>
<html class="loading"  lang="ar" data-textdirection="rtl">
  <head>
     @include('partials.head')
  </head>
  <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" 
  data-open="click" data-menu="vertical-menu" data-col="2-columns">

    @include('partials.nav')
    @include('partials.menu')
    @include('partials.content')
    @include('partials.footer')
    @include('partials.scripts')
    @include('js.csrf')
    @yield('js')

<style type="text/css">
  .delete-item{
    color: red;
  }
</style>
 </body>
</html>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://dev.joshmoto.wtf/iris/dist/iris.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.1/js/bootstrap-colorpicker.min.js"></script> 
<script>
// each loop the iris wrapper class elems
$('.iris-wrapper','#form').each(function() {

// set up current object vars
var $input 			= $('INPUT', this);
var $inputGroup 		= $('.input-group', this);
var $inputIndicator   = $('.input-group-text', this);

// set our input color indicator to default color
$inputIndicator.css('background-color', $input.val());

// init iris
$input.iris({
  // on iris change
  change: function(event, ui) {
    // update input value on change
    $input.attr('value', ui.color.toString());
    // load the current value
    $inputIndicator.css('background-color', ui.color.toString());
  }
});

// move iris color picker after the input group
$('.iris-picker', this).insertAfter($inputGroup);

// input blur function
$input.blur(function() {
  setTimeout(function() {
    if (!$(document.activeElement).closest(".iris-picker").length)
      $input.iris('hide');
    else
      $input.focus();
  }, 0);
});

// when input is focused
$input.focus(function() {
  // input iris show
  $input.iris('show');
});

});

$(document).ready(function() {

    $('.colorpicker').colorpicker();

    
    var attachArray = [];
    $(document).on("change" , "#colors" , function() {
      
      attachArray.push($(this).val()) ;
      $("#colorsChosen").append(
        '<span class="dot" style="background-color: '+ $(this).val()+'"></span> &nbsp;');
      $('#attachments').val(attachArray); 
    });
});


</script>