#include <stdio.h>
#include <stdlib.h>

int main() {
    const char *sheep[] = {
    "        __  _                              ",
    "    .-.'  `; `-._  __  _                   ",
    "   (_,           .-:'  `; `-._             ",
    " ,'o'(            (_,           )          ",
    "(__,-'            ,'o'(            )>      ",
    "   (             (__,-'            )       ",
    "    `-'._.--._.-'     (            )       ",
    "       ||||  ||||       `-'._.--._.-'      ",
    "      /_)(_\\ /_)        ||||  ||||        ",
    "                                           ",
    };

    int lines = sizeof(sheep) / sizeof(sheep[0]);

    FILE *file = fopen("mouton.txt", "w+");
    if (!file) {
        perror("Erreur ouverture fichier");
        return EXIT_FAILURE;
    }

    for (int i = 0; i < lines; i++) {
        fprintf(file, "%s\n", sheep[i]);
    }

    fclose(file);

    printf("Le mouton a été écrit dans le fichier mouton.txt\n");

    return EXIT_SUCCESS;
}