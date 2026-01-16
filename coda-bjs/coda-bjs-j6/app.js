function runHorse(id) {
    return new Promise(resolve => {
        const time = Math.floor(Math.random() * 3000) + 1000;

        setTimeout(() => {
        resolve({ id, time });
    }, time);
  });
}

function startRace(choice) {
    document.getElementById("result").textContent = "La course commence";

    const horses = [runHorse(1), runHorse(2), runHorse(3)];

    Promise.race(horses).then(winner => {
        console.log(`gangant : ${winner.id}`);
    
    Promise.all(horses).then(results => {
        console.log("terminé : ", results);

        document.getElementById("result").textContent = `Gagnant : Cheval ${winner.id} \n Ton choix : ${choice}`;

        });
    });
}