// set up text to print, each item in array is new line
function resetVars() {
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
function typewriter() {
  sContents = ' ';
  iRow = Math.max(0, iIndex - iScrollAt);
  while (iRow < iIndex) {
    sContents += "<h1>" + aText[iRow++] + "</h1>"; //'<br />';
  }
  destination.html(sContents + aText[iIndex].substring(0, iTextPos) + "<span id='dash'>|</span>");
  if (iTextPos++ == iArrLength) {

    iTextPos = 0;
    iIndex++;
    if (iIndex != aText.length) {
      iArrLength = aText[iIndex].length;
      setTimeout("typewriter()", 500);
    }
  } else {
    setTimeout("typewriter()", iSpeed);
  }
}

var works_nav = $(".work-nav")

for (var i = 0; i < works_nav.length; i++) {
  // console.log(works_nav[i])
  works_nav[i].addEventListener("mouseover", function () {
    var target = "#" + this.dataset.target;
    // document.getElementById("img-5").style.display="block";
    $(target).removeClass("nodisplay");
    $("#typedtext").addClass("navstarted")
  })
  works_nav[i].addEventListener("mouseleave", function () {
    $("#typedtext").addClass("navstarted")
    var target = "#" + this.dataset.target;
    $(".work-thumb-wrap").addClass("nodisplay")
    setTimeout(function () {
      $("#typedtext").removeClass("navstarted")
    }, 1000)
  })

}




//text carousel
function findEmoji(string) {
  var regex = /(?:[\u2700-\u27bf]|(?:\ud83c[\udde6-\uddff]){2}|[\ud800-\udbff][\udc00-\udfff]|[\u0023-\u0039]\ufe0f?\u20e3|\u3299|\u3297|\u303d|\u3030|\u24c2|\ud83c[\udd70-\udd71]|\ud83c[\udd7e-\udd7f]|\ud83c\udd8e|\ud83c[\udd91-\udd9a]|\ud83c[\udde6-\uddff]|\ud83c[\ude01-\ude02]|\ud83c\ude1a|\ud83c\ude2f|\ud83c[\ude32-\ude3a]|\ud83c[\ude50-\ude51]|\u203c|\u2049|[\u25aa-\u25ab]|\u25b6|\u25c0|[\u25fb-\u25fe]|\u00a9|\u00ae|\u2122|\u2139|\ud83c\udc04|[\u2600-\u26FF]|\u2b05|\u2b06|\u2b07|\u2b1b|\u2b1c|\u2b50|\u2b55|\u231a|\u231b|\u2328|\u23cf|[\u23e9-\u23f3]|[\u23f8-\u23fa]|\ud83c\udccf|\u2934|\u2935|[\u2190-\u21ff])/g;
  var occurance = [];
  var emojis = [];

  while ((occurance = regex.exec(string)) !== null) {
    emojis.push(regex.lastIndex)
    emojis.push(regex.lastIndex-1)
    emojis.push(regex.lastIndex-2)
  }
  return emojis;
}
var TxtRotate = function (el, toRotate, period) {
  this.toRotate = toRotate;
  this.el = el;
  this.loopNum = 0;
  this.period = parseInt(period, 10) || 2000;
  this.txt = '';
  this.tick();
  this.isDeleting = false;
  this.emoji = false;
};


TxtRotate.prototype.tick = function () {
  var i = this.loopNum % this.toRotate.length;
  var fullTxt = this.toRotate[i];
  var emojis = findEmoji(fullTxt);
  this.emoji = false;

  console.log(emojis)
  if (this.isDeleting) {
    var currentI = this.txt.length;
    if (emojis.indexOf(currentI) != -1) {
      this.emoji = true;
      console.log("hala")
    } else {
      this.emoji=false;
    }
    this.txt = fullTxt.substring(0, this.txt.length - 1);

  } else {
    var currentI = this.txt.length;
    console.log(currentI)
    if (emojis.indexOf(currentI) != -1) {
      this.emoji = true;
      console.log("hala")
      console.log(this.emoji)
    } else {
      this.emoji=false;
    }
    this.txt = fullTxt.substring(0, this.txt.length + 1);


  }

  this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

  var that = this;
  var delta = 200 - Math.random() * 100;

  if (this.isDeleting) { delta /= 2; }

  if (this.emoji){
    delta=0;
  }
  if (!this.isDeleting && this.txt === fullTxt) {
    delta = this.period;
    this.isDeleting = true;
  } else if (this.isDeleting && this.txt === '') {
    this.isDeleting = false;
    this.loopNum++;
    delta = 500;
  }

  setTimeout(function () {
    that.tick();
  }, delta);
};

window.onload = function () {
  var elements = document.getElementsByClassName('txt-rotate');
  for (var i = 0; i < elements.length; i++) {
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
var colors = ["#222", "#7b6063", "#582c53", "#582d43", "#833233", "#4c363c", "#635865", "#5a6675", "#275d3a", "#21382d", "#07272e", "#254749", "#1b365f", "#3c3b4e", "#1e1a37", "#762f36", "#1a1c35", "003b4a",];

setInterval(function () {

  var colorIndex = Math.floor(Math.random() * colors.length)
  // console.log(colorIndex)
  $(".rainbow").css("background", colors[colorIndex])
  $(".rainbow-border").css("border-color", colors[colorIndex])
  $(".rainbow-text").css("color", colors[colorIndex])
}, 3000);