!function(e){var t,r,n,i=navigator.userAgent;function s(){for(var e=document.querySelectorAll("picture > img, img[srcset][sizes]"),t=0;t<e.length;t++)!function(e){var t,n,i=e.parentNode;"PICTURE"===i.nodeName.toUpperCase()?(t=r.cloneNode(),i.insertBefore(t,i.firstElementChild),setTimeout(function(){i.removeChild(t)})):(!e._pfLastSize||e.offsetWidth>e._pfLastSize)&&(e._pfLastSize=e.offsetWidth,n=e.sizes,e.sizes+=",100vw",setTimeout(function(){e.sizes=n}))}(e[t])}function o(){clearTimeout(t),t=setTimeout(s,99)}function a(){o(),n&&n.addListener&&n.addListener(o)}e.HTMLPictureElement&&/ecko/.test(i)&&i.match(/rv\:(\d+)/)&&RegExp.$1<45&&addEventListener("resize",(r=document.createElement("source"),n=e.matchMedia&&matchMedia("(orientation: landscape)"),r.srcset="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==",/^[c|i]|d$/.test(document.readyState||"")?a():document.addEventListener("DOMContentLoaded",a),o))}(window),function(e,s,l){"use strict";function m(e){return" "===e||"\t"===e||"\n"===e||"\f"===e||"\r"===e}function b(e,t){return e.res-t.res}function A(e,t){var n,i,r;if(e&&t)for(r=M.parseSet(t),e=M.makeUrl(e),n=0;n<r.length;n++)if(e===M.makeUrl(r[n].url)){i=r[n];break}return i}function t(t,d){function e(e){var e=e.exec(t.substring(a));return e?(e=e[0],a+=e.length,e):void 0}function n(){for(var e,t,n,i,r,s,o,a=!1,c={},l=0;l<p.length;l++)i=(o=p[l])[o.length-1],r=o.substring(0,o.length-1),s=parseInt(r,10),o=parseFloat(r),oe.test(r)&&"w"===i?((e||t)&&(a=!0),0===s?a=!0:e=s):ae.test(r)&&"x"===i?((e||t||n)&&(a=!0),o<0?a=!0:t=o):oe.test(r)&&"h"===i?((n||t)&&(a=!0),0===s?a=!0:n=s):a=!0;a||(c.url=u,e&&(c.w=e),t&&(c.d=t),n&&(c.h=n),n||t||e||(c.d=1),1===c.d&&(d.has1x=!0),c.set=d,h.push(c))}for(var u,p,i,r,s,o=t.length,a=0,h=[];;){if(e(ie),o<=a)return h;u=e(re),p=[],","===u.slice(-1)?(u=u.replace(se,""),n()):function(){for(e(ne),i="",r="in descriptor";;){if(s=t.charAt(a),"in descriptor"===r)if(m(s))i&&(p.push(i),i="",r="after descriptor");else{if(","===s)return a+=1,i&&p.push(i),n();if("("===s)i+=s,r="in parens";else{if(""===s)return i&&p.push(i),n();i+=s}}else if("in parens"===r)if(")"===s)i+=s,r="in descriptor";else{if(""===s)return p.push(i),n();i+=s}else if("after descriptor"===r&&!m(s)){if(""===s)return n();r="in descriptor",--a}a+=1}}()}}function n(e){for(var t,n,i,r=/^(?:[+-]?[0-9]+|[0-9]*\.[0-9]+)(?:[eE][+-]?[0-9]+)?(?:ch|cm|em|ex|in|mm|pc|pt|px|rem|vh|vmin|vmax|vw)$/i,s=/^calc\((?:[0-9a-z \.\+\-\*\/\(\)]+)\)$/i,o=function(e){function t(){r&&(s.push(r),r="")}function n(){s[0]&&(o.push(s),s=[])}for(var i,r="",s=[],o=[],a=0,c=0,l=!1;;){if(""===(i=e.charAt(c)))return t(),n(),o;if(l)"*"!==i||"/"!==e[c+1]?c+=1:(l=!1,c+=2,t());else{if(m(i)){if(e.charAt(c-1)&&m(e.charAt(c-1))||!r){c+=1;continue}if(0===a){t(),c+=1;continue}i=" "}else if("("===i)a+=1;else if(")"===i)--a;else{if(","===i){t(),n(),c+=1;continue}if("/"===i&&"*"===e.charAt(c+1)){l=!0,c+=2;continue}}r+=i,c+=1}}}(e),a=o.length,c=0;c<a;c++)if(n=(t=o[c])[t.length-1],i=n,r.test(i)&&0<=parseFloat(i)||(s.test(i)||("0"===i||"-0"===i||"+0"===i))){if(n=n,t.pop(),0===t.length)return n;if(t=t.join(" "),M.matchesMedia(t))return n}return"100vw"}s.createElement("picture");function i(){}function r(e,t,n,i){e.addEventListener?e.addEventListener(t,n,i||!1):e.attachEvent&&e.attachEvent("on"+t,n)}function E(e,t){return e.w?(e.cWidth=M.calcListLength(t||"100vw"),e.res=e.w/e.cWidth):e.res=e.d,e}var o,d,a,c,u,p,h,f,g,v,y,w,k,S,L,C,x,T,N,W,M={},q=!1,D=s.createElement("img"),z=D.getAttribute,R=D.setAttribute,H=D.removeAttribute,I=s.documentElement,B={},F={algorithm:""},P="data-pfsrc",O=P+"set",j=navigator.userAgent,Q=/rident/.test(j)||/ecko/.test(j)&&j.match(/rv\:(\d+)/)&&35<RegExp.$1,U="currentSrc",$=/\s+\+?\d+(e\d+)?w/,_=/(\([^)]+\))?\s*(.+)/,G=e.picturefillCFG,K="font-size:100%!important;",Y=!0,V={},X={},J=e.devicePixelRatio,Z={px:1,in:96},ee=s.createElement("a"),te=!1,ne=/^[ \t\n\r\u000c]+/,ie=/^[, \t\n\r\u000c]+/,re=/^[^ \t\n\r\u000c]+/,se=/[,]+$/,oe=/^\d+$/,ae=/^-?(?:[0-9]+|[0-9]*\.[0-9]+)(?:[eE][+-]?[0-9]+)?$/,j=function(t){var n={};return function(e){return e in n||(n[e]=t(e)),n[e]}},ce=(c=/^([\d\.]+)(em|vw|px)$/,u=j(function(e){return"return "+function(){for(var e=arguments,t=0,n=e[0];++t in e;)n=n.replace(e[t],e[++t]);return n}((e||"").toLowerCase(),/\band\b/g,"&&",/,/g,"||",/min-([a-z-\s]+):/g,"e.$1>=",/max-([a-z-\s]+):/g,"e.$1<=",/calc([^)]+)/g,"($1)",/(\d+[\.]*[\d]*)([a-z]+)/g,"($1 * e.$2)",/^(?!(e.[a-z]|[0-9\.&=|><\+\-\*\(\)\/])).*/gi,"")+";"}),function(e,t){var n;if(!(e in V))if(V[e]=!1,t&&(n=e.match(c)))V[e]=n[1]*Z[n[2]];else try{V[e]=new Function("e",u(e))(Z)}catch(e){}return V[e]}),le=function(e){if(q){var t,n,i,r=e||{};if(r.elements&&1===r.elements.nodeType&&("IMG"===r.elements.nodeName.toUpperCase()?r.elements=[r.elements]:(r.context=r.elements,r.elements=null)),i=(t=r.elements||M.qsa(r.context||s,r.reevaluate||r.reselect?M.sel:M.selShort)).length){for(M.setupRun(r),te=!0,n=0;n<i;n++)M.fillImg(t[n],r);M.teardownRun(r)}}};function de(){2===C.width&&(M.supSizes=!0),d=M.supSrcset&&!M.supSizes,q=!0,setTimeout(le)}e.console&&console.warn,U in D||(U="src"),B["image/jpeg"]=!0,B["image/gif"]=!0,B["image/png"]=!0,B["image/svg+xml"]=s.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#Image","1.1"),M.ns=("pf"+(new Date).getTime()).substr(0,9),M.supSrcset="srcset"in D,M.supSizes="sizes"in D,M.supPicture=!!e.HTMLPictureElement,M.supSrcset&&M.supPicture&&!M.supSizes&&(x=s.createElement("img"),D.srcset="data:,a",x.src="data:,a",M.supSrcset=D.complete===x.complete,M.supPicture=M.supSrcset&&M.supPicture),M.supSrcset&&!M.supSizes?(x="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==",(C=s.createElement("img")).onload=de,C.onerror=de,C.setAttribute("sizes","9px"),C.srcset=x+" 1w,data:image/gif;base64,R0lGODlhAgABAPAAAP///wAAACH5BAAAAAAALAAAAAACAAEAAAICBAoAOw== 9w",C.src=x):q=!0,M.selShort="picture>img,img[srcset]",M.sel=M.selShort,M.cfg=F,M.DPR=J||1,M.u=Z,M.types=B,M.setSize=i,M.makeUrl=j(function(e){return ee.href=e,ee.href}),M.qsa=function(e,t){return"querySelector"in e?e.querySelectorAll(t):[]},M.matchesMedia=function(){return e.matchMedia&&(matchMedia("(min-width: 0.1em)")||{}).matches?M.matchesMedia=function(e){return!e||matchMedia(e).matches}:M.matchesMedia=M.mMQ,M.matchesMedia.apply(this,arguments)},M.mMQ=function(e){return!e||ce(e)},M.calcLength=function(e){e=ce(e,!0)||!1;return e=e<0?!1:e},M.supportsType=function(e){return!e||B[e]},M.parseSize=j(function(e){e=(e||"").match(_);return{media:e&&e[1],length:e&&e[2]}}),M.parseSet=function(e){return e.cands||(e.cands=t(e.srcset,e)),e.cands},M.getEmValue=function(){var e,t,n,i;return!o&&(e=s.body)&&(t=s.createElement("div"),n=I.style.cssText,i=e.style.cssText,t.style.cssText="position:absolute;left:0;visibility:hidden;display:block;padding:0;border:none;font-size:1em;width:1em;overflow:hidden;clip:rect(0px, 0px, 0px, 0px)",I.style.cssText=K,e.style.cssText=K,e.appendChild(t),o=t.offsetWidth,e.removeChild(t),o=parseFloat(o,10),I.style.cssText=n,e.style.cssText=i),o||16},M.calcListLength=function(e){var t;return e in X&&!F.uT||(t=M.calcLength(n(e)),X[e]=t||Z.width),X[e]},M.setRes=function(e){if(e)for(var t,n=0,i=(t=M.parseSet(e)).length;n<i;n++)E(t[n],e.sizes);return t},M.setRes.res=E,M.applySetCandidate=function(e,t){if(e.length){var n,i,r,s,o,a,c=t[M.ns],l=M.DPR,d=c.curSrc||t[U],u=c.curCan||(y=t,w=d,u=e[0].set,(u=A(w,u=!u&&w?(u=y[M.ns].sets)&&u[u.length-1]:u))&&(w=M.makeUrl(w),y[M.ns].curSrc=w,(y[M.ns].curCan=u).res||E(u,u.set.sizes)),u);if(u&&u.set===e[0].set&&((a=Q&&!t.complete&&u.res-.1>l)||(u.cached=!0,u.res>=l&&(o=u))),!o)for(e.sort(b),o=e[(s=e.length)-1],i=0;i<s;i++)if((n=e[i]).res>=l){o=e[r=i-1]&&(a||d!==M.makeUrl(n.url))&&(p=e[r].res,h=n.res,m=l,f=e[r].cached,v=g=void 0,p="saveData"===F.algorithm?2.7<p?m+1:(v=(h-m)*(g=Math.pow(p-.6,1.5)),f&&(v+=.1*g),p+v):1<m?Math.sqrt(p*h):p,m<p)?e[r]:n;break}o&&(u=M.makeUrl(o.url),c.curSrc=u,c.curCan=o,u!==d&&M.setSrc(t,o),M.setSize(t))}var p,h,m,f,g,v,y,w},M.setSrc=function(e,t){e.src=t.url,"image/svg+xml"===t.set.type&&(t=e.style.width,e.style.width=e.offsetWidth+1+"px",e.offsetWidth+1&&(e.style.width=t))},M.getSet=function(e){for(var t,n,i=!1,r=e[M.ns].sets,s=0;s<r.length&&!i;s++)if((t=r[s]).srcset&&M.matchesMedia(t.media)&&(n=M.supportsType(t.type))){i=t="pending"===n?n:t;break}return i},M.parseSets=function(e,t,n){var i,r,s,o,a=t&&"PICTURE"===t.nodeName.toUpperCase(),c=e[M.ns];c.src!==l&&!n.src||(c.src=z.call(e,"src"),c.src?R.call(e,P,c.src):H.call(e,P)),c.srcset!==l&&!n.srcset&&M.supSrcset&&!e.srcset||(i=z.call(e,"srcset"),c.srcset=i,o=!0),c.sets=[],a&&(c.pic=!0,function(e,t){for(var n,i,r=e.getElementsByTagName("source"),s=0,o=r.length;s<o;s++)(n=r[s])[M.ns]=!0,(i=n.getAttribute("srcset"))&&t.push({srcset:i,media:n.getAttribute("media"),type:n.getAttribute("type"),sizes:n.getAttribute("sizes")})}(t,c.sets)),c.srcset?(r={srcset:c.srcset,sizes:z.call(e,"sizes")},c.sets.push(r),(s=(d||c.src)&&$.test(c.srcset||""))||!c.src||A(c.src,r)||r.has1x||(r.srcset+=", "+c.src,r.cands.push({url:c.src,d:1,set:r}))):c.src&&c.sets.push({srcset:c.src,sizes:null}),c.curCan=null,c.curSrc=l,c.supported=!(a||r&&!M.supSrcset||s&&!M.supSizes),o&&M.supSrcset&&!c.supported&&(i?(R.call(e,O,i),e.srcset=""):H.call(e,O)),c.supported&&!c.srcset&&(!c.src&&e.src||e.src!==M.makeUrl(c.src))&&(null===c.src?e.removeAttribute("src"):e.src=c.src),c.parsed=!0},M.fillImg=function(e,t){var n,i=t.reselect||t.reevaluate;e[M.ns]||(e[M.ns]={}),n=e[M.ns],!i&&n.evaled===a||(n.parsed&&!t.reevaluate||M.parseSets(e,e.parentNode,t),n.supported?n.evaled=a:(t=e,n=M.getSet(t),e=!1,"pending"!==n&&(e=a,n&&(n=M.setRes(n),M.applySetCandidate(n,t))),t[M.ns].evaled=e))},M.setupRun=function(){te&&!Y&&J===e.devicePixelRatio||(Y=!1,J=e.devicePixelRatio,V={},X={},M.DPR=J||1,Z.width=Math.max(e.innerWidth||0,I.clientWidth),Z.height=Math.max(e.innerHeight||0,I.clientHeight),Z.vw=Z.width/100,Z.vh=Z.height/100,a=[Z.height,Z.width,J].join("-"),Z.em=M.getEmValue(),Z.rem=Z.em)},M.supPicture?M.fillImg=le=i:(w=e.attachEvent?/d$|^c/:/d$|^c|^i/,k=function(){var e=s.readyState||"";S=setTimeout(k,"loading"===e?200:999),s.body&&(M.fillImgs(),(p=p||w.test(e))&&clearTimeout(S))},S=setTimeout(k,s.body?9:99),L=I.clientHeight,r(e,"resize",(h=function(){Y=Math.max(e.innerWidth||0,I.clientWidth)!==Z.width||I.clientHeight!==L,L=I.clientHeight,Y&&M.fillImgs()},f=99,y=function(){var e=new Date-v;e<f?g=setTimeout(y,f-e):(g=null,h())},function(){v=new Date,g=g||setTimeout(y,f)})),r(s,"readystatechange",k)),M.picturefill=le,M.fillImgs=le,M.teardownRun=i,le._=M,e.picturefillCFG={pf:M,push:function(e){var t=e.shift();"function"==typeof M[t]?M[t].apply(M,e):(F[t]=e[0],te&&M.fillImgs({reselect:!0}))}};for(;G&&G.length;)e.picturefillCFG.push(G.shift());e.picturefill=le,"object"==typeof module&&"object"==typeof module.exports?module.exports=le:"function"==typeof define&&define.amd&&define("picturefill",function(){return le}),M.supPicture||(B["image/webp"]=(T="image/webp",N="data:image/webp;base64,UklGRkoAAABXRUJQVlA4WAoAAAAQAAAAAAAAAAAAQUxQSAwAAAABBxAR/Q9ERP8DAABWUDggGAAAADABAJ0BKgEAAQADADQlpAADcAD++/1QAA==",(W=new e.Image).onerror=function(){B[T]=!1,le()},W.onload=function(){B[T]=1===W.width,le()},W.src=N,"pending"))}(window,document),function(e,t){function n(){w=S=b=A=E=k=L}function l(e){return parseFloat(e)||0}function i(){C={top:t.pageYOffset,left:t.pageXOffset}}function r(){return t.pageXOffset!=C.left?(i(),void b()):void(t.pageYOffset!=C.top&&(i(),o()))}function s(e){setTimeout(function(){t.pageYOffset!=C.top&&(C.top=t.pageYOffset,o())},0)}function o(){for(var e=T.length-1;0<=e;e--)a(T[e])}function a(e){var t;e.inited&&(t=C.top<=e.limit.start?0:C.top>=e.limit.end?2:1,e.mode!=t&&function(e,t){var n=e.node.style;switch(t){case 0:n.position="absolute",n.left=e.offset.left+"px",n.right=e.offset.right+"px",n.top=e.offset.top+"px",n.bottom="auto",n.width="auto",n.marginLeft=0,n.marginRight=0,n.marginTop=0;break;case 1:n.position="fixed",n.left=e.box.left+"px",n.right=e.box.right+"px",n.top=e.css.top,n.bottom="auto",n.width="auto",n.marginLeft=0,n.marginRight=0,n.marginTop=0;break;case 2:n.position="absolute",n.left=e.offset.left+"px",n.right=e.offset.right+"px",n.top="auto",n.bottom=0,n.width="auto",n.marginLeft=0,n.marginRight=0}e.mode=t}(e,t))}function c(e){isNaN(parseFloat(e.computed.top))||e.isCell||"none"==e.computed.display||(e.inited=!0,e.clone||function(e){e.clone=document.createElement("div");var t=e.node.nextSibling||e.node,n=e.clone.style;n.height=e.height+"px",n.width=e.width+"px",n.marginTop=e.computed.marginTop,n.marginBottom=e.computed.marginBottom,n.marginLeft=e.computed.marginLeft,n.marginRight=e.computed.marginRight,n.padding=n.border=n.borderSpacing=0,n.fontSize="1em",n.position="static",n.cssFloat=e.computed.cssFloat,e.node.parentNode.insertBefore(e.clone,t)}(e),"absolute"!=e.parent.computed.position&&"relative"!=e.parent.computed.position&&(e.parent.node.style.position="relative"),a(e),e.parent.height=e.parent.node.offsetHeight,e.docOffsetTop=m(e.clone))}function d(e){var t,n=!0;e.clone&&((t=e).clone.parentNode.removeChild(t.clone),t.clone=void 0),function(e,t){for(var n in t)t.hasOwnProperty(n)&&(e[n]=t[n])}(e.node.style,e.css);for(var i=T.length-1;0<=i;i--)if(T[i].node!==e.node&&T[i].parent.node===e.parent.node){n=!1;break}n&&(e.parent.node.style.position=e.parent.css.position),e.mode=-1}function u(){for(var e=T.length-1;0<=e;e--)c(T[e])}function p(){for(var e=T.length-1;0<=e;e--)d(T[e])}function h(e){var t=getComputedStyle(e),n=e.parentNode,i=getComputedStyle(n),r=e.style.position;e.style.position="relative";var s={top:t.top,marginTop:t.marginTop,marginBottom:t.marginBottom,marginLeft:t.marginLeft,marginRight:t.marginRight,cssFloat:t.cssFloat,display:t.display},o={top:l(t.top),marginBottom:l(t.marginBottom),paddingLeft:l(t.paddingLeft),paddingRight:l(t.paddingRight),borderLeftWidth:l(t.borderLeftWidth),borderRightWidth:l(t.borderRightWidth)};e.style.position=r;var a={position:e.style.position,top:e.style.top,bottom:e.style.bottom,left:e.style.left,right:e.style.right,width:e.style.width,marginTop:e.style.marginTop,marginLeft:e.style.marginLeft,marginRight:e.style.marginRight},c=f(e),r=f(n),i={node:n,css:{position:n.style.position},computed:{position:i.position},numeric:{borderLeftWidth:l(i.borderLeftWidth),borderRightWidth:l(i.borderRightWidth),borderTopWidth:l(i.borderTopWidth),borderBottomWidth:l(i.borderBottomWidth)}};return{node:e,box:{left:c.win.left,right:W.clientWidth-c.win.right},offset:{top:c.win.top-r.win.top-i.numeric.borderTopWidth,left:c.win.left-r.win.left-i.numeric.borderLeftWidth,right:-c.win.right+r.win.right-i.numeric.borderRightWidth},css:a,isCell:"table-cell"==t.display,computed:s,numeric:o,width:c.win.right-c.win.left,height:c.win.bottom-c.win.top,mode:-1,inited:!1,parent:i,limit:{start:c.doc.top-o.top,end:r.doc.top+n.offsetHeight-i.numeric.borderBottomWidth-e.offsetHeight-o.top-o.marginBottom}}}function m(e){for(var t=0;e;)t+=e.offsetTop,e=e.offsetParent;return t}function f(e){e=e.getBoundingClientRect();return{doc:{top:e.top+t.pageYOffset,left:e.left+t.pageXOffset},win:e}}function g(){x=setInterval(function(){!function(){for(var e=T.length-1;0<=e;e--)if(T[e].inited){var t=Math.abs(m(T[e].clone)-T[e].docOffsetTop),n=Math.abs(T[e].parent.node.offsetHeight-T[e].parent.height);if(2<=t||2<=n)return}return 1}()&&b()},500)}function v(){clearInterval(x)}function y(){N&&(document[M]?v:g)()}function w(){N||(i(),u(),t.addEventListener("scroll",r),t.addEventListener("wheel",s),t.addEventListener("resize",b),t.addEventListener("orientationchange",b),e.addEventListener(q,y),g(),N=!0)}function b(){if(N){p();for(var e=T.length-1;0<=e;e--)T[e]=h(T[e].node);u()}}function A(){t.removeEventListener("scroll",r),t.removeEventListener("wheel",s),t.removeEventListener("resize",b),t.removeEventListener("orientationchange",b),e.removeEventListener(q,y),v(),N=!1}function E(){A(),p()}function k(){for(E();T.length;)T.pop()}function S(e){for(var t=T.length-1;0<=t;t--)if(T[t].node===e)return;var n=h(e);T.push(n),N?c(n):w()}function L(){}var C,x,T=[],N=!1,W=e.documentElement,M="hidden",q="visibilitychange";void 0!==e.webkitHidden&&(M="webkitHidden",q="webkitvisibilitychange"),t.getComputedStyle||n();for(var D=["","-webkit-","-moz-","-ms-"],z=document.createElement("div"),R=D.length-1;0<=R;R--){try{z.style.position=D[R]+"sticky"}catch(e){}""!=z.style.position&&n()}i(),t.Stickyfill={stickies:T,add:S,remove:function(e){for(var t=T.length-1;0<=t;t--)T[t].node===e&&(d(T[t]),T.splice(t,1))},init:w,rebuild:b,pause:A,stop:E,kill:k}}(document,window),window.jQuery&&(window.jQuery.fn.Stickyfill=function(e){return this.each(function(){Stickyfill.add(this)}),this}),function(e,t){"function"==typeof define&&define.amd?define("priorityNav",t(e)):"object"==typeof exports?module.exports=t(e):e.priorityNav=t(e)}(window||this,function(e){"use strict";function t(e,t,n){if("[object Object]"===Object.prototype.toString.call(e))for(var i in e)Object.prototype.hasOwnProperty.call(e,i)&&t.call(n,e[i],i,e);else for(var r=0,s=e.length;r<s;r++)t.call(n,e[r],r,e)}var s,a,c,l,d,o,u,p={},h=[],m=!!document.querySelector&&!!e.addEventListener,f={},g=0,v=0,y={initClass:"js-priorityNav",mainNavWrapper:"nav",mainNav:"ul",navDropdownClassName:"more-dropdown",navDropdownToggleClassName:"more-dropdown-toggle",navDropdownLabel:"more",navDropdownBreakpointLabel:"menu",breakPoint:500,throttleDelay:50,offsetPixels:0,count:!0,moved:function(){},movedBack:function(){}};function i(e,t){var n,i;e.classList?e.classList.toggle(t):(0<=(i=(n=e.className.split(" ")).indexOf(t))?n.splice(i,1):n.push(t),e.className=n.join(" "))}function n(e){var t,n;t=e,n=window.getComputedStyle(t),n=parseFloat(n.paddingLeft)+parseFloat(n.paddingRight),a=t.clientWidth-n,e.querySelector(d).parentNode===e&&e.querySelector(d).offsetWidth,c=E(e)+f.offsetPixels,t=document,n=window,e=t.compatMode&&"CSS1Compat"===t.compatMode?t.documentElement:t.body,t=e.clientWidth,e=e.clientHeight,n.innerWidth&&t>n.innerWidth&&(t=n.innerWidth,e=n.innerHeight),v={width:t,height:e}.width}p.doesItFit=function(t){var i,r,s,o,e=0===t.getAttribute("instance")?e:f.throttleDelay;n(t),i=function(){var e=t.getAttribute("instance");if(n(t),v>f.breakPoint){for(;a<=c&&0<t.querySelector(l).children.length||v<f.breakPoint&&0<t.querySelector(l).children.length;)p.toDropdown(t,e),n(t),v<f.breakPoint&&b(t,e,f.navDropdownBreakpointLabel);for(;a>=h[e][h[e].length-1]&&v>f.breakPoint;)p.toMenu(t,e),v>f.breakPoint&&b(t,e,f.navDropdownLabel);h[e].length<1&&(t.querySelector(d).classList.remove("show"),b(t,e,f.navDropdownLabel)),t.querySelector(l).children.length<1?(t.classList.add("is-empty"),b(t,e,f.navDropdownBreakpointLabel)):t.classList.remove("is-empty"),w(t,e)}else for(;v<f.breakPoint&&0<h[e].length;)p.toMenu(t,e)},r=e,function(){var e=this,t=arguments,n=s&&!o;clearTimeout(o),o=setTimeout(function(){o=null,s||i.apply(e,t)},r),n&&i.apply(e,t)}()};function r(e,t){e.querySelector(o).setAttribute("priorityNav-count",h[t].length)}var w=function(e,t){h[t].length<1?(e.querySelector(o).classList.add("priority-nav-is-hidden"),e.querySelector(o).classList.remove("priority-nav-is-visible"),e.classList.remove("priority-nav-has-dropdown"),e.querySelector(".priority-nav-wrapper").setAttribute("aria-haspopup","false")):(e.querySelector(o).classList.add("priority-nav-is-visible"),e.querySelector(o).classList.remove("priority-nav-is-hidden"),e.classList.add("priority-nav-has-dropdown"),e.querySelector(".priority-nav-wrapper").setAttribute("aria-haspopup","true"))},b=function(e,t,n){e.querySelector(o).innerHTML=n};p.toDropdown=function(e,t){e.querySelector(d).firstChild&&0<e.querySelector(l).children.length?e.querySelector(d).insertBefore(e.querySelector(l).lastElementChild,e.querySelector(d).firstChild):0<e.querySelector(l).children.length&&e.querySelector(d).appendChild(e.querySelector(l).lastElementChild),h[t].push(c),w(e,t),0<e.querySelector(l).children.length&&f.count&&r(e,t),f.moved()},p.toMenu=function(e,t){0<e.querySelector(d).children.length&&e.querySelector(l).appendChild(e.querySelector(d).firstElementChild),h[t].pop(),w(e,t),0<e.querySelector(l).children.length&&f.count&&r(e,t),f.movedBack()};function A(t,n){window.attachEvent?window.attachEvent("onresize",function(){p.doesItFit&&p.doesItFit(t)}):window.addEventListener&&window.addEventListener("resize",function(){p.doesItFit&&p.doesItFit(t)},!0),window.addEventListener("orientationchange",function(){p.doesItFit&&p.doesItFit(t)},!0),t.querySelector(o).addEventListener("click",function(){i(t.querySelector(d),"show"),i(this,"is-open"),i(t,"is-open"),-1!==t.className.indexOf("is-open")?t.querySelector(d).setAttribute("aria-hidden","false"):(t.querySelector(d).setAttribute("aria-hidden","true"),t.querySelector(d).blur())}),document.addEventListener("click",function(e){!function(e,t){for(var n=t.charAt(0);e&&e!==document;e=e.parentNode)if("."===n){if(e.classList.contains(t.substr(1)))return e}else if("#"===n){if(e.id===t.substr(1))return e}else if("["===n&&e.hasAttribute(t.substr(1,t.length-2)))return e;return!1}(e.target,"."+n.navDropdownClassName)&&e.target!==t.querySelector(o)&&(t.querySelector(d).classList.remove("show"),t.querySelector(o).classList.remove("is-open"),t.classList.remove("is-open"))}),document.addEventListener("desktop-search-toggle",function(e){t.querySelector(d).classList.remove("show"),t.querySelector(o).classList.remove("is-open"),t.classList.remove("is-open")}),document.onkeydown=function(e){27===(e=e||window.event).keyCode&&(document.querySelector(d).classList.remove("show"),document.querySelector(o).classList.remove("is-open"),s.classList.remove("is-open"))}}var E=function(e){for(var t=e.childNodes,n=0,i=0;i<t.length;i++)3!==t[i].nodeType&&(isNaN(t[i].offsetWidth)||(n+=t[i].offsetWidth));return n};Element.prototype.remove=function(){this.parentElement.removeChild(this)},NodeList.prototype.remove=HTMLCollection.prototype.remove=function(){for(var e=0,t=this.length;e<t;e++)this[e]&&this[e].parentElement&&this[e].parentElement.removeChild(this[e])},p.destroy=function(){f&&(document.documentElement.classList.remove(f.initClass),u.remove(),f=null,delete p.init,delete p.doesItFit)},m&&"undefined"!=typeof Node&&(Node.prototype.insertAfter=function(e,t){this.insertBefore(e,t.nextSibling)});function k(e){return"."!==(e=e.charAt(0))&&"#"!==e}return p.init=function(e){var n,i,r;i=e||{},r={},t(n=y,function(e,t){r[t]=n[t]}),t(i,function(e,t){r[t]=i[t]}),f=r,m||"undefined"!=typeof Node?k(f.navDropdownClassName)&&k(f.navDropdownToggleClassName)?(e=document.querySelectorAll(f.mainNavWrapper),t(e,function(e){var t,n;h[g]=[],e.setAttribute("instance",g++),(s=e)?(l=f.mainNav,e.querySelector(l)?(t=e,n=f,u=document.createElement("div"),d=document.createElement("ul"),(o=document.createElement("button")).innerHTML=n.navDropdownLabel,o.setAttribute("aria-controls","menu"),o.setAttribute("type","button"),d.setAttribute("aria-hidden","true"),t.querySelector(l).parentNode===t?(t.insertAfter(u,t.querySelector(l)),u.appendChild(o),u.appendChild(d),d.classList.add(n.navDropdownClassName),d.classList.add("priority-nav-dropdown"),o.classList.add(n.navDropdownToggleClassName),o.classList.add("priority-nav-dropdown-toggle"),u.classList.add(n.navDropdownClassName+"-wrapper"),u.classList.add("priority-nav-wrapper"),t.classList.add("priority-nav")):console.warn("mainNav is not a direct child of mainNavWrapper, double check please"),d="."+f.navDropdownClassName,e.querySelector(d)?(o="."+f.navDropdownToggleClassName,e.querySelector(o)?(A(e,f),p.doesItFit(e)):console.warn("couldn't find the specified navDropdownToggle element")):console.warn("couldn't find the specified navDropdown element")):console.warn("couldn't find the specified mainNav element")):console.warn("couldn't find the specified mainNavWrapper element")}),document.documentElement.classList.add(f.initClass)):console.warn("No symbols allowed in navDropdownClassName & navDropdownToggleClassName. These are not selectors."):console.warn("This browser doesn't support priorityNav")},p}),function(e){"function"==typeof define&&define.amd?define(["jquery"],e):"object"==typeof module&&module.exports?module.exports=e(require("jquery")):e(jQuery)}(function(l){function e(){for(var e=d.scrollTop(),t=u.height(),n=t-h,i=n<e?n-e:0,r=0,s=p.length;r<s;r++){var o,a,c=p[r];e<=c.stickyWrapper.offset().top-c.topSpacing-i?null!==c.currentTop&&(c.stickyElement.css({width:"",position:""}),c.stickyElement.parent().removeClass(c.className),c.stickyElement.trigger("sticky-end",[c]),c.currentTop=null):((a=t-c.stickyElement.outerHeight()-c.topSpacing-c.bottomSpacing-e-i)<0?a+=c.topSpacing:a=c.topSpacing,c.currentTop!==a&&(c.getWidthFrom?(padding=c.stickyElement.innerWidth()-c.stickyElement.width(),o=l(c.getWidthFrom).width()-padding||null):c.widthFromWrapper&&(o=c.stickyWrapper.width()),null==o&&(o=c.stickyElement.width()),c.stickyElement.css("width",o).css("position","fixed"),c.stickyElement.parent().addClass(c.className),null===c.currentTop?c.stickyElement.trigger("sticky-start",[c]):c.stickyElement.trigger("sticky-update",[c]),c.currentTop===c.topSpacing&&c.currentTop>a||null===c.currentTop&&a<c.topSpacing?c.stickyElement.trigger("sticky-bottom-reached",[c]):null!==c.currentTop&&a===c.topSpacing&&c.currentTop<a&&c.stickyElement.trigger("sticky-bottom-unreached",[c]),c.currentTop=a),a=c.stickyWrapper.parent(),c.stickyElement.offset().top+c.stickyElement.outerHeight()>=a.offset().top+a.outerHeight()&&c.stickyElement.offset().top<=c.topSpacing?c.stickyElement.css("position","absolute"):c.stickyElement.css("position","fixed"))}}function t(){h=d.height();for(var e=0,t=p.length;e<t;e++){var n=p[e],i=null;n.getWidthFrom?n.responsiveWidth&&(i=l(n.getWidthFrom).width()):n.widthFromWrapper&&(i=n.stickyWrapper.width()),null!=i&&n.stickyElement.css("width",i),n.stickyWrapper.hasClass("is-sticky")||a.setWrapperHeight(n.stickyElement)}}var n=Array.prototype.slice,i=Array.prototype.splice,o={topSpacing:0,bottomSpacing:0,className:"is-sticky",wrapperClassName:"sticky-wrapper",center:!1,getWidthFrom:"",widthFromWrapper:!0,responsiveWidth:!1,zIndex:"inherit"},d=l(window),u=l(document),p=[],h=d.height(),a={init:function(s){return this.each(function(){var e=l.extend({},o,s),t=l(this),n=t.attr("id"),i=n?n+"-"+o.wrapperClassName:o.wrapperClassName,r=l("<div></div>").attr("id",i).addClass(e.wrapperClassName);t.wrapAll(function(){if(0==l(this).parent("#"+i).length)return r});n=t.parent();e.center&&n.css({width:t.outerWidth(),marginLeft:"auto",marginRight:"auto"}),"right"===t.css("float")&&t.css({float:"none"}).parent().css({float:"right"}),e.stickyElement=t,e.stickyWrapper=n,e.currentTop=null,p.push(e),a.setWrapperHeight(this),a.setupChangeListeners(this)})},setWrapperHeight:function(e){var t=l(e),e=t.parent();e&&e.css("height",t.outerHeight())},setupChangeListeners:function(t){window.MutationObserver?new window.MutationObserver(function(e){(e[0].addedNodes.length||e[0].removedNodes.length)&&a.setWrapperHeight(t)}):window.addEventListener?(t.addEventListener("DOMNodeInserted",function(){a.setWrapperHeight(t)},!1),t.addEventListener("DOMNodeRemoved",function(){a.setWrapperHeight(t)},!1)):window.attachEvent&&(t.attachEvent("onDOMNodeInserted",function(){a.setWrapperHeight(t)}),t.attachEvent("onDOMNodeRemoved",function(){a.setWrapperHeight(t)}))},update:e,unstick:function(e){return this.each(function(){for(var e=l(this),t=-1,n=p.length;0<n--;)p[n].stickyElement.get(0)===this&&(i.call(p,n,1),t=n);-1!==t&&(e.unwrap(),e.css({width:"",position:"",top:"",float:"","z-index":""}))})}};window.addEventListener?(window.addEventListener("scroll",e,!1),window.addEventListener("resize",t,!1)):window.attachEvent&&(window.attachEvent("onscroll",e),window.attachEvent("onresize",t)),l.fn.sticky=function(e){return a[e]?a[e].apply(this,n.call(arguments,1)):"object"!=typeof e&&e?void l.error("Method "+e+" does not exist on jQuery.sticky"):a.init.apply(this,arguments)},l.fn.unstick=function(e){return a[e]?a[e].apply(this,n.call(arguments,1)):"object"!=typeof e&&e?void l.error("Method "+e+" does not exist on jQuery.sticky"):a.unstick.apply(this,arguments)},l(function(){setTimeout(e,0)})}),jQuery(function(t){var e=t(".header-search"),n=t(".header-search .search-field"),i=!1,r="";termExists="",void 0===window.matchMedia&&void 0===window.msMatchMedia||(r=window.matchMedia("(min-width: 61.5em)")),e.append('<div class="results"></div>');var s=t(".header-search .results");n.attr("autocomplete","off"),n.keyup(function(){r.matches&&(""!==n.val()?(termExists=!0,i||(s.html('<div class="results-list"></div>'),t(".header-search .results .results-list").html(""),i=!0),d()):(termExists=!1,i=!1,s.empty()))});var o,a,c,l,d=(o=function(){var e=n.val();t.ajax({type:"POST",url:ajaxurl,data:{action:"ajax_search",query:e},success:function(e){termExists&&(s.html('<div class="results-list">'+e+"</div>"),i=!1)},complete:function(){}})},a=200,function(){var e=this,t=arguments,n=c&&!l;clearTimeout(l),l=setTimeout(function(){l=null,c||o.apply(e,t)},a),n&&o.apply(e,t)})}),jQuery(function(t){for(var e=document.getElementsByClassName("stick"),n=e.length-1;0<=n;n--)Stickyfill.add(e[n]);var i=window.location.href;t('.hooniverse-main-menu-content a[href="'+i+'"]').addClass("current-page"),t(".footer-widget-title").on("click",function(e){window.matchMedia("(max-width: 655px)").matches&&t(this).parent().toggleClass("show")})}),function(e,r){"use strict";var t,i=i||e.document,n=r(".hooniverse-main-menu-wrapper"),s=n.find(".hooniverse-main-menu"),o=r(".hooniverse-main-menu-trigger"),a=n.find(".hooniverse-main-menu-content"),c=n.find(".hooniverse-main-menu-list"),l=n.find(".main-menu-close"),d=n.find(".main-menu-back"),u=n.find(".hooniverse-main-menu-title"),p=r("#page"),h=n.find(".search-form"),m=(n.find(".search-submit"),n.find(".desktop-search-close")),f=h.find(".search-field"),g=n.find(".nav-search"),v=[],y=[],e="";function w(){var e="modernizr";try{return localStorage.setItem(e,e),localStorage.removeItem(e),1}catch(e){return}}function b(e){e.preventDefault(),e.stopPropagation(),p.toggleClass("active"),(p.hasClass("active")?E:k)();e=c.height();c.height(e)}function A(e){e.preventDefault(),a.toggleClass("desktop-search-active"),f.focus(),i.dispatchEvent(t)}function E(){i.addEventListener("keydown",S)}function k(){i.removeEventListener("keydown",S)}function S(e){var t,n;9===e.keyCode&&(t=r(".hooniverse-main-menu a[href]:visible, .hooniverse-main-menu input:visible, .hooniverse-main-menu button:visible"),n=(t=jQuery.makeArray(t)).indexOf(i.activeElement),e.shiftKey||n!==t.length-1?!e.shiftKey||0!==n&&-1!==n||(t[t.length-1].focus(),e.preventDefault()):(t[0].focus(),e.preventDefault()))}void 0===window.matchMedia&&void 0===window.msMatchMedia||(e=window.matchMedia("(min-width: 41em)")),!w()||e.matches||(n=sessionStorage.getItem("menu_state"))&&(r(".menu-item-"+n).parentsUntil(r(".hooniverse-main-menu"),"ul").addClass("move-out").addClass("active"),r(".menu-item-"+n+" > ul").addClass("active"),d.addClass("visible"),e=r(".menu-item-"+n+" > ul").children().size(),c.height(50*e),e=r(".menu-item-"+n+" > .menu-item-link")[0].innerHTML,u[0].innerHTML=e,r(".menu-item-"+n).parentsUntil(r(".hooniverse-main-menu"),"li").each(function(){y.push(r(this).find("> .menu-item-link").text())}),y.reverse(),v=(v=["Menu"]).concat(y)),o.on("click",b),l.on("click",b),p.on("click",function(e){p.hasClass("active")&&b(e),a.hasClass("desktop-search-active")&&A(e)}),s.on("click",function(e){e.stopPropagation()}),g.on("click",A),m.on("click",A),r("#search-skip-link").on("click",function(e){o.is(":visible")?(b(e),f.focus()):A(e)}),"function"==typeof Event?t=new Event("desktop-search-toggle"):(t=i.createEvent("Event")).initEvent("desktop-search-toggle",!0,!0),f.on("blur",function(){h.removeClass("is-focused")}).on("focus",function(){h.addClass("is-focused")}),s.find(".sub-menu-toggle").on("click",function(e){e.preventDefault(),k(),r(this).closest("ul").toggleClass("move-out"),r(this).closest("li").toggleClass("sub-menu-active"),r(this).siblings(".sub-menu").toggleClass("active"),w()&&(r(this).parent().hasClass("menu-item")?(t=r(this).parent().prop("class").match(/menu-item-([0-9]+)/)[1],sessionStorage.setItem("menu_state",t)):sessionStorage.removeItem("menu_state")),-1===d[0].className.indexOf("visible")&&(d[0].className+=" visible"),v.push(u[0].innerHTML),u[0].innerHTML=r(this).siblings(".menu-item-link")[0].innerHTML;var t=r(this).siblings(".sub-menu").children().size();c.height(50*t),p.hasClass("active")&&E()}),d.on("click",function(e){e.preventDefault(),k();var t,n=s.find(".move-out"),i=n[n.length-1];i.className=i.className.replace(" move-out",""),w()&&(r(i).parent().hasClass("menu-item")?(t=r(i).parent().prop("class").match(/menu-item-([0-9]+)/)[1],sessionStorage.setItem("menu_state",t)):sessionStorage.removeItem("menu_state")),u[0].innerHTML=v.pop(),r(i).find(".active").toggleClass("active"),1===n.length&&(e.target.className=e.target.className.replace(" visible",""));i=r(i).children().not(".nav-search").size();c.height(50*i),E()}),r(i).keyup(function(e){27===e.keyCode&&(p.hasClass("active")&&b(e),a.hasClass("desktop-search-active")&&(a.toggleClass("desktop-search-active"),f.blur()))}),r(".hooniverse-main-menu-list > li.menu-item-has-children a").focus(function(e){(r(this).parent().parent().hasClass("sub-menu")?r(this).parent().parent():r(this)).closest(".menu-item-has-children").addClass("has-focus")}),r(".hooniverse-main-menu-list > li.menu-item-has-children a").blur(function(e){(r(this).parent().parent().hasClass("sub-menu")?r(this).parent().parent():r(this)).closest(".menu-item-has-children").removeClass("has-focus")});var L;priorityNav.init({mainNavWrapper:".hooniverse-main-menu-content",mainNav:".hooniverse-main-menu-list",navDropdownLabel:"More",throttleDelay:20,breakPoint:899,count:!1});r(".header-alt .site-header").sticky({topSpacing:-77}),"function"==typeof Event?L=new Event("resize"):(L=i.createEvent("Event")).initEvent("resize",!0,!0),r(".site-header").on("sticky-start",function(){window.dispatchEvent(L),window.dispatchEvent(L)}),r(".site-header").on("sticky-end",function(){window.dispatchEvent(L),window.dispatchEvent(L)})}(window,jQuery),function(){var e=document.documentElement;e.className=e.className.replace(/no-js/,"js")}(jQuery);var sidebar=document.getElementById("secondary");function stickyFunction(){var e=window.innerHeight;sidebar.offsetHeight>e?sidebar.classList.remove("stick"):sidebar.classList.add("stick")}sidebar&&(stickyFunction(),window.addEventListener("resize",stickyFunction)),/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var e,t=location.hash.substring(1);/^[A-z0-9_-]+$/.test(t)&&(e=document.getElementById(t))&&(/^(?:a|select|input|button|textarea)$/i.test(e.tagName)||(e.tabIndex=-1),e.focus())},!1);