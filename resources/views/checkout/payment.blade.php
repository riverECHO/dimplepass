@extends('_layouts.body')

@section('meta-page')
  <title>The Dimple Pass | Save Money on National Park Travel</title>
  <meta name="description" content="Meta Description Here" />
@stop

@section('meta-og')
  <meta property="og:type" content="article"/>
  <meta property="og:title" content="OG Title Here"/>
  <meta property="og:url" content="{{ Request::url() }}"/>
  <meta property="og:image" content="OG Image URL Here."/>
  <meta property="og:site_name" content="Dimple Pass"/>
  <meta property="og:description" content="OG Description Here."/>
  <meta property="og:locale" content="en_US"/>
@stop

@section('logo-tag')
Page Title
@stop

@section('content')

{{-- Page Content --}}
<div class="container padding-bottom-3x mb-2">
  <div class="row mt-5">

    <div class="col-xl-9 col-lg-8">

      {{-- Checkout Steps --}}
      <div class="checkout-steps hidden-xs-down">
        <a class="active" href="/checkout/payment">2. Payment</a>
        <a class="completed" href="/checkout"><span class="step-indicator icon-circle-check"></span><span class="angle"></span>1. My Profile</a>
      </div>

      {{-- Start Form --}}
      {!! Form::open(['action' => 'CheckoutController@checkoutPaymentStore','method' => 'POST', 'class' => 'interactive-credit-card', 'id' => 'checkoutPayment']) !!}

        {{-- Credit Card --}}
        <div class="card">
          <div class="card-header" role="tab">
            <h6>We accept following credit cards:&nbsp;<img class="d-inline-block align-middle" src="/img/credit-cards.png" style="width: 120px;" alt="Cerdit Cards"></h6>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="form-group col-md-4">
                <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                    {!! Form::text('number', null, ['class' => 'form-control form-control-rounded', 'required' => 'required', 'placeholder' => 'Card Number']) !!}
                    <small class="text-danger">{{ $errors->first('number') }}</small>
                </div>
              </div>
              <div class="form-group col-md-4">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {!! Form::text('name', null, ['class' => 'form-control form-control-rounded', 'required' => 'required', 'placeholder' => 'Name on Card']) !!}
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>
              </div>
              <div class="form-group col-md-2">
                <div class="form-group{{ $errors->has('expiry') ? ' has-error' : '' }}">
                    {!! Form::text('expiry', null, ['class' => 'form-control form-control-rounded', 'required' => 'required', 'placeholder' => 'MM/YY']) !!}
                    <small class="text-danger">{{ $errors->first('expiry') }}</small>
                </div>
              </div>
              <div class="form-group col-md-2">
                <div class="form-group{{ $errors->has('cvc') ? ' has-error' : '' }}">
                    {!! Form::text('cvc', null, ['class' => 'form-control form-control-rounded', 'required' => 'required', 'placeholder' => 'CVC']) !!}
                    <small class="text-danger">{{ $errors->first('cvc') }}</small>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="card-wrapper"></div>
              </div>
            </div>
          </div>
        </div>

        {{-- Billing Address --}}
        <div class="card mt-5">
          <div class="card-header" role="tab">
            <h6>Billing address</h6>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group{{ $errors->has('address1') ? ' has-error' : '' }}">
                    {!! Form::label('address1', 'Address 1 <i class="pe-7s-leaf dp-warning"></i>', [], false) !!}
                    {!! Form::text('address1', null, ['class' => 'form-control form-control-rounded', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('address1') }}</small>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group{{ $errors->has('address2') ? ' has-error' : '' }}">
                    {!! Form::label('address2', 'Address 2', [], false) !!}
                    {!! Form::text('address2', null, ['class' => 'form-control form-control-rounded']) !!}
                    <small class="text-danger">{{ $errors->first('address2') }}</small>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                    {!! Form::label('city', 'City/Town <i class="pe-7s-leaf dp-warning"></i>', [], false) !!}
                    {!! Form::text('city', null, ['class' => 'form-control form-control-rounded', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('city') }}</small>
                </div>
              </div>
              <div class="form-group col-md-2">
                <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                    {!! Form::label('state', 'ST <i class="pe-7s-leaf dp-warning"></i>', [], false) !!}
                    {!! Form::text('state', null, ['class' => 'form-control form-control-rounded', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('state') }}</small>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}">
                    {!! Form::label('zipcode', 'Zip Code <i class="pe-7s-leaf dp-warning"></i>', [], false) !!}
                    {!! Form::text('zipcode', null, ['class' => 'form-control form-control-rounded', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('zipcode') }}</small>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                    {!! Form::label('country', 'Country') !!}
                    {!! Form::select('country', $selectCountries, null, ['id' => 'country', 'class' => 'form-control form-control-rounded', 'required' => 'required', 'placeholder' => 'Choose --']) !!}
                    <small class="text-danger">{{ $errors->first('inputname') }}</small>
                </div>
              </div>
            </div>
          </div>
        </div>

        {{-- Checkout Step Buttons --}}
        <div class="checkout-footer margin-top-1x">
          <div class="column">
            <a class="btn btn-outline-secondary" href="/checkout"><i class="icon-arrow-left"></i><span class="hidden-xs-down"> Profile</span></a>
          </div>
          <div class="column">
            {!! Form::button('<span class="hidden-xs-down">Complete Order </span><i class="icon-arrow-right"></i></a>', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
          </div>
        </div>

    </div>

    {{-- Sidebar --}}
    <div class="col-xl-3 col-lg-4 hidden-xs-down">

      <aside class="user-info-wrapper">
        <div class="user-cover" style="background-image: url(/img/account/user-cover-img.jpg);">
          {{-- <div class="info-label" data-toggle="tooltip" title="You currently have 290 Reward Points to spend"><i class="icon-medal"></i>290 points</div> --}}
        </div>
        <div class="user-info">
          <div class="user-avatar"><a class="edit-avatar" href="#"></a><img src="/img/account/user-ava.jpg" alt="User"></div>
          <div class="user-data">
            <h4>Happy GoLucky</h4>
            <span>Joined February 06, 2017</span>
          </div>
        </div>
      </aside>
      <nav class="list-group mb-4">
        <a class="list-group-item with-badge active" href="/member/"><i class="icon-tag"></i>My Passes<span class="badge badge-primary badge-pill">5</span></a>
        <a class="list-group-item" href="/member/edit"><i class="icon-head"></i>My Profile</a>
      </nav>

      @include('/checkout/_inc/ordersummary')
    </div>

    {{-- End Form --}}
    {!! Form::close() !!}

  </div>
</div>

@stop

@section('scripts')
<script>

//////////
/// On Page Load
//////////

$(function() {

  /// Add total of all passes.
  addTotalDue();

});

//////////
/// Direct Donation sync and math.
//////////

$('.donate4').on('click', function() {
  if($(this).is(':checked')) {
    $('.donate4').prop('checked', true);
    $('#dropdown-donate4').show();
  } else {
    $('.donate4').prop('checked', false);
    $('#dropdown-donate4').hide();
  }
  // Fire donation math.
  addTotalDue();
});

//////////
/// Remove pass
//////////

$('.removePass').on('click', function(e) {
    e.preventDefault();
  // Get Pass ID.
  var passid = $(this).data('passid');
  // Submit Ajax to remove item from cart.

  // Remove pass from table.
  $(this).closest('tr').remove();
  // Remove pass from header drop down and order summary.
  $('.passid-' + passid + '').remove();
  // Update total number in cart in header.
  passCountSubtract();
  addTotalDue();
});

//////////
/// Update Pass Count in Header after removal
//////////

function passCountSubtract() {
  var count = Number($('#count').text());
  count--;
  $(".count").text(count).fadeIn(1200);
}

//////////
/// Add total due and display
//////////

function addTotalDue() {
  // Add total of passes.
  totalPasses = 0;
  $('.passFee').each(function(){
      totalPasses += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
  });
  // Add donation.
  if ($('#donate4').is(':checked')) {
    var donateAmount = 4;
  } else {
    var donateAmount = 0;
  }
  $('.donateAmount').text(addCommas(roundTo(donateAmount, 0)));
  // Add total of passes and donation.
  var total = totalPasses + donateAmount; 
  $('.totalDue').text(addCommas(roundTo(total, 0)));
}

//////////
/// Adds Number Commas and decimal point.
//////////

function addCommas(nStr) {
  nStr += '';
  x = nStr.split('.');
  x1 = x[0];
  x2 = x.length > 1 ? '.' + x[1] : '';
  var rgx = /(\d+)(\d{3})/;
  while (rgx.test(x1)) {
    x1 = x1.replace(rgx, '$1' + ',' + '$2');
  }
  return x1 + x2;
}

//////////
/// Rounds current calculations.
//////////

function roundTo(num, places) {
  var calc = (Math.round(num * (Math.pow(10, places))) / (Math.pow(10, places)));
  return calc.toFixed(2);
}

//////////
/// Form Validation
/// http://formvalidation.io/settings/
//////////

$(function () {
  $('#checkoutPayment').formValidation({
    framework: 'bootstrap',
    excluded: ':disabled',
    fields: {
      number: {
        validators: {
          notEmpty: {
            message: 'What is the credit card number?'
          }
        }
      },
      name: {
        validators: {
          notEmpty: {
            message: 'What is the name on the card?'
          }
        }
      },
      expiry: {
        validators: {
          notEmpty: {
            message: 'Required'
          }
        }
      },
      cvc: {
        validators: {
          notEmpty: {
            message: 'Required'
          }
        }
      },
      address1: {
        validators: {
          notEmpty: {
            message: 'What is the billing address on the card?'
          }
        }
      },
      city: {
        validators: {
          notEmpty: {
            message: 'City, please?'
          }
        }
      },
      state: {
        validators: {
          notEmpty: {
            message: 'State, please?'
          }
        }
      },
      zipcode: {
        validators: {
          notEmpty: {
            message: 'How about a Zip Code?'
          }
        }
      },
      country: {
        validators: {
          notEmpty: {
            message: 'Country, please?'
          }
        }
      },
    }
  });
});

</script>
@stop