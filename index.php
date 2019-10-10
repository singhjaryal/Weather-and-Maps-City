<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Weather Forecast Project</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container border" style="min-height:100vh">
        <div class="row clearfix my-4">
            <div class="form-group m-auto">
                <input type="text" class="form-control" placeholder="Enter City Name" name="cityName" onkeyup="getWeatherData(this.value)" required>
            </div>
        </div>
        <div class="show-api-data">
            <!-- SHOW API GET DATA -->
        </div>
    </div>

    <!-- script files linked -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script>
        function getWeatherData(name){
            if(name!=""){
                $.ajax({
                    url: "weather_api_get_data.php",
                    type:"get",
                    dataType:'JSON',
                    data:{name:name},
                    success: function(response){
                        console.log(response)
                        if(response!=0){
                            var data = '<h3 class="text-center mb-4 text-uppercase">'+response.name+' <i class="text-success" style="font-size:10px">'+response.countryCode+'</i></h3>'+
                                        '<div class="row clearfix">'+
                                        '<div class="col-lg-4 col-md-4">'+
                                                '<div class="card">'+
                                                    '<div class="card-header">'+
                                                        '<h6 class="text-center">Coordinates</h6>'+
                                                    '</div>'+
                                                    '<div class="card-body">'+
                                                        '<div class="row">'+
                                                            '<div class="col-8 border-right">'+
                                                                '<div>Longitude</div>'+
                                                                '<div>Latitude</div>'+
                                                            '</div>'+
                                                            '<div class="col-4">'+
                                                                '<div>'+response.longitude+'</div>'+
                                                                '<div>'+response.latitude+'</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="col-lg-4 col-md-4">'+
                                                '<div class="card">'+
                                                    '<div class="card-header">'+
                                                        '<h6 class="text-center">Temperature</h6>'+
                                                    '</div>'+
                                                    '<div class="card-body">'+
                                                        '<div class="row">'+
                                                            '<div class="col-8 border-right">'+
                                                                '<div>Max Temperature</div>'+
                                                                '<div>Min Temperature</div>'+
                                                            '</div>'+
                                                            '<div class="col-4">'+
                                                                '<div>'+parseInt(response.maxTemp)+' K</div>'+
                                                                '<div>'+parseInt(response.minTemp)+' K</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="col-lg-4 col-md-4">'+
                                                '<div class="card">'+
                                                    '<div class="card-header">'+
                                                        '<h6 class="text-center">Weather</h6>'+
                                                    '</div>'+
                                                    '<div class="card-body">'+
                                                        '<div class="row">'+
                                                            '<div class="col-6 border-right">'+
                                                                '<div>Wind Speed</div>'+
                                                                '<div>Pressure</div>'+
                                                                '<div>Humidity</div>'+
                                                            '</div>'+
                                                            '<div class="col-6">'+
                                                                '<div>'+response.windSpeed+' m/s</div>'+
                                                                '<div>'+response.pressure+' hPa</div>'+
                                                                '<div>'+response.humidity+' %</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="row clearfix my-4">'+
                                        '<div class="mapouter m-auto shadow border border-info"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q='+response.name+'&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>Google Maps Generator by <a href="https://www.embedgooglemap.net">embedgooglemap.net</a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div>'+
                                        '</div>';
                                            
                        }else{
                            var data = '<p class="text-center alert alert-secondary">No Data Fount</p>';
                        }                
                        $('.show-api-data').html(data);
                    }
                });
            }
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
    </script>
</body>
</html>
