var oB = new(function() {
    var a = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
    this.Version = "0.1.0.131023";
    this.encode = function(d) {
        var b = "";
        var l, j, g, k, h, f, e;
        var c = 0;
        d = _utf8_encode(d);
        while (c < d.length) {
            l = d.charCodeAt(c++);
            j = d.charCodeAt(c++);
            g = d.charCodeAt(c++);
            k = l >> 2;
            h = ((l & 3) << 4) | (j >> 4);
            f = ((j & 15) << 2) | (g >> 6);
            e = g & 63;
            if (isNaN(j)) {
                f = e = 64
            } else {
                if (isNaN(g)) {
                    e = 64
                }
            }
            b = b + a.charAt(k) + a.charAt(h) + a.charAt(f) + a.charAt(e)
        }

        return b
    };
    this.decode = function(d) {
        var b = "";
        var l, j, g;
        var k, h, f, e;
        var c = 0;
        d = d.replace(/[^A-Za-z0-9\\+\\/\\=]/g, "");
        while (c < d.length) {
            k = a.indexOf(d.charAt(c++));
            h = a.indexOf(d.charAt(c++));
            f = a.indexOf(d.charAt(c++));
            e = a.indexOf(d.charAt(c++));
            l = (k << 2) | (h >> 4);
            j = ((h & 15) << 4) | (f >> 2);
            g = ((f & 3) << 6) | e;
            b = b + String.fromCharCode(l);
            if (f != 64) {
                b = b + String.fromCharCode(j)
            }
            if (e != 64) {
                b = b + String.fromCharCode(g)
            }
        }
        b = _utf8_decode(b);
        return b
    };
    _utf8_encode = function(d) {
        d = d.replace(/\\r\\n/g, "\\n");
        var b = "";
        for (var f = 0; f < d.length; f++) {
            var e = d.charCodeAt(f);
            if (e < 128) {
                b += String.fromCharCode(e)
            } else {
                if ((e > 127) && (e < 2048)) {
                    b += String.fromCharCode((e >> 6) | 192);
                    b += String.fromCharCode((e & 63) | 128)
                } else {
                    b += String.fromCharCode((e >> 12) | 224);
                    b += String.fromCharCode(((e >> 6) & 63) | 128);
                    b += String.fromCharCode((e & 63) | 128)
                }
            }
        }
        return b
    };
    _utf8_decode = function(b) {
        var d = "";
        var e = 0;
        var f = c1 = c2 = 0;
        while (e < b.length) {
            f = b.charCodeAt(e);
            if (f < 128) {
                d += String.fromCharCode(f);
                e++
            } else {
                if ((f > 191) && (f < 224)) {
                    c2 = b.charCodeAt(e + 1);
                    d += String.fromCharCode(((f & 31) << 6) | (c2 & 63));
                    e += 2
                } else {
                    c2 = b.charCodeAt(e + 1);
                    c3 = b.charCodeAt(e + 2);
                    d += String.fromCharCode(((f & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
                    e += 3
                }
            }
        }
        return d
    }

});
var oldOB = oB.encode;
var oldOBDecode = oB.decode;
oB.encode = function(base64Str){
	return oldOB(base64Str).replace(/=/igm,'_3D').replace(/\//igm,'_02f','').replace(/\+/igm,'_2B');
};
oB.decode = function(base64Str){
	return oldOBDecode(base64Str.replace(/_3D/igm,'=').replace(/_02f/igm,'/').replace(/_2B/igm,'+'));
};

