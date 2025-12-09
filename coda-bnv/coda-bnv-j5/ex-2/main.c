# include <stdio.h>
# include <stdlib.h>

int add(int nb1, int nb2)
{
	return(nb1+nb2);
}

int main()
{
	int sum = add(10, 20);
	printf("%d", sum);
	exit(0);
}
