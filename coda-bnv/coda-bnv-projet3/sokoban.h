#ifndef __TIC_TAC_TOE__
#define __TIC_TAC_TOE__

char getch();
void send(char msg);
void print_tab(char ** tab);
char *str_cpy(char * str);
void free_str_tab(char ** str_tab);

typedef struct s_item{
    int pos_x;
    int pos_y;
    char *name;
} item;

void push(item *character, item *caisse, int previous_move, int move_up_down, char **plateau);

#endif
