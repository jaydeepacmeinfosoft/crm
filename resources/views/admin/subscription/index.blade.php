@extends('admin.layouts.app')
@section('title', 'Subscription - CRM')

@section('content')
<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="card">
                <!-- Pricing Plans -->
                <div class="pb-sm-5 pb-2 rounded-top">
                  <div class="container py-5">
                    <h2 class="text-center mb-2 mt-0 mt-md-4">Subscription Plans</h2>
                    <p class="text-center">
                      Get started with us - it's perfect for individuals and teams. Choose a subscription plan that
                      meets your needs.
                    </p>
                    <div
                      class="d-flex align-items-center justify-content-center flex-wrap gap-2 pb-5 pt-3 mb-0 mb-md-4">
                      <label class="switch switch-primary ms-3 ms-sm-0 mt-2">
                        <span class="switch-label">Monthly</span>
                        <input type="checkbox" class="switch-input price-duration-toggler" checked />
                        <span class="switch-toggle-slider">
                          <span class="switch-on"></span>
                          <span class="switch-off"></span>
                        </span>
                        <span class="switch-label">Annual</span>
                      </label>
                      <div class="mt-n5 ms-n5 d-none d-sm-block">
                        <i class="ti ti-corner-left-down ti-sm text-muted me-1 scaleX-n1-rtl"></i>
                        <span class="badge badge-sm bg-label-primary">Save up to 10%</span>
                      </div>
                    </div>

                    <div class="row mx-0 gy-3 px-lg-5">
                      <!-- Basic -->
                      @foreach($subscriptions as $subscription)
                      <div class="col-lg mb-md-0 mb-4">
                        <div class="card border rounded shadow-none">
                          <div class="card-body">
                            <div class="my-3 pt-2 text-center">
                              <img
                                src="{{asset('public/planlogo/'.$subscription->plan_logo)}}"
                                alt="Basic Image"
                                height="80" />
                            </div>
                            <h3 class="card-title fw-semibold text-center text-capitalize mb-1">{{$subscription->title}}</h3>
                            <!-- <p class="text-center">A simple start for everyone</p> -->
                            <div class="text-center">
                              <div class="d-flex justify-content-center">
                                <sup class="h6 pricing-currency mt-3 mb-0 me-1 text-primary">₹</sup>
                                <h1 class="price-toggle price-yearly fw-semibold display-4 text-primary mb-0">{{$subscription->price_month}}</h1>
                                <h1 class="price-toggle price-monthly fw-semibold display-4 text-primary mb-0 d-none">
                                {{$subscription->price}}
                                </h1>
                                <sub class="h6 pricing-duration mt-auto mb-2 text-muted fw-normal">/month</sub>
                              </div>
                              <small class="price-yearly price-yearly-toggle text-muted">₹ {{$subscription->price_year}}/ year</small>
                          
                            </div>

                            <ul class="ps-3 my-4 pt-2">
                              <!-- <li class="mb-2">100 responses a month</li>
                              <li class="mb-2">Unlimited forms and surveys</li>
                              <li class="mb-2">Unlimited fields</li>
                              <li class="mb-2">Basic form creation tools</li>
                              <li class="mb-0">Up to 2 subdomains</li> -->
                              @php
                            $lists = explode(',', $subscription->list_tags);
                            $totalItems = count($lists);
                            @endphp

                            @foreach ($lists as $index => $list)
                            <li class="mb-2">
                                <b>{{ $list }}</b>
                            </li>

                            @endforeach
                            </ul>

                            <a href="#" class="btn btn-label-success d-grid w-100"
                              >Upgrade</a
                            >
                          </div>
                        </div>
                      </div>
                      @endforeach
                      <!-- Pro -->
                      <!-- <div class="col-lg mb-md-0 mb-4">
                        <div class="card border-primary border shadow-none">
                          <div class="card-body position-relative">
                            <div class="position-absolute end-0 me-4 top-0 mt-4">
                              <span class="badge bg-label-primary">Popular</span>
                            </div>
                            <div class="my-3 pt-2 text-center">
                              <img
                                src="assets/img/illustrations/page-pricing-standard.png"
                                alt="Standard Image"
                                height="80" />
                            </div>
                            <h3 class="card-title fw-semibold text-center text-capitalize mb-1">Pro</h3>
                            <p class="text-center">For small to medium businesses</p>
                            <div class="text-center">
                              <div class="d-flex justify-content-center">
                                <sup class="h6 pricing-currency mt-3 mb-0 me-1 text-primary">$</sup>
                                <h1 class="price-toggle price-yearly fw-semibold display-4 text-primary mb-0">7</h1>
                                <h1 class="price-toggle price-monthly fw-semibold display-4 text-primary mb-0 d-none">
                                  9
                                </h1>
                                <sub class="h6 text-muted pricing-duration mt-auto mb-2 fw-normal">/month</sub>
                              </div>
                              <small class="price-yearly price-yearly-toggle text-muted">$ 90 / year</small>
                            </div>

                            <ul class="ps-3 my-4 pt-2">
                              <li class="mb-2">Up to 5 users</li>
                              <li class="mb-2">120+ components</li>
                              <li class="mb-2">Basic support on Github</li>
                              <li class="mb-2">Monthly updates</li>
                              <li class="mb-0">Integrations</li>
                            </ul>

                            <a href="#" class="btn btn-primary d-grid w-100">Upgrade</a>
                          </div>
                        </div>
                      </div> -->

                      <!-- Enterprise -->
                      <!-- <div class="col-lg">
                        <div class="card border rounded shadow-none">
                          <div class="card-body">
                            <div class="my-3 pt-2 text-center">
                              <img
                                src="assets/img/illustrations/page-pricing-enterprise.png"
                                alt="Enterprise Image"
                                height="80" />
                            </div>
                            <h3 class="card-title text-center text-capitalize fw-semibold mb-1">Enterprise</h3>
                            <p class="text-center">Solution for big organizations</p>

                            <div class="text-center">
                              <div class="d-flex justify-content-center">
                                <sup class="h6 text-primary pricing-currency mt-3 mb-0 me-1">$</sup>
                                <h1 class="price-toggle price-yearly fw-semibold display-4 text-primary mb-0">16</h1>
                                <h1 class="price-toggle price-monthly fw-semibold display-4 text-primary mb-0 d-none">
                                  19
                                </h1>
                                <sub class="h6 pricing-duration mt-auto mb-2 fw-normal text-muted">/month</sub>
                              </div>
                              <small class="price-yearly price-yearly-toggle text-muted">$ 190 / year</small>
                            </div>

                            <ul class="ps-3 my-4 pt-2">
                              <li class="mb-2">Up to 10 users</li>
                              <li class="mb-2">150+ components</li>
                              <li class="mb-2">Basic support on Github</li>
                              <li class="mb-2">Monthly updates</li>
                              <li class="mb-0">Speedy build tooling</li>
                            </ul>

                            <a href="#" class="btn btn-label-primary d-grid w-100">Upgrade</a>
                          </div>
                        </div>
                      </div> -->
                    </div>
                  </div>
                </div>
                <!--/ Pricing Plans -->
               
              </div>
            </div>
            <!-- / Content -->

@endsection
<script>
document.addEventListener('DOMContentLoaded', function (event) {
  (function () {
    const priceDurationToggler = document.querySelector('.price-duration-toggler'),
      priceMonthlyList = [].slice.call(document.querySelectorAll('.price-monthly')),
      priceYearlyList = [].slice.call(document.querySelectorAll('.price-yearly'));

    function togglePrice() {
      if (priceDurationToggler.checked) {
        // If checked
        priceYearlyList.map(function (yearEl) {
          yearEl.classList.remove('d-none');
        });
        priceMonthlyList.map(function (monthEl) {
          monthEl.classList.add('d-none');
        });
      } else {
        // If not checked
        priceYearlyList.map(function (yearEl) {
          yearEl.classList.add('d-none');
        });
        priceMonthlyList.map(function (monthEl) {
          monthEl.classList.remove('d-none');
        });
      }
    }
    // togglePrice Event Listener
    togglePrice();

    priceDurationToggler.onchange = function () {
      togglePrice();
    };
  })();
});
</script>