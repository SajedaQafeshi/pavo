
@if (app()->isLocale('en'))
  <ol dir="ltr" class="breadcrumb" style="background-color: white">    
    <li class="breadcrumb-item active">{{$action}}</li>
    <li class="breadcrumb-item"><a href="{{$method['url']}}">{{$method['name']}}</a>
  </ol>
@else @if (app()->isLocale('ar'))
  <ol dir="rtl" class="breadcrumb" style="background-color: white">
    <li class="breadcrumb-item"><a href="{{$method['url']}}">{{$method['name']}}</a>
    <li class="breadcrumb-item active">{{$action}}</li>
  </ol>
@endif
@endif


