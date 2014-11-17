/**
 * [ xHover 鼠标事件 ]
 * @param  {[type]} $ [description]
 * @return {[type]}   [description]
 */
(function($){
    $.fn.extend({
        xHover: function(opt){
            var def = $.extend({
                node: $('[d-hover="hover"]'), 
                /** 
                 * @type {str} 
                 * 1: 鼠标经过自身加上class,鼠标移出自身去掉class [仿伪类 hover]
                 * 2: 鼠标经过父级加上class,鼠标移出父级去掉class [仿下拉菜单]
                 * 3: 鼠标经过自身加上class,同级去掉class,鼠标移出无动作 [伸缩列表]
                */
                type: 1,
                delay: 20,
                activeClass: 'hover'
            }, opt);

            var timer = null,
                clearTimer = function(){
                    if(timer) clearTimeout(timer);
                };

            def.node.each(function(){
                var self = $(this),
                    cls = def.activeClass,
                    type = def.type,
                    activeObj = (type == 1 || type == 3) ? self : self.parent();

                activeObj.bind('mouseover',function(){
                    clearTimer();
                    timer = setTimeout(function(){
                        activeObj.addClass(cls);
                        if(type == 3){
                            activeObj.siblings().removeClass(cls)
                        }
                    }, def.delay);
                }).bind('mouseleave',function(){
                    clearTimer();
                    if(type != 3){
                        activeObj.removeClass(cls);
                    }
                });
            });         
        }
    });
})(jQuery);