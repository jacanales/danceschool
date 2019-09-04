#!/bin/sh

cd "$(dirname "$0")/.." || exit

rm -rf .git/hooks

ln -fs ../etc/hooks .git/hooks
chmod -R 777 etc/hooks/*
