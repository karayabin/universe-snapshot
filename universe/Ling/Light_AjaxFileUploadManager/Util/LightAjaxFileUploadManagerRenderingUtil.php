<?php


namespace Ling\Light_AjaxFileUploadManager\Util;


use Ling\Chloroform\Form\Chloroform;

/**
 * The LightAjaxFileUploadManagerRenderingUtil class.
 *
 * This class helps rendering some of the gui parts involved in a file upload system.
 * In this particular class, we assume that the [jsFileUploader](https://github.com/lingtalfi/jsFileUploader) js client is used,
 * and we provide method to help its implementation.
 *
 *
 * We also assume that the [Chloroform](https://github.com/lingtalfi/Chloroform) planet is used to provide the form fields.
 * Last but not least we also assume that [Bootstrap4](https://getbootstrap.com/docs/4.0/getting-started/introduction/) is used.
 *
 *
 */
class LightAjaxFileUploadManagerRenderingUtil
{

    /**
     * This property holds the suffix for this instance.
     * It's the suffix to add to the css ids used by this class.
     * This is mainly useful only if you use the fileUploader plugin multiple times on the same page (i.e. if you have
     * multiple ajax input fields on the same page).
     *
     * @var string=1
     */
    protected $suffix;

    /**
     * Builds the LightAjaxFileUploadManagerRenderingUtil instance.
     */
    public function __construct()
    {
        $this->suffix = "1";
    }

    /**
     * Sets the suffix.
     *
     * @param string $suffix
     */
    public function setSuffix(string $suffix)
    {
        $this->suffix = $suffix;
    }


    /**
     * Prints the javascript code necessary to instantiate a fully configured fileUploader js object.
     *
     *
     * The following options are available:
     * - suffix: string=1,
     *
     *
     * @param string $fieldName
     * @param Chloroform $form
     * @return void
     * @throws \Exception
     */
    public function printJavascript(string $fieldName, Chloroform $form): void
    {
        $suffix = $this->suffix;


        $field = $form->getField($fieldName)->toArray();
        $maxFile = $field["maxFile"];
        if (null === $maxFile) {
            $maxFile = -1;
        }
        $maxFileSize = $field["maxFileSize"];
        if (null === $maxFileSize) {
            $maxFileSize = -1;
        }
        $mimeType = $field["mimeType"];
        $mimeType = json_encode($mimeType);
        $postParams = json_encode($field['postParams']);
        $fieldValue = json_encode($field['value']);

        ?>
        $('#id-fileuploader-input-<?php echo $suffix; ?>').fileUploader({
        defaultValue: <?php echo $fieldValue; ?>,
        useErrorContainer: true,
        useFileVisualizer: true,
        fileVisualizerContainer: $('#id-fileuploader-filevisualizer-<?php echo $suffix; ?>'),
        //
        maxFileSize: <?php echo $maxFileSize; ?>,
        mimeType: <?php echo $mimeType; ?>,

        //
        maxFile: <?php echo $maxFile; ?>,
        useUrlToForm: true,
        urlToFormContainer: $('#id-fileuploader-urltoform-<?php echo $suffix; ?>'),
        urlToFormFieldName: "<?php echo $fieldName; ?>",
        //
        errorContainer: $("#id-fileuploader-error-<?php echo $suffix; ?>"),
        dropzone: $('#id-fileuploader-dropzone-<?php echo $suffix; ?>'),
        serverUrl: "/ajax_file_upload_manager",
        ajaxFormExtraFields: <?php echo $postParams; ?>,
        useProgressHandler: true,
        progressHandlerContainer: $('#id-fileuploader-progress-<?php echo $suffix; ?>')
        });
        <?php
    }


    /**
     * Prints the html field using the given form, and assuming the js file uploader client (aka fileUploader) is used.
     * This also uses the bootstrap4 framework.
     *
     * The available options are:
     * - sizeClass: string=w100 the css class to add to the ".file-uploader-dropzone" element.
     *
     *
     * @param string $fieldName
     * @param Chloroform $form
     * @param array $options
     * @return void
     * @throws \Exception
     */
    public function printField(string $fieldName, Chloroform $form, array $options = []): void
    {

        $sizeClass = $options['sizeClass'] ?? "w100";

        $suffix = $this->suffix;
        $field = $form->getField($fieldName)->toArray();
        ?>
        <div class="form-group">
            <label for="id-fileuploader-input-<?php echo $suffix; ?>"><?php echo $field['label']; ?></label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="id-fileuploader-input-<?php echo $suffix; ?>"
                       name="<?php echo htmlspecialchars($field['htmlName']); ?>"
                       multiple
                >
                <label class="custom-file-label"
                       for="id-fileuploader-input-<?php echo $suffix; ?>">Choose file</label>


            </div>
            <div class="file-uploader-dropzone mt-2" id="id-fileuploader-dropzone-<?php echo $suffix; ?>">Or drop file
            </div>

            <div id="id-fileuploader-progress-<?php echo $suffix; ?>"></div>
            <div id="id-fileuploader-urltoform-<?php echo $suffix; ?>"></div>
            <div id="id-fileuploader-filevisualizer-<?php echo $suffix; ?>"
                 class="file-uploader-filevisualizer <?php echo htmlspecialchars($sizeClass); ?>"></div>

            <div id="id-fileuploader-error-<?php echo $suffix; ?>" class="alert alert-danger mt-2 display-none"
                 role="alert">
                <strong>Oops!</strong> The following errors occurred:
                <ul>
                </ul>
            </div>

        </div>
        <?php
    }

}