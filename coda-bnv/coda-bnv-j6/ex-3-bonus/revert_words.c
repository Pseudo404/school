#include <stdio.h>
#include <string.h>

void revert_words(char *str) {
    int len = strlen(str);
    int i = len - 1;
    int is_first_word = 1;

    while(i >= 0) {
        while (i >= 0 && (str[i] == ' ' || str[i] == '\'')) {
            i--;
        }

        if (i < 0) {
            break;
        }

        int end = i;
        while (i >= 0 && str[i] != ' ' && str[i] != '\'') {
            i--;
        }
        int start = i + 1;

        if (!is_first_word) {
            printf(" ");
        } else {
            is_first_word = 0;
        }

        int j = start;
        while (j <= end) {
            printf("%c", str[j]);
            j++;
        }
    }

    printf("\n");
}
