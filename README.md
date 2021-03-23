# LPDIM_blog_symphony



###Questions du TP

####1 Quelles sont les fonctionnalités principales du Symfony CLI ?
    faciliter la vie des dev et la création et la générationd de code (en vrai c'est le bro)
c'est un wrapper, il permet de l'upload sur le cloud symfony 
créer un projet, gérer des versions (php ) lancer un sefveur http et gérer le 
####2 Quelles relations existent entre les entités (Many To One/Many To Many/...) ? Faire un schéma de la base de données.
![img.png](img.png)

Entre comment et post c'est un ManyToOne ( plusieurs commentaire par poste)
Entre comment et user c'est un ManyToOne ( plusieurs comment  par user)
Entre user et post c'est un ManyToOne ( plusieurs posts par user)

####3 Expliquer ce qu'est le fichier .env 
les clés de config de l'appli 
En gros c'est la ou tu stocke les variables globales du projets 
données genre mots de passe clé api , et autres trucs du genre

####4 Expliquer pourquoi il faut changer le connecteur à la base de données
il faut changer le connecteur car on veux utiliser sqlite et pas postgre qui est activé de base.

####5 Expliquer l'intérêt des migrations d'une base de données
l'intéret des migrations est de pouvoir travailler sur sa base de données en mode ""offline"" et de push ses modifs une fois fini

####6 Faire une recherche sur les différentes solutions disponibles pour l'administration dans Symfony
Il existe plsieurs bundle d'amin 
Sonata : complexe 
EasyAdmin : plus simple à utiliser 
apiplatform

####7 Travail préparatoire : Qu'est-ce que EasyAdmin ?
Easyadmin permet de créer facilement un module d'administration backend, il permet d'ajouter des dashboards , des cruds , et tout le reste dont on à besoin pour les architecture.

####8 Pourquoi doit-on implémenter des méthodes to string dans nos entités?
Pourquoi doit-on implémenter des méthodes to string dans nos entités?

####9 Pourquoi doit-on implémenter des méthodes to string dans nos entités?
pour que les paramêtres soient affichables de la bonne façon pour les utilisateurs 
par exemple dans les ddl des autres crudcontroller

####form ? 

    ce sont des formulaires 
####10 Qu'est-ce que le ParamConverter ? À quoi sert le Doctrine Param Converter ?

Le param converter permet de faire en sprte qu'un objet soit généré à partir des arguments d'une fonction grace à cette annotation
les paramêtre d"une requête en objet 
####11 Définir les termes suivants : Encoder, Provider, Firewall, Access Control, Role, Voter
que pour userinterface 
l'Encoder sert à crypter un mot de passe avant le push en bdd définir 
le provider sert à aller chercher des données dans une base, comme par exemple des users dans le cas d'un user provider
le firewall sert à ne laisser passer que les requêtes vers les parties que l'on veut exposer sécuriser des aprties de sites
l' Access control permet de limiter l'accès aux différentes pages en fonction de l'utilisateur 
les roles permettent de c'atribuer des accès aux users 
le voter sert à vérifier les autorisations plus précises

####12 Qu'est-ce que FOSUserBundle ? Pourquoi ne pas l'utiliser ?
On peut faire sans, 
c'est un framework de gestion d'utilisateur mais il n'est pas encore bien doccumenté pour symfony 4
####13 Définir les termes suivants : Argon2i, Bcrypt, Plaintext, BasicHTTP
Argon2i est une fonction de hash/cryptage

Bcrypt : idem

Plaintext : du texte en clair

BasicHTTP : fenêtre basic de l'http pour se log 

####14 Expliquer le principe de hachage.
le principe de hashage permet de pouvoir identifier une donnée sans avoir la donnée en clair , par exemple on peut se connecter sans transmettre le mdp en clair.
####15 Faire un schema expliquant quelle méthode est appelée dans quel ordre dans le LoginFormAuthenticator . Définir l'objectif de chaque méthodes du fichier.
1- supports qui vérifie si on est au bon endroit 
2-get credentials
3-getUser on va lle cherhcer dans la base 
4-check credentials , on vérifie si le password es bon 
5-et fonalement si on réussi on stocke sur quelle route on était avant et on redirige vers la route de notre choix 

 ####A quoi sert un service dans symfony 
    c'est uneclasse singleton stateless qui est utilitaire instancié qu'une seule fois 
    on en utilise souvent , les entity manager , les repo, les controller 
#### dependency injection 
ser

####validateur:
a valider des données avant de les envoyer dans le formulaire
####Serializer 
Normalizer encoder
den,ormalizer reserialiert 
