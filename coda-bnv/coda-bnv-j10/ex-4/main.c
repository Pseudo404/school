#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include "struct.h"

#define LINE_SIZE 256

char *extract_value(const char *line) {
    const char *pos = strchr(line, ':');
    if (!pos) return NULL;
    while (*(++pos) == ' ' || *pos == '\t');
    char *val = strdup(pos);
    if (!val) return NULL;
    size_t len = strlen(val);
    while (len && (val[len - 1] == '\n' || val[len - 1] == '\r' || val[len - 1] == ' ' || val[len - 1] == '\t'))
        val[--len] = '\0';
    return val;
}

int main() {
    FILE *file = fopen("exercice4.txt", "r");
    if (!file) return perror("Erreur ouverture fichier"), EXIT_FAILURE;

    user u = {NULL, NULL, 0};
    char line[LINE_SIZE];

    while (fgets(line, sizeof(line), file)) {
        if (strncasecmp(line, "Prénom", 6) == 0) u.first_name = extract_value(line);
        else if (strncasecmp(line, "Nom", 3) == 0) u.last_name = extract_value(line);
        else if (strncasecmp(line, "Age", 3) == 0) {
            char *val = extract_value(line);
            if (val) sscanf(val, "%d", &u.age), free(val);
        }
    }
    fclose(file);

    if (!u.first_name || !u.last_name)
        return fprintf(stderr, "Erreur : prénom ou nom manquant\n"), free(u.first_name), free(u.last_name), EXIT_FAILURE;

    printf("Nom: %s %s, Âge: %d\n", u.first_name, u.last_name, u.age);
    free(u.first_name);
    free(u.last_name);
    return EXIT_SUCCESS;
}