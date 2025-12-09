#include <stdio.h>
#include <stdlib.h>

int main(void) {
    char **tab = malloc(3 * sizeof(*tab));
    if (!tab) {
        perror("Erreur d’allocation mémoire");
        return EXIT_FAILURE;
    }

    tab[0] = "Goodnight\n";
    tab[1] = "And thanks !\n";
    tab[2] = "For all the fish!\n";

    FILE *file = fopen("exercice5.txt", "w+");
    if (!file) {
        perror("Erreur ouverture fichier (doit déjà exister)");
        free(tab);
        return EXIT_FAILURE;
    }

    for (int i = 0; i < 3; i++) {
        fputs(tab[i], file);
    }

    fclose(file);
    free(tab);

    printf("Contenu du tableau écrit dans le fichier existant.\n");
    return EXIT_SUCCESS;
}