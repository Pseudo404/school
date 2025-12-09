#include <stdio.h>
#include <stdlib.h>
#include <time.h>
#include <termios.h>
#include <unistd.h>
#include <string.h>
#include <sys/wait.h>

#include "sokoban.h"

int main(){
    
    char **plateau = malloc(16 * sizeof(*plateau));

    plateau[0] = str_cpy("#######################");
    plateau[1] = str_cpy("#                     #");
    plateau[2] = str_cpy("#                     #");
    plateau[3] = str_cpy("#                     #");
    plateau[4] = str_cpy("#                     #");
    plateau[5] = str_cpy("#                     #");
    plateau[6] = str_cpy("#                     #");
    plateau[7] = str_cpy("#                     #");
    plateau[8] = str_cpy("#                     #");
    plateau[9] = str_cpy("#                     #");
    plateau[10] = str_cpy("#                     #");
    plateau[11] = str_cpy("#                     #");
    plateau[12] = str_cpy("#                     #");
    plateau[13] = str_cpy("#                     #");
    plateau[14] = str_cpy("#######################");
    plateau[15] = NULL;

    char key;

    item character, caisse, fin;
    character.name = malloc(100 * sizeof(char));
    
    int nombre, nombre2;
	srand(time(NULL));
	
    character.pos_x = rand() % 21 + 1; // entre 1 et 21
    character.pos_y = rand() % 13 + 1; // entre 1 et 13
	
    do {
        caisse.pos_x = rand() % 19 + 2; // entre 2 et 20 -> pas collé aux murs
        caisse.pos_y = rand() % 11 + 2; // entre 2 et 12 -> pas collé aux murs
    } while (caisse.pos_x == character.pos_x && caisse.pos_y == character.pos_y);

    do {
        fin.pos_x = rand() % 21 + 1;
        fin.pos_y = rand() % 13 + 1;
    } while ((fin.pos_x == character.pos_x && fin.pos_y == character.pos_y) ||
            (fin.pos_x == caisse.pos_x && fin.pos_y == caisse.pos_y));

    printf("\nBienvenue au jeu du Sokoban !\n\nAppuie sur echap si vous souhaite quitter à tout instant.\n\nComment souhaitez-vous nommer votre personnage : ");
    scanf("%s", character.name);

    int previous_move;
    int move_up_down;

    char lettre;
    
    while ((key = getch()) != 27){

        system("clear");
        plateau[character.pos_y][character.pos_x] = ' ';
        plateau[caisse.pos_y][caisse.pos_x] = ' ';

        if ((key == 122 || key == 90) && plateau[character.pos_y-1][character.pos_x] !='#'){
            previous_move = character.pos_y;
            move_up_down = 1;
            character.pos_y --;
        }
        if ((key == 113 || key == 81) && plateau[character.pos_y][character.pos_x-1] !='#'){
            previous_move = character.pos_x;
            move_up_down = 0;
            character.pos_x --;
        }
        if ((key == 115 || key == 83) && plateau[character.pos_y+1][character.pos_x] !='#'){
            previous_move = character.pos_y;
            move_up_down = 1;
            character.pos_y ++;
        }
        
        if ((key == 100 || key == 68) && plateau[character.pos_y][character.pos_x+1] !='#' ){
            previous_move = character.pos_x;
            move_up_down = 0;
            character.pos_x ++;
        }     

        push(&character, &caisse, previous_move, move_up_down, plateau);
                
        plateau[fin.pos_y][fin.pos_x] = '-';
        plateau[character.pos_y][character.pos_x] = 'O';
        plateau[caisse.pos_y][caisse.pos_x] = 'X';

        if (caisse.pos_y == fin.pos_y && caisse.pos_x == fin.pos_x){
            lettre='w';
            send(lettre);
            break;
        }
        if (caisse.pos_x == 21 && fin.pos_x != 21 || caisse.pos_x == 1 && fin.pos_x != 1 || caisse.pos_y == 1 && fin.pos_y != 1 || caisse.pos_y == 13 && fin.pos_y != 13){
            lettre='d';
            send(lettre);
            break;
        }

        print_tab(plateau);
        printf("\nVous êtes le rond !\n\nPosition de %s : (%d : %d)\nPour vous déplacez veuiller utiliser les touches ZQSD.\n", character.name, character.pos_y, character.pos_x);
    
    }

    FILE *file = fopen("end.txt", "w+");
    if (!file) {
        perror("Erreur ouverture fichier (doit déjà exister)");
        free(plateau);
        return EXIT_FAILURE;
    }


    if (lettre == 'w'){
        fputs("W   W   IIIII   N   N   !\nW   W     I     NN  N   !\nW   W     I     N N N   !\nW   W     I     N  NN   !\nW w W     I     N   N   !\nWw wW     I     N   N   !\nW   W   IIIII   N   N   !\n", file);
    }
    
    else if (lettre == 'd'){
        fputs(" GGGG    AAA    M   M   EEEEE       OOO    V   V   EEEEE   RRRR\n G       A   A   MM MM   E          O   O   V   V   E       R   R\nG       A   A   M M M   E          O   O   V   V   E       R   R\nG  GG   AAAAA   M   M   EEEE       O   O   V   V   EEEE    RRRR \nG   G   A   A   M   M   E          O   O    V V    E       R   R\nG   G   A   A   M   M   E          O   O    V V    E       R   R\n GGG    A   A   M   M   EEEEE       OOO      V     EEEEE   R   R", file);
    }
    
    fputc('\n', file);
    
    int i = 0;
	while (plateau[i] != NULL)
	{
		fputs(plateau[i], file);
        fputc('\n', file);
		i++;
	}
    
    fclose(file);

    free_str_tab(plateau);

    exit(0);
}
