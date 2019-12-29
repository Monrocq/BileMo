# BileMo
Un projet du parcours Développeur d'Application - PHP/Symfony d'OpenClassrooms,  
tous droits réservés [à l'école](https://github.com/oc-courses)
## Contexte
Vous êtes en charge du développement de la vitrine de téléphones mobiles de l’entreprise BileMo. Le business modèle de BileMo n’est pas de vendre directement ses produits sur le site web, mais de fournir à toutes les plateformes qui le souhaitent l’accès au catalogue via une API (Application Programming Interface). Il s’agit donc de vente exclusivement en B2B (business to business).

Le premier partenaire de BileMo est très exigeant : il requiert que vous exposiez vos données en suivant les règles des niveaux 1, 2 et 3 du modèle de Richardson. Il a demandé à ce que vous serviez les données en JSON. Si possible, le client souhaite que les réponses soient mises en cache afin d’optimiser les performances des requêtes en direction de l’API.
## Conception
Vous trouverez les diagrammes UML correspondant à ce projet sur [Le Drive du projet](https://drive.google.com/drive/folders/1lUrMGBlDX-3wGzXRJJZSNQxx-rcH-Z7D?usp=sharing).

Afin de garantir le bonne apprentissage de chaque étudiant, l'accès à ce dossier est restreint et non rendu public. Merci donc de m'envoyer votre adresse Gmail afin que je puisse vous fournir l'accès.
## Plannification
L'estimation correspondant à la réalisation des Issues est disponible sur [mon planning](https://calendar.google.com/calendar?cid=ZjhpOXA0bTV1YjBwam9tNmxja284NThiazhAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ).

Là aussi, les estimations indiqués ont été donnés par rapport à mes capacités et mes connaissances. Ces durées peuvent varier d'un individu à un autre autre.
## Etat actuel du projet
**Projet validé**
## Médail obtenue
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/8551a81cef1b446181c61a122c698bee)](https://www.codacy.com/manual/Monrocq/BileMo?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Monrocq/BileMo&amp;utm_campaign=Badge_Grade)
## Installation
1. Clone the repository in your local path
2. Go to your local path with the command prompt after to have [composer](https://getcomposer.org/download/)/[PHP](https://www.php.net/manual/fr/install.php)/[MySQL](https://openclassrooms.com/fr/courses/1959476-administrez-vos-bases-de-donnees-avec-mysql/1959969-installez-mysql)
  ```
  //Install dependances
  composer install
  //Create Database
  php bin/console doctrine:database:create
  //Install Architecture
  php bin/console doctrine:schema:create
  //Init fixtures to test the API if you want
  php bin/console doctrine:fixtures:load
  ```
3. You can navigate on the project with [XAMPP](https://www.apachefriends.org/fr/index.html)||[LAMP](https://doc.ubuntu-fr.org/lamp)||[MAMP](https://www.mamp.info/en/)||[WAMP](http://www.wampserver.com) thanks to [the documentation](https://docs.google.com/document/d/1LgxRb76wPP7HfCm4asfJpHhXJ713WnRwPS0EvJi1Ixs/edit?usp=sharing) - ENJOY !
