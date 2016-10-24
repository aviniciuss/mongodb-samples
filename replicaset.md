#### ReplicaSet `rs.status(), rs.printReplicationInfo(),rs.stepDown()`.

#### Criar as pastas das replicas.

```
$ mkdir /data/rs1
$ mkdir /data/rs2
$ mkdir /data/rs3
```

#### Levantar o mongod de cada replica.

```
 - Rodar eles em background basta passar o artibuto --fork

$ mongod --replSet replica_set --port 27017 --dbpath data/rs1
$ mongod --replSet replica_set --port 27018 --dbpath data/rs2
$ mongod --replSet replica_set --port 27019 --dbpath data/rs3
```

#### Configurando e adicionando replicasSet.

```
$ rsconf = {
   _id: "replica_set",
   members: [
    {
     _id: 0,
     host: "127.0.0.1:27017"
    }
  ]
}

$ rs.initiate(rsconf);

$ rs.add("127.0.0.1:27018")
$ rs.add("127.0.0.1:27019")
```

#### Colocando uma replicaSet PRIMARY como SECONDARY.

```
- O mongo seleciona outra replica para ficar como primary.
$ rs.stepDown();
```

#### Status da replicaSet.

```
$ rs.status();
$ rs.printReplicationInfo(); //dados oplog
```

#### Arbiter

**- Só utilizado quando possui numero par de replicasSet, ele desempata os votospara replica PRIMARY.**

```
$ mongod --replSet replica_set --port 40000 --dbpath data/arb;
$ rs.addArb();
```
