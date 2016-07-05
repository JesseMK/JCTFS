var enco = '';
var enco2 = 126;
var enco3 = 33;
var ck = document.URL.substr(document.URL.indexOf('='));

for (i = 1; i < 122; i++) {
    enco = enco + String.fromCharCode(i, 0);
}

// enco = '\u0001\u0000\u0002\u0000\u0003\u0000\u0004\u0000\u0005\u0000\u0006\u0000\u0007\u0000\b\u0000\t\u0000\n\u0000\u000b\u0000\f\u0000\r\u0000\u000e\u0000\u000f\u0000\u0010\u0000\u0011\u0000\u0012\u0000\u0013\u0000\u0014\u0000\u0015\u0000\u0016\u0000\u0017\u0000\u0018\u0000\u0019\u0000\u001a\u0000\u001b\u0000\u001c\u0000\u001d\u0000\u001e\u0000\u001f\u0000 \u0000!\u0000"\u0000#\u0000$\u0000%\u0000&\u0000\'\u0000(\u0000)\u0000*\u0000+\u0000,\u0000-\u0000.\u0000/\u00000\u00001\u00002\u00003\u00004\u00005\u00006\u00007\u00008\u00009\u0000:\u0000;\u0000<\u0000=\u0000>\u0000?\u0000@\u0000A\u0000B\u0000C\u0000D\u0000E\u0000F\u0000G\u0000H\u0000I\u0000J\u0000K\u0000L\u0000M\u0000N\u0000O\u0000P\u0000Q\u0000R\u0000S\u0000T\u0000U\u0000V\u0000W\u0000X\u0000Y\u0000Z\u0000[\u0000\\\u0000]\u0000^\u0000_\u0000`\u0000a\u0000b\u0000c\u0000d\u0000e\u0000f\u0000g\u0000h\u0000i\u0000j\u0000k\u0000l\u0000m\u0000n\u0000o\u0000p\u0000q\u0000r\u0000s\u0000t\u0000u\u0000v\u0000w\u0000x\u0000y\u0000'

function enco_(x) {
    return enco.ch
    arCodeAt(x);
}

if (ck == "=" + String.fromCharCode(enco_(240)) + String.fromCharCode(enco_(220)) + String.fromCharCode(enco_(232)) + String.fromCharCode(enco_(192)) + String.fromCharCode(enco_(226)) + String.fromCharCode(enco_(200)) + String.from CharCode(enco_(204)) + String.fromCharCode(enco_(222 - 2)) + String.fromCharCode(enco_(198)) + "~~~~~~" + String.fromCharCode(enco 2) + String.fromCharCode(enco3)) {
    // if (ck = "=" + String.fromCharCode(enco_(240)) + String.fromCharCode(enco_(220)) + String.fromCharCode(enco_(232)) + String.fromCharCode(enco_(192)) + String.fromCharCode(enco_(226)) + String.fromCharCode(enco_(200)) + String.from CharCode(enco_(204)) + String.fromCharCode(enco_(220)) + String.fromCharCode(enco_(198)) + "~~~~~~" + String.fromCharCode(126) + String.fromCharCode(33)) {
    // =youaregod~~~~~~~!
    alert("Password is " + ck.replace("=", ""));
}
