// When the DOM is ready, initialize the scripts.
jQuery(function( $ ){
 
// Get a reference to the message whose position
// we want to "fix" on window-scroll.
var message = $( "#sticky-bar" );
 
// Get the origional position of the message; we will
// need this to compare to the view scroll for
// reverting back to the original display position.
var originalMessageTop = message.offset().top;
 
// Get a reference to the window object; we will use
// this several time, so cache the jQuery wrapper.
var view = $( window );
 
 
// Bind to the window scroll and resize events.
// Remember, resizing can also change the scroll
// of the page.
view.bind(
"scroll resize",
function(){
 
// Get the current scroll of the window.
var viewTop = view.scrollTop();
 
// Check to see if the view had scroll down
// past the top of the original message top
// AND that the message is not yet fixed.
if (
(viewTop > originalMessageTop) &&
!message.is( ".sticky-bar-fixed" )
){
 
// Toggle the message classes.
message
.removeClass( "sticky-bar-absolute" )
.addClass( "sticky-bar-fixed" )
;
 
// Check to see if the view has scroll back up
// above the message AND that the message is
// currently fixed.
} else if (
(viewTop <= originalMessageTop) &&
message.is( ".sticky-bar-fixed" )
){
 
// Toggle the message classes.
message
.removeClass( "sticky-bar-fixed" )
.addClass( "sticky-bar-absolute" )
;
 
}
}
);
 
});