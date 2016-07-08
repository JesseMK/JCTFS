-   Problem

```regular
Wrong
$pat="/[1-3][a-f]{5}\_._202.120.36.179._\\tp\\ta\\ts\\ts/";
if(preg_match($pat,$\_GET[val])) { echo("Password is ????"); }
```

-   Solution

```url
code2.html?val=1aaaaa_asdfasdfasdf202d120d36d179%09p%09a%09s%09s
```
