# Pwn Environment

- Ubuntu server x86_64
    - zsh
        - sh -c "$(wget https://raw.githubusercontent.com/robbyrussell/oh-my-zsh/master/tools/install.sh -O -)"
    - build-essential module-assistant
    - gcc-multilib g++-multilib
    - python-dev libssl-dev libffi-dev python-pip
    - pwntools
    - termcolor
    - zio
    - ipython
    - socat
    <!--- lib32readline-gplv2-dev-->
    - gdb
    - peda
        ```
        git clone https://github.com/longld/peda.git ~/peda
        echo "source ~/peda/peda.py" >> ~/.gdbinit
        ```