// set up text to print, each item in array is new line
function resetVars(){
    aText = ["I’m an interaction designer who codes to visualize and communicate things!", "hello"]

    iSpeed = 100; // time delay of print out
    iIndex = 0; // start printing array at this posision
    iArrLength = aText[0].length; // the length of the text array
    iScrollAt = 2; // start scrolling up at this many lines
        
    iTextPos = 0; // initialise text position
    sContents = ''; // initialise contents variable
    iRow; // initialise current row

}
var aText = ["I’m an interaction designer who codes to visualize and communicate things!", "hello"]

var iSpeed = 100; // time delay of print out
var iIndex = 0; // start printing array at this posision
var iArrLength = aText[0].length; // the length of the text array
var iScrollAt = 2; // start scrolling up at this many lines
    
var iTextPos = 0; // initialise text position
var sContents = ''; // initialise contents variable
var iRow; // initialise current row

function typewriter(){
    sContents =  ' ';
    iRow = Math.max(0, iIndex-iScrollAt);
    var destination = $("#typedtext");
    while ( iRow < iIndex ) {
        sContents += "<h1>"+aText[iRow++] + "</h1>"; //'<br />';
    }
    destination.html(sContents + aText[iIndex].substring(0, iTextPos) + "<span id='dash'>_</span>");
    if ( iTextPos++ == iArrLength ) {
        iTextPos = 0;
        iIndex++;
    if ( iIndex != aText.length ) {
        iArrLength = aText[iIndex].length;
        setTimeout("typewriter()", 500);
    }
    } else {
        setTimeout("typewriter()", iSpeed);
    }
}
    
    
typewriter();


// function contactIn(){
//     TweenMax.staggerFromTo(".contact-el", 1 ,{opacity:0, ease:Power1.easeIn},{opacity:1, ease:Power1.easeIn, delay: 6}, 0.2 )
// }
// // setTimeout(contactIn, 2000);
// contactIn();


var works_nav = $(".work-nav")

for (var i=0; i<works_nav.length; i++){
    console.log(works_nav[i])
    works_nav[i].addEventListener("mouseover", function(){
        var target= "#" +this.dataset.target;
        // document.getElementById("img-5").style.display="block";
        $(target).removeClass("nodisplay");
        $("#typedtext").addClass("navstarted")
    })
    works_nav[i].addEventListener("mouseleave", function(){
        $("#typedtext").addClass("navstarted")
        var target= "#" +this.dataset.target;
        $(".work-thumb-wrap").addClass("nodisplay")
        setTimeout(function(){
            $("#typedtext").removeClass("navstarted")  
        },1000)
    })

}
