@extends('guest.layouts')
@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{ asset('guest/images/bg_3.jpg') }})" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Pricing <i class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-3 bread">Pricing</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section ftco-cart">
          <div class="container">
              <div class="row">
              <div class="col-md-12 ftco-animate">
                  <div class="car-list">
                      <table class="table">
                          <thead class="thead-primary">
                            <tr class="text-center">
                              <th>&nbsp;</th>
                              <th>&nbsp;</th>
                              <th class="bg-primary heading">Prix par jour</th>
                              <th class="bg-dark heading">Prix par mois</th>
                              <th class="bg-black heading">Prix par ans</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($voitures as $item)
                            <tr class="">
                                <td class="car-image"><div class="img" style="background-image:url({{ asset('upload') }}/{{ $item->image }})"></div></td>
                              <td class="product-name">
                                  <h3>{{ $item->nom }}</h3>
                                  <p class="mb-0 rated">
                                      <span>rated:</span>
                                      <span class="ion-ios-star"></span>
                                      <span class="ion-ios-star"></span>
                                      <span class="ion-ios-star"></span>
                                      <span class="ion-ios-star"></span>
                                      <span class="ion-ios-star"></span>
                                  </p>
                              </td>
                              
                              <td class="price">
                                  <p class="btn-custom"><a href="#">Prix par jour</a></p>
                                  <div class="price-rate">
                                      <h3>
                                          <span class="num"><small class="currency"></small> {{ $item->prix }} DH</span>
                                          <span class="per">/par jour</span>
                                      </h3>
                                  </div>
                              </td>
                              
                              <td class="price">
                                  <p class="btn-custom"><a href="#">Prix par mois</a></p>
                                  <div class="price-rate">
                                      <h3>
                                          <span class="num"><small class="currency"></small> {{ $item->prix*28 }} DH</span>
                                          <span class="per">/par mois</span>
                                      </h3>
                              </div>
                              </td>

                              <td class="price">
                                  <p class="btn-custom"><a href="#">Prix par ans</a></p>
                                  <div class="price-rate">
                                      <h3>
                                          <span class="num"><small class="currency"></small> {{ $item->prix*330 }} DH</span>
                                          <span class="per">/par ans</span>
                                      </h3>
                                  </div>
                              </td>
                            </tr>

                            @endforeach

                          </tbody>
                        </table>
                    </div>
              </div>
          </div>
          </div>
      </section>

@endsection