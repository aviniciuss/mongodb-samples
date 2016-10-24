## Busca geospacial

 - Estrutura do documento usando no estudo.

   ```
   {
     "_id" : ObjectId("544edc2d5e0a44b1d3daa0d0"),
     "city" : "ORLANDO",
     "state" : "FL",
     "loc" : {
       "x" : 81.408162,
       "y" : 28.487102
     }
   }
   ```

 - Até aqui é um banco normal com essa estrutura de documento. O que faz funcionar a busca geospacial é a criação de um index especial.

   ```
   $ db.db_name.ensureIndex( { loc : "2d" } );
   ```
   Com esse índice, conseguimos buscar as cidades próximas em radianos com o comando near utilizando a sintaxe:

   ```
   - Exemplo das cidades a 0.1 radianos de Miami:
   - $maxDistance quanto maior o raio mais cidades encontradas.

   $ db.db_name.find(
     { 'loc': { $near : [ 80.441031,25.661502], $maxDistance: .1 } },
     { _id:0, "city":1,"state":1 }
   )
   ```
