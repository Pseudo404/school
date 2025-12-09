#include <stdio.h>
#include <stdlib.h>
#include <time.h>
#include "tic-tac-toe.h"

int main(){
    int compteur=0;
    
    int tour=0;
    int joueur;

    char *tab = malloc(9 * sizeof(char));
    int *num = malloc(9 * sizeof(int));

    for (int i = 0; i < 9; i++){
        tab[i] = ' ';
        num[i] = -1;
    }

    printf("\nBienvenue au jeu du morpion !\n\n(Vous êtes les ronds !)\n\n\n 0 | 1 | 2\n ---------\n 3 | 4 | 5\n ---------\n 6 | 7 | 8\n\n");

    while (compteur<9){

        
        srand(time(NULL));

        print_tab(tab);
        win_or_lose(tab);



        if (tour==0){

            printf("\nChoisissez où jouer (0 à 8) : ");
            scanf("%d", &joueur);

            while (num[joueur]==joueur || joueur>8 || joueur<0){
                while (getchar()!='\n'){}

                printf("\nChiffre incorrect ou déjà utilisé !\nChoisissez où jouer (0 à 8) : \n");
                scanf("%d", &joueur);
            }

            tab[joueur]='O';

            num[joueur]=joueur;

            tour=1;
        }

        else {      //'tour' est égal à 0 si le if précédent n'a pas été effectué

            printf("\nAu tour de l'ordinateur.\n");

            int bot = bot_intel(tab, num);

            tab[bot]='X';

            num[bot]=bot;

            tour=0;
        }
    }

    print_tab(tab);
    win_or_lose(tab);

    free(tab);
    free(num);

    exit(0);
}    

