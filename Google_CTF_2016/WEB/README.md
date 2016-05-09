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
    - 发现其中`/deep-blue-sea/team/vendors`可以访问

2.
