#!/bin/bash

FILENAME=$PWD/"${PWD##*/}.`git rev-parse --abbrev-ref HEAD`.`git rev-parse --verify HEAD --short`.`date +%Y-%m-%d.%H-%M-%S`.zip"

git archive --format zip --output $FILENAME `git rev-parse --abbrev-ref HEAD`

echo "Saved to $FILENAME"