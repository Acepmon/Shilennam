document.write('<scr','ipt id="yax_meta" type="text/x-yax-meta">','{"fdb_url": "https://kr3.af.beap.bc.yahoo.com/af?bv=1.0.0&bs=(14o58vvsa(gid$288d0b6a-ab89-11e4-bb4d-5fdb3c43ff61,st$1422956630715621,li$9971928,cr$31084452,dmn$,srv$2,exp$1422961430715621,ct$26,v$1.0,adv$1032575,pbid$24270))&al=(type${type},cmnt${cmnt},subo${subo})&r=14633", "fdb_on": "1", "fdb_exp": "1422961430715", "fdb_intl": "en", "error": "" }</scr', 'ipt>');
document.write('<scr', 'ipt type="text/javascript">', '(function(){ var w= window, sf = (w && w.$sf && w.$sf.ext), di = document.getElementById("yax_meta"); if (sf && typeof sf.msg == "function" && di){ sf.msg({cmd:"fdb", data: di}); }})(); </scr', 'ipt>');
function _send_rmx_noad()
{
    var e;
    try {
       if ("postMessage" in window) {
          top.postMessage("rmx:no-ad-mbbackfill", "*");
       }
    } catch (e) {
    }
}
setTimeout(_send_rmx_noad, 10);
