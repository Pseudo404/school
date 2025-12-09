# include <stdio.h>
# include <stdlib.h>

int main()
{
	int value;
	printf("donne un nb entier: ");
	scanf("%d", &value);
	if (value > 42)
	{
		printf("%d est plus grand que 42\n", value);
	}
	else if (value < 42)
	{
		printf("%d est inferieur a 42\n", value);
	}
	else
	{
		printf("%d est egale a 42\n", value);
	}
	exit(0);
}
