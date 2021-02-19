<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="{{asset('frontend/images/favicon.ico') }}">

    <title>Trova</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
          rel="stylesheet">

    <link href="{{asset('frontend/css/custom.css') }}" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<header>
    <div class="row text-center">
        <div class="col">
            <nav class="navbar navbar-expand-md navbar-dark">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <img src="{{asset('frontend/images/header_menu_normal.png') }}" alt="">
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Disabled</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="col">
            <div class="search-icon">
                <img src="{{asset('frontend/images/header_search_normal.png') }}" alt="">
            </div>
        </div>
        <div class="col">
            <div class="logo">
                <img src="{{asset('frontend/images/trova_logo.png') }}" alt="">
            </div>
        </div>
        <div class="col">
            <div class="message-icon">
                <img src="{{asset('frontend/images/header_chat_normal.png') }}" alt="">
            </div>
        </div>
        <div class="col">
            <div class="notification-icon">
                <img src="{{asset('frontend/images/menu_notification_normal.png') }}" alt="">
            </div>
        </div>
    </div>
</header>
<main role="main">
    <div class="tabs-wrapper">
        <nav class="nav-tabs-wrapper">
            <a href="javascript:void(0);" class="back"><img src="{{asset('frontend/images/tab_back_white.png') }}" alt=""></a>
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                   aria-controls="nav-home" aria-selected="true">Requests</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                   aria-controls="nav-profile" aria-selected="false">Services</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                   aria-controls="nav-contact" aria-selected="false">Payments</a>
            </div>
        </nav>
        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div id="service1" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @forelse($services as $key=>$service)
                        <div class="carousel-item @if($key==0) active @endif">
                            <img class="first-slide" src="{{asset('frontend/images/banner_image.png') }}"
                                 alt="First slide">
                            <div class="carousel-caption">
                                <h1>{{ ucwords($service->title) }}</h1>
                                <h3>TRAINING . FITNESS</h3>
                                {!! $service->description !!}
                                <p>
                                    <span class="session">For one session</span>
                                    <span class="price">${{ $service->price }}</span>
                                </p>
                            </div>
                            @forelse($service->bookings->where('status','PENDING') as $key=>$booking)
                            <div class="main-wrapper">
                                <div class="progress-section">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                            <div class="progress-section-left">
                                                <h5>Pending Request</h5>
                                                <p>9:10 am, 12/02/2019</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                            <div class="progress-section-right">
                                    <span class="progress-point blue-text">
                                        <img src="{{asset('frontend/images/tick-mark.png') }}" alt="">
                                        <p>Request</p>
                                    </span>
                                                <span class="progress-separate grey-bar"></span>
                                                <span class="progress-point grey-text">
                                        <img src="{{asset('frontend/images/icon-two.png') }}" alt="">
                                        <p>Service</p>
                                    </span>
                                                <span class="progress-separate grey-bar"></span>
                                                <span class="progress-point grey-text">
                                        <img src="{{asset('frontend/images/icon-three.png') }}" alt="">
                                        <p>Payment</p>
                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="deals-section">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <div class="deals-inner">
                                                <img src="{{asset('frontend/images/avatar-raypressley-profileimg.png') }}" alt="">
                                                <h6>{{$booking->user->name}}</h6>
                                                <p>San Francisco</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <div class="deals-inner deals-inner-right">
                                                <img src="{{asset('frontend/images/component_clipart_deals.png') }}" alt="">
                                                <h6>You and Ray had 12 deals before.</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="check-in-section">
                                    <p>Check in here or scan customer’s QR Code to check in when the service is about to start</p>
                                    <ul>
                                        <li><img src="{{asset('frontend/images/component_clipart_time.png') }}" alt="">{{ Carbon\Carbon::parse($booking->start_time)->format('h:i A, l , F jS Y') }}
                                        </li>
                                        <li><img src="{{asset('frontend/images/component_clipart_location.png') }}" alt="">{{$booking->address}}
                                        </li>
                                    </ul>
                                    <div class="check-in-buttons">
                                        <a href="Javascript:void(0);" class="btn btn-primary check-in-button">Reshedule</a>
                                        <a href="Javascript:void(0);" class="btn btn-primary generate-invoice-button" data-id="{{$booking->id}}" data-status="2">Accept Request
                                            </a>
                                        <a href="Javascript:void(0);" class="more">
                                            <img src="{{asset('frontend/images/tab_more_normal.png') }}" alt="">
                                            <p>More</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                                @empty
                            @endforelse
                        </div>
                        @empty
                        @endforelse
                    </div>
                    <ol class="carousel-indicators">
                        <li data-target="#service1" data-slide-to="0" class="active"></li>
                        <li data-target="#service1" data-slide-to="1"></li>
                        <li data-target="#service1" data-slide-to="2"></li>
                    </ol>
                    <a class="carousel-control-prev" href="#service1" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#service1" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>

                </div>

            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div id="service2" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#service2" data-slide-to="0" class="active"></li>
                        <li data-target="#service2" data-slide-to="1"></li>
                        <li data-target="#service2" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        @forelse($services as $key=>$service)
                        <div class="carousel-item @if($key==0) active @endif">
                            <img class="first-slide" src="{{asset('frontend/images/banner_image.png') }}"
                                 alt="First slide">
                            <div class="carousel-caption">
                                <h1>{{ ucwords($service->title) }}</h1>
                                <h3>TRAINING . FITNESS</h3>
                                {!! $service->description !!}
                                <p><span class="session">For one session</span><span class="price">${{ $service->price }}</span></p>
                            </div>
                            <div class="notification-strip mt-2">
                                <p>These are your upcoming services. You could scan your customer’s QR Code before service to
                                    check-in, or scan QR Code to generate invoice for payments.</p>
                                <span id='close'>
                        <img src="{{asset('frontend/images/component_close_normal.png') }}" alt="">
                    </span>
                            </div>
                            @forelse($service->bookings->where('status','ACTIVE') as $key=>$booking)
                            <div class="main-wrapper">
                                <div class="progress-section">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                            <div class="progress-section-left">
                                                <h5>Upcoming Services</h5>
                                                <p>9:10 am, 12/02/2019</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                            <div class="progress-section-right">
                                    <span class="progress-point blue-text">
                                        <img src="{{asset('frontend/images/tick-mark.png') }}" alt="">
                                        <p>Request</p>
                                    </span>
                                                <span class="progress-separate grey-bar"></span>
                                                <span class="progress-point grey-text">
                                        <img src="{{asset('frontend/images/icon-two.png') }}" alt="">
                                        <p>Service</p>
                                    </span>
                                                <span class="progress-separate grey-bar"></span>
                                                <span class="progress-point grey-text">
                                        <img src="{{asset('frontend/images/icon-three.png') }}" alt="">
                                        <p>Payment</p>
                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="deals-section">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <div class="deals-inner">
                                                <img src="{{asset('frontend/images/avatar-raypressley-profileimg.png') }}" alt="">
                                                <h6>{{$booking->user->name}}</h6>
                                                <p>San Francisco</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <div class="deals-inner deals-inner-right">
                                                <img src="{{asset('frontend/images/component_clipart_deals.png') }}" alt="">
                                                <h6>You and Ray had 12 deals before.</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="check-in-section">
                                    <p>Check in here or scan customer’s QR Code to check in when the service is about to start</p>
                                    <ul>
                                        <li><img src="{{asset('frontend/images/component_clipart_time.png') }}" alt="">{{ Carbon\Carbon::parse($booking->start_time)->format('h:i A, l , F jS Y') }}
                                        </li>
                                        <li><img src="{{asset('frontend/images/component_clipart_location.png') }}" alt="">{{$booking->address}}
                                        </li>
                                    </ul>
                                    <div class="check-in-buttons">
                                        <a href="Javascript:void(0);" class="btn btn-primary check-in-button">Check In</a>
                                        <a href="Javascript:void(0);" class="btn btn-primary generate-invoice-button" data-id="{{$booking->id}}" data-status="3">Generate Invoice</a>
                                        <a href="Javascript:void(0);" class="more">
                                            <img src="{{asset('frontend/images/tab_more_normal.png') }}" alt="">
                                            <p>More</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                                @empty
                                @endforelse
                        </div>
                            @empty
                            @endforelse
                    </div>
                </div>


            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div id="service3" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#service3" data-slide-to="0" class="active"></li>
                        <li data-target="#service3" data-slide-to="1"></li>
                        <li data-target="#service3" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        @forelse($services as $key=>$service)
                        <div class="carousel-item @if($key==0) active @endif">
                            <img class="first-slide" src="{{asset('frontend/images/banner_image.png') }}"
                                 alt="First slide">
                            <div class="carousel-caption">
                                <h1>{{ ucwords($service->title) }}</h1>
                                <h3>TRAINING . FITNESS</h3>
                                {!! $service->description !!}
                                <p><span class="session">For one session</span>
                                    <span class="price">${{ $service->price }}</span>
                                </p>
                            </div>
                            @forelse($service->bookings->where('status','PAYMENT') as $key=>$booking)
                            <div class="main-wrapper">
                                <div class="progress-section">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                            <div class="progress-section-left">
                                                <h5>Pending Payment</h5>
                                                <p>9:10 am, 12/02/2019</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                            <div class="progress-section-right">
                                    <span class="progress-point blue-text">
                                        <img src="{{asset('frontend/images/tick-mark.png') }}" alt="">
                                        <p>Request</p>
                                    </span>
                                                <span class="progress-separate grey-bar"></span>
                                                <span class="progress-point grey-text">
											<img src="{{asset('frontend/images/icon-two.png') }}" alt="">
											<p>Service</p>
										</span>
                                                <span class="progress-separate grey-bar"></span>
                                                <span class="progress-point grey-text">
											<img src="{{asset('frontend/images/icon-three.png') }}" alt="">
											<p>Payment</p>
                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="deals-section">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <div class="deals-inner">
                                                <img src="{{asset('frontend/images/avatar-raypressley-profileimg.png') }}" alt="">
                                                <h6>{{$booking->user->name}}</h6>
                                                <p>San Francisco</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <div class="deals-inner deals-inner-right">
                                                <img src="{{asset('frontend/images/component_clipart_deals.png') }}" alt="">
                                                <h6>You and Ray had 12 deals before.</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="check-in-section">
                                    <p>Check in here or scan customer’s QR Code to check in when the service is about to start</p>
                                    <ul>
                                        <li><img src="{{asset('frontend/images/component_clipart_time.png') }}" alt="">{{ Carbon\Carbon::parse($booking->start_time)->format('h:i A, l , F jS Y') }}
                                        </li>
                                        <li><img src="{{asset('frontend/images/component_clipart_location.png') }}" alt="">{{$booking->address}}
                                        </li>
                                    </ul>
                                    <div class="check-in-buttons">
                                        <a href="Javascript:void(0);" class="btn btn-primary check-in-button">Start a Chat</a>
                                        <a href="Javascript:void(0);" class="btn btn-primary generate-invoice-button">Resend Invoice</a>
                                        <a href="Javascript:void(0);" class="more">
                                            <img src="{{asset('frontend/images/tab_more_normal.png') }}" alt="">
                                            <p>More</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                                @empty
                            @endforelse
                        </div>
                            @empty
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    $('.carousel').carousel({
        interval: false,
    });
    $(document).on('click','.generate-invoice-button',function () {
        let id = $(this).data('id');
        let status = $(this).data('status');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method:'post',
            url:"{{route('bookingStatus')}}",
            data:{'id':id,'status':status},
            success:function (response) {

                console.log(response);

            }
        });
    });
</script>
</body>
</html>
