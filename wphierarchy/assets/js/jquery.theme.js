console.log("Hello world!");


//You need to replace $ with jQuery or a add a no conflict wrapper
// jQuery('.single-portfolio a.button')

(function($){
    $('.single-portfolio a.button').attr('target', '_blank');
})( jQuery );

(function(){
    var projectButton = document.querySelector('.single-portfolio a.button');

    if(projectButton) projectButton.target = '_blank';

})();
