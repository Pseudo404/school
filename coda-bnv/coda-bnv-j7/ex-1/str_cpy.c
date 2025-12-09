#include <stdio.h>
#include <stdlib.h>
#include <string.h>

char *str_cpy(char * str)
{
	int i = strlen(str) - 1;
	char * cpy = malloc(i+1 * sizeof(char));

	while (i>=0)
	{
		cpy[i] = str[i];
		i--;
	}
	return(cpy);
}
