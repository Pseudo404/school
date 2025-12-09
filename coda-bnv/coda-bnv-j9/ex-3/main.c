#include <stdlib.h>
#include <stdio.h>
#include "struct.h"

void fill_struct(character * perso)
{
	perso->strength = 1000000;
	perso->intelligence = 100;
	perso->wisdom = 1;
	perso->agility = 5;
	perso->endurance = 1000;
}

int main()
{
	character *perso = malloc(sizeof(*perso));

	perso->strength = 1000000;
	perso->intelligence = 100;
	perso->wisdom = 1;
	perso->agility = 5;
	perso->endurance = 1000;
	

	printf("Force : %d, Inteligence : %d, Sagesse : %d, Agilité : %d, Endurance : %d\n", perso->strength, perso->intelligence, perso->wisdom, perso->agility, perso->endurance);

	free(perso);

	exit(0);
}
