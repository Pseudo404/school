let solde = 0;

const produits = {
    eau:  { nom: "Eau",  prix: 1.00 },
    soda: { nom: "Soda", prix: 1.50 },
    jus:  { nom: "Jus",  prix: 2.00 },
    cafe: { nom: "Café", prix: 1.20 }
};

function addMoney() {
    const montant = Number(document.getElementById("money").value);
    solde += montant;
    document.getElementById("solde").textContent = String(solde.toFixed(2));
    displayMessage(`${montant.toFixed(2)} € ajouté.`);
}

function acheter(idProduit) {
    const produit = produits[idProduit];
    if (solde < produit.prix) {
        displayMessage(`Solde insuffisant. ${(produit.prix - solde).toFixed(2)} € manquant.`);
        return;
    }
    solde -= produit.prix;
    document.getElementById("solde").textContent = solde.toFixed(2);
    displayMessage(`Produit distribué : ${produit.nom}. Monnaie rendue : ${solde.toFixed(2)} €`);
    document.getElementById("solde").textContent = solde.toFixed(2);
}

function displayMessage(message) {
    document.getElementById("log").textContent = message;
}