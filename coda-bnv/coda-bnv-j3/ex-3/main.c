# include <stdio.h>
# include <stdlib.h>

int main()
{
	char mot[100];
	printf("saisie un mot : ");
	scanf("%s", mot);
	int occ = 0;
	while (occ != 5)
	{
		printf("%d : %s\n", occ, mot);
		occ++;
	}
	exit(0);
}
