Todolist
==========
2017-10-30


- Add some validation rules for file (mime type, weight, others...)
- maybe add some tools for importing file into the server

some quickstart code?

```php
    public function moveUploaded($type, array $file)
    {
        if (true === UploadTool::isValid($file)) {
            switch ($type) {
                case "piece_identite":
                case "brevet_etat":
                    if ('application/pdf' === $file['type']) {

                        $filePath = $file['tmp_name'];
                        $destDir = $this->getUploadDir(E::getUserId());

                        // max file size? (not yet, rushing...)
                        $dest = $destDir . "/$type.pdf";
                        FileSystemTool::mkdir($destDir, 0777, true);
                        if (true === move_uploaded_file($filePath, $dest)) {
                            return $dest;
                        } else {
                            throw new ThisAppException("Couldn't move filePath $filePath to dest $dest for unknown reasons");
                        }
                    } else {
                        throw new ThisAppException("Expected an application/pdf mime type, $type given");
                    }
                    break;
            }
        } else {
            throw new ThisAppException("invalid php file: " . ArrayToStringTool::toPhpArray($file));
        }
    }
```



- add js tool for removing error messages automatically