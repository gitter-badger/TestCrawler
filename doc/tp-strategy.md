#Stratégie de déploiement
##Dev
### Le projet
* Crawler du site [Notcambule](http://notcambule.fr)
* Calcul de décimales de π

### Intégration continue
Ecriture de [tests](https://github.com/Nek-/TestCrawler/tree/master/spec/AwesomeCrawler) 

Mise en place des services suivants :

* **Travis** ([![Build Status](https://travis-ci.org/Nek-/TestCrawler.svg?branch=master)](https://travis-ci.org/Nek-/TestCrawler)) pour l'exécution de notre suite de test
* **Scrutinizer** ([![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Nek-/TestCrawler/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Nek-/TestCrawler/?branch=master)) pour la code quality

L'idée sera de déployer le code après validation de nos deux outils et sera trigger quand la branche sera mergée dans `master`

##OPS

### Provisioning
* **[User data](https://github.com/Nek-/TestCrawler/blob/master/doc/script.sh)** qui prépare les instances 
* **Amazon S3** que l'on utilise notamment pour récuperer notre fichier de conf apache

### Déploiement du code
* Rocketeer ou Fabric (couplé à [fabric-aws](https://github.com/EverythingMe/fabric-aws)) ?

### Montée en charge
* Load balancer mis en place.
* Auto scaling mis en place.

http://balance-toi-881187321.us-east-1.elb.amazonaws.com

http://balance-toi-881187321.us-east-1.elb.amazonaws.com/pi.php
