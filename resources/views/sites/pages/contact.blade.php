@extends('sites.layout')

@section('content')

    @include('sites.shared._pageSubtitle', ['pageTitle' => 'Liên hệ với chúng tôi'])

    <section class="no-top" aria-label="map-container">
        <div id="map"></div>
        <script>
            function initMap() {
                var ins = {lat: 21.010916, lng: 105.790561};
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 18,
                    center: ins,
                    scrollwheel: false,
                    navigationControl: true,
                    mapTypeControl: false,
                    scaleControl: false,
                    draggable: true,

                    styles: [{"stylers":[{"hue":"#ff1a00"},{"invert_lightness":true},{"saturation":-100},{"lightness":33},{"gamma":0.5}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#2D333C"}]}],
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });
                var marker = new google.maps.Marker({
                    position: ins,
                    map: map,
                    icon: '/images/ui/map-marker.png'
                });
            }
        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7SkrGsCLt_FJDtkJUXf6YVESksT1UQU4&callback=initMap">
        </script>
    </section>

    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h3>Liên lạc với chúng tôi</h3>
                <form name="contactForm" id="contact_form" method="post" action="email.php">
                    <div class="row">
                        <div class="col-md-4">
                            <div id="name_error" class="error">Please enter your name.</div>
                            <div>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Họ và tên">
                            </div>

                            <div id="email_error" class="error">Please enter your valid E-mail ID.</div>
                            <div>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                            </div>

                            <div id="phone_error" class="error">Please enter your phone number.</div>
                            <div>
                                <input type="text" name="phone" id="phone" class="form-control"
                                       placeholder="Số điện thoại">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div id="message_error" class="error">Please enter your message.</div>
                            <div>
                                <textarea name="message" id="message" class="form-control"
                                          placeholder="Lời nhắn"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <p id="submit">
                                <input type="submit" id="send_message" value="Gửi" class="btn btn-line">
                            </p>
                            <div id="mail_success" class="success">Your message has been sent successfully.</div>
                            <div id="mail_fail" class="error">Sorry, error occured this time sending your message.</div>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>
    </div>
@stop