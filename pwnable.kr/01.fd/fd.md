> `echo "LETMEWIN" | ./fd 4660`

1.  `echo`  可写入文件流，即标准输入
2.  在 Linux 系统下，使用 `read()` 或 `open()` 函数成功打开文件后会返回针对该文件的文件描述符（整型）,若打开失败会返回 -1。
3.  `ssize_t read(int fd, void * buf, size_t count);`
    -   文件描述符 `fd`
        -   0: 标准输入
        -   1: 标准输出
        -   2: 标准错误输出
