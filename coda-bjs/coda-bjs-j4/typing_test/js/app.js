const alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789.,;:!?()[]{}<>\"'`~@#$%^&*-+=_/\\| ";

export const typing = {
    data: {},
    elements: {},
    init() {
        this.data = {
            currentText: Math.random().toString(36).substring(2, 15),
            startTime: 0,
            endTime: 0,
            erreurs: 0,
            completion: 0,
            run: 0
        };

        const app = document.createElement("div");
        const textDisplay = document.createElement("div");
        const inputField = document.createElement("input");
        const timeText = document.createElement("div");
        const scoreText = document.createElement("div");

        app.id = "typing-app";
        textDisplay.id = "text-display";
        inputField.id = "input-field";
        inputField.type = "text";
        textDisplay.textContent = this.data.currentText;

        app.appendChild(textDisplay);
        app.appendChild(inputField);
        app.appendChild(timeText);
        app.appendChild(scoreText);
        document.body.appendChild(app);
        
        this.elements = {
            app,
            textDisplay,
            inputField,
            timeText,
            scoreText
        };
        inputField.addEventListener("input", () => this.handleInput());
        this.attachEvents();
    },
    start(){
        if (this.elements.inputField.value.length >= 0){
            this.data.run = 1;
            this.data.startTime = Date.now();
            this.data.currentText = this.elements.inputField.value;
            this.data.endTime = 0;
            this.data.errors = 0;
        }
        for (let char of elements.inputField.value){
            if (alphabet[char] === this.elements.inputField.value[char]){
                this.data.completion++;
            }
        }
        this.elements.textDisplay.textContent = this.data.currentText;
        this.elements.inputField.value = "";
        this.elements.timeText.textContent = "Temps : 0s";
    },
    attachEvents(){
        this.elements.inputField.addEventListener("focus", () => {
            this.data.startTime = Date.now();
            if (this.inputField.value.length > this.data.currentText.length){
                this.end();
            }
        });
    },
    updateScores(){
        while(this.data.run === 1){
            // this.elements.timeText.textContent = `$Date.now()`;
            this.elements.completion.textContent = this.data.completion;
        }
    },
    end(){
        // end
    }
};