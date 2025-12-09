#include <stdio.h>
#include <stdlib.h>
#include "struct.h"


number *create_list(int value)
    {
        number *first = malloc(sizeof(*first));
        first->value = value;
        first->next = NULL;

        return first;
    }

void add_link(number **list, int value, int value2)
{
    number *tmp = *list;
    while (tmp != NULL)
    {
        if (tmp->value == value)
        {
            number *new_number = malloc(sizeof(*new_number));
            new_number->value = value2;
            new_number->next = tmp->next;
            tmp->next = new_number;
        }
        tmp = tmp->next;
    }
}

void add_to_end(number **list, int value)
{
	number *tmp = *list;

	while(tmp->next != NULL)
	{
		tmp = tmp->next;
	}

	number *item = malloc(sizeof(*item));
	item->value = value;
	item->next = NULL;

	tmp->next = item;
}

void display_list(number **list)
{
	number *tmp = *list;

	while(tmp != NULL)
	{
		printf("Value : %d\n", tmp->value);
		tmp = tmp->next;
	}
}

int main() 
{
    int value, input;
    printf("Veuillez saisir un premier nombre : ");
    scanf("%d", &value);
    number *list = create_list(value);

    while (1) 
    {
        printf("\nQue souhaitez-vous faire ?\n\n- Ajouter un nombre (1)\n- Afficher la liste (2)\n- Quitter (3)\n- Effacer l'écran (4)\nVotre choix : ");
        scanf("%d", &input);

        if (input == 1)
        {
            printf("nombre à ajouter : ");
            scanf("%d", &value);
            number *tmp = list;
            while (value > tmp->value && tmp->next != NULL) 
            {
                tmp = tmp->next;
                
            }
            if (value > tmp->value)
            {
                add_to_end(&list, value);
            }
            else if (value < tmp->value)
            {
                number *new_number = malloc(sizeof(*new_number));
                new_number->value = value;
                new_number->next = list;
                list = new_number;
            }
            else
            {
                add_link(&list, tmp->value, value);
            }
        } 
        else if (input == 2)
        {
            printf("liste à afficher : \n");
            display_list(&list);
        } 
        else if (input == 3)
        {
            break;
        } 
        else if (input == 4)
        {
            system("clear");
        } 
        else 
        {
            printf("Choix invalide. Veuillez réessayer.\n");
        }
    }
    free(list);
    exit(0);
}