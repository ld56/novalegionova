const $body = document.querySelector('body');
const $open_button = document.querySelector('#menu-open');
const $close_button = document.querySelector('#menu-close');
const $panel = document.querySelector('.menu');
const $menuLinks = document.querySelectorAll('.menu__li');

const openMenu = () => {
    if ($screenWidth < 1280) {
        $panel.classList.add('menu--visible');
        $panel.classList.remove('menu--non-visible');
        $body.style.overflow = 'hidden';
        $open_button.setAttribute('aria-expanded', 'true');
        $close_button.setAttribute('aria-expanded', 'true');
    }
}

const closeMenu = () => {
    if ($screenWidth < 1280) {
        $panel.classList.remove('menu--visible');
        $panel.classList.add('menu--non-visible');
        $body.removeAttribute('style');
        $open_button.setAttribute('aria-expanded', 'false');
        $close_button.setAttribute('aria-expanded', 'false');
    }
}

$open_button.addEventListener('click', openMenu);
$close_button.addEventListener('click', closeMenu);
$menuLinks.forEach(element => element.addEventListener('click', closeMenu));