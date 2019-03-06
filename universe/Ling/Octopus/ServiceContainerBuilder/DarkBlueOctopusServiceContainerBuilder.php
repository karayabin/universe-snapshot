<?php


namespace Ling\Octopus\ServiceContainerBuilder;


use Ling\ClassCreator\Creator\ClassCreator;
use Ling\ClassCreator\Creator\CommentCreator;
use Ling\ClassCreator\Method\Method;
use Ling\Octopus\ServiceContainer\BlueOctopusServiceContainer;
use Ling\SicTools\ColdServiceResolver;
use Ling\SicTools\SicTool;


/**
 * The DarkBlueOctopusServiceContainerBuilder class generates the dark part of a blue octopus.
 * See the Octopus\ServiceContainer\BlueOctopusServiceContainer class description for more details.
 *
 * This generator is based on the [sic notation](https://github.com/lingtalfi/NotationFan/blob/master/sic.md).
 *
 *
 */
class DarkBlueOctopusServiceContainerBuilder extends ColdServiceResolver
{


    /**
     * An array containing services in sic notation.
     * Note: services don't have to be declared at the root of the array, they can be nested, in which case the service name
     * will be the concatenated path separated with dots.
     *
     * For instance, the following array:
     * [
     *      my_company => [
     *          service1 => [
     *              instance => 'Animal'
     *          ],
     *      ],
     *      service2 => [
     *              instance => 'Animal'
     *      ],
     * ]
     *
     * will create the following services:
     * - my_company.service1
     * - service2
     *
     *
     *
     *
     * @var array
     */
    private $sicConfig;

    /**
     * This property holds the class creator used to build the class file.
     * See more details in the [class creator documentation](https://github.com/karayabin/universe-snapshot/tree/master/universe/Ling/ClassCreator).
     *
     * A new class creator is called every time the build method is called.
     *
     *
     * @var null|ClassCreator
     */
    private $classCreator;


    /**
     * Builds the DarkBlueOctopusServiceContainerBuilder instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->sicConfig = [];
        $this->classCreator = null;
    }


    /**
     * Sets the sic config to use to create the class.
     *
     * @param array $sicConfig
     */
    public function setSicConfig(array $sicConfig)
    {
        $this->sicConfig = $sicConfig;
    }


    /**
     * Compiles the dark blue octopus class code (based on the sic config set with the setSicConfig method), and returns it.
     * If $file is defined, will also create the $file with the class code in it (thus generating the dark blue octopus class).
     *
     *
     *
     *
     * @param $file
     * @param array $options
     *      - classCreator: an instance of the ClassCreator\Creator\ClassCreator. If not set, the default ClassCreator will be used.
     *          See [ClassCreator documentation](https://github.com/karayabin/universe-snapshot/tree/master/universe/Ling/ClassCreator) for more details.
     *      - profile: ClassCreator\Profile\Profile, the profile (see class creator documentation for more details). If not set, the default profile will be used.
     *      - namespace: null|string, a namespace to use, null by default
     *      - useStatements: array, the use statements to use (see class creator documentation examples for exact syntax).
     *                      By default, contains the use statement for the Octopus\ServiceContainer\BlueOctopusServiceContainer (light part of the blue octopus)
     *      - comment: ClassCreator\Comment\Comment, a class comment to use. If not defined, a default class comment will be used.
     *      - signature: string, the class signature. If not defined, the default class signature  will be used: class DarkBlueOctopusServiceContainer extends BlueOctopusServiceContainer.
     *
     * @return string
     */
    public function build($file, array $options = [])
    {

        $classCreator = $options['classCreator'] ?? new ClassCreator();
        $profile = $options['profile'] ?? null;
        $namespace = $options['namespace'] ?? null;
        $useStatements = $options['useStatements'] ?? [
                'Octopus\ServiceContainer\BlueOctopusServiceContainer',
            ];
        $comment = $options['comment'] ?? $this->getDefaultComment();
        $signature = $options['signature'] ?? 'class DarkBlueOctopusServiceContainer extends BlueOctopusServiceContainer';


        $breadcrumb = [];
        $this->classCreator = $classCreator;
        if ($profile) {
            $this->classCreator->setProfile($profile);
        }

        if ($namespace) {
            $this->classCreator->setNamespace($namespace);
        }

        if ($useStatements) {
            $this->classCreator->addUseStatements($useStatements);
        }

        if ($comment) {
            $this->classCreator->setComment($comment);
        }

        if ($signature) {
            $this->classCreator->setSignature($signature);
        }

        $this->registerServices($this->sicConfig, $breadcrumb);


        return $this->classCreator->export($file);


    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @overrides
     */
    protected function resolveCustomNotation($value, &$isCustomNotation = false)
    {
        if (is_string($value)) { // value could be anything
            if (
                0 === strpos($value, '@s')
                && preg_match('!@service\(([a-zA-Z._0-9]*)\)!', $value, $match)
            ) {
                $isCustomNotation = true;
                $serviceName = $match[1];
                return $this->encode('$this->get("' . $serviceName . '")');
            }
        }
        return null;




    }

    /**
     * Returns the default comment.
     *
     * @return \ClassCreator\Comment\Comment
     */
    protected function getDefaultComment()
    {
        $date = date("Y-m-d");
        return CommentCreator::docBlock(<<<EEE
This class is the dark blue octopus service container.
It was generated automatically by the Octopus\ServiceContainerBuilder\DarkBlueOctopusServiceContainerBuilder object on $date.
EEE
        );

    }

    /**
     * Parses the given $conf and creates the methods for each service found.
     *
     *
     * @param array $conf
     * @param array $breadcrumb
     */
    protected function registerServices(array $conf, array &$breadcrumb)
    {
        foreach ($conf as $k => $v) {
            if (true === SicTool::isSicBlock($v)) {

                // registering service
                $serviceName = $this->getServiceName($k, $breadcrumb);
                $methodName = BlueOctopusServiceContainer::getMethodName($serviceName);


                $methodCode = $this->getServicePhpCode($v);
                $this->classCreator->addMethod(
                    Method::create()
                        ->setSignature('protected function ' . $methodName . '() ')
                        ->setBody($methodCode)
                );
            } else {
                if (is_array($v)) {
                    $breadcrumb[] = $k;
                    $this->registerServices($v, $breadcrumb);
                    array_pop($breadcrumb);
                }
            }
        }
    }


    /**
     * Returns the service name based on its position in the configuration array.
     *
     *
     * @param $key
     * @param array $breadcrumb
     * @return string
     */
    protected function getServiceName($key, array $breadcrumb)
    {
        if ($breadcrumb) {
            return implode('.', $breadcrumb) . "." . $key;
        }
        return $key;
    }


}