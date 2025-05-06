import {body, header} from "./elementsNodeList.js";


function getElement(selector, element = document) {
    return element.querySelector(selector);
}

function getElements(selector, element = document) {
    return element.querySelectorAll(selector);
}

function disableScrollAndSwipes(scrollPosition) {
    body.style.position = 'fixed';
    body.style.top = `-${scrollPosition}px`;
    body.classList.add('fixed');
    header.style.top = `0px`;
    body.style.overflow = 'hidden';
}

function enableScrollAndSwipes(scrollPosition) {
    body.style.position = 'relative';
    body.style.top = '0';
    body.style.overflow = 'auto';
    body.classList.remove('fixed');
    window.scrollTo({
        top: +scrollPosition,
        behavior: "auto"
    });
    // window.scrollTo(0, scrollPosition);

}

function preventDefault(e) {
    const element = getElement('.scroll-y');
    console.log('preventDefault', e.target, element && element.contains(e.target))
    if (element && element.contains(e.target)) {
        return;
    }
    e.preventDefault();
    e.stopPropagation();
    return false;
}

let scrollDisabled = false;

function disableScroll() {
    if (!scrollDisabled) {
        window.addEventListener('wheel', preventDefault, { passive: false });
        window.addEventListener('touchmove', preventDefault, { passive: false });
        scrollDisabled = true;
        console.log('addEventListener disableScroll', preventDefault);
    }
}

function enableScroll() {
    if (scrollDisabled) {
        window.removeEventListener('wheel', preventDefault, { passive: false });
        window.removeEventListener('touchmove', preventDefault, { passive: false });
        scrollDisabled = false;
        console.log('removeEventListener enableScroll', preventDefault);
    }
}

export {
    disableScrollAndSwipes,
    enableScrollAndSwipes,
    getElements,
    disableScroll,
    enableScroll,
    getElement,

};