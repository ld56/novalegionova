let $screenWidth;
let $browserWindowHeight;
let $browserWindowWidth;
let $dpr;

function getScreenWidth () {
    $screenWidth = window.innerWidth;
    $browserWindowHeight = self.innerHeight;
    $browserWindowWidth = self.innerWidth;
    $dpr = window.devicePixelRatio;
}

getScreenWidth();
window.addEventListener('resize', getScreenWidth);