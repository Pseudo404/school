#include <stdio.h>
#include <stdlib.h>

int main()
{
	char prenom[100];
	int age;
	printf("Bonjour, quel est votre prenom ? : ");
	scanf("%s", prenom);
	printf("Bonjour %s, quel est votre age ? : ", prenom);
	scanf("%d", &age);
	int annee_1 = 2024 - age;
	int annee_2 = 2025 - age;
	printf("Mari, si vous etes de la fin d'annee, votre annee de naissance est %d sinon c'est %d\n", annee_1, annee_2);
	exit(0);
}
