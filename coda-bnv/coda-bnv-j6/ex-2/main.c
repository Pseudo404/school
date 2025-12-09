# include <stdio.h>
# include <stdlib.h>

int str_cmp(char *str1, char *str2){

	int i = 0;
	int res = 1;

	while (str1[i] != '\0' || str2[i] != '\0'){
	if (str1[i] != str2[i]){
		res = 0;
		}
		i++;
	}

	return (res);
}

int main(){
	char * mot1 = "Hello";
	char * mot2 = "World";

	if (str_cmp(mot1, mot2) == 0){
		printf("les mots sont differents.\n");
	}
	else {
	printf("les mots sont identiques.\n");
	}
	exit (0);
}
