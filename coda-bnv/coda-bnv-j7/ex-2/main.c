#include <stdlib.h>
#include <stdio.h>
#include "str_cpy.h"
#include "print_tab.h"

int main()
{
	char ** str_tab = malloc(4 * sizeof(*str_tab));
	str_tab[3] = NULL;

	str_tab[0] = str_cpy("La vie");
	str_tab[1] = str_cpy("l'univers");
	str_tab[2] = str_cpy("et tout le reste.");

	print_tab(str_tab);

	int i = 0;

	while(str_tab[i] != NULL)
	{
		free(str_tab[i]);
		i = i + 1;
	}

	free(str_tab);
}
