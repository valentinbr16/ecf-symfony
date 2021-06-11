#!/bin/bash
#ce script réunit les trois commandes ci-dessous
# Suppression de toutes les tables
php bin/console doctrine:schema:drop --full-database --force --no-interaction

#Création du schéma de BDD
php bin/console doctrine:migrations:migrate --no-interaction

# Validation du schéma de BDD
php bin/console doctrine:schema:validate

# Injection des données de test dans la BDD
# à désactiver avant la phase des fixtures
php bin/console doctrine:fixtures:load
# --group=test --no-interaction

# à rentrer une fois dans le terminal pour rendre le script exécutable : (fait)
# chmod +x bin/dofilo.sh

# CE SCRIPT N'EST A UTILISÉ QU'EN PHASE DE DEV (SANS DONNÉES IMPORTANTES!)