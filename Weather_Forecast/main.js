function getInfo() {
    const newName = document.getElementById("searchInput");
    const cityName = document.getElementById("location");
    cityName.innerHTML = "--" + newName.value + "--";

    fetch(`https://api.openweathermap.org/data/2.5/forecast?q=${newName.value}&appid=8d30456c0a1f66031f49e24569f63ed7`)
        .then(response => response.json())
        .then(data => {
            const currentWeather = data.list[0]; // Assuming current weather data is in the first item of the list

            // Assuming the API returns forecast data in 3-hour intervals
            const forecastList = data.list;

            // Display 5-day forecast
            for (let i = 0; i < 5; i++) {
                const dayData = forecastList[i * 8]; // Get the forecast for each day

                // Display day name and temperature
                document.getElementById("day" + (i + 1)).innerHTML = getDayName(dayData.dt);
                document.getElementById("tem" + (i + 1)).innerHTML = "Temp: " + Number(dayData.main.temp - 273.15).toFixed(1) + "°C";

                // Calculate min and max temperatures for the day
                const minTemp = Math.min(...forecastList.slice(i * 8, (i + 1) * 8).map(item => item.main.temp_min));
                const maxTemp = Math.max(...forecastList.slice(i * 8, (i + 1) * 8).map(item => item.main.temp_max));

                // Update the corresponding min and max temperature elements
                document.getElementById("day" + (i + 1) + "min").innerHTML = "Min: " + Number(minTemp - 273.15).toFixed(1) + "°C";
                document.getElementById("day" + (i + 1) + "max").innerHTML = "Max: " + Number(maxTemp - 273.15).toFixed(1) + "°C";

                // Update the corresponding icon elements
                document.getElementById("img" + (i + 1)).src = "http://openweathermap.org/img/wn/" + dayData.weather[0].icon + ".png";
            }

            // Update additional weather information
            document.getElementById("humidity").innerHTML = "Humidity: " + currentWeather.main.humidity + "%";
            document.getElementById("visibility").innerHTML = "Visibility: " + currentWeather.visibility / 1000 + "KM";
            document.getElementById("main").innerHTML = "Main: " + currentWeather.weather[0].main;
            document.getElementById("description").innerHTML = "Description: " + currentWeather.weather[0].description;
        })
        .catch(error => {
            console.error('Error fetching weather data:', error);
        });

}

function DefaultScreen() {
    document.getElementById("searchInput").defaultValue = "London";
    getInfo();
}

function getDayName(timestamp) {
    const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    const date = new Date(timestamp * 1000);
    return days[date.getDay()];
}