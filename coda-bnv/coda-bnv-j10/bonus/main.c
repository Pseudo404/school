#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <ctype.h>

int main(void) {
    // Alphabet ASCII (A à Z)
    const char *alphab[] = {
        "  #  ##   ## ##  ### ###  ## # # ###  ## # # #   # # ###  #  ##   #  ##   ## ### # # # # # # # # # # ### ### ",
        " # # # # #   # # #   #   #   # #  #    # # # #   ### # # # # # # # # # # #    #  # # # # # # # # # #   #   # ",
        " ### ##  #   # # ##  ##  # # ###  #    # ##  #   ### # # # # ##  # # ##   #   #  # # # # ###  #   #   #   ## ",
        " # # # # #   # # #   #   # # # #  #  # # # # #   # # # # # # #    ## # #   #  #  # # # # ### # #  #  #       ",
        " # # ##   ## ##  ### #    ## # # ###  #  # # ### # # # #  #  #     # # # ##   #  ###  #  # # # #  #  ###  #  "
    };

    const int rows = 5;
    const int letters = 26;

    int total_len = strlen(alphab[0]);
    int char_width = total_len / letters; // Largeur moyenne d'une lettre

    // Lecture phrase utilisateur
    char phrase[256];
    printf("Entrez une phrase (A-Z, espace autorisé) : ");
    if (!fgets(phrase, sizeof(phrase), stdin)) {
        fprintf(stderr, "Erreur lecture entrée\n");
        return EXIT_FAILURE;
    }
    phrase[strcspn(phrase, "\n")] = '\0';

    // Ouverture fichier de sortie
    FILE *out = fopen("ascii_art.txt", "w+");
    if (!out) {
        perror("Erreur ouverture fichier");
        return EXIT_FAILURE;
    }
        // Pour chaque ligne du "dessin"
    for (int r = 0; r < rows; r++) {
        for (size_t i = 0; phrase[i]; i++) {
            char c = toupper((unsigned char)phrase[i]);

            if (c >= 'A' && c <= 'Z') {
                int idx = c - 'A';
                int start = idx * char_width;

                // Impression du motif de la lettre
                for (int p = 0; p < char_width; p++) {
                    if (start + p < total_len)
                        fputc(alphab[r][start + p], out);
                    else
                        fputc(' ', out);
                }
                fputc(' ', out); // espace entre lettres
            } else if (c == ' ') {
                // Espace entre mots
                for (int p = 0; p < char_width; p++) fputc(' ', out);
                fputc(' ', out);
            }
        }
        fputc('\n', out);
    }

    fclose(out);
    printf("✅ ASCII art écrit dans ascii_art.txt\n");
    return EXIT_SUCCESS;
}