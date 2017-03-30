#include <stdio.h>
#include <string.h>

int main(int argc, char* argv[]){
	printf("char*: %s\n", argv[1]);
	int* ip = (int*)argv[1];
	printf("ip: %p\n", ip);
    int i;
    for(i=0; i<5; i++) {
        printf("ip[i]: %i\n", ip[i]);
    }
    return 0;
}
