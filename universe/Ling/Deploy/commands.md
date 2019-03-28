Centralized manager to deploy your web apps on remote machines.



map
    Creates the map for the files of the site.
    The map is the list of the files (not including directories) in the application, along with their hash id.
    See hash id definition for more details.
    The symlinks are not followed (for the sake of simplicity).
    Also, the .deploy directory is always ignored (it's a reserved directory name for the deploy system).




diff remote=$remote
    Internal command to show the differences between the **site** map and the **remote** map.
    Those maps are created on the fly.



push/fetch


push (remote=$remote)?
    Updates the **remote** application so that it looks like the **site** application.
    It uses the **diff** command under the hood.
    The ignore and ignoreHidden keys of the map-conf of the site will be used to define which files
    will be sent over to the remote.







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
--------- conf.byml                 # the configuration file
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