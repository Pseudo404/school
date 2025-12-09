#include <stdio.h>
#include <stdlib.h>

void print_tab(char tab[9]){
    printf(
        "\n %c | %c | %c\n ---------\n %c | %c | %c\n ---------\n %c | %c | %c\n\n",       //affichage du jeu 
        tab[0], tab[1], tab[2], tab[3], tab[4], tab[5], tab[6], tab[7], tab[8]);
}




void win_or_lose(char tab[9]){

    int compteur=0;
    int i=0;

    if (tab[0]=='O'&&tab[0]==tab[1]&&tab[1]==tab[2]){ // O | O | O 
        printf("\nVous avez gagné !\n");              //   |   |
        exit(0);                                      //   |   |   -> gagné
    }

    if (tab[3]=='O'&&tab[3]==tab[4]&&tab[4]==tab[5]){ //   |   |
        printf("\nVous avez gagné !\n");              // O | O | O
        exit(0);                                      //   |   |   -> gagné
    }

    if (tab[6]=='O'&&tab[6]==tab[7]&&tab[7]==tab[8]){ //   |   |
        printf("\nVous avez gagné !\n");              //   |   |  
        exit(0);                                      // O | O | O -> gagné
    }

    if (tab[0]=='O'&&tab[0]==tab[3]&&tab[3]==tab[6]){ // O |   |
        printf("\nVous avez gagné !\n");              // O |   |
        exit(0);                                      // O |   |   -> gagné
    }

    if (tab[1]=='O'&&tab[1]==tab[4]&&tab[4]==tab[7]){ //   | O |
        printf("\nVous avez gagné !\n");              //   | O |
        exit(0);                                      //   | O |   -> gagné
    }

    if (tab[2]=='O'&&tab[2]==tab[5]&&tab[5]==tab[8]){ //   |   | O
        printf("\nVous avez gagné !\n");              //   |   | O
        exit(0);                                      //   |   | O -> gagné
    }
    
    if (tab[0]=='O'&&tab[0]==tab[4]&&tab[4]==tab[8]){ // O |   |
        printf("\nVous avez gagné !\n");              //   | O |
        exit(0);                                      //   |   | O -> gagné
    }

    if (tab[2]=='O'&&tab[2]==tab[4]&&tab[4]==tab[6]){ //   |   | O
        printf("\nVous avez gagné !\n");              //   | O |
        exit(0);                                      // O |   |   -> gagné
    }

    if (tab[0]=='X'&&tab[0]==tab[1]&&tab[1]==tab[2]){ // O | O | O 
        printf("\nVous avez perdu...\n");             //   |   |
        exit(0);                                      //   |   |   -> perdu
    }

    if (tab[3]=='X'&&tab[3]==tab[4]&&tab[4]==tab[5]){ //   |   |
        printf("\nVous avez perdu...\n");             // O | O | O
        exit(0);                                      //   |   |   -> perdu
    }

    if (tab[6]=='X'&&tab[6]==tab[7]&&tab[7]==tab[8]){ //   |   |
        printf("\nVous avez perdu...\n");             //   |   |  
        exit(0);                                      // O | O | O -> perdu
    }

    if (tab[0]=='X'&&tab[0]==tab[3]&&tab[3]==tab[6]){ // O |   |
        printf("\nVous avez perdu...\n");             // O |   |
        exit(0);                                      // O |   |   -> perdu
    }

    if (tab[1]=='X'&&tab[1]==tab[4]&&tab[4]==tab[7]){ //   | O |
        printf("\nVous avez perdu...\n");             //   | O |
        exit(0);                                      //   | O |   -> perdu
    }

    if (tab[2]=='X'&&tab[2]==tab[5]&&tab[5]==tab[8]){ //   |   | O
        printf("\nVous avez perdu...\n");             //   |   | O
        exit(0);                                      //   |   | O -> perdu
    }
    
    if (tab[0]=='X'&&tab[0]==tab[4]&&tab[4]==tab[8]){ // O |   |
        printf("\nVous avez perdu...\n");             //   | O |
        exit(0);                                      //   |   | O -> perdu
    }

    if (tab[2]=='X'&&tab[2]==tab[4]&&tab[4]==tab[6]){ //   |   | O
        printf("\nVous avez perdu...\n");             //   | O |
        exit(0);                                      // O |   |   -> perdu
    }

    while (compteur!=9){
        if (tab[compteur]!=' '){
            i++;
        }
        compteur++;
    }

    if (i==9){
        printf("\nÉgalité\n");
        exit(0);
    }
}





int bot_intel(char tab[9], int num[9]){         //-> Augmenter la difficulté de deuxième joueur

                                    //-> Conditions pour que le deuxième joueur gagne

    if (tab[0]==tab[1]&&tab[0]=='X'&&tab[2]==' '){    // O | O | ?
        return(2);                                    //   |   |
    }                                                 //   |   |

    if (tab[2]==tab[1]&&tab[1]=='X'&&tab[0]==' '){    // ? | O | O
        return(0);                                    //   |   |
    }                                                 //   |   |

    if (tab[0]==tab[2]&&tab[0]=='X'&&tab[1]==' '){    // O | ? | O
        return(1);                                    //   |   |
    }                                                 //   |   |

    if (tab[0]==tab[3]&&tab[0]=='X'&&tab[6]==' '){    // O |   | 
        return(6);                                    // O |   |
    }                                                 // ? |   |

    if (tab[3]==tab[6]&&tab[3]=='X'&&tab[0]==' '){    // ? |   |
        return(0);                                    // O |   |
    }                                                 // O |   |

    if (tab[0]==tab[6]&&tab[0]=='X'&&tab[3]==' '){    // O |   |
        return(3);                                    // ? |   |
    }                                                 // O |   |

    if (tab[4]==tab[8]&&tab[4]=='X'&&tab[0]==' '){    // ? |   |
        return(0);                                    //   | O |
    }                                                 //   |   | O

    if (tab[0]==tab[8]&&tab[0]=='X'&&tab[4]==' '){    // O |   |
        return(4);                                    //   | ? |
    }                                                 //   |   | O

    if (tab[0]==tab[4]&&tab[0]=='X'&&tab[8]==' '){    // O |   |
        return(8);                                    //   | O |
    }                                                 //   |   | ?

    if (tab[3]==tab[5]&&tab[5]=='X'&&tab[4]==' '){    //   |   |
        return(4);                                    // O | ? | O
    }                                                 //   |   | 

    if (tab[5]==tab[4]&&tab[4]=='X'&&tab[3]==' '){    //   |   |
        return(3);                                    // ? | O | O
    }                                                 //   |   | 

    if (tab[3]==tab[4]&&tab[4]=='X'&&tab[5]==' '){    //   |   |
        return(5);                                    // O | O | ?
    }                                                 //   |   | 

    if (tab[4]==tab[7]&&tab[7]=='X'&&tab[1]==' '){    //   | ? |
        return(1);                                    //   | O |
    }                                                 //   | O | 

    if (tab[1]==tab[7]&&tab[7]=='X'&&tab[4]==' '){    //   | O |
        return(4);                                    //   | ? |
    }                                                 //   | O | 

    if (tab[1]==tab[4]&&tab[4]=='X'&&tab[7]==' '){    //   | O |
        return(7);                                    //   | O |
    }                                                 //   | ? | 

    if (tab[8]==tab[5]&&tab[5]=='X'&&tab[2]==' '){    //   |   | ?
        return(2);                                    //   |   | O
    }                                                 //   |   | O

    if (tab[8]==tab[2]&&tab[2]=='X'&&tab[5]==' '){    //   |   | O
        return(5);                                    //   |   | ?
    }                                                 //   |   | O

    if (tab[2]==tab[5]&&tab[2]=='X'&&tab[8]==' '){    //   |   | O
        return(8);                                    //   |   | O
    }                                                 //   |   | ?

    if (tab[7]==tab[8]&&tab[8]=='X'&&tab[6]==' '){    //   |   |
        return(6);                                    //   |   |
    }                                                 // ? | O | O

    if (tab[6]==tab[8]&&tab[6]=='X'&&tab[7]==' '){    //   |   |
        return(7);                                    //   |   |
    }                                                 // O | ? | O

    if (tab[6]==tab[7]&&tab[7]=='X'&&tab[8]==' '){    //   |   |
        return(8);                                    //   |   |
    }                                                 // O | O | ?

    if (tab[4]==tab[6]&&tab[6]=='X'&&tab[2]==' '){    //   |   | ?
        return(2);                                    //   | O |
    }                                                 // O |   | 

    if (tab[6]==tab[2]&&tab[2]=='X'&&tab[4]==' '){    //   |   | O
        return(4);                                    //   | ? |
    }                                                 // O |   | 

    if (tab[2]==tab[4]&&tab[2]=='X'&&tab[6]==' '){    //   |   | O
        return(6);                                    //   | O |
    }                                                 // ? |   | 

    //-> Bloque l'utilisateur

    if (tab[0]==tab[1]&&tab[2]==' '&&tab[1]=='O'){    // O | O | ?
        return(2);                                    //   |   |
    }                                                 //   |   |

    if (tab[2]==tab[1]&&tab[0]==' '&&tab[2]=='O'){    // ? | O | O
        return(0);                                    //   |   |
    }                                                 //   |   |

    if (tab[0]==tab[2]&&tab[1]==' '&&tab[2]=='O'){    // O | ? | O
        return(1);                                    //   |   |
    }                                                 //   |   |

    if (tab[0]==tab[3]&&tab[6]==' '&&tab[0]=='O'){    // O |   | 
        return(6);                                    // O |   |
    }                                                 // ? |   |

    if (tab[3]==tab[6]&&tab[0]==' '&&tab[3]=='O'){    // ? |   |
        return(0);                                    // O |   |
    }                                                 // O |   |

    if (tab[0]==tab[6]&&tab[3]==' '&&tab[6]=='O'){    // O |   |
        return(3);                                    // ? |   |
    }                                                 // O |   |

    if (tab[4]==tab[8]&&tab[4]=='O'&&tab[0]==' '){    // ? |   |
        return(0);                                    //   | O |
    }                                                 //   |   | O

    if (tab[0]==tab[8]&&tab[0]=='O'&&tab[4]==' '){    // O |   |
        return(4);                                    //   | ? |
    }                                                 //   |   | O

    if (tab[0]==tab[4]&&tab[0]=='O'&&tab[8]==' '){    // O |   |
        return(8);                                    //   | O |
    }                                                 //   |   | ?

    if (tab[3]==tab[5]&&tab[3]=='O'&&tab[4]==' '){    //   |   |
        return(4);                                    // O | ? | O
    }                                                 //   |   | 

    if (tab[5]==tab[4]&&tab[5]=='O'&&tab[3]==' '){    //   |   |
        return(3);                                    // ? | O | O
    }                                                 //   |   | 

    if (tab[3]==tab[4]&&tab[3]=='O'&&tab[5]==' '){    //   |   |
        return(5);                                    // O | O | ?
    }                                                 //   |   | 

    if (tab[4]==tab[7]&&tab[4]=='O'&&tab[1]==' '){    //   | ? |
        return(1);                                    //   | O |
    }                                                 //   | O | 

    if (tab[1]==tab[7]&&tab[1]=='O'&&tab[4]==' '){    //   | O |
        return(4);                                    //   | ? |
    }                                                 //   | O | 

    if (tab[1]==tab[4]&&tab[1]=='O'&&tab[7]==' '){    //   | O |
        return(7);                                    //   | O |
    }                                                 //   | ? | 

    if (tab[8]==tab[5]&&tab[5]=='O'&&tab[2]==' '){    //   |   | ?
        return(2);                                    //   |   | O
    }                                                 //   |   | O

    if (tab[8]==tab[2]&&tab[2]=='O'&&tab[5]==' '){    //   |   | O
        return(5);                                    //   |   | ?
    }                                                 //   |   | O

    if (tab[2]==tab[5]&&tab[2]=='O'&&tab[8]==' '){    //   |   | O
        return(8);                                    //   |   | O
    }                                                 //   |   | ?

    if (tab[7]==tab[8]&&tab[7]=='O'&&tab[6]==' '){    //   |   |
        return(6);                                    //   |   |
    }                                                 // ? | O | O

    if (tab[6]==tab[8]&&tab[6]=='O'&&tab[7]==' '){    //   |   |
        return(7);                                    //   |   |
    }                                                 // O | ? | O

    if (tab[6]==tab[7]&&tab[6]=='O'&&tab[8]==' '){    //   |   |
        return(8);                                    //   |   |
    }                                                 // O | O | ?

    if (tab[4]==tab[6]&&tab[4]=='O'&&tab[2]==' '){    //   |   | ?
        return(2);                                    //   | O |
    }                                                 // O |   | 

    if (tab[6]==tab[2]&&tab[2]=='O'&&tab[4]==' '){    //   |   | O
        return(4);                                    //   | ? |
    }                                                 // O |   | 

    if (tab[2]==tab[4]&&tab[4]=='O'&&tab[6]==' '){    //   |   | O
        return(6);                                    //   | O |
    }                                                 // ? |   | 

    //-> Autres

    int random_number = rand() % 8 + 0;

    while (num[random_number]==random_number){
	    random_number = rand() % 8 + 0;
    }

    return(random_number);
}