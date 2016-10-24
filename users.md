## Gerenciamento de usuários

```
- Create
{ createUser: "<name>",
  pwd: "<cleartext password>",
  customData: { <any information> },
  roles: [
    { role: "<role>", db: "<database>" } | "<role>",
    ...
  ],
  digestPassword: boolean, //opcional
  writeConcern: { <write concern> }
}

- Update
{ updateUser: "<username>",
  pwd: "<cleartext password>",
  customData: { <any information> },
  roles: [
    { role: "<role>", db: "<database>" } | "<role>",
    ...
  ],
  writeConcern: { <write concern> }
}
```

#### Para adicionar funções para um usuário necessita ter a ação `grantRole`.

#### Para alterar o campo `pwd` ou `customData` de outro usuário, precisa ter as ações `changeAnyPassword` e `changeAnyCustomData`.

#### Para alterar de seu próprio usuário deve ter as ações `changeOwnPassword` e `changeOwnCustomData`.
```
$ db.createUser(
  {
    user: "user_name",
    pwd: "password",
    roles: [{role: "userAdminAnyDatabase", db: "admin"}]
  }
);

- Pode usar runCommand no createUser.
$ db.runCommand(
  {
    updateUser: "user_name",
    customData: {teacher: false}
  }
);
```

#### Removendo um ou todos os usuários, tem que ter a ação `dropUser`.

```
$ db.runCommand(
  {
    dropUser: "user_name",
    writeConcern: { w: "majority", wtimeout: 5000 }
  }
);

$ db.runCommand(
  {
    dropAllUsersFromDatabase: 1,
    writeConcern: { w: "majority" }
  }
);
```

#### Quando você atualizar o array de papéis, você substituirá completamente os valores do array anterior. Para adicionar ou remover funções sem substituir todas as funções existentes do usuário, utilize os comandos grantRolesToUser (add role) ou revokeRolesFromUser (remove role).

```
- Necessita ter a ação grantRole.

$ db.runCommand( { grantRolesToUser: "user_name",
  roles: [
    { role: "read", db: "dbname"}, // role de outro banco se necessitar.
    "readWrite"
  ],
  writeConcern: { w: "majority" , wtimeout: 2000 }
 });

- Necessita a ação revokeRole

$ db.runCommand( { revokeRolesFromUser: "user_name",
 roles: [
         "readWrite"
 ],
 writeConcern: { w: "majority" }
});

```

#### Informação do usuário.

```
{ usersInfo: { user: <name>, db: <db> },
  showCredentials: <Boolean>,
  showPrivileges: <Boolean>
}

$ db.runCommand( { usersInfo: 1 } );
$ db.runCommand( { usersInfo: "user_name" } );
$ db.runCommand( { usersInfo: ["user_name","user_name","user_name"] } );
```
