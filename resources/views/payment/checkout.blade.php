<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Braintree-Demo</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
</head>

<body id="checkout">
  <div id="navbar_checkout">
    @include('layouts/auth/partials/navbar')
  </div>
  <div class="container">
    <div class="row">
      <div>
        <div id="dropin-container">
        </div>
        <div id="buttons_checkout">
          <button id="submit-button"><i class="fas fa-lock"></i>Purchase</button>
          <form action="{{route('dashboard.sponsorships.index')}}">
            <button class="btn" type="submit"><i class="fas fa-arrow-left"></i> Go Back</button>
          </form>
        </div>

      </div>
    </div>
  </div>




  <script>
    var user = {!!$user!!};
    var sponsorship = {!!$user_sponsorship!!};
    console.log(sponsorship);
    var button = document.querySelector('#submit-button');
    braintree.dropin.create({
      authorization: "{{ Braintree\ClientToken::generate() }}",
      container: '#dropin-container'
    }, function(createErr, instance) {
      button.addEventListener('click', function() {
        instance.requestPaymentMethod(function(err, payload) {
          console.log(payload);
          $.get('{{ route('payment') }}', {
              payload,
              sponsorship,
              user
            },
            function(response) {
              if (response.success) {
                document.getElementById('submit-button').style.visibility = 'hidden';
                alert('Payment successfull!');
                console.log(response);
              } else {
                alert('Payment failed');
                console.log(payload);
              }
            }, 'json');
        });
      });
    });
  </script>
</body>

</html>