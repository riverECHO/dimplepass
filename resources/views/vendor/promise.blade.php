@extends('_layouts.body')

@section('meta-page')
  <title>Vendor Promise</title>
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
Vendor <span class="dp-warning">/</span> Promise to Visitors
@stop

@section('content')

{{-- Hero Slider --}}
<section class="hero-slider mb-6" style="background-image: url(/img/destinations/glacier-1920x580.jpg);">
    <div class="item">
      <div class="container padding-top-10x">
        <div class="row justify-content-center align-items-center">
          <div class="col-md-12 padding-bottom-2x text-md-left text-center">
            <div class="from-bottom">
              <h1 class="mb-0 pt-1"><strong class="dp-white">@yield('logo-tag')</strong></h1>
              <div class="h4 mt-0 mb-4 gray-lighter">Your commitment to the Dimple Pass traveler.</div>
          </div>
        </div>
      </div>
    </div>
</section>

{{-- Page Content --}}
<div class="container padding-bottom-2x mb-2">
  <div class="row">
    {{-- Side Menu --}}
    <div class="col-md-4">
      @include('/vendor/_inc.nav')
      <div class="padding-bottom-3x hidden-md-up"></div>
    </div>
    {{-- Content --}}
    <div class="col-md-8 text-md-left text-center">
      <div class="mt-30 hidden-md-up"></div>
      <h1>The Vendor Promise <small>Happy Travelers</small></h1>
      <h3>As a Dimple Pass vendor, you are making a promise to the Dimple Pass members.</h3>
      <hr>
      <h3>Discounted Access <small>Save money.</small></h3>
      <i class="pe-7s-piggy float-md-left gray-light mr-4" style="font-size: 6rem;"></i>
      <p>As a vendor, I will redeem all current offers in my agreement with Dimple Pass for current Dimple Pass members.  I have provided the Dimple Pass holders with savings on one or more of my services and/or products and I will accept the Dimple Pass for the entirety of the pass season.  In short, if you have a pass, you have a discount with us and we are happy to have you here!</p>
      <hr>
      <h3>Incredible Customer Service <small>Friendly and helpful.</small></h3>
      <i class="pe-7s-smile float-md-left gray-light mr-4" style="font-size: 6rem;"></i>
      <p>It should go without saying that our vendor customer service is second to none.  Since we hand-pick the attractions, activities and restaurants in each destination, you are sure to have a great experience throughout your vacation experience.  Each vendor is committed to making every guest, including Dimple Pass holders, feel like family.  And, not the long lost cousin type of family!</p>
      <hr>
      <h3>No Hassle Bookings <small>Painless and simple.</small></h3>
      <i class="pe-7s-magic-wand float-md-left gray-light mr-4" style="font-size: 6rem;"></i>
      <p>Vendors agree to have a simple and hassle free booking and reservation system in place for all Dimple Pass holders.  If the pass is taken at a front desk or ticket window, presenting the Dimple Pass will be a quick and painless procedure.  It's kinda like magic, really.</p>
      <hr>
      <h3>Knowledgable Staff <small>We know the Dimple traveler.</small></h3>
      <i class="pe-7s-info float-md-left gray-light mr-4" style="font-size: 6rem;"></i>
      <p>Of most importance, is that all staff are aware of the agreement and discount with Dimple Pass.  When Dimple Pass holders present their pass in order to receive the discount offer, all employees should know what they are talking about and be ready to assist them with the no-hassle redemption.</p>
    </div>
  </div>
</div>

@stop

@section('scripts')
<script>

</script>
@stop