# include <stdio.h>
# include <stdlib.h>

int main()
{
	int nb;
	printf("choici un nb different de 0 : ");
	scanf("%d", &nb);
	int occ = 0;
	while (occ != nb)
	{
		printf("%d\n", occ);
		occ++;
	}
	exit(0);
}
