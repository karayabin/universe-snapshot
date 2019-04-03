Centralized manager to deploy your web apps on remote machines.









    /**
     * TODO HERE,
     * then do
     *
     *      backup-db ?name=structure1 ?-r
     *      fetch-backup-db ?name=_last
     *      push-backup-db ?name=_last
     *      restore-backup-db ?name=_last ?-r
     *
     *      fetch-db: combines
     *          - backup-db -r: save the remote db, default name=_last
     *          - fetch-backup-db:  repatriate the distant db backup to the local machine, default name=_last
     *          - restore-backup-db: remove the local db and replace it with the backup, default name=_last
     *
     *      push-db: same
     *
     *
     * Then do backups (same as backup-db...)
     *
     *      backup-files
     *      fetch-backup-files
     *      push-backup-files
     *      restore-backup-files
     *
     *
     * Then do backups (combining backup-db + backup-files)
     *
     * Then do solution for cron calls on remote:
     *      - create-cron-deploy ?
     *              remote/.deploy/cron-deploy.sh
     *              remote/.deploy/cron-deploy-universe
     *              remote/.deploy/cron-deploy-conf.byml
     *
     * Then do interactive console
     *
     *
     *
     * Then do video...
     *
     */










Requirements
============
php 7.0+ with zip extension
scp
ssh
mysql
mysqldump



mysql related commands were tested successfully on:
- macOSX Ver 8.0.13
- ubuntu Ver 5.7.18


mysql distant
---------------
This worked:

ssh -t kom "mysql -uroot -p -e 'show databases;'"
ssh -t kom "mysql -uroot -p < /home/ling/websites/jin_test/.deploy/tmp.sql"




Structure
==========


```txt
- /path/to/myapp/
----- .deploy/
--------- backup-files/             # contains the backup files created by the backup-files command
--------- backup-all/               # contains the backup files created by the backup-all command
--------- backup-db/                # contains the backup files created by the backup-db command
--------- map.txt                   # contains the files map created by the map command
--------- diff-add.txt              # created temporarily by the diff command with flag -f. Usually removed by another command.
--------- diff-remove.txt           # created temporarily by the diff command with flag -f. Usually removed by another command.
--------- diff-replace.txt          # created temporarily by the diff command with flag -f. Usually removed by another command.
--------- app.zip                   # created temporarily by the push command with flag -z. Usually removed after use.
--------- remote-map.txt            # created temporarily by the diff command. Contains the remote map.
--------- zip-map.txt               # created temporarily by the fetch command. Contains a merge of the diff-add and diff-replace maps.
--------- tmp.sql                   # temporary sql statements to execute on the remote. Usually removed by a command after usage.
--------- tmp-conf.byml             # temporary conf created by some commands. Usually, it's removed after usage.
--------- tmp-conf.cnf              # temporary conf created by some commands. Usually, it's removed after usage.
--------- backup-db.zip             # temporary archive created by the **fetch-backup-db** command.
--------- tmp-list.txt              # temporary file created by the some commands.
----- ...application files
````




Default configuration
----------

```yaml
# the configuration for the map command
map-conf:
    ignoreHidden: bool=true. Whether to ignore any file/directory starting with dot (.).

    # array of file/directory names to ignore.
    # If the entry is a directory, its content will be ignored recursively.
   ignoreName: []

   # array of file/directory relative paths to ignore.
   # If the entry is a directory, its content will be ignored recursively.
   ignorePath: []

```



Configuration memo
-----------

```yaml

backup-files-conf:
    use_zip: 1

sync-db-conf:
    # Creates a backup of the remote database (on the remote machine) before it's replaced by the site database
    backup_remote: 1

databases:
    test-local:
        name: test
        pass: blabla
        file: basic.sql
        collate: utf8mb4_general_ci
    test-mini:
        name: test
        pass: blabla2
        file: basic.sql


map-conf:
    ignoreHidden: true
    ignoreName: []
    ignorePath: []



remotes:
    komin:
        ssh_config_id: kom
        root_dir: /home/me/myapp

```