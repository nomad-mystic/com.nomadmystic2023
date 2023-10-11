export default class AnimationMethods {
    /**
     * @description Create style.Transition Animation with stroke-dashoffset
     * @public
     * @author Keith Murphy | nomadmystics@gmail.com
     *
     * @return {void}
     */
    textPathAnimation = (path, duration) => {
        for (let i= 0; i < path.length; i++) {
            // Adds color back into the shape
            path[i].style.stroke = '#fff';

            const length = path[i].getTotalLength();

            // Clear any previous transition
            path[i].style.transition = path[i].style.webkitTransition = 'none';

            // Set up the starting positions

            path[i].style.strokeDasharray = length + ' ' + length;
            // console.log(path[i].style.strokeDasharray);

            path[i].style.strokeDashoffset = length;

            // console.log(path[i].style.strokeDashoffset + ': path.style.strokeDashoffset');

            // Trigger a layout so styles are calculated & the browser
            // picks up the starting position before animating
            path[i].getBoundingClientRect();

            // Define our transition
            // path[i].style.transition = path[i].style.webkitTransition = 'stroke-dashoffset ' + duration + ' ease-in-out';
            path[i].style.transition = path[i].style.transition = 'stroke-dashoffset ' + duration + ' ease-in-out';
            path[i].style.strokeDashoffset = '0';
        }
    }

    /**
     * @description Update SVG's opacity
     * @public
     * @author Keith Murphy | nomadmystics@gmail.com
     *
     * @return
     */
    fadeIdAnimation = (id, duration) => {
        id.style.opacity = 1;
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
        // console.log(classArray);
        for (let i= 0; i < classArray.length; i++) {
            classArray[i].style.opacity = 1;
            classArray[i].style.transition = 'opacity ' + duration + ' ease-in';
        }
    }

    /**
     * @description
     * @public
     * @author Keith Murphy | nomadmystics@gmail.com
     *
     * @return {void}
     */
    fillPathAnimation = (paths, duration) => {

        if (paths && typeof paths !== 'undefined') {
            for (let path = 0; path < paths.length; path++) {
                if (paths[path] && typeof paths[path] !== 'undefined') {
                    paths[path].style.fill = '#ffffff';
                    paths[path].style.transition = 'fill ' + duration;

                }
            }
        }

        // paths.css({
        //     'fill': '#fff',
        //     'transition': 'fill ' + duration
        // });
    }
}
