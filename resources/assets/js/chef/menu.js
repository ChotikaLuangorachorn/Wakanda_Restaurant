window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("btn-go-to-top").style.display = "block";
    } else {
        document.getElementById("btn-go-to-top").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
$('#btn-go-to-top').click(function(e) {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0; 
});