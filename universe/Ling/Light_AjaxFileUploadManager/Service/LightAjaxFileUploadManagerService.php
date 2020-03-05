<?php


namespace Ling\Light_AjaxFileUploadManager\Service;

use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\ArrayTool;
use Ling\Bat\CaseTool;
use Ling\Bat\ConvertTool;
use Ling\Bat\FileSystemTool;
use Ling\Bat\FileTool;
use Ling\Bat\HashTool;
use Ling\Bat\MimeTypeTool;
use Ling\Bat\SmartCodeTool;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_AjaxFileUploadManager\Exception\LightAjaxFileUploadManagerException;
use Ling\Light_CsrfSession\Service\LightCsrfSessionService;
use Ling\Light_Database\LightDatabasePdoWrapper;
use Ling\Light_UserData\Service\LightUserDataService;
use Ling\Light_UserManager\UserManager\LightUserManagerInterface;
use Ling\ThumbnailTools\ThumbnailTool;

/**
 * The LightAjaxFileUploadManagerService class.
 */
class LightAjaxFileUploadManagerService
{
    /**
     * This property holds the items for this instance.
     * It's an array of id => item.
     * See the @page(Light_AjaxFileUploadManager documentation page) for more details about the item structure.
     *
     * @var array
     */
    protected $items;


    /**
     * This property holds the applicationDir for this instance.
     * @var string
     */
    protected $applicationDir;


    /**
     * This property holds the container for this instance.
     * Note: this property is only required for certain actions, such as db_update.
     * However, it's recommended to always instantiate the service with the container, just in case.
     *
     * @var LightServiceContainerInterface
     *
     */
    protected $container;


    /**
     * Builds the LightAjaxFileUploadManagerService instance.
     */
    public function __construct()
    {
        $this->applicationDir = null;
        $this->items = [];
        $this->container = null;
    }

    /**
     * Sets the applicationDir.
     *
     * @param string $applicationDir
     */
    public function setApplicationDir(string $applicationDir)
    {
        $this->applicationDir = $applicationDir;
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
     * Registers a @page(configuration item) with the given id.
     *
     *
     * @param string $id
     * @param array $item
     */
    public function setItem(string $id, array $item)
    {
        $this->items[$id] = $item;
    }


    /**
     * Adds the @page(configuration items) found in the given @page(babyYaml) file.
     *
     *
     * @param string $file
     */
    public function addConfigurationItemsByFile(string $file)
    {
        $data = BabyYamlUtil::readFile($file);
        $items = $data['items'] ?? [];
        foreach ($items as $id => $confItem) {
            $this->setItem($id, $confItem);
        }
    }

    /**
     * This method implements step 1 and 2 of the @page(ajax file upload protocol)
     * and tries to upload the given phpFileItem to the backend server,
     * and return the json array in the form of a php array.
     *
     * The phpFileItem is either a regular php $_FILES item with the following structure:
     * - name
     * - type
     * - tmp_name
     * - error
     * - size
     * Or phpFileItem can be null, if it's not used by the action defined by the given id.
     *
     *
     * The id is the identifier of an @page(action list) to execute on the uploaded file.
     *
     * The params array contains the following parameters (all of which are optional):
     * - csrf_token: string, the csrf token to match with
     *
     *
     * Note: if the service is poorly configured, it will return an error response with
     * a bad configuration error message.
     *
     * The philosophy of this method is to catch all exceptions and convert them to an error message.
     * This means the regular way of creating an error from inside the method is to throw an exception.
     *
     *
     * @param string $id
     * @param array|null $phpFileItem
     * @param array $params
     * @return array
     * @throws \Exception
     */
    public function processItem(string $id, array $phpFileItem = null, array $params = []): array
    {


        if (false === array_key_exists($id, $this->items)) {
            throw new LightAjaxFileUploadManagerException("Configuration item not found with id \"$id\".");
        }

        $confItem = $this->items[$id];
        $useCsrfToken = $confItem['csrf_token'] ?? true;


        //--------------------------------------------
        // CSRF VALIDATION FIRST
        //--------------------------------------------
        if (true === $useCsrfToken) {

            if (array_key_exists("csrf_token", $params)) {

                /**
                 * @var $csrfService LightCsrfSessionService
                 */
                $csrfService = $this->container->get("csrf_session");
                $tokenValue = $params['csrf_token'];
                if (false === $csrfService->isValid($tokenValue)) {
                    $ret = [
                        "type" => "error",
                        "error" => "Request denied: CSRF token invalid.",
                    ];
                    goto end;
                }
            } else {
                throw new LightAjaxFileUploadManagerException("Configuration item with id \"$id\" requires csrf validation, yet the csrf_token property was not found in the \$_POST array.");
            }
        }


        //--------------------------------------------
        // NOW FILE VALIDATION
        //--------------------------------------------
        if (null !== $this->applicationDir) {
            if (is_dir($this->applicationDir)) {


                $actionList = $confItem['action'] ?? [];

                // ensuring that we work with a valid php file item
                $props = [
                    "name" => null,
                    "type" => null,
                    "tmp_name" => null,
                    "error" => null,
                    "size" => null,
                ];


                //--------------------------------------------
                // PHP FILE ITEM VALIDATION
                //--------------------------------------------

                if (null !== $phpFileItem) {
                    $phpFileItem = array_intersect_key($phpFileItem, $props);
                    if (5 === count($phpFileItem)) {

                        if (true === is_uploaded_file($phpFileItem['tmp_name'])) {

                            if (0 === (int)$phpFileItem['error']) {
                                if (0 !== (int)$phpFileItem['size']) {

                                    //--------------------------------------------
                                    // VALIDATION RULES TESTING
                                    //--------------------------------------------
                                    $validationRules = $confItem['validation'] ?? [];
                                    if ($validationRules) {

                                        $errorMessage = null;
                                        $isValid = true;
                                        foreach ($validationRules as $name => $param) {
                                            if (false === $this->validatePhpFileItem($name, $param, $phpFileItem, $errorMessage)) {
                                                $isValid = false;
                                                break;
                                            }
                                        }
                                        if (false === $isValid) {
                                            $ret = [
                                                "type" => "error",
                                                "error" => $errorMessage,
                                            ];
                                            goto end;
                                        }
                                    }
                                } else {
                                    throw new LightAjaxFileUploadManagerException("Upload error: the file " . $phpFileItem['name'] . " returned a size of 0, which is not allowed by this service.");
                                }
                            } else {
                                throw new LightAjaxFileUploadManagerException("Upload error: the file " . $phpFileItem['name'] . " returned the php error: " . $phpFileItem['error']);
                            }

                        } else {
                            throw new LightAjaxFileUploadManagerException("Security violation error: this file was not uploaded via HTTP POST.");
                        }

                    } else {
                        $c = count($phpFileItem);
                        throw new LightAjaxFileUploadManagerException("Invalid php file item passed with $c elements (5 were expected).");
                    }

                }


                //--------------------------------------------
                // EXECUTING THE ACTIONS
                //--------------------------------------------
                $successArray = null;
                foreach ($actionList as $action) {
                    $return = $this->executeAction($action, $phpFileItem, $params, $id);
                    if (null !== $return) {
                        $successArray = $return;
                    }
                }


                if (null !== $successArray) {
                    $ret = array_merge([
                        "type" => "success",
                    ], $successArray);
                } else {
                    throw new LightAjaxFileUploadManagerException("Bad configuration error: no action associated with id $id returned a path.");
                }


            } else {
                throw new LightAjaxFileUploadManagerException("Error: the applicationDir is not an existing directory ($this->applicationDir).");
            }
        } else {
            throw new LightAjaxFileUploadManagerException("Bad configuration error: the applicationDir property cannot be null.");
        }


        end:
        return $ret;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Check whether the given phpFileItem is valid according to the given rule name and parameter,
     * and return a boolean result.
     * If the file item is not valid, the error message is set to explain the cause of the validation problem.
     *
     *
     * @param string $validationRuleName
     * @param mixed $parameter
     * @param array $phpFileItem
     * A valid php $_FILES item.
     * @param string|null $errorMessage
     * @return bool
     * @throws \Exception
     */
    protected function validatePhpFileItem(string $validationRuleName, $parameter, array $phpFileItem, string &$errorMessage = null): bool
    {
        $fileName = $phpFileItem['name'];
        switch ($validationRuleName) {
            case "maxFileSize":
                $maxFileSize = ConvertTool::convertHumanSizeToBytes($parameter);
                $fileSize = $phpFileItem['size'];
                if ($fileSize > $maxFileSize) {
                    $maxFileSizeHuman = ConvertTool::convertBytes($maxFileSize, "h");
                    $fileHumanWeight = ConvertTool::convertBytes($fileSize, "h");
                    $errorMessage = "Validation error: the file $fileName is too big. The maximum file size allowed is $maxFileSizeHuman (The uploaded file weighted $fileHumanWeight).";
                    return false;
                }

                break;
            case "mimeType":
                $allowedMimeTypes = $parameter;
                if (false === is_array($allowedMimeTypes)) {
                    $allowedMimeTypes = [$allowedMimeTypes];
                }


                $fileMimeType = MimeTypeTool::getMimeType($phpFileItem['tmp_name']);

                if (false === in_array($fileMimeType, $allowedMimeTypes, true)) {
                    $sList = implode(", ", $allowedMimeTypes);
                    $errorMessage = "Validation error: the file $fileName doesn't have an accepted mime type. The allowed mime types are $sList. But the file had a mime type of $fileMimeType.";
                    return false;
                }

                break;
            case "extensions":
                $allowedExtensions = $parameter;
                if (false === is_array($allowedExtensions)) {
                    $allowedExtensions = [$allowedExtensions];
                }

                $fileExt = strtolower(FileSystemTool::getFileExtension($phpFileItem['name']));

                if (false === in_array($fileExt, $allowedExtensions, true)) {
                    $sList = implode(", ", $allowedExtensions);
                    $errorMessage = "Validation error: the file $fileName doesn't have an accepted file extension. The allowed file extensions are $sList.";
                    return false;
                }

                break;
//            case "maxFileNameLength":
//                $maxFileNameLength = (int)$parameter;
//                $fileLength = strlen($phpFileItem['name']);
//                if ($fileLength > $maxFileNameLength) {
//                    $errorMessage = "Validation error: the filename \"$fileName\" contains too many characters. The maximum number of characters allowed is $maxFileNameLength (The uploaded filename has $fileLength).";
//                    return false;
//                }
//
//                break;
            default:
                throw new LightAjaxFileUploadManagerException("Unknown validation rule: $validationRuleName (with file name=$fileName).");
                break;
        }
        return true;
    }

    /**
     * Executes the action array on the file which path is given,
     * and returns an array of successful information in case of success.
     *
     * Usually, the returned array contains the url (absolute, relative or even starting with http:// or https://),
     * but it depends on the configuration of the given action.
     *
     * In case of failure, this method throws an exception.
     *
     *
     * The action array is defined in more details in the @page(action list) page.
     *
     *
     * @param array $action
     * @param array|null $phpFileItem
     * A valid php $_FILES item.
     *
     * @param array $params
     * @param string $actionId
     * The action id. This is used for debugging purposes.
     *
     * @return array|null
     * @throws \Exception
     */
    protected function executeAction(array $action, $phpFileItem, array $params, string $actionId): ?array
    {


        $ret = null;


        //--------------------------------------------
        // USING THE OLD STORE DIR TECHNIQUE
        //--------------------------------------------
        if (array_key_exists('storeDir', $action)) {
            if (null === $phpFileItem) {
                throw new LightAjaxFileUploadManagerException("Invalid phpFileItem given with \"storeDir\" action.");
            }

            //--------------------------------------------
            // NAME TRANSFORM
            //--------------------------------------------
            $name = $phpFileItem['name'];
            if (array_key_exists('nameTransformer', $action)) {
                $name = $this->getTransformedName($name, $action['nameTransformer']);
            }

            $successfulCopy = false;

            $isReturnedPath = $action['isReturnedPath'] ?? true;
            $storeDir = $action['storeDir']; // assuming it's a string
            if ("/" !== substr($storeDir, 0, 1)) {
                $storeDir = $this->applicationDir . "/" . $storeDir;
            }


            //--------------------------------------------
            // IMAGE TRANSFORM
            //--------------------------------------------
            $copyPathAbsolute = $storeDir . "/" . $name;
            $hasBeenResized = false;
            $fileTmpPath = $phpFileItem['tmp_name'];
            if (true === FileTool::isImage($fileTmpPath)) {
                if (array_key_exists("imageTransformer", $action)) {
                    /**
                     * Note: any successful image transformation leads to its own copy of the uploaded file.
                     * Hence if we transform the image, we don't need to make the copy (in the next code block).
                     */
                    if (true === $this->transformImage($fileTmpPath, $copyPathAbsolute, $action['imageTransformer'], $phpFileItem['name'])) {
                        $successfulCopy = true;
                    }

                }
            }


            //--------------------------------------------
            // COPY OF THE FILE
            //--------------------------------------------
            // copy the file to the server if necessary
            if (false === $hasBeenResized) {
                $copyDirAbsolute = dirname($copyPathAbsolute);
                FileSystemTool::mkdir($copyDirAbsolute);

                if (true === move_uploaded_file($fileTmpPath, $copyPathAbsolute)) {
                    $successfulCopy = true;
                } else {
                    throw new LightAjaxFileUploadManagerException("move_uploaded_file error: couldn't move the file to the server (file name=" . $phpFileItem['name'] . ").");
                }
            }


            //--------------------------------------------
            // RETURN THE URL TO THIS FILE
            //--------------------------------------------
            if (true === $successfulCopy && true === $isReturnedPath) {
                if (array_key_exists('returnUrlDir', $action)) {
                    $returnUrlDir = $action['returnUrlDir'];
                    $ret = $returnUrlDir . "/" . $name;

                    if (array_key_exists("db_update", $action)) {
                        if (ArrayTool::arrayKeyExistAll(['table', 'column', 'where'], $action['db_update'])) {

                            /**
                             * @var $db LightDatabasePdoWrapper
                             */
                            $db = $this->container->get("database");

                            $table = $action['db_update']['table'];
                            $column = $action['db_update']['column'];
                            $where = $action['db_update']['where'];

                            $userManager = null;


                            array_walk_recursive($where, function (&$v) use (&$userManager) {
                                if ('$userIdentifier' === $v) {
                                    if (null === $userManager) {
                                        /**
                                         * @var $userManager LightUserManagerInterface
                                         */
                                        $userManager = $this->container->get("user_manager");
                                    }
                                    $user = $userManager->getUser();
                                    $v = $user->getIdentifier();
                                } elseif ('$userId' === $v) {
                                    if (null === $userManager) {
                                        /**
                                         * @var $userManager LightUserManagerInterface
                                         */
                                        $userManager = $this->container->get("user_manager");
                                    }
                                    $user = $userManager->getUser();
                                    /**
                                     * Note: the developer calling this action must make sure that the user has a getId method.
                                     * This class just calls the method without knowing if it actually exists.
                                     *
                                     * Note2: this usually depends on your application, for instance if your app uses a WebsiteLightUser,
                                     * this will work because the WebsiteLightUser has a getId method.
                                     *
                                     * For more info about the WebsiteLightUser: https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser.md
                                     *
                                     *
                                     */
                                    $v = $user->getId();
                                }
                            });


                            $db->update($table, [
                                $column => $ret,
                            ], $where);


                        } else {
                            throw new LightAjaxFileUploadManagerException("Bad configuration error: the db_update array must contain all the following keys: table, column, where. File name was " . $phpFileItem['name'] . ", action id=" . $actionId . ".");
                        }
                    }


                } else {
                    throw new LightAjaxFileUploadManagerException("Bad configuration error: in the action you have defined storeDir, and isReturnedPath=true,  but returnUrlDir is undefined (file name=" . $phpFileItem['name'] . ").");
                }
            }
        } elseif (array_key_exists("use_Light_UserData", $action) && true === $action['use_Light_UserData']) {


            /**
             * @var $userDataService LightUserDataService
             */
            $userDataService = $this->container->get("user_data");


            $protocol = $action['protocol'] ?? null;
            $useFileEditor = ("fileEditor" === $protocol);


            if (true === $useFileEditor) {
                $fileEditorAction = $params['action'] ?? "add";
                if ('remove' === $fileEditorAction) {

                    if (false === array_key_exists("url", $params)) {
                        throw new LightAjaxFileUploadManagerException("Missing parameter \"url\" for fileEditor.remove action.");
                    }

                    $url = $params['url'];
                    $userDataService->removeResourceByUrl($url);
                    return [
                        "ok" => "1",
                    ];
                }
            }


            //--------------------------------------------
            // ACTION VALIDATION
            //--------------------------------------------
            if (
                array_key_exists("maxFileNameLength", $action) &&
                array_key_exists("filename", $params)
            ) {
                $name = $params['filename'];
                $maxLen = $action['maxFileNameLength'];
                $nameLen = strlen($name);
                if ($nameLen > $maxLen) {
                    throw new LightAjaxFileUploadManagerException("File name too long ($name). Maximum of $maxLen characters allowed ($nameLen given).");
                }
            }


            //--------------------------------------------
            // NAME TRANSFORM
            //--------------------------------------------
            if (null === $phpFileItem) {
                throw new LightAjaxFileUploadManagerException("Invalid phpFileItem given with \"use_Light_UserData\" action and add/update intent.");
            }


            $name = $phpFileItem['name'];
            if (true === $useFileEditor) {
                if (false === array_key_exists("filename", $params)) {
                    throw new LightAjaxFileUploadManagerException("Missing parameter filename, required by the \"fileEditor\" protocol.");
                }
                $name = $params['filename'];
            }
            if (array_key_exists('nameTransformer', $action)) {
                $name = $this->getTransformedName($name, $action['nameTransformer']);
            }

            //--------------------------------------------
            // FILENAME SANITIZATION
            //--------------------------------------------
            $allowSlashInFilename = $action['allowSlashInFilename'] ?? false;
            if (false === FileSystemTool::isValidFilename($name, $allowSlashInFilename)) {
                throw new LightAjaxFileUploadManagerException("Invalid filename \"$name\". Try to use only alphanumerical characters and underscore, and dash.");
            }


            if (array_key_exists("path", $action)) {


                $defaultIsPrivate = false;
                if (true === $useFileEditor) {
                    $defaultIsPrivate = $params['is_private'] ?? false;
                    $defaultIsPrivate = (bool)$defaultIsPrivate;
                }
                $isPrivate = $action['isPrivate'] ?? $defaultIsPrivate;
                $use2Svp = $action['use_2svp'] ?? false;
                $tags = $action['tags'] ?? $params['tags'] ?? [];
                $path = $action['path'];
                $oldPath = null; // only used with action=update


                if (false !== strpos($path, '{extension}')) {
                    $extension = FileSystemTool::getFileExtension($name);
                    if ('' === $extension) {
                        throw new LightAjaxFileUploadManagerException("An extension is required for the file name: " . $name);
                    }
                    $path = str_replace('{extension}', $extension, $path);
                }
                $path = str_replace('{filename}', $name, $path);


                if (true === $use2Svp) {
                    $p = explode('.', $path, 2);
                    $path = $p[0] . '.2svp';
                    if (2 === count($p)) {
                        $path .= '.' . $p[1];
                    }
                }


                //--------------------------------------------
                // IMAGE TRANSFORM
                //--------------------------------------------
                $fileTmpPath = $phpFileItem['tmp_name'];
                $fileTmpPathDest = $fileTmpPath;
                if (true === FileTool::isImage($fileTmpPath)) {
                    if (array_key_exists("imageTransformer", $action)) {
                        $this->transformImage($fileTmpPath, $fileTmpPathDest, $action['imageTransformer'], $phpFileItem['name']);
                    }
                }


                $options = [
                    "is_private" => $isPrivate,
                    "tags" => $tags,
                    "overwrite" => $action['overwrite'] ?? false,
                    "keepOriginal" => $action['keepOriginal'] ?? false,
                ];

                if (true === $useFileEditor && 'update' === $fileEditorAction) {
                    if (false === array_key_exists("url", $params)) {
                        throw new LightAjaxFileUploadManagerException("Missing parameter url, required by the \"fileEditor\" protocol for the update action.");
                    }
                    $options['url'] = $params['url'];

                }


                $url = $userDataService->save($path, file_get_contents($phpFileItem['tmp_name']), $options);
                unlink($phpFileItem['tmp_name']); // do never forget this!!!
                $ret = $url;


            } else {
                throw new LightAjaxFileUploadManagerException("The \"path\" key is not defined.");
            }
        } else {
            // some actions might not want to create copies of the uploaded file.
            // code of such actions would go here.
        }


        if (null !== $ret) {
            $ret = [
                "url" => $ret,
            ];
        }
        return $ret;
    }

    /**
     * Transforms the srcPath image according to the given imageTransformer,
     * and stores it in dstPath.
     * Returns whether the creation of the copy was successful.
     *
     * In case of errors throws exceptions.
     *
     *
     * @param string $srcPath
     * The path to a supposedly valid image.
     *
     * @param string $dstPath
     * @param string $imageTransformer
     * @param string $fileName
     * This is given for enhancing the error messages only.
     *
     * @return bool
     * @throws \Exception
     */
    protected function transformImage(string $srcPath, string $dstPath, string $imageTransformer, string $fileName): bool
    {
        list($transformerId, $transformerParams) = $this->extractFunctionInfo($imageTransformer);
        switch ($transformerId) {
            case "resize":
                $width = $transformerParams[0] ?? null;
                $height = $transformerParams[0] ?? null;

                $extension = FileSystemTool::getFileExtension($dstPath);
                if (empty($extension)) {
                    $extension = FileSystemTool::getFileExtension($fileName);
                }

                $options = [
                    "extension" => $extension,
                ];
                if (true === ThumbnailTool::biggest($srcPath, $dstPath, $width, $height, $options)) {
                    return true;
                } else {
                    throw new LightAjaxFileUploadManagerException("ThumbnailTool error: couldn't resize the image (file name=$fileName).");
                }
                break;
            default:
                throw new LightAjaxFileUploadManagerException("Bad configuration error: the imageTransformer function $transformerId is not recognized yet (file name=$fileName).");
                break;
        }
        return false;
    }


    /**
     * Transforms the name according to the given nameTransformer, and returns the transformed name.
     *
     * @param string $name
     * @param string $nameTransformer
     * @return string
     * @throws \Exception
     */
    protected function getTransformedName(string $name, string $nameTransformer): string
    {


        $extension = FileSystemTool::getFileExtension($name);
        $fileName = FileSystemTool::getFileName($name);
        list($transformerId, $transformerParams) = $this->extractFunctionInfo($nameTransformer);

        switch ($transformerId) {
            case "randomize":
                if (count($transformerParams) > 0) {
                    $length = $transformerParams[0];
                    if ($length > 0) {
                        $keepExtension = true;
                        if (array_key_exists(1, $transformerParams)) {
                            $keepExtension = $transformerParams[1];
                        }
                        $name = HashTool::getRandomHash64($length);
                        if (true === $keepExtension) {
                            if ($extension) {
                                $name .= "." . $extension;
                            }
                        }
                    } else {
                        throw new LightAjaxFileUploadManagerException("Bad configuration error: the length parameter of the randomize nameTransformer function must be greater than 0 (file name=$name).");
                    }
                } else {
                    throw new LightAjaxFileUploadManagerException("Bad configuration error: the length parameter of the randomize nameTransformer function is mandatory (file name=$name).");
                }

                break;
            case "changeFileName":
                if (count($transformerParams) > 0) {
                    $newName = $transformerParams[0];
                    $name = $newName;
                    if ($extension) {
                        $name .= "." . $extension;
                    }
                } else {
                    throw new LightAjaxFileUploadManagerException("Bad configuration error: the newName parameter of the changeFileName nameTransformer function is mandatory (file name=$name).");
                }
                break;
            case "set":
                if (count($transformerParams) > 0) {
                    $newName = $transformerParams[0];
                    $name = $newName;
                } else {
                    throw new LightAjaxFileUploadManagerException("Bad configuration error: the newName parameter of the set nameTransformer function is mandatory (file name=$name).");
                }
                break;
            case "snake":
                $name = CaseTool::toSnake($fileName);
                if ($extension) {
                    $name .= "." . $extension;
                }
                break;
            default:
                throw new LightAjaxFileUploadManagerException("Bad configuration error: the nameTransformer function $transformerId is not recognized yet (file name=$name).");
                break;
        }

        return $name;
    }


    /**
     * Parses the given transformer string, and returns an info array with the following structure:
     *
     * - 0: transformer id (the function name)
     * - 1: array of parameters
     *
     *
     * @param string $transformer
     * @return array
     * @throws \Exception
     *
     */
    protected function extractFunctionInfo(string $transformer): array
    {
        $p = explode('(', $transformer, 2);
        $transformerId = trim($p[0]);
        $transformerParams = [];
        if (2 === count($p)) {
            $transformerStringParams = trim($p[1], ') ');
            $transformerParams = SmartCodeTool::parse('[' . $transformerStringParams . ']');
        }
        return [
            $transformerId,
            $transformerParams,
        ];
    }
}