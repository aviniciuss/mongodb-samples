## Search
Operadores de Array `$in, $nin, $all` e negação `$ne e $not`.

#### Listando dados de uma collection
```
- Retorna um cursor de dados.
$ var cur = db.collection_name.find();

- Listando o cursor
while(cur.hasNext()){
  print(tojson(cur.next()))
};

- Retorna um objeto json atraves de um critério de busca.
$ var query = {'name': 'maria'};
$ var result = db.collection_name.findOne(query);
$ result;
```
#### Operadores lógicos
```
- Menor e menor igual: $lt e $lte
$ var query = {'age': {$lt: 18}};
$ var query = {'age': {$lte: 18}};
$ db.collection_name.find(query);

- Maior e maior igual: $gt e $gte
$ var query = {'age': {$gt: 18}};
$ var query = {'age': {$gte: 18}};
$ db.collection_name.find(query);

- Ou $or e a negação $nor
$ var query = {$or: [{'name': 'maria'},{'age': 36}]};
$ var query = {$nor: [{'name': 'maria'},{'age': 36}]};
$ db.collection_name.find(query);

- E $and
$ var query = {$and: [{'name': 'maria'},{'age': 36}]};
$ db.collection_name.find(query);

- Existe $exists (verifica se a coluna existe na collection)
$ var query = {age: {$exists: true}}
$ db.collection_name.find(query);
```

#### Operadores de Array $in, $nin (negação) e $all
```
- Posso passar mais de um valor funciona como or.
$ var query = {fone: {$in: ['45995588-5588']}};
$ db.collection_name.find(query);

- Posso passar mais de um valor funciona como and.
$ var query = {fone: {$all: ['45995588-5588']}};
$ db.collection_name.find(query);
```

#### Operadores de negação $ne e $not
```
- Todos que não tem 18 anos (Não aceita regex).
$ var query = {age: {$ne: 18}};
$ db.collection_name.find(query);

- Todos que não seja maria.
$ var query = {name: {$not: /maria/i}};
$ db.collection_name.find(query);
```

#### Ordenando

```
$ db.collection_name.find().sort({"column_name": 1}); // 1 ou -1 => asc ou desc
$ db.collection_name.find().sort({"_id":-1}).limit(1); // Pegando último registro
```
