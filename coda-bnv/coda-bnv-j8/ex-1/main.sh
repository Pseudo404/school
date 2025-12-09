#!/bin/bash

echo "Saisisez un nombre entier : "
read nombre

while [ $nombre -ge 0 ];
do
  echo $nombre
  nombre=$((nombre - 1))
done
