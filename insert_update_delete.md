## Insert e update
**Comandos de insert e update e operadores `$set, $unset, $inc, $upsert, $setOnInsert, $push, $pushAll, $pull e $pullAll`.**

#### Inserindo em uma collection
```
- A váriavel db aponta para o db selecionado com comando `use`.

- Inserindo apenas um registro.
$ var data = {'name': 'maria', 'age': 36};
$ db.collection_name.insert(data);

- Inserindo mais de um registro.
$ var datas = [{'name': 'carlos', 'age': 26}, {'name': 'joão', 'age': 45}];
$ db.collection_name.insert(datas);
```

#### Atualizando um registro da collection com save()
```
$ var query = {'name': 'maria'};
$ var result = db.collection_name.findOne(query);
$ result.name = 'maria alterado';
$ db.collection_name.save(result);
```

#### Atualizando um registro com a função update() e operador $set
```
$ var mod = {$set: {name: "maria alterado"}};
$ var query = {"_id": ObjectId("566dc7fb87d6bec82679b09e")};
$ db.collection_name.update(query, mod);
```

#### Inserindo tipo Array no documento com operador $push e $pushAll
```
$ var mod = {$push: {fone: '459955-6699'}};
$ var query = {"_id": ObjectId("566dc7fb87d6bec82679b09e")};
$ db.collection_name.update(query, mod);

$ var mod = {$pushAll: {fone: ['459955-6699', '459955-8877']}};
$ var query = {"_id": ObjectId("566dc7fb87d6bec82679b09e")};
$ db.collection_name.update(query, mod);
```

#### Retira campo de uma coluna do tipo Array $pull e $pullAll
```
- Irá remover do array esse fone.
$ var mod = {$pull: {fone: '459955-6699'}};
$ var query = {"_id": ObjectId("566dc7fb87d6bec82679b09e")};
$ db.collection_name.update(query, mod);

$ var mod = {$pullAll: {fone: ['459955-6699', '459955-8877']}};
$ var query = {"_id": ObjectId("566dc7fb87d6bec82679b09e")};
$ db.collection_name.update(query, mod);
```

#### Options upsert, $setOnInsert, multi
```
- upsert caso ao fazer o update ele não existir será criado.
- setOnInsert caso não exista ele usa esse objeto para criar um novo documento.
- multi atualiza todos os registros encontrados com a query (para update em mais de uma linha).

$ var query = {name: /felipe/i};
$ var mod = {$set: {age: 25}, $setOnInsert: {name: "felipe", age: null}};
$ var options = {upsert: true, multi: true};
$ db.collection_name.update(query, mod, options);
```

#### Deletando documentos
```
- Caso seja passado uma query vazia {}, ele apaga tudo!.
$ var query = {name: /maria/i};
$ db.collection_name.remove(query);
```
