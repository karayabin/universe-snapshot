import SomeComponent from './DefaultFileUploader.svelte';


window.FileUploader = function (options) {
    return new SomeComponent(options);
};

//----------------------------------------
// LANG HOOK
//----------------------------------------
FileUploader._langs = {};
FileUploader.hasLang = function (lang) {
    return (lang in FileUploader._langs);
};
FileUploader.addLang = function (lang, dict) {
    FileUploader._langs[lang] = dict;
};