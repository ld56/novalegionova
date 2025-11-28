if (document.querySelector('.galleries')) {
    const visualizationsTrigger = document.querySelector('.galleries__trigger--visualizations');
    const progressTrigger = document.querySelector('.galleries__trigger--progress');

    function setActiveGallery(galleryClass, activeTrigger) {
        const galleries = document.querySelectorAll('.galleries__gallery');
        galleries.forEach(gallery => {
            gallery.classList.remove('galleries__gallery--current');
        });
        
        const selectedGallery = document.querySelector(`.${galleryClass}`);
        if (selectedGallery) {
            selectedGallery.classList.add('galleries__gallery--current');
        }

        const triggers = document.querySelectorAll('.galleries__trigger');
        triggers.forEach(trigger => {
            trigger.classList.remove('galleries__trigger--active');
        });

        if (activeTrigger) {
            activeTrigger.classList.add('galleries__trigger--active');
        }
    }

    if (visualizationsTrigger) {
        visualizationsTrigger.addEventListener('click', () => {
            setActiveGallery('galleries__gallery--1', visualizationsTrigger);
        });
    }

    if (progressTrigger) {
        progressTrigger.addEventListener('click', () => {
            setActiveGallery('galleries__gallery--2', progressTrigger);
        });
    }
}