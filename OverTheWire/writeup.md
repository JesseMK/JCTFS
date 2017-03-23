# Writeup @ Over the wire

-   Level 0

    -   `ssh bandit0@bandit.labs.overthewire.org`
    -   flag: `boJ9jbbUNNfktd78OOpsqOltutMc3MY1`

```text
--[ Tips ]--

  This machine has a 64bit processor and many security-features enabled
  by default, although ASLR has been switched off.  The following
  compiler flags might be interesting:

    -m32                    compile for 32bit
    -fno-stack-protector    disable ProPolice
    -Wl,-z,norelro          disable relro

  In addition, the execstack tool can be used to flag the stack as
  executable on ELF binaries.

  Finally, network-access is limited for most levels by a local
  firewall.

--[ Tools ]--

 For your convenience we have installed a few usefull tools which you can find
 in the following locations:

    * peda (https://github.com/longld/peda.git) in /usr/local/peda/
    * gdbinit (https://github.com/gdbinit/Gdbinit) in /usr/local/gdbinit/
    * pwntools (https://github.com/Gallopsled/pwntools) in /usr/src/pwntools/
    * radare2 (http://www.radare.org/) should be in $PATH
```

-   Level 1

    -   `cat ./-`
    -   flag: `CV1DtqXWVFXTvM2F0k09SHz0YwRINYA9`

-   Level 2

    -   `cat spaces\ in\ this\ filename`
    -   flag: `UmHadQclWmgdLOKQ3YNgjWxGoRMb5luK`

-   Level 3

    -   `cd inhere&&ls -a&&cat .hidden`
    -   flag: `pIwrPrtPN36QITSp3EQaw936yaFoFgAB`

-   Level 4

    -   `./-file0*`
    -   flag: `koReBOKuIDDepwhWk7jZC0RTdopnAYKh`

-   Level 5
    -   `find ./* -size 1033c -readable ! -perm /111`
    -   
