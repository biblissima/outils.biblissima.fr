
# Site Outils Biblissima

Fichiers source du site web [outils.biblissima.fr](https://outils.biblissima.fr) (Boîte à Outils Biblissima), construit à l'aide du générateur de sites [Jekyll](https://jekyllrb.com).

Le site Boîte à Outils Biblissima est développé par [l'équipe Biblissima](https://projet.biblissima.fr/fr/organisation/equipe-biblissima). Il contient notamment les interfaces web de deux outils en ligne de lemmatisation de langues anciennes :

- [Collatinus-web](https://outils.biblissima.fr/fr/collatinus-web/), la version en ligne de [Collatinus](https://outils.biblissima.fr/fr/collatinus/), le logiciel de lemmatisation et d'analyse morphologique de textes latins développé par Yves Ouvrard et Philippe Verkerk.
- [Eulexis-web](https://outils.biblissima.fr/fr/eulexis-web/), un lemmatiseur de textes en grec ancien développé par Philippe Verkerk.


## Usages possibles

Après avoir récupéré le dépôt de code sur votre poste, vous pourrez :

- [Installer et générer le site complet](#installer-et-générer-le-site-complet) (plutôt destiné à l'équipe Biblissima)
- [Utiliser Collatinus-web seul en mode hors-ligne](#utiliser-collatinus-web-seul-en-mode-hors-ligne)
- [Utiliser Eulexis-web seul en mode hors-ligne](#utiliser-eulexis-web-seul-en-mode-hors-ligne)

Pour cloner ce dépôt :

```git clone https://github.com/biblissima/outils.biblissima.fr```

Un répertoire nommé `outils.biblissima.fr` est ainsi créé.


## Installer et générer le site complet

NB : cette section s'adresse en priorité aux développeurs du site.

### Installer Jekyll

Lire les instructions sur https://jekyllrb.com/docs/installation/.

### Générer le site en mode développement

Pour lancer un serveur de développement local et recharger le site à chaque changement dans les fichiers (_watch mode_), exécuter la commande suivante depuis le répertoire du dépôt :
```
jekyll serve watch
```
Pour consulter le site en local :
```
cd _site
php -S localhost:3000
```

### Générer le site pour la mise en production

Pour générer le site prêt à la mise en ligne :
```
cd outils.biblissima.fr
jekyll build --config=_config.yml,_config_prod.yml --trace --verbose
```
Le site est alors généré dans le répertoire `_site`.

### Générer Collatinus-web et Eulexis-web séparément

#### Pour Collatinus-web :
```
jekyll build --config=_config.yml,_config_prod.yml,_config_collatinus-web.yml --trace --verbose
```

Les fichiers nécessaires à l'application sont situés dans le répertoire `collatinus-web`.

#### Pour Eulexis-web :
```
jekyll build --config=_config.yml,_config_prod.yml,_config_eulexis-web.yml --trace --verbose
```

Les fichiers nécessaires à l'application sont situés dans le répertoire `eulexis-web`.


## Utiliser Collatinus-web seul en mode hors-ligne

Il est possible d'obtenir une version isolée de Collatinus-web, sans recourir à Jekyll, et prête à l'emploi pour une utilisation locale, sans connexion internet. Néanmoins, un certain nombre de dépendances sont requises et une connexion internet reste nécessaire lors de l'installation.

### Pré-requis

L'interface de Collatinus-web requiert :

- [PHP](https://www.php.net/manual/fr/install.php)
- [Qt 5](https://doc.qt.io/qt-5/gettingstarted.html#offline-installation)
- une instance du démon Collatinus-web qui tourne en local (à installer séparément, voir ci-dessous)
- les données linguistiques de Collatinus, placées au bon endroit : une partie des données est fournie avec le démon Collatinus-web, mais les dictionnaires sont à installer manuellement (voir instuctions ci-dessous)

### Installation

Une fois PHP et Qt installés, il faut suivre les étapes suivantes pour avoir une instance fonctionnelle :

1. Récupérer les sources du démon Collatinus (à placer dans un autre répertoire) :
```
git clone -b Daemon https://github.com/biblissima/collatinus.git
```

2. Compiler le démon
```
cd collatinus
qmake -config release
make
```

3. Télécharger l'archive contenant les dictionnaires et extraire les fichiers à la racine du répertoire `bin/data/dicos`
```
cd bin/data
wget <to-do> -O - | tar -xz
```

4. Lancer le démon Collatinus sur le port 5555
```
./bin/collatinusd
```

Une fois le démon lancé, lancer un serveur PHP de développement depuis la racine du répertoire `outils.biblissima.fr` :
```
php -S localhost:3000
```

Puis ouvrir la page de Collatinus-web : http://localhost:3000/collatinus-web/build



## Utiliser Eulexis-web seul en mode hors-ligne

Il est possible d'obtenir une version isolée d'Eulexis-web, sans recourir à Jekyll, et prête à l'emploi pour une utilisation locale, sans connexion internet. Néanmoins, un certain nombre de dépendances sont requises et une connexion internet reste nécessaire lors de l'installation.

### Pré-requis

L'interface d'Eulexis-web requiert :

- [PHP](https://www.php.net/manual/fr/install.php)
- les données linguistiques d'Eulexis, à placer dans le répertoire `eulexis-web/data`

### Installation

1. Télécharger l'archive contenant les données d'Eulexis et l'extraire dans `eulexis-web/data`
```
cd eulexis-web
wget https://outils.biblissima.fr/resources/eulexis/data.tar.gz -O - | tar -xz
```

2.  Lancer un serveur PHP de développement depuis la racine du répertoire `outils.biblissima.fr` :
```
php -S localhost:3000
```

Puis ouvrir la page d'Eulexis-web : http://localhost:3000/eulexis-web/build
