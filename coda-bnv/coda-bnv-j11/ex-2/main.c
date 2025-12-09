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
        if ((tmp->value) == value)
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

    int value;
    int value2;
    // print afficher
    number *list = create_list(1);
    add_to_end(&list, 2);
    add_to_end(&list, 3);
    add_to_end(&list, 5);

    display_list(&list);

    printf("---- After adding link ----\n");

    value = 3;
    value2 = 4;
    add_link(&list, value, value2);

    display_list(&list);
    
    free(list);
    exit(0);
}