const $header = document.querySelector('.header');
const $logo = document.querySelector('.header__logo')
let $prevScrollpos = window.scrollY;
let $scollYvalue;

if (document.querySelector('body').classList.contains('page-template-front-page')) {
    $scollYvalue = 100;
} else {
    $scollYvalue = 100;
}

const navigation_bar_behaviour = () => {
    if (window.scrollY >= 100 ) {
        let currentScrollPos = window.scrollY;
        $prevScrollpos = currentScrollPos;
    }
}

const navigation_bar_color = () => {
    if (window.scrollY <= $scollYvalue) {
        $header.classList.remove('header--scrolled');
        $logo.classList.remove('header__logo--scroll');
    } else {
        $header.classList.add('header--scrolled');
        $logo.classList.add('header__logo--scroll');
    }
}

navigation_bar_behaviour();
navigation_bar_color();
window.addEventListener('scroll', navigation_bar_behaviour)
window.addEventListener('scroll', navigation_bar_color);