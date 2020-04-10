JFileUploader
===========
2019-11-25 -> 2020-04-10



Js file uploader is a javascript tool to help uploading files to a server.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/JFileUploader
```

Or just download it and place it where you want otherwise.






![js file uploader screenshot, default theme](https://lingtalfi.com/img/universe/JFileUploader/fileuploader.png)



Table of Contents
=================

* [JFileUploader](#jfileuploader)
* [Install](#install)
* [Table of Contents](#table-of-contents)
  * [In a nutshell](#in-a-nutshell)
  * [What is it?](#what-is-it)
  * [Quickstart](#quickstart)
* [Documentation](#documentation)
  * [The synopsis](#the-synopsis)
  * [The widget html structure](#the-widget-html-structure)
  * [General overview of the objects](#general-overview-of-the-objects)
  * [The FileUploader object](#the-fileuploader-object)
  * [The FileList object](#the-filelist-object)
  * [The theme object](#the-theme-object)
  * [Lang](#lang)
  * [Server side script](#server-side-script)
  * [The file editor](#the-file-editor)
* [History Log](#history-log)


Conception notes:
- [Conception notes](https://github.com/lingtalfi/JFileUploader/blob/master/doc/pages/conception-notes.md)
- [File editor conception notes](https://github.com/lingtalfi/JFileUploader/blob/master/doc/pages/file-editor-conception-notes.md)




In a nutshell
---------

This tool can be used as the client of the [file manager protocol](https://github.com/lingtalfi/TheBar/blob/master/discussions/file-manager-protocol.md).

In fact, it is designed only for that purpose.


- allows you to handle one or multiple file uploads, using ajax and a server side script
- inspired by plupload
- supports chunk uploads (enable by default)
- has a file editor with cropper feature for images 
- translated in english and french, other languages can be added easily
- items can be sorted (this feature requires jqueryui sortable)
- it requires jquery
- it comes with a default theme and a bootstrap theme, other themes can be added easily








History Log
=============

--- 3.0.0 -- 2020-04-10

    - new api 

- 2.2.2 -- 2020-02-24

    - fix bootstrap theme: file editor buttons not bootstrapish 
    
- 2.2.1 -- 2020-02-24

    - add test.php file in personal directory 
    
- 2.2.0 -- 2020-02-24

    - add bootstrap theme 
    - add allowedFileExtension js validation option 

- 2.1.2 -- 2020-02-24

    - fix unstable initial urls order 
    
- 2.1.1 -- 2020-02-24

    - fix jquery ui dialog not draggable
    
- 2.1.0 -- 2020-02-21

    - add file editor
    
- 2.0.1 -- 2020-01-24

    - add server side script section in README.md
    
- 2.0.0 -- 2020-01-24

    - new version
    
- 1.2.2 -- 2019-11-25

    - reorganized assets
    
- 1.2.1 -- 2019-11-25

    - migrating to JFileUploader repository for better planet compatibility

- 1.2.0 -- 2019-10-21

    - now the file visualizer guesses the file name from Content-Disposition header when available

- 1.1.1 -- 2019-10-17

    - fix fileVisualizerAddItem taking extension from url instead of filename

- 1.1.0 -- 2019-08-06

    - add defaultValue option

- 1.0.1 -- 2019-08-06

    - fix doc typo

- 1.0.0 -- 2019-08-05

    - initial commit






