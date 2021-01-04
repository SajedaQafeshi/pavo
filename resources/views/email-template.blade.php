<!doctype html>
<html lang="ar">
  <head>
    <title>Pavo Cristatus Fashion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container" dir="rtl"> 
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-sm-12 m-auto">
                <h3>Pavo Cristatus Fashion</h3>
                <?php
                //  $destination = public_path() . '/storage/subscribtions/'. $image;
                ?>
                <center>
                  <h2>{{$title}}</h2>
                  <img class="brand-logo" alt="logo" style="height: 85px;"
                    src="{{ $message->embed(public_path() . '/opa_logo1.png') }}">
                  </br>
                  </br>
                  <h4>خصم بنسبة 
                      <span style="font-size:17px; color:red">
                      {{$discount}} %
                      </span>
                  </h4>
                </center>
                <div class="col-xl-12 col-lg-6 col-sm-12 m-auto">
                  <p> {{$body}}</p>
                  <center>
                      <img class="img-responsive" style="width:100%; height: 100%; object-fit: contain"
                      src="{{$message->embed(public_path() . '/storage/subscribtions/'. $image)}}">
                  </center>
                  <br/>
                  <br/>
                  <p> شكرا لتواصلكم معنا</p>
                  <p>فريق 
                      <span style="font-size:13px;">
                      Pavo Cristatus Fashion
                      </span>
                  </p>
              </div>
            </div>
        </div>
    </div>
  </body>
</html>