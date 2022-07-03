# les étapes à suivre
#1- Cloner le projet:

  a- git clone https://github.com/bzhanane/ecf-back
  
  b- cd ecf-back

#2- Configuration de l'environnement local 

    a-installer le projet composer install
    b-Je crée le fichier .env.local

    Les paramètres de la connexion à la base de donne sont stockées dans la variable DATABASE_URL qui existe dans la fichier .env.
    Exemple:
    DATABASE_URL=‘mysql://db_user:db_password@127.0.0.1:3306/db_name’
    db_user: root
    db_password: par défaut vide 
    db_name: nom de votre base par exemple 'crud_symfony'


DATABASE_URL='mysql://root:@127.0.0.1:3306/crud_symfony'


#3
- Exécution du projet

  symfony server:start
  
  
Vous pouvez initialiser la base de donnée par le fichier data-jobs-ecf 

le mot de passe pour le compte admin : hanane
le mot de passe pour le compte sociéte : company 

