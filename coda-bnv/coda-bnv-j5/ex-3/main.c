# include <stdio.h>
# include <stdlib.h>

double compute_average(double nb1, double nb2, double nb3)
{
	double sum = nb1 + nb2 + nb3;
	return (sum/3);
}

int main()
{
	double result = compute_average(1.2, 2.3, 3.4);
	printf("%.2f", result);
	exit(0);
}
