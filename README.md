Joe
===

développement php objet sur fichier texte de la discographie de Joe Satriani

1) Pré-requis
----------------------------------

### Configuration .htaccess

Afin de bénéficier de la sécurisation voulue des pages, veuillez renseigner précisément le champ

AuthUserFile

à la ligne 3 du fichier .htaccess

### Extension php intl

Cette extension doit être activée pour permettre l'affichage correct des dates.


2) Informations sur la base de donnée
----------------------------------

Le schéma de la base de donnée est le suivant :

### table album
* id : int(11)
* Title : varchar(255)
* Releasedate : date

### table artist
* id : int(11)
* Firstname : varchar(255)
* Lastname : varchar(255)
* Band : varchar(255)

### table music
* id : int(11)
* Title : varchar(255)
* Album_id : int(11)

### table album_music
* album_id : int(11)
* artist_id : int(11)

3) Informations complémentaires
----------------------------------
Cette application a été développé en respectant la structure MVC.
Elle utilise le développement orienté objet.
L'affichage des pages est effectuée à l'aide de Bootstrap
