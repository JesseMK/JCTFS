1. Google
2. nmap: SYN
3. 子域名搜索：subbrute, wydomain
4. 端口转发：
	1. Linux: SSh -l -r
	2. Lcx: socket层面
	3. 菜刀
	4. 利用web程序进行端口转发：reGeory@Github
5. 提权
	1. Linux: 提权漏洞网站
	2. Windows:
			1. ASP+ASP.NET:  http://wy811007.blog.163.com/blog/static/3746822120111251384689/
6. PHP@Windows：system权限
	0. username$
	1. 开启3189
	2. 导出NTLM hash:
		1. pwdump
		2. quarkdump
		3. reg save HKLM\SAM HKLM\SYSTEM + SAMInside
	3. 彩虹表:
		1. Ophcrack
		2. Hashced
		3. Hydra
		4. Medusa
	4. 内存提取
		1. wce: Windows Credentional Editionor(hash传递)
		2. procdump+mimikatz: lasass.exe+虚拟机
7. Linux:
	1. /etc/passwd
	2. /etc/shadow: $加密算法$salt$hash
	3. Hydra, hash cat, Jhon the ripper
