Gatineau API
============

Conversion des données ouvertes de la ville de Gatineau en API JSON.

http://www.gatineau.ca/donneesouvertes/


Prérequis
---------

- PHP 5.3+
- Gestionnaire de dépendences [Composer](http://getcomposer.org)


Installation
------------

En ligne de commande, au même niveau que ce fichier README, executer:

    composer.phar update


Utilisation
-----------

En ligne de commande, executer:

    php GoOpendata.php

Ceci téléchargera les fichiers de données ouverte sur le site de la ville de Gatineau
pour ensuite les convertir en fichier json dans le repertoire `/v1`.

Il suffit de mettre ce répertoire sur un server web et d'accéder au données:

    GET /v1/fetes_festivals.json


Légal
-----

[Licence des données ouvertes de la ville de Gatineau](http://www.gatineau.ca/donneesouvertes/licence_fr.aspx)

Le code de *Gatineau API* est libre sous
[MIT license](https://raw.github.com/eleclerc/gatineauapi/master/LICENSE).

*Gatineau API* utilise des plusieurs autre librairies, tel que:

* [Composer](http://getcomposer.org), licensed under the [MIT License](https://github.com/composer/composer/blob/master/LICENSE),



Si vous utilisez ce code, svp aidez nous a l'améliorer en contribuant au
[projet GitHub](https://github.com/eleclerc/gatineauapi)!
