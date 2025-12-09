#include <stdio.h>
#include <stdlib.h>

void swap(int *verre_1, int *verre_2) {
int *verre_vide;
int vide = 0;

verre_vide = &vide;

*verre_vide = *verre_1;
*verre_1 = *verre_2;
*verre_2 = *verre_vide;
}

int main() {
    int *verre_ross;
    int *verre_bob;

    //1. Initialisation des pointeurs avec les adresses des variables
	int biere_blonde = 250;
	int biere_sans_alcool = 500;

	verre_ross = &biere_sans_alcool;
	verre_bob = &biere_blonde;
    //2. Affichage des valeurs avant l'échange
	printf("verre de ross : %d,\n verre de bob : %d", biere_sans_alcool, biere_blonde);
    //3. Échange du contenu des pointeurs
	swap(verre_ross, verre_bob);

    //4. Affichage des valeurs après l'échange
	printf("verre de ross : %d,\n verre de bob : %d", biere_sans_alcool, biere_blonde);
}
