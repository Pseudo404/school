# include <stdio.h>
# include <stdlib.h>

int str_len(char *str){
	int i = 0;

	while(str[i] != '\0'){
	i++;
	}
	return (i);
}

int main(){
	printf("%d\n", str_len("Hello World"));
}
