<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Weather-web</title>
    <link rel="stylesheet" href="{{ asset('css/weather.css') }}" >
    
</head>
<body>
    <div class="content-web">
        <div class="left-content">
            <div class="time">
                <div class="wrap-time">
                    <div class="date">Tuesday</div>
                    <div class="day"></div>
                </div>
            </div>
            <div class="img-weather">
                <img id="id-img-weather" src="uploads/weather-image/nang.jpg" alt="">
            </div>
            <div class="temp">
                <div class="wrap-temp">
                    <div class="number-temp">{{$data['data']['temp']}}&#8451;</div>
                    <div class="state-weather" id="id_state_weather" >{{$data['data']['weather']}}</div>
                </div>
            </div>
        </div>
        <div class="right-content">
            <div class="wrap-right-content">
                <div class="search">
                    <form class="wrap-search" action="{{ route('weather.check_city') }}" method="POST">
                         @csrf
                        <input type="text" id="id_input_country" autocomplete="off" name="input_country" onkeyup="searchcity(this.value)" placeholder="Enter city name">
                        <div class="list_city" id="id_list_city">
                            <div class="detail_list_city" id="id_detail_list_city">

                            </div>
                        </div>
                        <button id="btn_search" type="submit">Search</button>
                    </form>
                </div>
                <div class="infor-weather-city">
                    <div class="list-detail-infor-weather-city">
                        <div class="detail-infor-weather-city">
                            <span>City</span>
                            <span>{{$data['data']['city']}}</span>
                        </div>
                        <div class="detail-infor-weather-city">
                            <span>Country Code</span>
                            <span>{{$data['data']['country_code']}}</span>
                        </div>
                        <div class="detail-infor-weather-city">
                            <span>TEMP</span>
                            <span>{{$data['data']['temp']}}&#8451;</span>
                        </div>
                        <div class="detail-infor-weather-city">
                            <span>HUMIDTY</span>
                            <span>{{$data['data']['humidty']}}%</span>
                        </div>
                        <div class="detail-infor-weather-city">
                            <span>WIND SPEED</span>
                            <span>{{$data['data']['wind_speed']}}km/h</span>
                        </div>
                    </div>
                </div>
                <div class="more-day-later">
                    <div class="wrap-more-day-later">
                        <div class="the-day">
                            <div class="img-weather-day">
                                <img src="uploads/weather-image/nang.jpg" alt="sun">
                            </div>
                            <div class="day-and-temp">
                                <div class="day">Wednesday</div>
                                <div class="temp-day-one">1&#8451;</div>
                            </div>
                        </div>
                        <div class="the-day">
                            <div class="img-weather-day">
                                <img src="uploads/weather-image/nang.jpg" alt="sun">
                            </div>
                            <div class="day-and-temp">
                                <div class="day">Thursday</div>
                                <div class="temp-day-two">1&#8451;</div>
                            </div>
                        </div>
                        <div class="the-day">
                            <div class="img-weather-day">
                                <img src="uploads/weather-image/nang.jpg" alt="sun">
                            </div>
                            <div class="day-and-temp">
                                <div class="day">Friday</div>
                                <div class="temp-day-three">6&#8451;</div>
                            </div>
                        </div>
                        <div class="the-day">
                            <div class="img-weather-day">
                                <img src="uploads/weather-image/nang.jpg" alt="sun">
                            </div>
                            <div class="day-and-temp">
                                <div class="day">Sadturday</div>
                                <div class="temp-day-four">3&#8451;</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wrap_loading" id="id_loading">
        <span class="loader"></span>
    </div>
    
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>
<script src="{{ asset('js/weather.js') }}"></script>
