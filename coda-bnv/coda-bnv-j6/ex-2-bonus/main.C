#include <stdlib.h>
#include <stdio.h>
#include "count_words.h"

int main()
{
    int nb_words;

	nb_words = count_words("Hello World!");
	printf("La phrase contient %d mots\n", nb_words);

	nb_words = count_words("La vie l'univers et tout le reste");
	printf("La phrase contient %d mots\n", nb_words);

	exit(0);
}
