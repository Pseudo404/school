#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include "struct.h"

int main()
{
    movie titanic;

    titanic.title = "Titanic";
    titanic.director = "James Cameron";
    titanic.year = 1997;

    FILE *file = fopen("exercice6.txt", "w+");
    if (!file) {
        perror("Erreur ouverture fichier");
        return EXIT_FAILURE;
    }

    fprintf(file, "Titre : %s, Directeur : %s, Année : %d.\n",
            titanic.title, titanic.director, titanic.year);

    rewind(file);

    printf("Contenu du fichier :\n");
    char buffer[256];
    while (fgets(buffer, sizeof(buffer), file)) {
        printf("%s", buffer);
    }

    fclose(file);
    return EXIT_SUCCESS;
}