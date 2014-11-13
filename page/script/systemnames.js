var body = document.getElementsByClassName('body')[0];
var systemNames = document.getElementsByClassName('systemNames')[0];

function matchScrollPositions()
{
    var bodyScroll = body.scrollLeft;
    systemNames.style.left = -bodyScroll + 'px';
}

body.addEventListener('scroll', function() {
    matchScrollPositions();
});