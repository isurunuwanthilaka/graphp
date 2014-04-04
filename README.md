graphp
======

The GraPHP web framework.

The goal of this project is to build a lightweight web framework with a graph DB abstraction. It should be very easy to create the graph schema with no knowledge of of how the data is stored. Also, the schema should be incredibly flexible so you should never need migrations when adding new models (nodes), connections (edges), or data that lives in nodes.

A simple example:

In cli: (And later on a web GUI)

```bash
graphp newnode User(name) # name is indexed, allowing for User::getByName()
graphp newnode BankAccount
graphp newedge User->BankAccount
```

In code:

```php
$user = (new User(['name' => 'Jane Doe']))->save();
$bank_account = (new BankAccount(['accountNumber' => 12345, 'balance' => 125.05]))->save();
$user->addBankAccount($bank_account)->save();
```

and later:

```php
$user = User::getOneByName('Jane Doe');
$account = $user->loadBankAccount()->getBankAccount();
echo $account->getBalance(); // 125.05
```

Set up instructions
======

TODO (mikeland86) :P

FAQ
======
#### Why PHP?
Great question. Inertia, I guess. The good news is we are using php 5.4 which has some cool features like traits and short array syntax.
