 //Highlights Words in user boxes
 var  profileBox = (function() {
  
    var words = document.getElementsByClassName("commonThings");
    var allThings = document.getElementsByClassName("allThings");
    var searchedWords = document.getElementById("searchArea");
    
    var searchedArray;

    var bindFunctions = function() {
 
        wordsInArray();
        highlightAllThings();
     }


     var wordsInArray = function() {
        searchedArray = searchedWords.innerHTML;
        searchedArray = searchedArray.toLowerCase();
        //array of searched words
        searchedArray = searchedArray.split(',').map(function(item) {
            return item.trim();
          });
        
     }


     var highlightAllThings = function() {
       
     
         //loops through each user box's words
        for (let o of allThings) {
            //big string for one user box
            var bigString = o.innerHTML.trim();
            o.innerHTML = doHighlighting(bigString);
          }
       
     }

     var doHighlighting = function(bigString) {
        var newText;
      
        for (let word of searchedArray) {
            //Gets length of searched for word
            var wordLength = word.length;
            
            //Gets index of bigString where the search word is found
            var re = new RegExp( '\\b' + word + '\\b');
            var index= bigString.search(re);
            

            //Make sure word actually is in text
            if (index>=0) {
                //Start of big string up to where the word is
                var startOfString = bigString.substring(0,index);
                //Gets the word within the text
                var wordPosition =  bigString.substring(index, index + wordLength);
                //Rest of string, no second paramter, just continues for the 
                //rest of the string
                var restOfString =   bigString.substring(index + wordLength);
                
                newText =  startOfString + "<span class='highlight'>" + 
                wordPosition + "</span>" + restOfString;
                bigString = newText;
            }
            
        }

        return bigString;
        
     }

    var init = function() {
      bindFunctions();

    };

    return {
     init: init
    }

})();



