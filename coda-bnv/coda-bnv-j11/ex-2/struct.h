#ifndef TESTS_STRUCT_H
#define TESTS_STRUCT_H

typedef struct s_number number;

struct s_number {
    int value;
    number *next;
};

#endif // TESTS_STRUCT_H