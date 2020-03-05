<?php


namespace Ling\Light_AjaxFileUploadManager\Util;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_HtmlPageCopilot\Service\LightHtmlPageCopilotService;

/**
 * The LightAjaxFileUploadManagerRenderingUtil class.
 *
 * This class helps rendering some of the gui parts involved in a file upload system.
 * In this particular class, we assume that the [jFileUploader](https://github.com/lingtalfi/jFileUploader) js client is used,
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
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * Builds the LightAjaxFileUploadManagerRenderingUtil instance.
     */
    public function __construct()
    {
        $this->suffix = "1";
        $this->container = null;
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
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


    /**
     * Prints the javascript code necessary to instantiate a fully configured fileUploader js object.
     *
     *
     * The following options are available:
     * - suffix: string=1,
     *
     *
     * @param array $field
     * @return void
     * @throws \Exception
     */
    public function printJavascript(array $field): void
    {


        /**
         * @var $copilot LightHtmlPageCopilotService
         */
        $copilot = $this->container->get("html_page_copilot");
        $copilot->registerLibrary("jFileUploader", [
            "/libs/universe/Ling/JFileUploader/fileuploader.js",
        ], [
            "/libs/universe/Ling/JFileUploader/fileuploader.css",
        ]);

        $suffix = $this->suffix;
        $fieldName = $field['id'];
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
     * Prints the html field using the given field array, and assuming the js file uploader client (https://github.com/lingtalfi/jFileUploader) is used.
     * This also uses the bootstrap4 framework.
     *
     * The available options are:
     * - sizeClass: string=w100 the css class to add to the ".file-uploader-dropzone" element.
     *
     *
     * @param array $field
     * @param array $options
     * @return void
     * @throws \Exception
     */
    public function printField(array $field, array $options = []): void
    {

        $sizeClass = $options['sizeClass'] ?? "w100";

        $suffix = $this->suffix;
        ?>
        <div class="form-group">
            <label for="id-fileuploader-input-<?php echo $suffix; ?>"><?php echo $field['label']; ?></label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="id-fileuploader-input-<?php echo $suffix; ?>"
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

            <div id="id-fileuploader-error-<?php echo $suffix; ?>" class="alert alert-danger mt-2" style="display: none"
                 role="alert">
                <strong>Oops!</strong> The following errors occurred:
                <ul>
                </ul>
            </div>

        </div>
        <?php
    }

}