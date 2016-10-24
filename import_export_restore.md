## Import and export

```

$ mongoimport --db be-mean --collection name_collection --host=127.0.0.1 --drop --file file.json

$ mongoexport --db be-mean --collection name_collection --host=127.0.0.1 --out file.json

$ db.name_collection.find({}).count()
```
## Restore

```
$ mongorestore --drop --dbpath path_name --db test path_dump_name
```
