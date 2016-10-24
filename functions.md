## Funções

#### Usando count()
```
- Pode ser passado uma query no count().
$ db.collection_name.count();
```

#### Usando distinct()
```
- Retorna um Array.
$ db.collection_name.distinct('column');
$ db.collection_name.distinct('column').length;
- Como ´e javascript posso usa sort().
$ db.collection_name.distinct('column').sort()
```

#### Usando limit() e skip()
```
- Usando para paginação de dados.
$ db.collection_name.find().limit(10).skip(5);
```

#### Usando group()
```
$ db.collection_name.group(
    {
      initial: {total: 0},
      cond: {},
      reduce: function (curr, result) {
          result.total += 1;
      },
      finalize: function (result) {}
    }
  );
```
