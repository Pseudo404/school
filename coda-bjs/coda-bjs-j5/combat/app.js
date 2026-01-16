function Fight(){
    return new Promise((resolve, reject) => {

        let monsterHp = 1;
        let characterHp = 1;

        let monsterhit = Math.random();
        let characterHit = Math.random();

        let tour = 1;

        setTimeout(() => {
            while(characterHp > 0 && monsterHp > 0){
            
                console.log(`=== Tour ${tour} ===`);
                tour++;

                characterHp -= monsterhit;
                monsterHp -= characterHit;

                monsterhit = Math.random();
                characterHit = Math.random();

                console.log(`Monstre : ${monsterHp}PV\nPersonnage : ${characterHp}PV`);

                if(monsterHp<0&&characterHp<0){
                    reject('Egalité');
                }
                else if(monsterHp<0&&characterHp>0){
                    resolve('Gagné !');
                }
                else if(monsterHp>0&&characterHp<0){
                    reject('Perdu...');
                }
            }
        }, 300);
        }
    );
}

Fight()
    .then((result) => {console.log(result)})
    .catch((result) => {console.log(result)})
    .finally(() => {console.log('Le combat est terminé !')});