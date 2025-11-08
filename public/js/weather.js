const buttonSearch = document.getElementById("btn_search");
const status_weather = document.getElementById("id_state_weather");
const loading = document.getElementById("id_loading");
const listSearch = document.getElementById("id_list_city");
const inputSearchCity = document.getElementById("id_input_country");
const imgWeather = document.getElementById("id-img-weather");

const searchcity = _.debounce(function (query) {
    const listCity = document.getElementById("id_detail_list_city");
    const apiUrl = "/search_city";
    const postData = query;
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    listSearch.style.display = "flex";
    fetch(apiUrl, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
            "X-CSRF-TOKEN": csrfToken, //coi lại
        },
        body: JSON.stringify({
            searchCountry: postData,
        }),
    })
        .then((response) => response.json())
        .then((data) => {
            const realData = data.data_location;
            listCity.innerHTML = "";
            realData.forEach((element) => {
                const div = document.createElement("div");
                div.classList.add("element_city");
                div.textContent = element.city;
                listCity.appendChild(div);
            });
        });
    // .catch((error) => {});
}, 500);

document.addEventListener("click", function (e) {
    if (e.target.classList.contains("element_city")) {
        inputSearchCity.value = e.target.innerText;
        listSearch.style.display = "none";
    }
});

buttonSearch.addEventListener("click", function (e) {
    loading.style.display = "flex";
});

if (status_weather.innerText == "rain") {
    imgWeather.src = "uploads/weather-image/mua.jpg";
} else if (status_weather.innerText == "Clouds") {
    imgWeather.src = "uploads/weather-image/nang.jpg";
} else {
    imgWeather.src = "uploads/weather-image/tuyet.jpg";
}
