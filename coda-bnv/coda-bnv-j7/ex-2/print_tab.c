# include <stdio.h>
# include <stdlib.h>

void print_tab(char ** tab)
{
	int i = 0;
	while (tab[i] != NULL)
	{
		printf("%s\n", tab[i]);
		i++;
	}
}
