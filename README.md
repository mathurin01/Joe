Joe
===

d�veloppement php objet sur fichier texte de la discographie de Joe Satriani

1) Pr�-requis
----------------------------------

### Configuration .htaccess

Afin de b�n�ficier de la s�curisation voulue des pages, veuillez renseigner pr�cis�ment le champ

AuthUserFile

� la ligne 3 du fichier .htaccess

### Extension php intl

Cette extension doit �tre activ�e pour permettre l'affichage correct des dates.


2) Informations sur la base de donn�e
----------------------------------

Le sch�ma de la base de donn�e est le suivant :

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

3) Informations compl�mentaires
----------------------------------
Cette application a �t� d�velopp� en respectant la structure MVC.
Elle utilise le d�veloppement orient� objet.
L'affichage des pages est effectu�e � l'aide de Bootstrap
