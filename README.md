## PHP MYSQL CRUD Library
This library is intended *to manage database operations in PHP easily.*


## Instructions
1. Installation
2. Usage


## 1. Installation
### Local install method
- Clone this git using ```git clone https://github.com/yhhCh405/php_db_lib.git```
- Move downloaded **php_db_lib** folder to your project's home directory (htdocs/*).
- At the top of your php file add ```include('php_db_lib/yhh-dbcrud.php');```
- Done! Now read usage.

### Remote install method
- At the top of your php file add ```include('https://raw.githubusercontent.com/yhhCh405/php_db_lib/master/yhh-dbcrud.php');```
- Done! Now read usage.

## 2. Usage
Firstly, declare ***DatabaseOperation*** class using
```$dbop = new DatabaseOperation;```

>***Note:***
> In this lib, use **\| (pipe)** to join between column names and values. See examples for more detail.


| No | Method | Syntax | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Description&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | Example | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Remark&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |
| --- | --- | --- | --- | --- | --- |
| 1 | `dbConnect()` | `dbConnect()` | This can call when you make changes in config.php. Usually you don't need this to call, since this method already invoked in constructor. | - | |
| 2 | `select()` | `select($tableName,$columnNames,$values,$count,$target)` | This method select single column and  return **single column value** or **false**. | `$dbop->select($users,'username\|email\|password','john\|123@mail4u.com.mm\|22221',3,'id');` | `$count` is refer to column counts of current query. Remember to check whether column name counts and value counts are the same.
| 3 | `selectId()` | `selectId($tableName,$columnNames,$values,$count)` | Select id from database and return **id** or **false** | `selectId($users,'username\|email,'john\|123@mail4u.com.mm',2)`
| 4 | `isDataExist()` | `isDataExist($tableName,$columnNames,$values,$count)` | Check if data exist in the database and return **true** or **false**.


### Goals and further improvement
- [ ] Create
- [x] Read
- [ ] Update
- [ ] Delete
- [x] Insert
- [ ] Alter
