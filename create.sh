#!/bin/bash

#export a=${1:-0}
#export b=${2:-0}

createdb GCadmin
psql -f bases.sql GCadmin
psql -f registros.sql GCadmin