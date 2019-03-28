<?php


namespace Ling\Deploy\Command;


use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;


/**
 * The HelpCommand class.
 * This command will display the kaos help to the user.
 *
 *
 *
 */
class HelpCommand extends DeployGenericCommand
{


    /**
     * This property holds the callbacks for this instance.
     * It's an array of command name => callback to display the command's help.
     *
     * @var array
     */
    protected $callbacks;

    /**
     * This property holds the headerCallback for this instance.
     * A callable displaying the help header.
     *
     * @var callable
     */
    protected $headerCallback;

    public function __construct()
    {
        parent::__construct();
        $this->callbacks = [];
        $this->headerCallback = null;
    }


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {
        $indentLevel = $this->application->getBaseIndentLevel();
        $command = $input->getParameter(2);


        $this->registerCallbacks($output);


        if (null === $command) {

            call_user_func($this->headerCallback);

            $output->write(PHP_EOL);
            $output->write("<bold>Commands list</bold>:" . PHP_EOL);
            $output->write(str_repeat('-', 17) . PHP_EOL);
            $output->write(PHP_EOL);

            foreach ($this->callbacks as $callback) {
                call_user_func($callback);
            }
        } else {
            if (array_key_exists($command, $this->callbacks)) {
                call_user_func($this->callbacks[$command]);
            } else {
                H::error(H::i($indentLevel) . "The command <b>$command</b> doesn't exist." . PHP_EOL, $output);
            }
        }


    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Registers the callback for the given command name.
     *
     * @param string $commandName
     * @param callable $function
     */
    protected function registerCallback(string $commandName, callable $function)
    {
        $this->callbacks[$commandName] = $function;
    }

    /**
     * Registers all callbacks for this instance.
     *
     * @param OutputInterface $output
     */
    protected function registerCallbacks(OutputInterface $output)
    {

        $backupDb = $this->n('backup-db');
        $cleanBackupDb = $this->n('clean-backup-db');
        $conf = $this->n('conf');
        $createDb = $this->n('create-db');
        $diff = $this->n('diff');
        $diffback = $this->n('diffback');
        $dropDb = $this->n('drop-db');
        $fetch = $this->n('fetch');
        $fetchBackupDb = $this->n('fetch-backup-db');
        $help = $this->n('help');
        $listBackupDb = $this->n('list-backup-db');
        $map = $this->n('map');
        $push = $this->n('push');
        $pushBackupDb = $this->n('push-backup-db');
        $remove = $this->n('remove');
        $unzip = $this->n('unzip');
        $zip = $this->n('zip');
        $zipBackup = $this->n('zip-backup');


        $format = 'white:bgBlack';
        $this->headerCallback = function () use ($output, $format) {


            $output->write("<$format>" . str_repeat('=', 25) . "</$format>" . PHP_EOL);
            $output->write("<$format>*    Deploy help       </$format>" . PHP_EOL);
            $output->write("<$format>" . str_repeat('=', 25) . "</$format>" . PHP_EOL);
            $output->write(PHP_EOL);
            $output->write("A value preceded by a dollar symbol (\$) is always a variable." . PHP_EOL);


            $output->write(PHP_EOL);
            $output->write("<bold>Global options</bold>:" . PHP_EOL);
            $output->write(str_repeat('-', 17) . PHP_EOL);
            $output->write("The following options apply to all the commands." . PHP_EOL);
            $output->write(PHP_EOL);
            $output->write(H::j(1) . $this->o("p=\$project_identifier") . ": sets the current project." . PHP_EOL);
            $output->write(H::j(1) . $this->o("indent=\$number") . ": sets the base indentation level used by most commands." . PHP_EOL);
            $output->write(H::j(1) . $this->o("-x") . ": activates the exit status system: the application will exit with the status code returned by the command." . PHP_EOL);
        };


        //--------------------------------------------
        //
        //--------------------------------------------
        $this->registerCallback('backup-db', function () use ($backupDb, $output) {
            $output->write("- $backupDb: creates the backup(s) for the database(s) specified in the <b>configuration file</b>." . PHP_EOL);
            $output->write(H::s(1) . "Backups are stored here: <b>\$project_root_dir/.deploy/backup-db/\$database_identifier/\$backup_name</b>." . PHP_EOL);
            $output->write(H::s(1) . "By default, it will backup every database defined for the project. This can be changed with the <b>db</b> option." . PHP_EOL);
            $output->write(H::j(1) . $this->o("db=\$identifier") . ": the identifier of the database to backup. It can also be a comma separated list of identifiers." . PHP_EOL);
            $output->write(H::j(1) . $this->o("name=\$backup_name") . ": sets the name of the backup. Otherwise, the default name will be based on the datetime (i.e. 2019-03-26__08-49-17.sql)." . PHP_EOL);
            $output->write(H::s(2) . "The <b>.sql</b> extension will be appended automatically if not specified." . PHP_EOL);
            $output->write(H::j(1) . $this->o("-r") . ": remote flag. If set, the command will operate on the remote rather than on the site." . PHP_EOL);
            $output->write(H::j(1) . $this->o("-s") . ": secure flag. If set, forces the command to prompt you with the database(s) password(s). Otherwise, a technique involving temporary files and the mysqldump --defaults-extra-file option is used." . PHP_EOL);
            $output->write(H::j(1) . $this->o("-o") . ": open flag. If set, and if you are on a mac, will open the backup directory(ies) in the Finder after they are created." . PHP_EOL);
        });


        $this->registerCallback('clean-backup-db', function () use ($cleanBackupDb, $output) {
            $output->write("- $cleanBackupDb: deletes database backups of the project." . PHP_EOL);
            $output->write(H::j(1) . $this->o("-r") . ": remote flag. If set, the command will operate on the remote rather than on the site." . PHP_EOL);
            $output->write(H::j(1) . $this->o("-d") . ": delete flag. If set, remove ALL the database backups. This flag has precedence over any other options." . PHP_EOL);
            $output->write(H::j(1) . $this->o("db=\$identifiers") . ": comma separated list of database identifiers. It represents the database identifiers to operate on." . PHP_EOL);
            $output->write(H::j(1) . $this->o("keep=\$number") . ": defines the number of non-named database backups to keep (all other older non-named backups will be removed)." . PHP_EOL);
            $output->write(H::j(1) . $this->o("name=\$names") . ": the comma separated list of backup names to delete. Note: the \".sql\" extension is appended automatically if omitted." . PHP_EOL);
            $output->write(H::s(2) . "Spaces between the comma an the names are allowed." . PHP_EOL);
        });


        $this->registerCallback('conf', function () use ($conf, $output) {
            $output->write("- $conf: displays the general configuration, or the configuration for a specific project if the <b>p</b> global option is specified." . PHP_EOL);
        });


        $this->registerCallback('create-db', function () use ($createDb, $output) {
            $output->write("- $createDb: creates database(s) along with their user(s), as specified in the <b>configuration file</b>." . PHP_EOL);
            $output->write(H::s(1) . "By default, all databases listed in the configuration are created." . PHP_EOL);
            $output->write(H::s(1) . "To create a single database, or a selected set of specified databases, use the <b>db</b> option." . PHP_EOL);
            $output->write(H::j(1) . $this->o("db=\$identifier") . ": the identifier of the database to create. It can also be a comma separated list of identifiers." . PHP_EOL);
            $output->write(H::s(2) . "Note: the identifier refers to a key in the <b>databases</b> section of the <b>configuration file</b>." . PHP_EOL);
            $output->write(H::j(1) . $this->o("-r") . ": remote flag. If set, the command will operate on the remote rather than on the site." . PHP_EOL);
            $output->write(H::j(1) . $this->o("-f") . ": force flag. If set, forces the recreation of the database(s) and user(s) by deleting them before re-creating them." . PHP_EOL);
        });


        $this->registerCallback('diff', function () use ($diff, $output) {
            $output->write("- $diff: displays the differences between the current application files and the remote files." . PHP_EOL);
            $output->write(H::s(1) . "The differences are composed of 3 sections:" . PHP_EOL);
            $output->write(H::s(2) . "- add: the files present in the <b>site</b>, not on the <b>remote</b>" . PHP_EOL);
            $output->write(H::s(2) . "- remove: the files present in the <b>remote</b>, not on the <b>site</b>" . PHP_EOL);
            $output->write(H::s(2) . "- replace: the files present in both the <b>site</b> and the <b>remote</b>, but they have a difference (i.e. their hash_id differs)" . PHP_EOL);
            $output->write(H::j(1) . $this->o("-f") . ": if set, the command will create 3 files <b>diff-add.txt</b>, <b>diff-remove.txt</b> and <b>diff-replace.txt</b> in the <b>.deploy</b> dir of the <b>site</b> application, rather than displaying the diff to the screen." . PHP_EOL);
        });


        $this->registerCallback('diffback', function () use ($diffback, $output) {
            $output->write("- $diffback: same as the <b>diff</b> command, but in reverse (i.e. the <b>remote</b> is the source, and the <b>site</b> becomes the mirrored target)." . PHP_EOL);
            $output->write(H::j(1) . $this->o("-f") . ": if set, the command will create 3 files <b>diff-add.txt</b>, <b>diff-remove.txt</b> and <b>diff-replace.txt</b> in the <b>.deploy</b> dir of the <b>site</b> application, rather than displaying the diff to the screen." . PHP_EOL);
        });


        $this->registerCallback('drop-db', function () use ($dropDb, $output) {
            $output->write("- $dropDb: drops the database(s) of the project." . PHP_EOL);
            $output->write(H::j(1) . $this->o("db=\$identifier") . ": the identifier of the database to drop. It can also be a comma separated list of identifiers." . PHP_EOL);
            $output->write(H::s(2) . "Note: the identifier refers to a key in the <b>databases</b> section of the <b>configuration file</b>." . PHP_EOL);
            $output->write(H::j(1) . $this->o("-r") . ": remote flag. If set, the command will operate on the remote rather than on the site." . PHP_EOL);
            $output->write(H::j(1) . $this->o("-u") . ": user flag. If set, the command will also drop the user." . PHP_EOL);
            $output->write(H::j(1) . $this->o("-s") . ": secure flag. If set, this command will prompt the user for required database password(s)." . PHP_EOL);
        });


        $this->registerCallback('fetch', function () use ($fetch, $output) {
            $output->write("- $fetch: same as the <b>push</b> command, but in the opposite direction (i.e. the <b>site</b> is mirrored using the <b>remote</b> as the model." . PHP_EOL);
        });


        $this->registerCallback('fetch-backup-db', function () use ($fetchBackupDb, $output) {
            $output->write("- $fetchBackupDb: repatriates database backups from the remote to the local project." . PHP_EOL);
            $output->write(H::s(1) . "By default, it repatriates every single database backup." . PHP_EOL);
            $output->write(H::j(1) . $this->o('?name=$names') . ": the comma separated list of backup names to repatriate." . PHP_EOL);
            $output->write(H::s(2) . "Note: the <b>.sql</b> extension is appended automatically if omitted." . PHP_EOL);
        });




        $this->registerCallback('help', function () use ($help, $output) {
            $output->write("- $help " . $this->o('?$command') . ": displays this help message." . PHP_EOL);
            $output->write(H::s(1) . "If the command parameter is passed, will display the help only for that command." . PHP_EOL);

        });


        $this->registerCallback('list-backup-db', function () use ($listBackupDb, $output) {
            $output->write("- $listBackupDb: lists the database backups of the application." . PHP_EOL);
            $output->write(H::j(1) . $this->o("-r") . ": remote flag. If set, the command will operate on the remote rather than on the site." . PHP_EOL);

        });


        $this->registerCallback('map', function () use ($map, $output) {
            $output->write("- $map: creates a map of the current application." . PHP_EOL);
            $output->write(H::s(1) . "The map will be created at <b>\$root_dir/.deploy/map.txt</b>." . PHP_EOL);
            $output->write(H::j(1) . $this->o("-r") . ": remote. Executes the operation on the remote." . PHP_EOL);
            $output->write(H::s(2) . "In this case, the map will be located at <b>\$remote_root_dir/.deploy/map.txt</b>." . PHP_EOL);
            $output->write(H::j(1) . $this->o("-d") . ": display on screen. If set, also displays the map on the console screen." . PHP_EOL);
        });


        $this->registerCallback('push', function () use ($push, $output) {
            $output->write("- $push: pushes the current <b>site</b> to the <b>remote</b>." . PHP_EOL);
            $output->write(H::s(1) . "By default, it mirrors the current site to the remote (i.e. files can be removed on the remote)." . PHP_EOL);
            $output->write(H::s(1) . "More control on this behaviour gan be gained using the <b>mode</b> option." . PHP_EOL);
            $output->write(H::j(1) . $this->o("-z") . ": zip. Use a zip archive for transferring files to add. This is faster than the default one by one method." . PHP_EOL);
            $output->write(H::s(2) . "However, you don't have the file details shown with the default method." . PHP_EOL);
            $output->write(H::j(1) . $this->o('?mode=$mode') . ": a comma separated list (extra space allowed) of the operation names to execute." . PHP_EOL);
            $output->write(H::j(1) . "The default value is: add,replace,remove." . PHP_EOL);
            $output->write(H::s(2) . "The possible operations are:" . PHP_EOL);
            $output->write(H::s(3) . "- add: will add the files that are present in <b>site</b> but not in <b>remote</b>" . PHP_EOL);
            $output->write(H::s(3) . "- replace: will replace the files in <b>remote</b> that are present in both the <b>site</b> and the <b>remote</b> (but were modified)" . PHP_EOL);
            $output->write(H::s(3) . "- remove: will remove the files in <b>remote</b> that are not present in <b>site</b>" . PHP_EOL);
            $output->write(H::s(2) . "By default, all three operations are executed." . PHP_EOL);
            $output->write(H::s(2) . "So for instance, if you just want to upload the files from the site to the remote without removing any" . PHP_EOL);
            $output->write(H::s(2) . "files on the remote, you can use \"mode=add,replace\" or \"mode=add\"." . PHP_EOL);
        });


        $this->registerCallback('push-backup-db', function () use ($pushBackupDb, $output) {
            $output->write("- $pushBackupDb: pushes database backups from the local project to the remote." . PHP_EOL);
            $output->write(H::s(1) . "By default, it pushes every single database backup." . PHP_EOL);
            $output->write(H::j(1) . $this->o('?name=$names') . ": the comma separated list of backup names to push." . PHP_EOL);
            $output->write(H::s(2) . "Note: the <b>.sql</b> extension is appended automatically if omitted." . PHP_EOL);
        });



        $this->registerCallback('remove', function () use ($remove, $output) {
            $output->write("- $remove " . $this->o('src=$path') . ": removes files listed in a source file." . PHP_EOL);
            $output->write(H::s(1) . "The source file contains a list of relative paths to remove, one per line." . PHP_EOL);
            $output->write(H::s(1) . "The paths are relative to the current site's root dir, or, if the remote flag is set, relative to the remote's root dir." . PHP_EOL);
            $output->write(H::s(1) . "If the path is a directory, it will be ignored (design by security, to prevent removing entire directories)." . PHP_EOL);
            $output->write(H::j(1) . $this->o('-r') . ": remote. If set, the command will operate on the remote rather than on the site." . PHP_EOL);
        });


        $this->registerCallback('unzip', function () use ($unzip, $output) {
            $output->write("- $unzip " . $this->o('src=$path') . " " . $this->o('dst=$path') . ": utility to unzip zip archives into a given directory." . PHP_EOL);
            $output->write(H::s(1) . "Note: this doesn't remove existing files." . PHP_EOL);
            $output->write(H::s(1) . "However, if a file already exists, it will be overwritten." . PHP_EOL);
            $output->write(H::j(1) . $this->o('-r') . ": the remote flag. If set, this command will be called on the remote (over ssh) instead of the current site." . PHP_EOL);
        });


        $this->registerCallback('zip', function () use ($zip, $output) {
            $output->write("- $zip " . $this->o('src=$path') . " " . $this->o('dst=$path') . ": A zip utility to zip files listed in a source file." . PHP_EOL);
            $output->write(H::j(1) . $this->o('src=$path') . ": the path to the source file." . PHP_EOL);
            $output->write(H::s(2) . "The source file contains a list of relative paths to remove, one per line." . PHP_EOL);
            $output->write(H::s(2) . "The paths are relative to the current site's root dir, or, if the remote option is set, relative to the remote's root dir." . PHP_EOL);
            $output->write(H::s(2) . "If the path is a directory, it will be zipped recursively." . PHP_EOL);
            $output->write(H::j(1) . $this->o('dst=$path') . ": the path to the zip archive to create." . PHP_EOL);
            $output->write(H::j(1) . $this->o('-r') . ": remote flag. If set, the command will operate on the remote rather than on the site." . PHP_EOL);
        });


        $this->registerCallback('zip-backup', function () use ($zipBackup, $output) {
            $output->write("- $zipBackup: creates a zip archive containing the selected backup files." . PHP_EOL);
            $output->write(H::j(1) . $this->o('dir=$path') . ": the backup directory path." . PHP_EOL);
            $output->write(H::j(1) . $this->o('ext=$extension') . ": the extension to append to the backup name (if omitted)." . PHP_EOL);
            $output->write(H::j(1) . $this->o('?name=$names') . ": the comma separated list of backup names to put in the archive." . PHP_EOL);
        });
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns a formatted command name string.
     *
     * @param string $commandName
     * @return string
     */
    private function n(string $commandName): string
    {
        return '<bold:red>' . $commandName . '</bold:red>';
    }

    /**
     * Returns a formatted option/parameter string.
     *
     * @param string $option
     * @return string
     */
    private function o(string $option): string
    {
        return '<bold:bgLightYellow>' . $option . '</bold:bgLightYellow>';
    }

    /**
     * Returns a formatted configuration directive string.
     *
     * @param string $option
     * @return string
     */
    private function d(string $option): string
    {
        return '<bold:blue>' . $option . '</bold:blue>';
    }
}