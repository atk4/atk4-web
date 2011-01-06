// Univ chain extensions

(function($){


$.each({
	moreInfoTrigger: function(){
		var self=this.jquery;
		var content=self.children('div:first').hide();
		var icon=self.find('i:first');
		self.find('h6:first').children().click(function(ev){
			ev.preventDefault();
			if(content.is(':visible')){
				content.fadeOut();
				icon.toggleClass('atk-icon-arrows-right2 atk-icon-arrows-bottom2');
			}else{
				content.fadeIn();
				icon.toggleClass('atk-icon-arrows-right2 atk-icon-arrows-bottom2');
			}
		});
	}

},$.univ._import
);



})(jQuery);
