/**
 * [ xHover ����¼� ]
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
                 * 1: ��꾭���������class,����Ƴ�����ȥ��class [��α�� hover]
                 * 2: ��꾭����������class,����Ƴ�����ȥ��class [�������˵�]
                 * 3: ��꾭���������class,ͬ��ȥ��class,����Ƴ��޶��� [�����б�]
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