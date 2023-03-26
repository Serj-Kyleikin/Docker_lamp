#!/bin/bash

if [[ "$1" != "" ]]; then
    if [[ "$2" != "" ]]; then
        sudo tail -"$2" src/logs/"$1".txt
    else
        sudo cat src/logs/"$1".txt
    fi
else
  sudo ls -1 src/logs
fi