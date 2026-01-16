const milisecond = document.querySelector("#ms");
const second = document.querySelector("#second");
const minute = document.querySelector("#minute");
const heure = document.querySelector("#heure");

let ms = 0;
let timer = null;
let clockInterval = null;

function startTimeCounter() {
    timer = setInterval(() => {
        ms += 10;
    }, 10);
}

function updateClock() {
    const msDeg  = ms * 0.36;                   // 360°:100ms  360°/1000ms = 0.36°
    const secDeg = ms * 0.006;                  // 360°:60s  60s:60000ms  360°/60000ms = 0.006°
    const minDeg = ms * 0.0001;                 // 360°:60min  60min:3600000ms  360°/3600000ms = 0.0001°
    const hrDeg  = ms * 0.000008333;            // 360°:12hrs  12hrs:43200000ms  360°/43200000ms = 0.000008333°

    milisecond.style.transform = `translateX(-50%) rotate(${msDeg}deg)`;
    second.style.transform = `translateX(-50%) rotate(${secDeg}deg)`;
    minute.style.transform = `translateX(-50%) rotate(${minDeg}deg)`;
    heure.style.transform = `translateX(-50%) rotate(${hrDeg}deg)`;
}

const buttonStart = document.querySelector("#start")

buttonStart.addEventListener("click", () => {
    if (!timer) {
        startTimeCounter();
        clockInterval = setInterval(updateClock, 10);
    }
});

const buttonPause = document.querySelector("#pause")

buttonPause.addEventListener("click", () => {
    clearInterval(timer);
    clearInterval(clockInterval);
    timer = null;
});
