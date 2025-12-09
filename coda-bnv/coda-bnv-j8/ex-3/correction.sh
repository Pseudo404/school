#!/bin/bash

echo "Quel est le nom du projet (sans espaces) ?"

read projectName

mkdir $projectName

echo "Dossier du projet créé."

cd $projectName

touch main.c

echo -ne "#include <stdlib.h>\n#include <stdio.h>\n\nint main()\n{\n\nreturn 0;\n}" >> main.c

echo "Fichier main.c créé"

touch "$projectName.h"

echo -ne "#ifndef __PROJECT_H__\n#define __PROJECT_H__\n\n#endif" >> "$projectName.h"

echo "Fichier $projectName.h créé"

echo -ne "#Makefile\n\nNAME = nom_de_votre_executable\n\nSRCS = main.c \ \n    functions.c\n\nall: \$(NAME)\n\n\$(NAME): \$(SRCS)\n\n    gcc \$(SRCS) -o \$(NAME)\n\nfclean:\n    rm -f \$(NAME)\n\nre: fclean all\n" >> Makefile

cd ..

echo "Fini!"
