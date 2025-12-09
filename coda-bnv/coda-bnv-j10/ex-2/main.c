#include <stdio.h>
#include <stdlib.h>


int main()
{
    FILE *fp = fopen("exercice2.txt", "w+");

    if (fp == NULL)
    {
        printf("Le fichier texte.txt n'a pas pu être ouvert\n");
        return EXIT_FAILURE;
    }

    fprintf(fp, "Frêre Jacques, frêre Jacques\nDormez-vous, dormez-vous ?");

    fclose(fp);
    return 0;
}