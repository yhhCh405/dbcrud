## PHP MYSQL CRUD Library
This library is intended *to manage database operations in PHP easily.*


## Instructions
1. Installation
2. Usage


## 1. Installation
### Local install method
- Clone this git using ```git clone <url>```
- Move downloaded ***folder name*** folder to your project's home directory (htdocs/*).
- At the top of your php file add ```include('path/this.php');```
- Done! Now read usage.

### Remote install method
- At the top of your php file add ```include('url');```
- Done! Now read usage.

## 2. Usage
Firstly, declare ***DatabaseOperation*** class using
```$dbop = new DatabaseOperation;```

>***Note:***
> In this lib, use **\| (pipe)** to join between column names and values. See examples for more detail.


| No | Method | Syntax | Description | Example | Remark |
| --- | --- | --- | --- | --- | --- |
| 1 | Create |
| 2 | `select()` | `select($tableName,$names,$values,$target)` | This method select single column and  return single string value or return false. | `$dbop->select($users,'username\|email\|password','john\|123@mail4u.com.mm\|22221','id');` |
