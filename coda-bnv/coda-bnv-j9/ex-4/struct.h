#ifndef TESTS_STRUCT_H
#define TESTS_STRUCT_H

struct s_char {
    int strength;
    int intelligence;
    int wisdom;
    int agility;
    int endurance;
    char *name;
};

typedef struct s_char character;

#endif //TESTS_STRUCT_H