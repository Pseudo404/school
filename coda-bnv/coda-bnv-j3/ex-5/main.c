# include <stdio.h>
# include <stdlib.h>

int main()
{
	printf("Choici un signe '+'(montent) ou '-'(descendent) : ");
	char signe;
	scanf("%c", &signe);
	printf("saisie un nombre superieur a zero : ");
	int nb;
	scanf("%d", &nb);
	int occ = 0;

	if (signe == '+')
	{
		while (occ != nb)
		{
			printf("%d\n", occ);
			occ++;
		}
		printf("%d\n", occ);
	}
	else if (signe == '-')
	{
		while (nb != occ)
		{
			printf("%d\n", nb);
			nb--;
		}
		printf("%d\n", nb);
	}
	else
	{
		printf("veuillez recommencer et saisir un signe\n");
	}
	exit(0);
}

