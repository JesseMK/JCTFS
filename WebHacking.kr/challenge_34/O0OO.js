var l2 = window.opera ? 1 : 0;

function l3(l4) {
    l5 = /za/g;
    l6 = String.fromCharCode(0);
    l4 = l4.replace(l5, l6);
    var l7 = new Array(),
        l8 = _1 = l4.length,
        l9, lI, il = 16256,
        _1 = 0,
        I = 0,
        li = '';
    do {
        l9 = l4.charCodeAt(_1);
        lI = l4.charCodeAt(++_1);
        l7[I++] = lI + il - (l9 << 7)
    } while (_1++ < l8);
    var l1 = new Array(),
        l0 = new Array(),
        Il = 128;
    do {
        l0[Il] = String.fromCharCode(Il)
    } while (--Il);
    Il = 128;
    l1[0] = li = l0[l7[0]];
    ll = l7[0];
    _l = 1;
    var l_ = l7.length - 1;
    while (_l < l_) {
        switch (l7[_l] < Il ? 1 : 0) {
            case 0:
                l0[Il] = l0[ll] + String(l0[ll]).substr(0, 1);
                l1[_l] = l0[Il];
                if (l2) {
                    li += l0[Il]
                };
                break;
            default:
                l1[_l] = l0[l7[_l]];
                if (l2) {
                    li += l0[l7[_l]]
                };
                l0[Il] = l0[ll] + String(l0[l7[_l]]).substr(0, 1);
                break
        };
        Il++;
        ll = l7[_l];
        _l++
    };
    if (!l2) {
        return (l1.join(''))
    } else {
        return li
    }
};
var lO = '';
for (ii = 0; ii < O0O0.length; ii++) {
    lO += l3(O0O0[ii])
};
if (naa) {
    console.log(lO)
};
