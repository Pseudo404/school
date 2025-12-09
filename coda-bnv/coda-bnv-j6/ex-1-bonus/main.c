#include <stdlib.h>
#include <stdio.h>
#include "swap_ptr.h"

int main()
{
	int val1 = 42;
	int val2 = 21;

	printf("val1 : %d, val2 : %d\n", val1, val2);

	swap_ptr(&val1, &val2);

	printf("val1 : %d, val2 : %d\n", val1, val2);

	exit(0);
}
