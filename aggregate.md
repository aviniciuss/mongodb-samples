## Aggregate Framework (framework de agrupamento)

#### Exemplo `aggregate`
Para efetuarmos agrupamentos de agrupamentos, basta adicionar mais
uma chave group ao final.

```
$ db.collection_name.aggregate([
  { $match: {} } //condição de filtro,
  {
    $group: {
      _id: null, // Pode passas um campo para agrupar
      column_avg: {$avg: '$column'},
      column_sum: {$sum: '$column'},
      total: {$sum: 1}
    }
  }
 ]);
```
