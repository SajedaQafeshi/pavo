
<!DOCTYPE html>
<html class="loading" lang="{{ app()->getLocale() }}" data-textdirection="rtl">
  <head>
     @include('pages.partials.head')
  </head>
  <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" 
  data-open="click" data-menu="vertical-menu" data-col="2-columns">

    @include('pages.partials.nav')
    @include('pages.partials.menu')
    @include('pages.partials.content')
    @include('pages.partials.footer')
    @include('pages.partials.scripts')

   

<style type="text/css">
  .delete-item{
    color: red;
  }
</style>
 </body>
</html>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
