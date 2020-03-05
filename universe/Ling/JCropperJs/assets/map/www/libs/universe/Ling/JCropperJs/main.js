$(function () {
    'use strict';

    $(document).ready(function () {


        var console = window.console || {
            log: function () {
            }
        };
        var URL = window.URL || window.webkitURL;
        var $image = $('#image');
        var $download = $('#download');
        var $dataX = $('#dataX');
        var $dataY = $('#dataY');
        var $dataHeight = $('#dataHeight');
        var $dataWidth = $('#dataWidth');
        var $dataRotate = $('#dataRotate');
        var $dataScaleX = $('#dataScaleX');
        var $dataScaleY = $('#dataScaleY');
        var options = {
            // aspectRatio: 16 / 9,
            preview: '.img-preview',
            crop: function (e) {
                $dataX.val(Math.round(e.detail.x));
                $dataY.val(Math.round(e.detail.y));
                $dataHeight.val(Math.round(e.detail.height));
                $dataWidth.val(Math.round(e.detail.width));
                $dataRotate.val(e.detail.rotate);
                $dataScaleX.val(e.detail.scaleX);
                $dataScaleY.val(e.detail.scaleY);
            }
        };
        var originalImageURL = $image.attr('src');
        var uploadedImageName = 'cropped.jpg';
        var uploadedImageType = 'image/jpeg';
        var uploadedImageURL;


        // Cropper
        $image.on({
            ready: function (e) {
                console.log("type: ready", e);
            },
            cropstart: function (e) {
                console.log("type: cropstart", e);
                // console.log(e.type, e.detail.action);
            },
            cropmove: function (e) {
                console.log("type: cropmove", e);
                // console.log(e.type, e.detail.action);
            },
            cropend: function (e) {
                console.log("type: cropend", e, e.detail.action);
                // console.log(e.type, e.detail.action);
            },
            crop: function (e) {
                console.log("type: crop", e);
            },
            zoom: function (e) {
                console.log("type: zoom", e);
                // console.log(e.type, e.detail.ratio);
            }
        }).cropper(options);


        $('.the-submit-button').on('click', function () {
            var cropper = $image.data('cropper');
            var data = cropper.getData();

            // use php to crop the image
            // $.post('/libs/cropperjs/cropper.php', {
            //     data: data
            // }, function (response) {
            //     console.log(response);
            // });


            // or send the cropped image directly
            cropper.getCroppedCanvas().toBlob(function (blob) {
                var formData = new FormData();

                formData.append('croppedImage', blob);

                $.ajax('/libs/cropperjs/cropper2.php', {
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function () {
                        console.log('Upload success');
                    },
                    error: function () {
                        console.log('Upload error');
                    }
                });
            }/* , 'image/jpeg' */);


            return false;
        });


        var compatibilityErrors = [];


        if (!$.isFunction(document.createElement('canvas').getContext)) {
            compatibilityErrors.push('canvas not supported');
        }


        // Methods
        $('.image-editor-toolbar').on('click', '[data-method]', function () {
            var $this = $(this);
            var data = $this.data();
            var cropper = $image.data('cropper');
            var cropped;
            var $target;
            var result;

            if ($this.prop('disabled') || $this.hasClass('disabled')) {
                return;
            }

            if (cropper && data.method) {
                data = $.extend({}, data); // Clone a new one

                if (typeof data.target !== 'undefined') {
                    $target = $(data.target);

                    if (typeof data.option === 'undefined') {
                        try {
                            data.option = JSON.parse($target.val());
                        } catch (e) {
                            console.log(e.message);
                        }
                    }
                }

                cropped = cropper.cropped;

                switch (data.method) {
                    case 'rotate':
                        if (cropped && options.viewMode > 0) {
                            $image.cropper('clear');
                        }

                        break;
                }

                result = $image.cropper(data.method, data.option, data.secondOption);

                switch (data.method) {
                    case 'rotate':
                        if (cropped && options.viewMode > 0) {
                            $image.cropper('crop');
                        }

                        break;

                    case 'scaleX':
                    case 'scaleY':
                        $(this).data('option', -data.option);
                        break;
                }

                if ($.isPlainObject(result) && $target) {
                    try {
                        $target.val(JSON.stringify(result));
                    } catch (e) {
                        console.log(e.message);
                    }
                }
            }
        });
    });
});
