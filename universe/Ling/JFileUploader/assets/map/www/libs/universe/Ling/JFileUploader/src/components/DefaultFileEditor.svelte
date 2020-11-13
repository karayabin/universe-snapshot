<script>
    import {afterUpdate, getContext, onMount} from "svelte";
    import {fade} from 'svelte/transition';
    import MyModal from "svelte-mymodal";
    import jsx from "js-extension-ling";
    import Cropper from "cropperjs";
    import DropZoneHandler from "js-dropzone-handler";


    //----------------------------------------
    // PROPS
    //----------------------------------------
    export let isOpen = false;
    export let uFile = {};
    export let title = "FileEditor";
    export let errors = [];


    //----------------------------------------
    // STATE
    //----------------------------------------
    let useOriginalImageChecked = false;
    let stateCpt = 0;


    //----------------------------------------
    // CONTEXT
    //----------------------------------------
    const {
        onCloseFileEditorBtnClicked,
        onFileEditorFileDropped,
        onFileEditorUpdated,
        fileEditorOptions,
    } = getContext("fileUploader");
    const feo = fileEditorOptions;


    //----------------------------------------
    // HTML THEME
    //----------------------------------------
    let styleBtnCancel = 'btn-cancel';
    let styleBtnUpdate = 'btn-update';
    if (true === feo.useBootstrap) {
        styleBtnCancel = 'btn btn-danger mr-2';
        styleBtnUpdate = 'btn btn-success';
    }


    //----------------------------------------
    // OTHER VARS
    //----------------------------------------
    let cssIdCounter = jsx.cssId();
    let isImage = false;
    let initialCropData = null;
    let newDrop = false;
    let originalBlob = null;
    let pendingOriginalBlob = false;


    //----------------------------------------
    // JS LIBS STUFF
    //----------------------------------------
    let jDialog;
    let jSelect;
    let cropper = null;
    let dropZoneHandler = null;


    //----------------------------------------
    // LIFECYCLE
    //----------------------------------------
    afterUpdate(() => {



        if (true === isOpen) {


            jDialog = jQuery(`#file-editor-dialog-${cssIdCounter}`);

            //----------------------------------------
            // TAGS
            //----------------------------------------
            if (true === feo.useTags) {
                jSelect = jQuery(`#id-fileuploader-tags-${cssIdCounter}`);
                let select2Options = {
                    // multiple: true,
                };
                if (feo.availableTags.length > 0) {
                    select2Options.data = _toSelect2Data(feo.availableTags);
                }
                if (true === feo.allowCustomTags) {
                    select2Options["tags"] = true;
                }
                select2Options["maximumSelectionLength"] = feo.nbTagsAllowed;
                jSelect.select2(select2Options);
            }


            //----------------------------------------
            // IMAGE EDITOR
            //----------------------------------------
            isImage = jsx.mimeIsImage(uFile.type);
            if (false === pendingOriginalBlob) {


                if (true === isImage) {


                    setTimeout(() => {


                        let jImageOriginal = jDialog.find('.image-original');
                        if (jImageOriginal.length) {

                            let cropperImgRef = jImageOriginal[0];


                            //----------------------------------------
                            // CROPPER
                            //----------------------------------------

                            let theUrl;
                            if (
                                    true === useOriginalImageChecked &&
                                    null !== originalBlob
                            ) {
                                theUrl = URL.createObjectURL(originalBlob);
                            } else {
                                theUrl = URL.createObjectURL(uFile.file);
                            }

                            cropperImgRef.src = theUrl;
                            let cropperOptions = {
                                preview: '.img-preview',
                                viewMode: 1,
                                autoCropArea: 1,
                                ready() {
                                    initialCropData = cropper.getData();
                                },
                            };


                            cropper = new Cropper(cropperImgRef, cropperOptions);


                            //----------------------------------------
                            // CROPPER TOOLBAR
                            //----------------------------------------
                            jDialog.find('.image-editor-toolbar').off("click").on('click', '[data-method]', function () {
                                var that = jQuery(this);
                                var data = that.data();

                                var cropped;
                                var $target;
                                var result;

                                if (that.prop('disabled') || that.hasClass('disabled')) {
                                    return;
                                }

                                if (cropper && data.method) {
                                    data = jQuery.extend({}, data); // Clone a new one

                                    if (typeof data.target !== 'undefined') {
                                        $target = jQuery(data.target);

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
                                            if (cropped) {
                                                cropper.clear();
                                            }

                                            break;
                                    }

                                    result = cropper[data.method](data.option, data.secondOption);

                                    switch (data.method) {
                                        case 'rotate':
                                            if (cropped) {
                                                cropper.crop();
                                            }

                                            break;

                                        case 'scaleX':
                                        case 'scaleY':
                                            jQuery(this).data('option', -data.option);
                                            break;
                                    }
                                }
                            });
                        }


                    }, 1);
                } else {
                    /**
                     * Required when the user first upload a non image, and then uploads an image again
                     * (otherwise the cropper isn't initialized properly).
                     */
                    destroyCropper();
                }
            }


            //----------------------------------------
            // DROP ZONE
            //----------------------------------------
            if (null === dropZoneHandler) {
                dropZoneHandler = new DropZoneHandler({
                    container: jDialog[0],
                    cssClass: feo.dropzoneOverClass || "dropzone-hover",
                    onDrop: (files) => {
                        useOriginalImageChecked = false;
                        originalBlob = null;
                        onFileEditorFileDropped(uFile, files[0]);
                    },
                });
                dropZoneHandler.start();
            }
        } else {
            destroyCropper();
            dropZoneHandler = null;
        }
    });


    //----------------------------------------
    // FUNCTIONS
    //----------------------------------------
    /**
     * https://select2.org/data-sources/arrays
     */
    function _toSelect2Data(tags) {
        var arr = [];
        for (var i in tags) {
            var tag = tags[i];
            arr.push({
                "id": tag,
                "text": tag,
            })
        }
        return arr;
    }

    function removeError(e) {
        e.target.closest(".file-editor-error").remove();
    }


    function destroyCropper() {
        if (null !== cropper) {
            cropper.destroy();
        }
        cropper = null;
    }

    async function onUpdateBtnClicked() {


        let hasBeenCropped = false;
        if (null !== cropper) {
            hasBeenCropped = (false === jsx.compareObjects(initialCropData, cropper.getData()));
        }


        await onFileEditorUpdated(uFile, await getFileEditorData(), {
            cropped: hasBeenCropped,
            dropped: newDrop,
            original: useOriginalImageChecked,
        });

        if (0 === errors.length) {
            close();
            useOriginalImageChecked = false; // make sure the user opens his files (and not the original) next time he opens the dialog
        }
    }


    function close() {
        originalBlob = null;
        onCloseFileEditorBtnClicked();
    }

    async function getFileEditorData() {


        let ret = {};
        let directory;


        if (true === feo.useDirectory) {
            if (true === feo.directoryCanBeUpdated) {
                directory = jDialog.find(".input-dirname").val();
            } else {
                directory = feo.directory;
            }
            ret.directory = directory;
        }


        ret.name = jDialog.find(".input-basename").val() + "." + jDialog.find(".input-extension").val();


        if (true === feo.usePrivacy) {
            let isPrivate = jsx.toInt(jDialog.find('.input-privacy').prop('checked'));
            ret.is_private = isPrivate;
        }


        if (true === feo.useTags) {
            let tags = jDialog.find('.select-tags').val();
            ret.tags = tags;
        }


        let file = uFile.file;
        if (null !== cropper) {
            file = await getFileEditorBlob(cropper);
        }
        ret.file = file;
        return ret;
    }

    async function getFileEditorBlob(cropper) {
        return new Promise((resolve, reject) => {
            cropper.getCroppedCanvas().toBlob((blob) => {
                resolve(blob);
            });
        });
    }

    async function toggleOriginal(e) {

        destroyCropper();

        if (true === e.target.checked) {
            useOriginalImageChecked = true;
            if (null !== uFile.original_url) {

                if (null === originalBlob) {

                    pendingOriginalBlob = true;


                    let response = await fetch(uFile.original_url).catch(e => {
                        addError("Server error: " + e.message);
                    });
                    if (true === response.ok) {

                        let blob = await response.blob().catch(e => {
                            addError("Blob error: could not convert the url into a blob (" + uFile.original_url + ")");
                        });


                        setTimeout(function () {
                            originalBlob = blob;
                            pendingOriginalBlob = false;
                        }, 1);


                    } else {
                        addError("Server error: " + response.statusText);
                    }
                } else {
                    pendingOriginalBlob = false;
                    stateCpt++;
                }
            }
        } else {
            useOriginalImageChecked = false;
            pendingOriginalBlob = false;
            stateCpt++;
        }

    }

    function addError(errMsg) {
        errors = [...errors, errMsg];
    }


</script>


{#if null !== uFile && true === isOpen}
    <div class="overlay" transition:fade>
        <MyModal open={isOpen} options={{dragHandle: ".header"}}>
            <div class="container file-editor-container" id="file-editor-dialog-{cssIdCounter}">

                <div style="display:none">{stateCpt}</div>
                <div class="header">
                    <span class="title">{title}</span>
                    <span on:click={close} class="close-modal-btn far fa-times-circle"></span>
                </div>

                <div class="body file-editor">


                    <div title="File Editor" class="dialog-file-editor">
                        <div class="file-editor-error-container">
                            {#each errors as errMsg}
                                <div class="file-editor-error">
                                    <span>{@html errMsg}</span>
                                    <span on:click={removeError} class="btn-close-error"><i
                                            class="btn-close-error far fa-window-close"></i></span>
                                </div>
                            {/each}
                        </div>


                        <form action="" method="post">


                            <div class="file-editor-block-1">


                                <div class="control-group control-dirname">


                                    {#if true === feo.useDirectory}
                                        <label for="id-fileuploader-dirname-{cssIdCounter}">Parent dir: </label>
                                        {#if true === feo.directoryCanBeUpdated}
                                            <input id="id-fileuploader-dirname-{cssIdCounter}" type="text"
                                                   name="dirname"
                                                   value={uFile.directory}
                                                   class="input-dirname"/>
                                        {:else}
                                            <span class="element-dirname">{feo.directory}</span>
                                        {/if}
                                    {/if}

                                </div>


                                {#if true === feo.usePrivacy}
                                    <div class="control-group control-privacy">
                                        <label for="id-fileuploader-privacy-{cssIdCounter}">Is private</label>
                                        <input id="id-fileuploader-privacy-{cssIdCounter}" type="checkbox"
                                               name="is_private"
                                               value="1"
                                               class="input-privacy"
                                               checked={jsx.toBool(uFile.is_private)}
                                        />
                                    </div>
                                {/if}


                            </div>


                            <div class="control-group control-filename">

                                <label for="id-fileuploader-filename-{cssIdCounter}">File name</label>

                                <div class="filename-inputs-container">
                                    <input id="id-fileuploader-filename-{cssIdCounter}" type="text" name="basename"
                                           value={jsx.basename(uFile.name, false)}
                                           class="input-basename"/>
                                    <input type="text" name="extension" value={jsx.getFileExtension(uFile.name)}
                                           class="input-extension" disabled={false === feo.fileExtensionCanBeUpdated}/>

                                </div>
                            </div>


                            {#if true === feo.useTags}
                                <div class="control-group control-tags">
                                    <label for="id-fileuploader-tags-{cssIdCounter}">Tags</label>
                                    <select class="select-tags" id="id-fileuploader-tags-{cssIdCounter}" name="tags[]"
                                            multiple>
                                        {#each uFile.tags as tag}
                                            <option value={tag} selected="selected">{tag}</option>
                                        {/each}
                                    </select>
                                </div>
                            {/if}


                            {#if true === feo.useImageEditor && true === isImage}
                                <div class="control-group image-editor-container">
                                    <div class="image-editor-header">
                                        <div>Image Editor</div>
                                        {#if true === feo.useKeepOriginalImage && null !== uFile.original_url}
                                            <div class="control-original-toggle">
                                                <label for="id-fileuploader-original-toggle-{cssIdCounter}">Use original
                                                    image</label>
                                                <input id="id-fileuploader-original-toggle-{cssIdCounter}"
                                                       type="checkbox" value="1"
                                                       on:change={toggleOriginal}
                                                       checked={useOriginalImageChecked}
                                                       class="input-original-toggle"/>
                                            </div>
                                        {/if}
                                    </div>


                                    <div class="image-editor-body">

                                        {#if true === uFile.is_loading || true === pendingOriginalBlob}
                                            <div class="left">
                                                <div class="img-container is-loading">
                                                    <div class="spinner">
                                                        <i class="fas fa-cog fa-spin fa-5x"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        {:else}
                                            <div class="left">

                                                <div class="img-container">
                                                    <img
                                                            class="image-original" src=""
                                                            alt="Canvas for the cropper editor">
                                                </div>


                                                <div class="image-editor-toolbar">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary" data-method="zoom"
                                                                data-option="0.1"
                                                                title="Zoom In">
                                                            <span class="fa fa-search-plus"></span>
                                                        </button>
                                                        <button type="button" class="btn btn-primary" data-method="zoom"
                                                                data-option="-0.1"
                                                                title="Zoom Out">
                                                            <span class="fa fa-search-minus"></span>
                                                        </button>
                                                    </div>

                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary"
                                                                data-method="rotate"
                                                                data-option="-45"
                                                                title="Rotate Left">
                                                            <span class="fa fa-undo-alt"></span>
                                                        </button>

                                                        <button type="button" class="btn btn-primary"
                                                                data-method="rotate"
                                                                data-option="45"
                                                                title="Rotate Right">
                                                            <span class="fa fa-redo-alt"></span>
                                                        </button>
                                                    </div>

                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary"
                                                                data-method="scaleX"
                                                                data-option="-1"
                                                                title="Flip Horizontal">
                                                            <span class="fa fa-arrows-alt-h"></span>
                                                        </button>

                                                        <button type="button" class="btn btn-primary"
                                                                data-method="scaleY"
                                                                data-option="-1"
                                                                title="Flip Vertical">
                                                            <span class="fa fa-arrows-alt-v"></span>
                                                        </button>
                                                    </div>

                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary"
                                                                data-method="reset"
                                                                title="Reset">
                                                            <span class="fa fa-sync-alt"></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="img-preview-container">
                                                <div class="img-preview preview-lg"></div>
                                            </div>
                                        {/if}
                                    </div>


                                </div>
                            {/if}
                        </form>


                        <div class="buttons-bar">


                            {#if
                            true === uFile.is_loading &&
                            false === (true === feo.useImageEditor && true === isImage)
                            }
                                <div class="spinner">
                                    <i class="fas fa-circle-notch fa-spin fa-2x"></i>
                                </div>
                            {/if}
                            <div class="progress-bar" class:show={uFile.progress > 0 && uFile.progress < 100}>
                                Uploading... {uFile.progress}%
                            </div>
                            <button on:click|preventDefault={close} class={styleBtnCancel}>Cancel</button>
                            <button on:click|preventDefault={onUpdateBtnClicked} class={styleBtnUpdate}>Update</button>
                        </div>

                    </div>


                </div>
            </div>
        </MyModal>
    </div>
{/if}


<style type="text/sass" lang="scss">


    $errorColor: #cd0a0a;


    :global(.file-editor-container.dropzone-hover) {
        background-color: #f3f7ff !important;
    }


    .overlay {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.2);
        z-index: 1000000000; // move over the text items
    }

    .container {
        min-width: 60%;
        width: 60%;
        margin: 0 auto;
        margin-top: 10px;
        padding: 10px;
        border: 1px solid #fafafa;
        background-color: white;


        .header {
            background: #ddd;
            cursor: move;
            padding: 6px;
            display: flex;

            .close-modal-btn {
                cursor: pointer;
                margin-left: auto;
            }
        }


        .file-editor {


            .file-editor-error-container {

                .file-editor-error {

                    color: white;
                    padding: 10px;
                    border: 1px solid $errorColor;
                    background: $errorColor;
                    margin-bottom: 2px;

                    position: relative;

                    .btn-close-error {

                        position: absolute;
                        top: 3px;
                        right: 4px;

                        cursor: pointer;

                    }

                }

            }

            .file-editor-block-1 {

                display: flex;


                .control-privacy {

                    margin-left: auto;

                }

            }


            .control-group {

                margin-bottom: 0px;
                border-bottom: 1px solid #fdfdfd;
                padding-bottom: 10px;
                padding-top: 10px;


                &.control-basename, &.control-tags {

                    display: flex;

                    align-items: baseline;

                    label {
                        margin-right: 5px;

                        white-space: nowrap;

                    }

                }

                &.control-tags {

                    align-items: flex-end;

                }


                &.control-dirname {

                    display: flex;
                    flex: 1;

                    align-items: baseline;

                    .input-dirname {
                        flex: 1;
                        margin-right: 10px;

                    }

                    .element-dirname {
                        background: #ececec;
                        padding: 5px;

                    }

                }


                .filename-inputs-container {

                    display: flex;
                    width: 100%;

                    box-sizing: border-box;

                    .input-basename, .input-filename {
                        flex: 1;
                        margin-top: 7px;

                    }


                    .input-extension {
                        width: 50px;
                        margin-top: 7px;

                    }

                }


                &.control-tags {

                    label {

                        display: block;
                        margin-bottom: 10px;

                    }

                    .select-tags {

                        display: block;
                        width: 100%;

                    }

                }

            }


            //.img-container {
            //  /* Never limit the container height here */
            //  max-width: 100%;
            //}
            //
            //.img-container img {
            //  /* This is important */
            //  width: 100%;
            //}


            .image-editor-container {
                margin-top: 10px;
                padding-top: 0px;
                padding-bottom: 0px;

            }

            .image-editor-header {
                display: flex;

                .control-original-toggle {
                    margin-left: auto;
                }
            }

            .image-editor-body {
                display: flex;

                .left {
                    flex: 1;
                }
            }

            .img-container {
                margin-top: 10px;
                margin-bottom: 0px;
                max-height: 497px;
                min-height: 200px;

                & > img {
                    max-width: 100%;
                    max-height: 290px;

                }

                &.is-loading {
                    display: flex;
                    justify-content: center;
                    align-items: center;

                    i {
                        color: #a9bcea;
                    }

                }

            }

            @media (min-width: 768px) {

                .img-container {
                    min-height: 300px;

                }
            }


            .image-editor-toolbar {

                display: flex;

                flex-wrap: wrap;
                background: #d9d9d9;
                padding: 10px;

                justify-content: flex-start;


                button {
                    padding: 6px 4px 4px 4px;
                    border-radius: 7px;
                    border-color: #ececec;

                }

            }


            .img-preview-container {
                margin-top: 10px;
                width: 100px;
                display: flex;

                justify-content: center;

                .img-preview {

                    float: left;
                    margin-bottom: .5rem;
                    margin-right: .5rem;
                    border: 1px solid #ccc;

                    overflow: hidden;

                    &.preview-lg {
                        height: 9rem;
                        width: 16rem;

                    }

                    & > img {
                        max-width: 100%;

                    }

                }

            }


            @media (min-width: 768px) {

                .img-preview-container {
                    width: 250px;

                }
            }


            .buttons-bar {
                text-align: right;
                padding: 20px;
                display: flex;
                justify-content: flex-end;
                align-items: center;

                button {
                    padding: 10px;
                    font-size: 1.5em;
                    cursor: pointer;
                }


                .btn-cancel {
                    background: #f4dada;
                }

                .btn-update {
                    background: #8bf27c;
                }

                .spinner {
                    margin-right: 10px;

                    i {
                        color: #8e8e8e;
                    }
                }

                .progress-bar {
                    display: none;
                    font-size: 1.4em;
                    color: #b30f0f;
                    margin-right: 30px;
                    padding: 20px;
                    position: static;
                    overflow: hidden;
                    animation: loadingShimmer 2s linear;
                    animation-iteration-count: infinite;
                    background-color: #fff;
                    background-image: linear-gradient(to right, rgba(0, 0, 0, 0.03) 0, rgba(0, 0, 0, 0.1) 50%, rgba(0, 0, 0, 0.03) 60%) !important;
                    background-size: 1200px 100% !important;

                    &.show {
                        display: block;
                    }
                }


                @keyframes loadingShimmer {
                    0% {
                        background-position: -1200px 0
                    }
                    100% {
                        background-position: 1200px 0
                    }
                }

            }


            .the-submit-button {
                background: #0064ff;

                color: white;

            }

            .fileeditor-uploader-progress {

                display: none;

                background: transparent;
                color: #333;

                border: none;
                cursor: default !important;

                &:active {

                    background: transparent;
                    color: #333;

                }

            }

        }
    }

</style>