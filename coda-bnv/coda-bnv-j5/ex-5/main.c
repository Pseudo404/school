# include <stdio.h>
# include <stdlib.h>
# include "functions.h"

int main()
{
	print_str("Hello World\n");
	printf("%d\n", add(10,20));
	printf("%.2f\n", compute_average(4.0, 5.0, 6.0));
	return (0);
}
