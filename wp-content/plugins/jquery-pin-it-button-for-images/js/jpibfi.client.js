!function t(e,n,i){function r(a,u){if(!n[a]){if(!e[a]){var s="function"==typeof require&&require;if(!u&&s)return s(a,!0);if(o)return o(a,!0);var l=new Error("Cannot find module '"+a+"'");throw l.code="MODULE_NOT_FOUND",l}var c=n[a]={exports:{}};e[a][0].call(c.exports,function(t){var n=e[a][1][t];return r(n?n:t)},c,c.exports,t,e,n,i)}return n[a].exports}for(var o="function"==typeof require&&require,a=0;a<i.length;a++)r(i[a]);return r}({1:[function(t,e,n){"use strict";function i(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}Object.defineProperty(n,"__esModule",{value:!0});var r=function(){function t(t,e){for(var n=0;n<e.length;n++){var i=e[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(t,i.key,i)}}return function(e,n,i){return n&&t(e.prototype,n),i&&t(e,i),e}}(),o=function(){function t(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},n=e.siteTitle,r=void 0===n?"":n;i(this,t),this.desc_funcs={img_title:function(t){return t.attr("title")||t.attr("data-jpibfi-title")},img_alt:function(t){return t.attr("alt")||t.attr("data-jpibfi-alt")},post_title:function(t){return t.attr("data-jpibfi-post-title")},post_excerpt:function(t){return t.attr("data-jpibfi-post-excerpt")},img_description:function(t){return t.attr("data-jpibfi-description")},img_caption:function(t){return t.attr("data-jpibfi-caption")},site_title:function(){return r}}}return r(t,[{key:"getDescription",value:function(t,e){for(var n="",i=0;i<e.length&&!n;i++)n=this.desc_funcs[e[i]](t);return n||""}}]),t}();n["default"]=o},{}],2:[function(t,e,n){"use strict";function i(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}Object.defineProperty(n,"__esModule",{value:!0});var r=function(){function t(t,e){for(var n=0;n<e.length;n++){var i=e[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(t,i.key,i)}}return function(e,n,i){return n&&t(e.prototype,n),i&&t(e,i),e}}(),o=function(){function t(e){var n=this;i(this,t),this.flags={},this.pluginName=e;var r="undefined"!=typeof console&&"undefined"!=typeof console.log,o="undefined"!=typeof JSON&&"function"==typeof JSON.stringify;r?(this.logString=function(t){n.log(t)},this.logObject=o?function(t){n.log(JSON.stringify(t,null,4))}:function(t){return n.simplelogObject(t)}):(this.logString=function(){},this.logObject=function(){});var a=this.getQueryParams(document.location.search);Object.keys(a).forEach(function(t){var i=t.replace(e+"_","");n.setFlag(i,a[t])})}return r(t,[{key:"getFlag",value:function(t){return void 0!==this.flags[t]&&this.flags[t]}},{key:"getQueryParams",value:function(t){t=t.split("+").join(" ");for(var e={},n=void 0,i=/[?&]?([^=]+)=([^&]*)/g;n=i.exec(t);)e[decodeURIComponent(n[1])]=decodeURIComponent(n[2]);return e}},{key:"log",value:function(t){this.getFlag("print")&&console.log(this.pluginName+" debug: "+t)}},{key:"setFlag",value:function(t){var e=!(arguments.length>1&&void 0!==arguments[1])||arguments[1];this.flags[t]=e}},{key:"simplelogObject",value:function(t){if(this.getFlag("print")){var e=Object.keys(t).filter(function(e){return t.hasOwnPrototype(e)}).map(function(e){return e+": "+t[e]+"\n"}).join();this.log(e)}}}]),t}();n["default"]=o},{}],3:[function(t,e,n){"use strict";function i(t){return t&&t.__esModule?t:{"default":t}}function r(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}Object.defineProperty(n,"__esModule",{value:!0});var o=function(){function t(t,e){for(var n=0;n<e.length;n++){var i=e[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(t,i.key,i)}}return function(e,n,i){return n&&t(e.prototype,n),i&&t(e,i),e}}(),a=t("./link-generator"),u=i(a),s=function(){function t(e,n){r(this,t),this.$=e,this.settings=n,this.linkGenerator=new u["default"](n),this.$element=this.$("<a />",{target:"_blank","class":"pinit-button "+n.pin_image});var i="default"===n.pin_image?"jpibfi-icon-"+n.pin_image_icon:"";this.$element.html('<span class="'+i+'"></span>'),"default"===n.pin_image&&this.$element.addClass("jpibfi-size-"+n.pin_image_size+" jpibfi-button-"+n.pin_image_button),this.size={height:n.pinImageHeight,width:n.pinImageWidth}}return o(t,[{key:"createButton",value:function(t){var e=this.$element.clone(!1);return e.attr("href",this.linkGenerator.generate(t)).click(function(t){t.preventDefault(),t.stopPropagation(),"#"!==t.currentTarget.href.slice(-1)&&window.open(t.currentTarget.href,"mw"+t.timeStamp,"left=20,top=20,width=500,height=500,toolbar=1,resizable=0")})}},{key:"getSize",value:function(){return this.size}}]),t}();n["default"]=s},{"./link-generator":6}],4:[function(t,e,n){"use strict";function i(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}Object.defineProperty(n,"__esModule",{value:!0});var r=function(){function t(t,e){for(var n=0;n<e.length;n++){var i=e[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(t,i.key,i)}}return function(e,n,i){return n&&t(e.prototype,n),i&&t(e,i),e}}(),o=function(){function t(e){var n=this;i(this,t),this.settings=e,this.disabledClasses=this.createClassList(e.disabled_classes),this.enabledClasses=this.createClassList(e.enabled_classes),this.updateSizeConstraints(),window.addEventListener("resize",function(){return n.updateSizeConstraints()},!1)}return r(t,[{key:"createClassList",value:function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"";return t.split(";").filter(function(t){return!!t})}},{key:"imageEligible",value:function(t){return(0===this.enabledClasses.length||this.enabledClasses.some(function(e){return t.hasClass(e)}))&&!this.disabledClasses.some(function(e){return t.hasClass(e)})&&this.imageSizeIsOk(t)}},{key:"imageSizeIsOk",value:function(t){var e=t[0].clientWidth,n=t[0].clientHeight;return e>=this.minWidth&&n>=this.minHeight}},{key:"updateSizeConstraints",value:function(){this.minWidth=window.outerWidth<768?this.settings.min_image_width_small:this.settings.min_image_width,this.minHeight=window.outerWidth<768?this.settings.min_image_height_small:this.settings.min_image_height}}]),t}();n["default"]=o},{}],5:[function(t,e,n){"use strict";function i(t){return t&&t.__esModule?t:{"default":t}}function r(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}Object.defineProperty(n,"__esModule",{value:!0});var o=function(){function t(t,e){for(var n=0;n<e.length;n++){var i=e[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(t,i.key,i)}}return function(e,n,i){return n&&t(e.prototype,n),i&&t(e,i),e}}(),a=t("./show-on-hover-strategy"),u=i(a),s=function(){function t(e,n,i){r(this,t),this.settings=n,this.$=e,this.logger=i}return o(t,[{key:"init",value:function(){this.showStrategy=this.getStrategy(),this.showStrategy.start()}},{key:"getStrategy",value:function(){var t=null;return new(t=u["default"])(this.$,this.settings,this.logger)}}]),t}();n["default"]=s},{"./show-on-hover-strategy":8}],6:[function(t,e,n){"use strict";function i(t){return t&&t.__esModule?t:{"default":t}}function r(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}Object.defineProperty(n,"__esModule",{value:!0});var o=function(){function t(t,e){for(var n=0;n<e.length;n++){var i=e[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(t,i.key,i)}}return function(e,n,i){return n&&t(e.prototype,n),i&&t(e,i),e}}(),a=t("./../common/description-helper"),u=i(a),s=function(){function t(e){r(this,t),this.descriptionHelper=new u["default"]({siteTitle:e.siteTitle}),this.pinLinkedImages=e.pinLinkedImages,this.description_option=e.description_option}return o(t,[{key:"getDescription",value:function(t){return this.descriptionHelper.getDescription(t,this.description_option)}},{key:"getImage",value:function(t){var e=t.attr("data-jpibfi-src")||(t.prop?t.prop("src"):t.attr("src"));if(!this.pinLinkedImages)return e;var n=t.closest("a[href]");if(0===n.length)return e;var i=e.split(".").pop(),r=n.attr("href"),o=r.split(".").pop();return o.toLowerCase()===i.toLowerCase()?r:e}},{key:"getUrl",value:function(t){return t.attr("data-jpibfi-post-url")||window.location.href}},{key:"generate",value:function(t){var e=encodeURIComponent(this.getDescription(t)),n=encodeURIComponent(this.getUrl(t)),i=encodeURIComponent(this.getImage(t));return"http://pinterest.com/pin/create/bookmarklet/?is_video=false&url="+n+"&media="+i+"&description="+e}}]),t}();n["default"]=s},{"./../common/description-helper":1}],7:[function(t,e,n){"use strict";function i(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}Object.defineProperty(n,"__esModule",{value:!0});var r=function(){function t(t,e){for(var n=0;n<e.length;n++){var i=e[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(t,i.key,i)}}return function(e,n,i){return n&&t(e.prototype,n),i&&t(e,i),e}}(),o=function(t,e,n,i){return t.top+i.top},a=function(t,e,n,i){return t.left+i.left},u=function(t,e,n,i){return e.top-n.height-i.bottom},s=function(t,e,n,i){return e.left-i.right-n.width},l=function(t,e,n){return t.top+((e.top-t.top)/2-n.height/2)},c=function(t,e,n){return t.left+((e.left-t.left)/2-n.width/2)},f=function(){function t(e,n){i(this,t),this.topF=e,this.leftF=n}return r(t,[{key:"calculate",value:function(t,e,n,i){return{top:this.topF(t,e,n,i),left:this.leftF(t,e,n,i)}}}]),t}(),h=function(){function t(e,n){i(this,t),this.margins=n,this.positionCalculator=this.getPositionCalculator(e)}return r(t,[{key:"getPositionCalculator",value:function(t){switch(t){case"top-left":return new f(o,a);case"top-right":return new f(o,s);case"bottom-left":return new f(u,a);case"bottom-right":return new f(u,s);default:return new f(l,c)}}},{key:"calculatePosition",value:function(t,e,n){return this.positionCalculator.calculate(t,e,n,this.margins)}}]),t}();n["default"]=h},{}],8:[function(t,e,n){"use strict";function i(t){return t&&t.__esModule?t:{"default":t}}function r(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}function o(t,e){if(!t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!e||"object"!=typeof e&&"function"!=typeof e?t:e}function a(t,e){if("function"!=typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function, not "+typeof e);t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,enumerable:!1,writable:!0,configurable:!0}}),e&&(Object.setPrototypeOf?Object.setPrototypeOf(t,e):t.__proto__=e)}Object.defineProperty(n,"__esModule",{value:!0});var u=function(){function t(t,e){for(var n=0;n<e.length;n++){var i=e[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(t,i.key,i)}}return function(e,n,i){return n&&t(e.prototype,n),i&&t(e,i),e}}(),s=t("./show-strategy"),l=i(s),c=function(t){function e(){return r(this,e),o(this,(e.__proto__||Object.getPrototypeOf(e)).apply(this,arguments))}return a(e,t),u(e,[{key:"init",value:function(){this.addContainers()}},{key:"start",value:function(){var t=this;this.init();var e="data-jpibfi-timeout",n=0,i=function(e){return t.$("a.pinit-button["+t.indexerAttr+'="'+e+'"]')},r=this;r.$(document).delegate(this.settings.image_selector,"mouseenter",function(){var t=r.$(this);if(r.imageFilter.imageEligible(t)){t.addClass("pinit-hover");var o=t.attr(r.indexerAttr);o||(o=n++,t.attr(r.indexerAttr,o));var a=i(o);if(0===a.length){var u=r.buttonGenerator.createButton(t),s=r.buttonGenerator.getSize(),l=t.offset(),c={top:l.top+t[0].clientHeight,left:l.left+t[0].clientWidth},f=r.positioner.calculatePosition(l,c,s);t.after(u),u.attr(r.indexerAttr,o).css("visibility","hidden").show().offset(f).css("visibility","visible").hover(function(){return clearTimeout(u.attr(e))},function(){return u.attr(e,setTimeout(function(){t.removeClass("pinit-hover"),u.remove()},100))})}else clearTimeout(a.attr(e))}}),r.$(document).delegate(this.settings.image_selector,"mouseleave",function(){if(!r.logger.getFlag("prevent_hide")){var t=r.$(this),n=t.attr(r.indexerAttr);if(n){var o=i(n);o.attr(e,setTimeout(function(){t.removeClass("pinit-hover"),o.remove()},100))}}})}}]),e}(l["default"]);n["default"]=c},{"./show-strategy":9}],9:[function(t,e,n){"use strict";function i(t){return t&&t.__esModule?t:{"default":t}}function r(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}Object.defineProperty(n,"__esModule",{value:!0});var o=function(){function t(t,e){for(var n=0;n<e.length;n++){var i=e[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(t,i.key,i)}}return function(e,n,i){return n&&t(e.prototype,n),i&&t(e,i),e}}(),a=t("./image-filter"),u=i(a),s=t("./button-generator"),l=i(s),c=t("./positioner"),f=i(c),h=function(){function t(e,n,i){r(this,t),this.$=e,this.settings=n,this.logger=i,this.imageFilter=new u["default"](n),this.buttonGenerator=new l["default"](e,n);var o={left:n.button_margin_left,top:n.button_margin_top,right:n.button_margin_right,bottom:n.button_margin_bottom};this.positioner=new f["default"](n.button_position,o),this.indexerAttr="data-jpibfi-indexer"}return o(t,[{key:"addContainers",value:function(){var t=this.$(".jpibfi"),e=t.closest("div, article");e=e.length?e:t.parent(),e.addClass("jpibfi_container")}}]),t}();n["default"]=h},{"./button-generator":3,"./image-filter":4,"./positioner":7}],10:[function(t,e,n){"use strict";function i(t){return t&&t.__esModule?t:{"default":t}}var r=t("./settings"),o=i(r),a=t("./debugger"),u=i(a),s=t("./hover"),l=i(s);!function(t){var e=function(){var e=window.jpibfi_options,n=new o["default"](t.extend({pageUrl:document.URL,pageTitle:document.title,pageDescription:t('meta[name="description"]').attr("content")||""},e.hover)),i=new u["default"]("jpibfi");window.jpibfi_debugger=i;var r=new l["default"](t,n,i);r.init()};t(document).ready(e)}(jQuery)},{"./debugger":2,"./hover":5,"./settings":11}],11:[function(t,e,n){"use strict";function i(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}Object.defineProperty(n,"__esModule",{value:!0});var r=function o(t){var e=this;i(this,o),Object.keys(t).forEach(function(n){e[n]=t[n]}),this.isTouchDevice="ontouchstart"in window||{}.hasOwnProperty.call(navigator,"maxTouchPoints")};n["default"]=r},{}]},{},[10]);