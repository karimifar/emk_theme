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
var aText = ["Hello hello hello", "bye"]

var iSpeed = 100; // time delay of print out
var iIndex = 0; // start printing array at this posision
var iArrLength = aText[iIndex].length; // the length of the text array
var iScrollAt = 20; // start scrolling up at this many lines
    
var iTextPos = 0; // initialise text position
var sContents = ''; // initialise contents variable
var iRow; // initialise current row
var destination = $("#typedtext");
function typewriter(){
    sContents =  ' ';
    iRow = Math.max(0, iIndex-iScrollAt);
    while ( iRow < iIndex ) {
        sContents += "<h1>"+aText[iRow++] + "</h1>"; //'<br />';
    }
    destination.html(sContents + aText[iIndex].substring(0, iTextPos) + "<span id='dash'>|</span>");
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




//text carousel
var TxtRotate = function(el, toRotate, period) {
    this.toRotate = toRotate;
    this.el = el;
    this.loopNum = 0;
    this.period = parseInt(period, 10) || 2000;
    this.txt = '';
    this.tick();
    this.isDeleting = false;
  };
  
  TxtRotate.prototype.tick = function() {
    var i = this.loopNum % this.toRotate.length;
    var fullTxt = this.toRotate[i];
  
    if (this.isDeleting) {
      this.txt = fullTxt.substring(0, this.txt.length - 1);
    } else {
      this.txt = fullTxt.substring(0, this.txt.length + 1);
    }
  
    this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';
  
    var that = this;
    var delta = 200 - Math.random() * 100;
  
    if (this.isDeleting) { delta /= 2; }
  
    if (!this.isDeleting && this.txt === fullTxt) {
      delta = this.period;
      this.isDeleting = true;
    } else if (this.isDeleting && this.txt === '') {
      this.isDeleting = false;
      this.loopNum++;
      delta = 500;
    }
  
    setTimeout(function() {
      that.tick();
    }, delta);
  };
  
  window.onload = function() {
    var elements = document.getElementsByClassName('txt-rotate');
    for (var i=0; i<elements.length; i++) {
      var toRotate = elements[i].getAttribute('data-rotate');
      var period = elements[i].getAttribute('data-period');
      if (toRotate) {
        new TxtRotate(elements[i], JSON.parse(toRotate), period);
      }
    }
    // INJECT CSS
    var css = document.createElement("style");
    css.type = "text/css";
    css.innerHTML = ".txt-rotate > .wrap { border-right: 0.08em solid #666 }";
    document.body.appendChild(css);
  };





var colorEl = $(".rainbow");
var colors = ["#222", "#7b6063", "#582c53" ,"#582d43" ,"#833233" ,"#4c363c" ,"#635865" ,"#5a6675" ,"#275d3a" ,"#21382d" ,"#07272e" ,"#254749" ,"#1b365f" ,"#3c3b4e","#1e1a37","#762f36", "#1a1c35", "003b4a", ];

setInterval(function() {
    
	var colorIndex= Math.floor(Math.random() * colors.length)
	console.log(colorIndex)
    $(".rainbow").css("background", colors[colorIndex])
    $(".rainbow-border").css("border-color", colors[colorIndex])
    $(".rainbow-text").css("color", colors[colorIndex])
}, 3000);