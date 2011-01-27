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
	moreInfoTrigger: function(){
		/* Implements link which reveals more information when clicked */
		var self=this.jquery;
		var content=self.children('div:first').hide();
		var icon=self.find('i:first');
		self.find('h6:first').children().click(function(ev){
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
