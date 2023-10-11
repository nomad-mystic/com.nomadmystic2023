export default class AnimationMethods {
    /**
     * @description Create style.Transition Animation with stroke-dashoffset
     * @public
     * @author Keith Murphy | nomadmystics@gmail.com
     *
     * @param {HTMLCollection} paths
     * @param {string} duration
     * @return {void}
     */
    textPathAnimation = (paths, duration = '3s') => {
        for (let path= 0; path < paths.length; path++) {
            // Adds color back into the shape
            paths[path].style.stroke = 'var(--color-animation-stroke)';

            const length = paths[path].getTotalLength();

            // Clear any previous transition
            paths[path].style.transition = paths[path].style.webkitTransition = 'none';

            // Set up the starting positions
            paths[path].style.strokeDasharray = length + ' ' + length;
            // console.log(path[path].style.strokeDasharray);

            paths[path].style.strokeDashoffset = length;
            // console.log(path[path].style.strokeDashoffset + ': path.style.strokeDashoffset');

            // Trigger a layout so styles are calculated & the browser
            // picks up the starting position before animating
            paths[path].getBoundingClientRect();

            // Define our transition
            // path[path].style.transition = path[path].style.webkitTransition = 'stroke-dashoffset ' + duration + ' ease-in-out';
            paths[path].style.transition = paths[path].style.transition = 'stroke-dashoffset ' + duration + ' ease-in-out';
            paths[path].style.strokeDashoffset = '0';
        }
    }

    /**
     * @description Update SVG's opacity
     * @public
     * @author Keith Murphy | nomadmystics@gmail.com
     *
     * @param {HTMLElement} id
     * @param {string} duration
     * @return {void}
     */
    fadeIdAnimation = (id, duration) => {
        id.style.opacity = '1';
        id.style.transition = 'opacity ' + duration + ' ease-in';
    }

    /**
     * @description
     * @public
     * @author Keith Murphy | nomadmystics@gmail.com
     *
     * @return {void}
     */
    fadeClassAnimation = (classArray, duration) => {

        if (classArray && typeof classArray !== 'undefined' && classArray.length > 0) {

            for (let i= 0; i < classArray.length; i++) {

                if (classArray[i] && typeof classArray[i] !== 'undefined') {
                    classArray[i].style.opacity = 1;
                    classArray[i].style.transition = 'opacity ' + duration + ' ease-in';
                }
            }
        }
    }

    /**
     * @description
     * @public
     * @author Keith Murphy | nomadmystics@gmail.com
     * @param {HTMLCollection} paths
     * @param {string} duration
     * @return {void}
     */
    fillPathAnimation = (paths, duration = '3s') => {

        if (paths && typeof paths !== 'undefined' && paths.length > 0) {
            for (let path = 0; path < paths.length; path++) {

                if (paths[path] && typeof paths[path] !== 'undefined') {

                    paths[path].style.fill = 'var(--color-animation-stroke)';
                    paths[path].style.transition = 'fill ' + duration;

                }

            }
        }
    }
}
