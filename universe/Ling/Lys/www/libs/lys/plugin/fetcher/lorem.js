(function () {


    //------------------------------------------------------------------------------/
    // LOREM FETCHER
    //------------------------------------------------------------------------------/
    /**
     * Returns lorem content to make tests.
     */
    window.LysFetcherLorem = function (options) {
        this.d = Lys.extend({
            /**
             * How many micro seconds before returning the result
             */
            delay: 0,
        }, options);
    };

    LysFetcherLorem.prototype = {
        init: function (lys) {

            var zis = this;

            lys.on('needData', function (id) {
                setTimeout(function () {
                    lys.trigger('dataReady', id, getLorem());
                }, zis.d.delay);

            });
        },
    };


    var data = [
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lobortis consequat molestie. Mauris porta consectetur odio, ac auctor nisl hendrerit faucibus. Integer porta turpis magna, ac mollis ipsum efficitur id. Integer ultricies lacus quis rutrum vulputate. Sed velit sapien, sodales et velit vel, suscipit interdum ante. Proin tempus, urna nec tempor elementum, mauris massa molestie eros, sed varius ex risus in mi. Proin in lorem auctor, iaculis justo ac, elementum lorem. Cras quis neque vitae leo rutrum ultricies vel at libero. Nullam vulputate felis sapien, in placerat lectus venenatis et. Sed lacinia commodo scelerisque. Donec tempus nulla scelerisque fringilla gravida. Cras mollis vehicula pellentesque. In accumsan pharetra enim quis laoreet.',
        'Quisque mattis dui ut orci tincidunt imperdiet. In aliquam commodo efficitur. Nulla vel sagittis arcu. Integer consectetur, quam quis congue efficitur, dolor orci ullamcorper neque, sed suscipit elit ligula nec nisi. Donec est diam, venenatis eu sapien in, ultrices ultricies mauris. In quis justo at velit consectetur posuere vel vel nulla. Cras leo lectus, tincidunt sed egestas vitae, finibus nec mauris. Nullam a hendrerit nibh.',
        'Morbi sed pellentesque neque. Nulla dictum consequat aliquam. Proin et metus massa. Etiam fermentum in sem sed sagittis. Praesent ante est, finibus in turpis vulputate, convallis maximus odio. Morbi in nisi molestie, tristique leo at, pharetra nunc. Nunc viverra, dui ornare ullamcorper tincidunt, elit ante luctus quam, auctor dapibus sapien arcu eleifend ligula. Sed hendrerit consectetur lacus sed consequat. Fusce urna velit, tristique quis nunc quis, pretium auctor neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam id molestie purus. Curabitur egestas iaculis felis ut viverra. Nullam et elementum leo, varius fermentum sapien. Nullam nec mi purus. Etiam eu nulla eget tellus dictum congue vitae eu velit.',
        'Curabitur eu nibh neque. Vestibulum lacus arcu, varius eget tristique egestas, vestibulum non ante. Praesent volutpat dolor arcu, id egestas libero porta ac. Curabitur malesuada, turpis in bibendum rutrum, arcu mi pretium lectus, vitae fringilla odio ante in felis. Nunc at mi et odio mollis facilisis. Nam sollicitudin ante non molestie iaculis. Fusce ac tincidunt neque. Vestibulum non placerat diam. Nam quis neque elit. Phasellus non condimentum erat. Cras commodo suscipit nulla eget auctor. Morbi eu erat nec tellus bibendum rhoncus at et ante. Suspendisse tempor feugiat tincidunt.',
        'Pellentesque a purus quis tortor placerat hendrerit. Maecenas dui enim, laoreet tincidunt massa eget, bibendum hendrerit est. Aliquam nec dictum ante, nec viverra lacus. Ut vestibulum ex non urna varius interdum. Quisque pharetra enim ipsum, commodo fringilla tellus blandit vitae. Nam felis augue, blandit in erat et, volutpat sodales risus. Nulla id lobortis est. Maecenas maximus risus at aliquet mattis. Cras quis ornare mi. Phasellus nec malesuada est. Vestibulum massa lorem, gravida non dui id, venenatis volutpat metus. Pellentesque mollis leo eget nisi pellentesque maximus. Aliquam tincidunt turpis nec eros semper tristique. Aenean sollicitudin diam est, dignissim dignissim diam commodo quis.',
    ];

    function getLorem() {
        return data[getRandomInt(0, data.length - 1)];
    }

    function getRandomInt(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }


})();