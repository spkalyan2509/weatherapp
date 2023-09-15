<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="card">
            <div class="search">
                <input type="text" placeholder="enter city name" spellcheck="false" >
                <button><img src="./images/search.png" alt=""></button>
            </div>

            <div class="error">
                <p>Invalid City Name</p>
            </div>

            <div class="weather">
                <img src="./images/rain.png" class="weather-icon" alt="">
                <h1 class="temp">22<sup>o</sup>c</h1>
                <h2 class="city">New York</h2>

                <div class="details">
                        <div class="col1">
                            <img src="./images/humidity.png"  alt="">
                            <div>
                                <p class="humidity">50%</p>
                                <p>Humidity</p>
                            </div>
                        </div>
                        
                        <div class="col1">
                            <img src="./images/wind.png"  alt="">
                            <div>
                                <p class="wind">15 km/hr</p>
                                <p>Wind Speed</p>
                            </div>
                        </div>
                </div>
            </div>
    </div>

<script>
const apiKey="4eefda9898af472d84da66333a1028c1";
const apiurl="https://api.openweathermap.org/data/2.5/weather?units=metric&q=";
const searchBox=document.querySelector(".search input");
const searchBtn=document.querySelector(".search button");
const weatherIcon=document.querySelector(".weather-icon")

async function checkWeather(city){
    const response=await fetch(apiurl +city+`&appid=${apiKey}`);
    console.log(response);
    if(response.status==404){
        document.querySelector(".error").style.display="block";
        document.querySelector(".weather").style.display="none";
    }
    else{

        var data=await response.json();
    // console.log(data);

    document.querySelector(".city").innerHTML=data.name;
    document.querySelector(".temp").innerHTML=Math.round(data.main.temp)+"<sup>o</sup>c";
    document.querySelector(".humidity").innerHTML=data.main.humidity+"%" ;
    document.querySelector(".wind").innerHTML=data.wind.speed+" Km/hr";

     if(data.weather[0].main =="Clouds"){
        weatherIcon.src="./images/clouds.png"
    }
   else if(data.weather[0].main =="Clear"){
        weatherIcon.src="./images/clear.png"
    }
    else if(data.weather[0].main =="Rain"){
        weatherIcon.src="./images/rain.png"
    }
    else if(data.weather[0].main =="Drizzle"){
        weatherIcon.src="./images/drizzle.png"
    }
    else if(data.weather[0].main =="Mist"){
        weatherIcon.src="./images/mist.png"
    }
    document.querySelector(".weather").style.display="block";
    document.querySelector(".error").style.display="none";
    }
   
}
searchBtn.addEventListener('click',()=>{
    checkWeather(searchBox.value);
})
// checkWeather("chennai");

    </script>
</body>
</html>

