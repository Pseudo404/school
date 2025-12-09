#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <termios.h>
#include <unistd.h>
#include "sokoban.h"

//Cette fonction équivaut à la librairie conio.h de Windows pour Linux (ici Ubuntu) -> Ressources : Wikipédia (pour le principe de la bibliothèque), IA (pour la retranscription sous Linux de la bibliothèque)
char getch() {
    struct termios oldt, newt;
    char ch;

    tcgetattr(STDIN_FILENO, &oldt);           // Sauvegarde des paramètres actuels
    newt = oldt;
    newt.c_lflag &= ~(ICANON | ECHO);         // Mode non canonique, pas d'affichage
    tcsetattr(STDIN_FILENO, TCSANOW, &newt);  // Applique les nouveaux paramètres

    ch = getchar();                           // Lecture d’un caractère

    tcsetattr(STDIN_FILENO, TCSANOW, &oldt);  // Restaure les paramètres
    return ch;
}

void send(char msg){
    if (msg=='w'){
    char *message[] = 
            {
                "W   W   IIIII   N   N   !",
                "W   W     I     NN  N   !",
                "W   W     I     N N N   !",
                "W   W     I     N  NN   !",
                "W w W     I     N   N   !",
                "Ww wW     I     N   N   !",
                "W   W   IIIII   N   N   !",
            };
            int lines = sizeof(message) / sizeof(message[0]);
            for (int i = 0; i < lines; i++) {
                printf("%s\n", message[i]);
            }
    }
            
    else{
    char *message[] = 
            {
                " GGGG    AAA    M   M   EEEEE       OOO    V   V   EEEEE   RRRR ",
                "G       A   A   MM MM   E          O   O   V   V   E       R   R",
                "G       A   A   M M M   E          O   O   V   V   E       R   R",
                "G  GG   AAAAA   M   M   EEEE       O   O   V   V   EEEE    RRRR ",
                "G   G   A   A   M   M   E          O   O    V V    E       R   R",
                "G   G   A   A   M   M   E          O   O    V V    E       R   R",
                " GGG    A   A   M   M   EEEEE       OOO      V     EEEEE   R   R",
            };
            int lines = sizeof(message) / sizeof(message[0]);
            for (int i = 0; i < lines; i++) {
                printf("%s\n", message[i]);
            }
    }
}

void print_tab(char ** tab)
{
	int i = 0;
	while (tab[i] != NULL)
	{
		printf("%s\n", tab[i]);
		i++;
	}
}

char *str_cpy(char * str)
{
	int i = strlen(str) - 1;
	char * cpy = malloc(i+1 * sizeof(char));

	while (i>=0)
	{
		cpy[i] = str[i];
		i--;
	}
	return(cpy);
}

void free_str_tab(char ** str_tab)
{
    int i = 0;

        while(str_tab[i] != NULL)
        {
            free(str_tab[i]);
            i = i + 1;
        }

        free(str_tab);
}
void push(item *character, item *caisse, int previous_move, int move_up_down, char **plateau)
{
    if (character->pos_x == caisse->pos_x && character->pos_y == caisse->pos_y)
    {
        if (move_up_down == 0)
        {
            if (previous_move < character->pos_x){
                caisse->pos_x ++;
                if (plateau[caisse->pos_y][caisse->pos_x] == '#')
                {
                    character->pos_x --;
                    caisse->pos_x --;
                }
            }
            if (previous_move > character->pos_x){
                caisse->pos_x --;
                if (plateau[caisse->pos_y][caisse->pos_x] == '#')
                {
                    character->pos_x ++;
                    caisse->pos_x ++;
                }
            }
        }
        else if (move_up_down == 1) {
            if (previous_move < character->pos_y){
                caisse->pos_y ++;
                if (plateau[caisse->pos_y][caisse->pos_x] == '#')
                {
                    character->pos_y --;
                    caisse->pos_y --;
                }
            }
            if (previous_move > character->pos_y){
                caisse->pos_y --;
                if (plateau[caisse->pos_y][caisse->pos_x] == '#')
                {
                    character->pos_y ++;
                    caisse->pos_y ++;
                }
            }
        }
        
    }
}


