<?php

function Texte() {

    if ($_SESSION['step'] === 1) {
        return "Bienvenue, héros. Avant de commencer ton aventure, choisis ta classe :";
    }

    if ($_SESSION['step'] === 2) {

        switch ($_SESSION['class']) {

            case "warrior":
                return "Tu dégaines ton épée et charges droit sur le Gnoll, hurlant un cri de guerre.";
            
            case "assassin":
                return "Tu te fonds dans l’ombre et approche le Gnoll que tu viens d'apercevoir.";

            case "mage":
                return "Tu récites une incantation pour te proteger.";

            case "tank":
                return "Tu lèves ton bouclier et approche le Gnoll";

            case "healer":
                return "Tu es un guérisseur. Tu n'est pas fait pour te battre.";

            case "ranger":
                return "Tu es un archer. Ta flèche est prête à être tirée.";
        }
    }

    if ($_SESSION['step'] === 3) {
        switch ($_SESSION['class']) {
            case "warrior":
                if ($_SESSION['action0'] === "attaque"){
                    return "Tu charges avec ton épée, frappes de plein fouet, et le Gnoll est tué. Tu prends un coup très léger.";
                }
                elseif ($_SESSION['action0'] === "passive"){
                    return "Tu observes, bloques une première attaque et contre-attaques. Coup puissant bien placé, le Gnoll est vaincu sans aucune égratignure.";
                }
                elseif ($_SESSION['action0'] === "fuite"){
                    return "Tu recules avec ton bouclier levé. Tu fuis avec succès. Pas de gains, mais pas de blessure.";
                }
        
            case "assassin":
                if ($_SESSION['action0'] === "attaque"){
                    return "Tu touches mais le Gnoll réplique vite. Tu le tues mais te fais toucher tu es affaiblie (combat risqué).";
                }
                elseif ($_SESSION['action0'] === "passive"){
                    return "Tu te glisses derrière lui et attaques la nuque. Coup critique instantané. Gnoll éliminé sans aucun dégât. Et tu te trouve surprenanment satisfait de ton combo.";
                }
                elseif ($_SESSION['action0'] === "fuite"){
                    return "Tu disparais dans l’ombre. Tu es entraîné à ça. Tu n’as rien gagné, mais tu es intact.";
                }

            case "mage":
                if ($_SESSION['action0'] === "attaque"){
                    return "Tu lances un projectile de feu trop vite. L’attaque touche mais le Gnoll te charge avant de mourir. Le Gnoll est vaincu et, tu fini écorcher.";
                }
                elseif ($_SESSION['action0'] === "passive"){
                    return "Tu canalises ton mana et lances un sort plus puissant. le Gnoll est pulvérisé. Aucun dégât.";
                }
                elseif ($_SESSION['action0'] === "fuite"){
                    return "Tu crées une petite illusion et recules.";
                }

            case "tank":
                if ($_SESSION['action0'] === "attaque"){
                    return "Tu encaisse son attaque et contre-attaques lourdement. Le Gnoll fini éliminé. Tu as juste affaiblie ton armure.";
                }
                elseif ($_SESSION['action0'] === "passive"){
                    return "Tu restes en défense et forces le Gnoll à s’épuiser. Il se heurte à ton bouclier et finit écrasé. Aucun dégât, mais le combat était long.";
                }
                elseif ($_SESSION['action0'] === "fuite"){
                    return "La fuite est dificile pour quelq'un de ton gabarit, il te rattrape et le combat fût court mais coûteux Tu finis sans bouclier et ton plastron est affaiblie. Mais tu sors victorieux.";
                }

            case "healer":
                if ($_SESSION['action0'] === "attaque"){
                    return "Tu frappes avec ton bâton sacré. Gnoll blessé mais te touche aussi. Tu est allongé sur le sol ensanglanté. Tu meurs à petit feu. (PERDU).";
                }
                elseif ($_SESSION['action0'] === "passive"){
                    return "Tu te protèges grâce à tes sort. Mais ton mana tombe sous les coût du Gnoll. Le Gnoll te vaint.";
                }
                elseif ($_SESSION['action0'] === "fuite"){
                    return "Tu invoques un mur de lumière pour l'éblouir seulement il ne t'avais pas vue et maintenant il te pourchasse. Tu fini mort d'un coup de massu sur le crâne.";
                }

            case "ranger":
                if ($_SESSION['action0'] === "attaque"){
                    return "Tu tires rapidement une flèche. Le Gnoll prend une flèche au torse mais te fonce dessus. Tu le finis au corps à corps flèche à la main. Ton agilité te permets de pas perdre une goute de sang.";
                }
                elseif ($_SESSION['action0'] === "passive"){
                    return "Tu te mets à couvert, vises une zone vitale. Flèche dans l’œil et meurt instantanément. Combat parfait.";
                }
                elseif ($_SESSION['action0'] === "fuite"){
                    return "Tu tires une flèche dans un tronc pour détourner son attention. Tu t’enfuis indemne.";
                }
        }
    }

    if ($_SESSION['step'] === 4) {
        if ($_SESSION['class'] === "healer"){
            return "Perdu, veuillez recommencer et mieux faire !";
        }
        else{
            return "Tu es à la recherche de l'oeuf à carrure d'or. Pour cela tu dois escalader la montagne des d'échut. Donc tu passes dans un boutique acheté de quoi passer la montagne mais tu possèdes seulement 10 pièce d'or. Tu décides d'achetés :";
        }
    }

    if ($_SESSION['step'] === 5){
        switch ($_SESSION['item_step4']) {
            case "piolets":
                if ($_SESSION['class'] === "mage"){
                    $_SESSION['mort'] = TRUE;
                    return "Tu as les bas trop faible et tu tombes et tu crèves.";
                }
                elseif ($_SESSION['class'] === "tank"){
                    $_SESSION['mort'] = TRUE;
                    return "Tu es lourd et puissant mais plus lourd que puissant ton poids ici te fait défault et tu tomber et t'écrase.";
                }
                else{
                    return "Tu viens de franchir la montagne des déchut à la force de tes bras. Tu es épuissé tu ne vois pas claire tu es tojours dans le flou et un enemi est devant, toi tu ne sait pas de quel type d'enemi s'agit t'il que fais tu :";
                }
        
            case "ailes":
                if ($_SESSION['class'] === "mage"){
                    return "Tu viens de franchir la montagne des déchut à l'aide de ton mana. Tu es épuissé tu ne vois pas claire tu es tojours dans le flou et un enemi est devant, toi tu ne sait pas de quel type d'enemi s'agit t'il que fais tu :";
                }
                else{
                    $_SESSION['mort'] = TRUE;
                    return "Les Ailes que tu as acheté fonctionne avec le mana qui est dans chacun de nous seulement votre mana est trop faible les ailes ne fonctionne pas jusqu'en haut, tu tombes et fini écraser.";
                }

            case "serum":
                if ($_SESSION['class'] === "ranger"){
                    return "Tu es montés malgrès le sérum qui était une arnaque et qui n'a eu aucun effet. En escaladants grâce à tes flèches. Tu es épuissé tu ne vois pas claire tu es tojours dans le flou et un enemi est devant, toi tu ne sait pas de quel type d'enemi s'agit t'il que fais tu :";
                }
                else{
                    $_SESSION['mort'] = TRUE;
                    return "Tu te rencontes en pleines chute que tu t'es fait avoir et que t'es capacités n'était pas boosté et que tu viens de chuté en escaladant à la main.";                }

            case "cle":
                $_SESSION['mort'] = TRUE;
                return "Tu passes la porte, soudain tu tombes du haut de la montagnes la porte floté au dessus du vide. Tu perds connaisance dans t'a chute avant de t'écraser.";

            case "chaussure":
                if ($_SESSION['class'] === "tank"){
                    $_SESSION['mort'] = TRUE;
                    return "Tu es trop puissant est provoque une chute de pierre, et tu tombes de très haut et fini extrêment blessé et inconcient un passant te vois tu finis pour abreger tes souffrance et te voles.";
                }
                else{
                    return "Tu viens d'escalader la montagne des déchuts à l'aide des chaussure d'escalade. Tu es épuissé tu ne vois pas claire tu es tojours dans le flou et un enemi est devant, toi tu ne sait pas de quel type d'enemi s'agit t'il que fais tu :";
                }
            case "boutiquaire":
                $_SESSION['mort'] = TRUE;
                return "Le boutiquaire vous enmène en haut du sommet grâce à un passage à l'interrieur de la montagne une fois en haut la foudre vous frappe ! Le Boutiquaire vous à fait passer sur des paratonaire et récupere votre cadavre pour vous voler.";
            
            case "rien":
                if ($_SESSION['class'] === "tank"){
                    $_SESSION['mort'] = TRUE;
                    return "Grâce à sa force il monte, mais à cause de ton poids à une vitesse extrêment lent, et meurts en s'éppuisant avant d'arriver en haut.";
                }
                if ($_SESSION['class'] === "ranger"){
                    return "Tu montes à l'aide de ton propre équipement tu utilises une flèche grappin et escalade.";
                }
                if ($_SESSION['class'] === "warrior"){
                    $_SESSION['mort'] = TRUE;
                    return "Ton égo te fait défault tu t'élance vite monte vite et tu attrape une mauvaise prise par inadvertance, tu tombes et fini ta chute empalé par un rocher !";
                }
                if ($_SESSION['class'] === "assassin"){
                    return "Tu tue le boutiquaire, prends une pierre de téléportation qui te mènes au lieu où tu penses, et fini intacte en haut du sommet. Tu es épuissé par la téléportation tu ne vois pas claire tu es tojours dans le flou et un enemi est devant, toi tu ne sait pas de quel type d'enemi s'agit t'il que fais tu :";
                }
                if ($_SESSION['class'] === "mage"){
                    return "Tu tentes de monter à l'aide de tes pouvoirs tu chute, et te rattrape inextremiste au ras du sol et dévellope une capacité de voler, dû à la situation de stresse caué par ta chute, et remonte en volant au sommet. Tu volant mal tu es épuissé du trajet de tout en bas à tout en haut, tu ne vois pas claire tu es tojours dans le flou et un enemi est devant, toi tu ne sait pas de quel type d'enemi s'agit t'il que fais tu :";
                }
        }
    }

    if ($_SESSION['step'] === 6) {
        switch ($_SESSION['action_step5']) {
            case "rapprocher":
                if ($_SESSION['class'] === "assassin"){
                    return "Tu t'es rapprocher grâce à ta capacité de camouflage. Et tu arrives à ésquiver la bête.";
                }
                elseif ($_SESSION['class'] === "ranger"){
                    return "Malgrès ta vue flou, tu fais confiance à ton 6ième sens et tire deux flèches à l'instinct tout droit dans les yeux de la bête.";
                }
                elseif ($_SESSION['class'] === "warrior"){
                    $_SESSION['mort'] = TRUE;
                    return "Tu avances avec la vue flou et ton casque tu as perdu la bête de vue, et suposse qu'elle est partie, mais soudain tu te fais plaqué au sol et déchicté par la bête et Meurs !";
                }
                elseif ($_SESSION['class'] === "mage"){
                    $_SESSION['mort'] = TRUE;
                    return "Tu envoies un sort en voyant la bête, mais malheureusement ton mana est à vide tu t'es épuissé avec t'es ailes et la bête de fonce dessus et te déchictes. Tu Meurs.";
                }
        
            case "fuite":
                if ($_SESSION['class'] === "warrior"){
                    $_SESSION['mort'] = True;
                    return "Après ton éffort, ton armure te semble plus lourde, et la bête te rattrape. Et te dévors.";
                }
                elseif ($_SESSION['class'] === "mage"){
                    $_SESSION['mort'] = TRUE;
                    return "Tu tente de te cacher dans une grotte et surveille l'entré, mais ne sachant pas que c'était la deumeure du monstre et tu ne l'as pas vue rentré en grappant au plafond tu t'es fait surprendre dans le dos et tu meurs sous les crocs de la bête qui venait défendre ces petits dans le fond de la grotte.";
                }
                elseif ($_SESSION['class'] === "ranger"){
                    return "Le monstre te fonce dessus tu l'esquive de justesse en réutilisant t'a flèche grappin, et la bête te fonce dessus et tombe dans le vide qui était derrière toi ! Tu vois la bête dégringolé depuis le sommet.";
                }
                elseif ($_SESSION['class'] === "assassin"){
                    $_SESSION['mort'] = TRUE;
                    return "En fuiyant au bord de la montagne tu tri-buche fini accrochés avec t'es main sur le point d'utiliser ton agilité d'assassin pour remonter et la bête de mors le bras, tu lâche à cause de la douleur et tombe tout en bas et meurs de chute.";
                }
            }
        }
    if ($_SESSION['step'] === 7) {
        return "Bravo vous avez fini la quête, vous êtes arriver jusqu'à l'oeuf d'or ! Veuillez nous ramener le casque VR (virtuel) à l'entré du magazin CODA_, et nous faire par de votre avis afin d'améliorer l'éxperience audio-visuelle, nous vous remercions d'avance ! signer:'Tono'. ";
    }

    return "";
}

?>