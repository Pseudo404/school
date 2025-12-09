#!/bin/bash

echo "Convertisseur (Minute to Heure)"
read reste

heure=$(($reste/60))
min=$(($reste%60))

echo "$heure h $min m"
