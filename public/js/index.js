let zoomer = function () {
    document.getElementById('img-zoomer-box')
        .addEventListener('mousemove', function (e) {

            let original = document.getElementById('main'),
                magnified = document.getElementById('img2'),
                style = magnified.style,
                x = e.pageX - this.offsetLeft,
                y = e.pageY - this.offsetTop,
                imgWidth = original.width,
                imgHeight = original.height,
                xperc = ((x / imgWidth) * 100),
                yperc = ((y / imgHeight) * 100);

            if (x > (.01 * imgWidth)) {
                xperc += (.15 * xperc);
            };//lets user scroll past right edge of image

            if (y >= (.01 * imgHeight)) {
                yperc += (.15 * yperc);
            };//lets user scroll past bottom edge of image

            style.backgroundPositionX = (xperc - 9) + '%';
            style.backgroundPositionY = (yperc - 9) + '%';

            style.left = (x - 180) + 'px';
            style.top = (y - 180) + 'px';

        }, false);
}();
