'use strict';

// Elements
const form = document.getElementById('weather-form');
const cityInput = document.getElementById('city');
const apiKeyInput = document.getElementById('apiKey');
const saveKeyBtn = document.getElementById('saveKey');
const message = document.getElementById('message');
const loading = document.getElementById('loading');
const results = document.getElementById('results');

// Result elements
const tempEl = document.getElementById('temp');
const descEl = document.getElementById('desc');
const iconEl = document.getElementById('icon');
const cityNameEl = document.getElementById('cityName');
const feelsEl = document.getElementById('feels');
const humidityEl = document.getElementById('humidity');
const windEl = document.getElementById('wind');

const STORAGE_KEY = 'weatherapp.apikey';

// Restore API key if available
const storedKey = localStorage.getItem(STORAGE_KEY);
if (storedKey) {
    apiKeyInput.value = storedKey;
}

saveKeyBtn.addEventListener('click', () => {
    const key = apiKeyInput.value.trim();
    if (!key) {
        showMessage('Please enter a valid API key to save.', true);
        return;
    }
    localStorage.setItem(STORAGE_KEY, key);
    showMessage('API key saved locally.', false);
});

form.addEventListener('submit', async (e) => {
    e.preventDefault();
    const city = cityInput.value.trim();
    const apiKey = (apiKeyInput.value || '').trim();

    if (!apiKey) {
        showMessage('Missing API key. Enter and save your OpenWeatherMap API key.', true);
        apiKeyInput.focus();
        return;
    }
    if (!city) {
        showMessage('Please enter a city name.', true);
        cityInput.focus();
        return;
    }

    showMessage('');
    toggleLoading(true);
    try {
        const data = await fetchCurrentWeather(city, apiKey);
        renderWeather(data);
    } catch (err) {
        showMessage(err.message || 'Failed to fetch weather.', true);
        results.hidden = true;
    } finally {
        toggleLoading(false);
    }
});

function toggleLoading(isLoading) {
    loading.hidden = !isLoading;
}

function showMessage(text, isError = false) {
    message.textContent = text;
    message.classList.toggle('message--error', Boolean(isError));
}

async function fetchCurrentWeather(city, apiKey) {
    const params = new URLSearchParams({
        q: city,
        appid: apiKey,
        units: 'metric'
    });
    const url = `https://api.openweathermap.org/data/2.5/weather?${params.toString()}`;

    const res = await fetch(url);
    if (!res.ok) {
        let reason = `${res.status} ${res.statusText}`;
        try {
            const errJson = await res.json();
            if (errJson && errJson.message) reason = errJson.message;
        } catch (_) { }
        throw new Error(`Error: ${reason}`);
    }
    return res.json();
}

function renderWeather(data) {
    if (!data || !data.weather || !data.weather.length) {
        throw new Error('Unexpected response.');
    }

    const weatherMain = (data.weather[0].main || '').toLowerCase();
    const description = data.weather[0].description || '';
    const icon = data.weather[0].icon || '01d';
    const temperature = Math.round(data.main?.temp ?? NaN);
    const feelsLike = Math.round(data.main?.feels_like ?? NaN);
    const humidity = Math.round(data.main?.humidity ?? NaN);
    const wind = Math.round((data.wind?.speed ?? 0) * 10) / 10;

    tempEl.textContent = isFinite(temperature) ? String(temperature) : '--';
    descEl.textContent = description;
    iconEl.src = `https://openweathermap.org/img/wn/${icon}@2x.png`;
    iconEl.alt = description || 'Weather icon';
    cityNameEl.textContent = `${data.name ?? ''}${data.sys?.country ? ', ' + data.sys.country : ''}`;
    feelsEl.textContent = isFinite(feelsLike) ? `${feelsLike}°C` : '--';
    humidityEl.textContent = isFinite(humidity) ? `${humidity}%` : '--';
    windEl.textContent = isFinite(wind) ? `${wind} m/s` : '--';

    setBackgroundTheme(weatherMain);
    results.hidden = false;
}

function setBackgroundTheme(main) {
    const body = document.body;
    const themes = [
        'weather-default',
        'weather-clear',
        'weather-clouds',
        'weather-rain',
        'weather-drizzle',
        'weather-thunderstorm',
        'weather-snow',
        'weather-mist',
        'weather-haze',
        'weather-fog',
        'weather-smoke'
    ];
    for (const t of themes) body.classList.remove(t);

    const map = new Map([
        ['clear', 'weather-clear'],
        ['clouds', 'weather-clouds'],
        ['rain', 'weather-rain'],
        ['drizzle', 'weather-drizzle'],
        ['thunderstorm', 'weather-thunderstorm'],
        ['snow', 'weather-snow'],
        ['mist', 'weather-mist'],
        ['haze', 'weather-haze'],
        ['fog', 'weather-fog'],
        ['smoke', 'weather-smoke']
    ]);

    body.classList.add(map.get(main) ?? 'weather-default');
}


