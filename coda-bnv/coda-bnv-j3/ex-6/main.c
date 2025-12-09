#include <stdio.h>
#include <stdlib.h>

int main(){
    printf("Bienvenue dans la mini calculatrice !\n");
    printf("Choisissez un opérateur (+, -, *, /, %%) : ");
    char op;
    scanf("%c", &op);
    double nb1, nb2;
    printf("Choisissez un premier nombre : ");
    scanf("%lf", &nb1);
    printf("Choisissez un deuxième nombre : ");
    scanf("%lf", &nb2);
    if (op=='+'){
        printf("%.2f + %.2f = %.2f\n", nb1, nb2, nb1+nb2);
    }
    else if (op=='-'){
        printf("%.2f - %.2f = %.2f\n", nb1, nb2, nb1-nb2);
    }
    else if (op=='*'){
        printf("%.2f * %.2f = %.2f\n", nb1, nb2, nb1*nb2);
    }
    else if (op=='/'){
        printf("%.2f / %.2f = %.2f\n", nb1, nb2, nb1/nb2);
    }
    else if (op=='%'){
        int bn1 = nb1;
        int bn2 = nb2;
        printf("%d %% %d = %d\n", bn1, bn2, bn1%bn2);
    }
    else {
        printf("erreur");
    }
    exit(0);
}
