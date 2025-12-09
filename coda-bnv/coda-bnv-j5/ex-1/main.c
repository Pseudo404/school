# include <stdio.h>
# include <stdlib.h>

void print_str(char *str)
{
	printf("%s", str);
}

int main()
{
	char * str = "Hello World\n";
	print_str(str);
	exit(0);
}
