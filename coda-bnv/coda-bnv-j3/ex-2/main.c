# include <stdio.h>
# include <stdlib.h>

int main()
{
	char operat;
	printf("entre une operation +-*/%%: ");
	scanf("%c", &operat);
	if (operat == '+')
	{
		printf("Vous avez choici une addition !\n");
	}
	else if (operat == '-')
	{
		printf("Vous avez choici une soustraction !\n");
	}
	else if (operat == '*')
	{
		printf("Vous avez choici une multiplication !\n");
	}
	else if (operat == '/')
	{
		printf("Vous avez choici la division !\n");
	}
	else if (operat == '%')
	{
		printf("Vous avez choici le modulo\n");
	}
	else
	{
		printf("Vous avez taper n'importe quoi\n");
	}
	exit(0);
}

