## Administração do MongoDB

É uma boa prática ter um servidor (ou uma máquina virtual) dedicado a isso, se o
mongo precisar alocar uma collection interira na memória do servidor ele vai fazer isso.

O MongoDB pré-aloca seus arquivos de dados, conforme o banco de dados cresce,
ele vai alocando mais e mais espaço mesmo que ele não precise na quele momento.

É interessante executar o comando `repairDatabase` para reescrever todo o
banco de dados e otimizar o espaço utilizado.  

```
$ db.repairDatabase()
```

Para esse comando ser executado com sucesso, é necessário existir o espaço livre de pelo menos o tamanho do banco de dados
atual e mais 2 Gb. Porque o comando reescreve todo o banco de dados em novos arquivos, e depois efetua a troca dos antigos pelos novos.

Existe também o comando compact com a mesma finalidade que o
repairDatabase , mas é executado para cada collection e não para o banco
de dados inteiro. Entretanto, depois de executado, ele não libera espaço em
disco.

```
$ db.runCommand ( { compact: '<nome-da-collection>' } );
```

#### Mongostat.

O programa mongostat funciona de maneira semelhante ao vmstat
existente em alguns sistemas operacionais UNIX, que tem o objetivo de in-
formar de maneira geral as operações de consulta, atualização, alocação de
memória virtual, operações de rede e conexões existentes.

#### Mongotop

O programa mongotop funciona de maneira semelhante ao top exis-
tente em alguns sistemas operacionais UNIX, que tem o objetivo de informar
os processos mais pesados, que estão consumindo mais recurso do banco de
dados.

#### Exibir operações rodando
O comando db.currentOp exibe as operações em execução no mo-
mento:

```
$ db.currentOp();
```

Se necessário, é possível derrubar um processo desses com o comando.

```
$ db.killOp(123)
```
