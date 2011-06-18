// Univ chain extensions

(function($){


$.each({
	indexCompareSwitch: function(){
		/* Implements switching between tabs on index page */
		var self=this;
		$('#comparison-nav').find('a').click(function(ev){
			ev.preventDefault();
			var t=$(this).attr('data-dst');
			$('#comparison-nav').find('.blue-i').removeClass('blue-i').addClass('black');
			$(this).removeClass('black').addClass('blue-i');
			self.jquery.find('.comparison-content:visible').fadeOut(function(){
				$("#"+t).fadeIn();
			});

		});
	},
	lightbox: function(){
		var b=$('<div style="display: none; opacity:0;  right: 0px; bottom: 0px; height: auto; background: black; width: auto; position: fixed; top: 0px; text-align: center; left: 0px; display: block; z-index: 1002; "></div>').appendTo($('body'));
		b.animate({opacity: 0.8},3000);

		var v=$('<div style="width: 1024; height: 768; background: white; top: 0px; z-index: 1003; display: block; position: fixed"/>').appendTo($('body'));
		v.css({left: ($(window).width()-1024)/2+"px"});
		var vv=$('<iframe width="1024" height="768" src="/video.htm" scrolling="no">').appendTo(v);

		b.click(function(){
			b.remove();
			v.remove();
		});
	},
    demoFunction: function(){
        this.jquery.fadeOut('slow',function(){
            alert('Just executed custom method written by our JS Coder.');
        });
    },
	moreInfoTrigger: function(){
		/* Implements link which reveals more information when clicked */
		var self=this.jquery;
		var content=self.children('div:first').hide();
		var icon=self.find('i:first');
		self.find('span:first').children().click(function(ev){
			ev.preventDefault();
			if(content.is(':visible')){
				content.fadeOut();
				icon.toggleClass('atk-icon-arrows-right2 atk-icon-arrows-bottom2');
				self.removeClass('atk-doc-expander-open');
			}else{
				content.fadeIn();
				icon.toggleClass('atk-icon-arrows-right2 atk-icon-arrows-bottom2');
				self.addClass('atk-doc-expander-open');
			}
		});
	}

},$.univ._import
);



})(jQuery);
