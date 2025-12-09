# include <stdio.h>
# include <stdlib.h>
# include "functions.h"

void print_str(char *str)
{
        printf("%s", str);
}

int add(int nb1, int nb2)
{
        return (nb1+nb2);
}

double compute_average(double nb1, double nb2, double nb3)
{
        return ((nb1+nb2+nb3)/3);
}
