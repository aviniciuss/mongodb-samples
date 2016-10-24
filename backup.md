## Backup

#### Backup frio.
O backup de tudo com banco fora do ar (conhecido como backup frio) é
efetuado com o comando mongodump , com essa sintaxe:

```
service mongod stop
mkdir /bkp/dados/
cd /bkp/dados/
mongodump --dbpath /var/lib/mongodb/
service mongod start
```

#### Backup quente.
O backup de tudo com banco no ar (conhecido como backup quente) tam-
bém é efetuado com o comando mongodump , com essa sintaxe:

```
service mongod start
mkdir /bkp/dados/
cd /bkp/dados/
mongodump
```

Ambos os backups pode ser passado o parametro --db que é o banco que deseja fazer backup,
e se desejar fazer o backup de uma collection passa o parametro --collection.

#### Restore.
Para restaurar os backups feitos com mongodump , utiliza o
mongorestore , que deve ser sempre executado com o banco de da-
dos fora do ar.
