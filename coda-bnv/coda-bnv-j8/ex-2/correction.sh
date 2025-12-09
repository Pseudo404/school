#!/bin/bash

echo "Indiquez un nombre de minutes :"
read input

hours=$((input / 60))
minutes=$((input % 60))

echo "$input minutes c'est l'équivalent de $hours heures et $minutes minutes"
