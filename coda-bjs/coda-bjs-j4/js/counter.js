export const counter = {
    data: {},
    elements: {},

    init(container) {
        counter.data.count = 0;
        counter.createElements(container);
        counter.updateDisplay();
        counter.attachEvents();
    },
    createElements(container) {
        counter.elements.wrapper = document.createElement("div");
        counter.elements.counter = document.createElement("p");
        counter.elements.incrementButton = document.createElement("button");
        counter.elements.decrementButton = document.createElement("button");

        counter.elements.incrementButton.textContent = "+1";
        counter.elements.decrementButton.textContent = "-1";
        counter.elements.resetButton = document.createElement("button");
        counter.elements.resetButton.textContent = "Reset";

        counter.elements.wrapper.append(
            counter.elements.counter,
            counter.elements.incrementButton,
            counter.elements.decrementButton,
            counter.elements.resetButton
        );

        container.appendChild(counter.elements.wrapper);
    },
    updateDisplay() {
        counter.elements.counter.textContent = `Compteur : ${counter.data.count}`;
    },
    incrementCounter() {
        counter.data.count += 1; // ou counter.data.count++;
        counter.updateDisplay();

    },
    decrementCounter() {
        counter.data.count -= 1;
        counter.updateDisplay();
    },
    resetCounter() {
        counter.data.count = 0;
        counter.updateDisplay();
    },
    attachEvents() {
        counter.elements.incrementButton.addEventListener("click", counter.incrementCounter);
        counter.elements.decrementButton.addEventListener("click", counter.decrementCounter);
        counter.elements.resetButton.addEventListener("click", counter.resetCounter);
    },
};