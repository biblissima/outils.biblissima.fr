#!/bin/bash

# SSH_CC = variable d'environement contenant la commande ssh complète (dont l'adresse du proxy ssh, le port etc.)

EXCLUDE=~/rsync_exclude.txt
VM=$1

# dev
if [ "$VM" == "cc-web-dev" ]; then
	REMOTE="biblissima-web-dev"
	DEST="/var/www/html/outils-dev.biblissima.fr/root"
# prod
elif [ "$VM" == "cc-web" ] ; then	
	echo "NOTICE: le site a-t-il été généré avec 'jekyll build --config=_config.yml,_config_prod.yml' ?"
	read -p "Confirmer ? [Y/n]" -n 1 -r -s
	echo #
	if [[ $REPLY =~ ^[Yy]$ ]]
	then
		REMOTE="biblissima-web-PROD"
		DEST="/var/www/html/outils.biblissima.fr/root"
	fi
else
	echo "WARNING: l'alias du serveur doit être indiqué en argument ! (valeur : cc-web-dev ou cc-web)"
fi

if [ ! -z "$REMOTE" ] && [ ! -z "$SSH_CC" ]
then
	rsync -rlptzv --exclude-from="$EXCLUDE" -e "$SSH_CC $REMOTE" _site/ :"$DEST"
fi
