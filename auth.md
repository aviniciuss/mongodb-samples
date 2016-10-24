## Conectar autenticando.

Por padrão, o banco de dados não oferece nenhuma autenticação, pois o foco
é facilidade no uso.

```
$ mongod --auth --port 27017

$ mongo --port 27017 -u "user_name" -p "pwd" --authenticationDatabase "db_name"
```

OU

Alterar o arquivo de configuração do MongoDB (nor-malmente em /etc/mongodb.conf ) e adicionar o parâmetro de autenti-
cação, que pode ser security.authorization ou auth , ambos com o
valor true .
