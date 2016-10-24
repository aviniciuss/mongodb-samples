## Comandos básicos

- Um documento pode ter no máximo 16M.
- Aceita regex db.collection_name.find({"date": /2009/}).count().

#### Selecionando um banco de dados.
```
$ use db_name;
$ mongo db_name;
```

#### Listando os bancos de dados e collections.
```
$ show dbs;

$ use db_name;
$ show collections;
```

#### Deletando collections.
```
$ db.collection_name.drop();
```

#### Deletando um campo da collection com operador $unset.
```
- 0 ou 1 (true - false)
$ var mod = {$unset: {age: 1}};
$ var query = {"_id": ObjectId("566dc7fb87d6bec82679b09e")};
$ db.collection_name.update(query, mod);
```

#### Operador de incremento $inc.
```
-  Valor negativo decrementa o valor.
$ var mod = {$inc: {age: 1}};
$ var query = {"_id": ObjectId("566dc7fb87d6bec82679b09e")};
$ db.collection_name.update(query, mod);
```
#### Capped collection.

Ao consultar sempre vai aparecer os dois últimos inseridos, o mongo apaga
automáticamente os anteriores.

```
$ db.createCollection("collection_name",
  { capped: true, size: 4096, max: 2 });
```

#### Comando `stats()` retorna dados da collection.
```
$ db.collection_name.stats()
```

#### Usando o comando `explain`.
- count : total de registros da collection;
- nindexes : quantidade de índices criados;
- indexSizes : nome e tamanho dos índices, por padrão temos um
índice para o campo `_id`.

- "cursor" : "BasicCursor":  nenhum índice foi usado na busca.
- "nscanned" : 511010: quantidade de documentos que o MongoDB leu antes de retornar o resultado.

```
$ db.collection_name.find({"column_name" : /xxxxx/}).explain();
```

#### Índices
A ordem pode ser definida com 1 para crescente ou -1 para decrescente,
mas ela é importante apenas para índice composto; em campo com índice
simples não importa a ordem.

```
$ db.collection_name.ensureIndex( { "column_name" : 1} );
$ db.collection_name.ensureIndex( { "column_name" : 1, "column_name" : 1} );
```

Listando índices
```
$ db.collection_name.getIndexes();
```

Removendo um índice, O índice do campo `_id` não pode ser removido.
```
$ db.collection_name.dropIndex(<nome-do-indice>);
```

#### Índice textual.
Com ela, é possível fazer uma busca não apenas por um trecho de texto,mas também por aproximações do mesmo texto.

O parâmetro default_language é opcional; se omitido, o índice é
criado no idioma inglês.
```
$ db.collection_name.ensureIndex(
  {description: "text"},
  {default_language: "portuguese"}
);
```

Buscando através do índice
```
$ db.collection_name.find(
  {
     $text: { $search: "busca desejada" }
  }
);
```

#### Criar índice em background.
No momento em que o índice é criado, as operações de leitura e escrita são
bloqueadas até que o índice seja criado completamente.

Para evitar esse bloqueio, é possível criar o índice em background, con-
forme o exemplo de índice simples:

A criação de um índice em background demora um pouco mais do que o
padrão.

```
$ db.collection_name.ensureIndex(
  { "column_name": 1},
  {background: true}
);
```
