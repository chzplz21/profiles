$( document ).ready(function() {

    //Sets and removes placeholder
    var searchInput = (function() {
           var inputBox = $( ".searchTextArea" );
           var bindFunctions = function() {

                inputBox.keyup(function(){
                   keyUpFunction(this);
                    
                });
               
            };

            var keyUpFunction = function(inputBox) {
                  var innerText = $(inputBox).val();
                    if (innerText.length == 0) {
                        (inputBox).attr('placeholder');
                    }   
            };
      

           var init = function() {
             bindFunctions();

           };

           return {
            init: init
           }

    })();

    searchInput.init();



});