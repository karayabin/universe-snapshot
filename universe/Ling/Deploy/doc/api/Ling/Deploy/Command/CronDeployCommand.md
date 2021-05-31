[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)



The CronDeployCommand class
================
2019-04-03 --> 2021-05-31






Introduction
============

The CronDeployCommand class.
This command will basically allow the remote to use the deploy command, so that
the deploy backup related commands can be used on the remote in a cron task.

Note: all commands doesn't make sense when called from the remote.
For instance, fetch will fail. In fact, all commands involving the "remote_root_dir" directive won't make sense on the remote,
and so basically only the backup related commands should be used.
I didn't put a hardcoded limitation, I trust the common sense of the user to guess which command should work/not work.



This command will effectively upload the following files/dirs on the remote:

- $remote_app/.deploy/cron-deploy/cron-deploy.php
- $remote_app/.deploy/cron-deploy/cron-deploy-universe
- $remote_app/.deploy/cron-deploy/cron-deploy-conf.byml


The **cron-deploy.php** file is the deploy script which should be called in the cron tasks.
For instance in a cron task to save the database every day at 3AM, you could use this:

```bash
0 3 * * * php -f $remote_app/.deploy/cron-deploy/cron-deploy.php -- backup-db >/dev/null 2>&1
```

Note: the project identifier is hardcoded in the cron-deploy.php script.



The **cron-deploy-universe** dir is the mini [universe](https://github.com/karayabin/universe-snapshot) used by the **cron-deploy.php** script.
The **cron-deploy-conf.byml** is the part of the configuration file used for the project.
Note: it will store database passwords (if you have some).



This commands depends on the [uni tool](https://github.com/lingtalfi/universe-naive-importer) (to create the cron-deploy-universe from a map).



Class synopsis
==============


class <span class="pl-k">CronDeployCommand</span> extends [DeployGenericCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected [Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) [DeployGenericCommand::$application](#property-application) ;

- Methods
    - public [run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/CronDeployCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : mixed

- Inherited methods
    - public [DeployGenericCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/__construct.md)() : void
    - public [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md)([Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) $application) : void

}






Methods
==============

- [CronDeployCommand::run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/CronDeployCommand/run.md) &ndash; Runs the command.
- [DeployGenericCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/__construct.md) &ndash; Builds the DeployGenericCommand instance.
- [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Deploy\Command\CronDeployCommand<br>
See the source code of [Ling\Deploy\Command\CronDeployCommand](https://github.com/lingtalfi/Deploy/blob/master/Command/CronDeployCommand.php)



SeeAlso
==============
Previous class: [CreateMapCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/CreateMapCommand.md)<br>Next class: [DeployGenericCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand.md)<br>
