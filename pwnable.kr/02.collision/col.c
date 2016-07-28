#include <stdio.h>
#include <string.h>
unsigned long hashcode = 0x21DD09EC;
// ./col `python -c "print '\xc8\xce\xc5\x06' * 4 + '\xcc\xce\xc5\x06'"`
// ./col $(python -c 'print "\xE8\x05\xD9\x1D" + 16*"\x01"')
unsigned long check_password(const char* p){
    int* ip = (int*)p;
    int i;
    int res=0;
    for(i=0; i<5; i++) {
        res += ip[i];
    }
    return res;
}

int main(int argc, char* argv[]){
    if(argc<2) {
        printf("usage : %s [passcode]\n", argv[0]);
        return 0;
    }
    if(strlen(argv[1]) != 20) {
        printf("passcode length should be 20 bytes\n");
        return 0;
    }

    if(hashcode == check_password( argv[1] )) {
        system("/bin/cat flag");
        return 0;
    }
    else
        printf("wrong passcode.\n");
    return 0;
}
