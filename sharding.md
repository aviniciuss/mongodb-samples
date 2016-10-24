## Sharding

#### Sharding é o processo de armazenamento de dados em várias máquinas.

**Criando o Config Server**
```
- O correto é criar mais de um configsvr, caso um caia o Router não se perde.

$ mkdir \data\configdb
$ mongod --configsvr --port 27010
```

**Criando o Router**
```
$ mongos --configdb 127.0.0.1:27010 --port 27011
```

**Verificar conexões**
```
$ db._adminCommand("connPoolStats");
```

**Criando os sharding**
```
$ mkdir /data/shard1
$ mkdir /data/shard2
$ mkdir /data/shard3

$ mongod --port 27012 --dbpath data/shard1
$ mongod --port 27013 --dbpath data/shard2
$ mongod --port 27014 --dbpath data/shard3
```

**Resgistrando os Shards no Router**
```
- Conectar no Router

$ sh.addShard("127.0.0.1:27012");
$ sh.addShard("127.0.0.1:27013");
$ sh.addShard("127.0.0.1:27014");

$ sh.enableSharding("database_name");
$ sh.shardCollection("database_name.collection_name", {"_id" : 1});

- Como os dados estão distribuídos.

db.collection_name.getShardDistribution();
```
