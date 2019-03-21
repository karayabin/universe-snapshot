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
php 7.0+
scp
ssh



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
    my_db:
        type: mysql
        password: pueofjA1,kD
        ?remote_password: if not set same as (local) password

sync-files-conf:
    not_uploaded: (to the remote) A list of entries to not remove from the remote.
    not_removed: (from the remote) A list of entries to not upload to the remote.


remotes:
    komin:
        ssh_config_id: kom
        root_dir: /home/me/myapp

```