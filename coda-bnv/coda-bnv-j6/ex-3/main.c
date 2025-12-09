# include <stdio.h>
# include <stdlib.h>
# include <string.h>

void str_rev(char *str){
	int i = strlen(str) - 1;
	char mot[100];
	int j = 0;

	while (i>=0){
		mot[j] = str[i];
		i--;
		j++;
	}
	mot[j] = '\0';
	printf("chaine inverser : %s\n", mot);
}

int main(){
	char str[100];
	printf("Entrer une chaine : ");
	scanf("%s", str);

	str_rev(str);
	exit(0);
}
