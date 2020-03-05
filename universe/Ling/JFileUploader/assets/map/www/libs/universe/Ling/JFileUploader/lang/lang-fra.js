//----------------------------------------
// default theme
//----------------------------------------
if ('undefined' === typeof window.FileUploaderLang_Eng) {
    (function () {


        var dict = {
            'Select files': [
                'Sélectionner les fichiers',
            ],
            'Drag files here': [
                'Déposez des fichiers ici.',
            ],
            'file(s)': [
                'fichier(s)',
            ],
            'filename': [
                'Nom du fichier',
            ],
            'status': [
                'Statut',
            ],
            'size': [
                'Poids',
            ],
            'Add files': [
                'Ajouter des fichiers',
            ],
            'Start upload': [
                'Envoyer les fichiers',
            ],
            '{x} files queued': [
                '{x} fichier en attente',
                '{x} fichiers en attente',
            ],
            'err.maxFileExceeded': [
                'Erreur avec "{fileName}": Le poids ne peut pas excéder {maxSize} (le fichier actuel pèse {fileSize}).',
            ],
            'err.maxFileNameLength': [
                'Erreur avec "{fileName}": Le nom du fichier ne doit pas contenir plus de {maxLength} caractères (le nom du fichier actuel comporte {length} caractères).',
            ],
            'err.wrongMimeType': [
                'Erreur avec "{fileName}": Mimetype incorrect: "{fileMimeType}" n\'est pas autorisé. Les mimeType autorisés sont: {allowedMimeTypes}.',
            ],
            'err.wrongFileExtension': [
                'Erreur avec "{fileName}": Extension de fichier incorrecte: "{fileExtension}" n\'est pas autorisé. Les extensions de fichier autorisées sont: {allowedFileExtensions}.',
            ],
            'err.uploadError': [
                'Erreur avec "{fileName}": Une erreur est survenue pendant le téléchargement.',
            ],
            'err.uploadAborted': [
                'Erreur avec "{fileName}": Le téléchargement a été annulé.',
            ],
            'Server error: ': [
                'Erreur du serveur: ',
            ],
            //----------------------------------------
            // DIALOG
            //----------------------------------------
            'Submit': [
                "Envoyer",
            ],
            'Cancel': [
                "Annuler",
            ],
            //----------------------------------------
            // file editor
            //----------------------------------------
            'File Editor': [
                'Éditeur de fichier',
            ],
            'Parent dir': [
                'Dossier parent',
            ],
            'File name': [
                'Nom du fichier',
            ],
            'Use original image': [
                'Image originale',
            ],
            'Is private': [
                'Fichier privé',
            ],
            'Tags': [
                'Tags',
            ],
            'Image Editor': [
                'Éditeur d\'image',
            ],
            'Zoom In': [
                'Zoom Avant',
            ],
            'Zoom Out': [
                'Zoom Arrière',
            ],
            'Rotate Left': [
                'Pivoter vers la gauche',
            ],
            'Rotate Right': [
                'Pivoter vers la droite',
            ],
            'Flip Horizontal': [
                'Retourner l\'image horizontalement',
            ],
            'Flip Vertical': [
                'Retourner l\'image verticalement',
            ],
            'Reset': [
                'Réinitialiser',
            ],
            'Loading in progress: {x}%': [
                'Chargement en cours: {x}%',
            ],
        };


        window.FileUploaderLang_Eng = function () {
        };
        window.FileUploaderLang_Eng.prototype = {
            get: function (msgId, number, tags) {
                /**
                 * In french, plural system is simple.
                 */
                if ('undefined' === typeof tags) {
                    return this._get(msgId, number);
                }
                var ret = this._get(msgId, number);
                for (var key in tags) {
                    ret = ret.replace('{' + key + '}', tags[key]);
                }
                return ret;

            },
            //----------------------------------------
            // PRIVATE
            //----------------------------------------
            _get: function (msg, number) {

                if ('undefined' === typeof number || '' === number || null === number) {
                    return dict[msg][0]; // singular form
                }


                // plural form
                var pluralKey;
                if (number > 1) {
                    pluralKey = 1;
                } else {
                    pluralKey = 0;
                }
                return dict[msg][pluralKey].replace('{x}', number);
            },
        };


        // auto-registration of the default theme
        window.FileUploaderLangs.eng = new FileUploaderLang_Eng();
    })();
}



