const woodButton = document.getElementById('getWood');
const ironButton = document.getElementById('getIron');

const woodValue = document.getElementById('wood');
const ironValue = document.getElementById('iron');
const planksValue = document.getElementById('planks');
const stickValue = document.getElementById('stick');
const ironIngotValue = document.getElementById('ironIngot');
const swordValue = document.getElementById('sword');
const pickaxeValue = document.getElementById('pickaxe');

const selectCraft = document.getElementById('selectCraft');
const craftButton = document.getElementById('craft');

const prix = document.getElementById('prix');

const list = document.getElementById('list');
const log = document.getElementById('log');

let inventory = { wood: 0, iron: 0, planks: 0, stick: 0, ironIngot: 0, sword: 0, pickaxe: 0};

function addWood() {
    inventory.wood++;
    reloadInventory();
}

function addIron() {
    inventory.iron++;
    reloadInventory();
}

woodButton.addEventListener('click', addWood);
ironButton.addEventListener('click', addIron);

function reloadInventory() {
    woodValue.textContent = `wood : ${inventory.wood}`;
    ironValue.textContent = `iron : ${inventory.iron}`;
    planksValue.textContent = `planches : ${inventory.planks}`;
    stickValue.textContent = `bâton : ${inventory.stick}`;
    ironIngotValue.textContent = `l'ingot de fer : ${inventory.ironIngot}`;
    swordValue.textContent = `épée : ${inventory.sword}`;
    pickaxeValue.textContent = `pioche : ${inventory.pickaxe}`;
}

function craft(choiceCraft) {
    return new Promise((resolve, reject) => {

        if (choiceCraft === "planks") {
            setTimeout(() => {  
                if (inventory.wood >= 1) {
                    inventory.wood -= 1;
                    inventory.planks += 4;
                    resolve("Vous avez crafté 4 planches !");
                } else reject("Pas assez de bois !");
            }, 200);
        }

        else if (choiceCraft === "stick") {
            setTimeout(() => {
                if (inventory.planks >= 1) {
                    inventory.planks -= 1;
                    inventory.stick += 2;
                    resolve("Vous avez crafté 2 sticks !");
                } else reject("Pas assez de planches !");
            }, 200);
        }

        else if (choiceCraft === "ironIngot") {
            setTimeout(() => {
                if (inventory.iron >= 1) {
                    inventory.iron -= 1;
                    inventory.ironIngot += 1;
                    resolve("Vous avez crafté 1 l'ingot de fer !");
                } else reject("Pas assez de fer !");
            }, 2000);
        }

        else if (choiceCraft === "sword") {
            setTimeout(() => {
                if (inventory.stick >= 1 && inventory.ironIngot >= 2) {
                    inventory.ironIngot -= 2;
                    inventory.stick -= 1;
                    inventory.sword += 1;
                    resolve("Vous avez crafté 1 épée !");
                } else reject("Pas assez de stick ou de l'ingot de fer !");
            }, 5000);
        }

        else if (choiceCraft === "pickaxe") {
            setTimeout(() => {
                if (inventory.stick >= 2 && inventory.ironIngot >= 3) {
                    inventory.ironIngot -= 3;
                    inventory.stick -= 2;
                    inventory.pickaxe += 1;
                    resolve("Vous avez crafté 1 pioche !");
                } else reject("Pas assez de stick ou de l'ingot de fer !");
            }, 5000);
        }

        else {
            reject("Recette inconnue");
        }
    });
}

craftButton.addEventListener('click', () => {
    let choiceCraft = selectCraft.value;

    craft(choiceCraft)
        .then(msg => {
            log.textContent = msg;
            reloadInventory();
        })
        .catch(err => {
            log.textContent = err;
        });
});

selectCraft.addEventListener('click', () => {
    let choiceCraft = selectCraft.value;
    if (choiceCraft === "planks"){
        prix.textContent = "1 de bois";
    }
    else if (choiceCraft === "stick"){
        prix.textContent = "1 planche";
    }
    else if (choiceCraft === "ironIngot"){
        prix.textContent = "1 de fer ";
    }
    else if (choiceCraft === "sword"){
        prix.textContent = "1 bâton et 2 lingots de fers";
    }
    else if (choiceCraft === "pickaxe"){
        prix.textContent = "2 bâtons et 3 lingots de fers";
    }
});