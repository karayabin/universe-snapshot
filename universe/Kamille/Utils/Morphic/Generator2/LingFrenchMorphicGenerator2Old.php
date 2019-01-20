<?php


namespace Module\Ekom\Morphic\Generator;


use Bat\CaseTool;
use Bat\StringTool;
use Kamille\Utils\Morphic\Generator2\ModuleMorphicGenerator2;
use QuickPdo\QuickPdoInfoTool;


class LingFrenchMorphicGenerator2Old extends ModuleMorphicGenerator2
{
    protected $handledPrefixes;


    public function __construct()
    {
        parent::__construct();
        $this->handledPrefixes = [
            'ek_' => 'Ekom',
        ];
    }


    /**
     * execute helper in a browser, it generates some php code that you can inject in this class to get started...
     * $scaffoldingType: default=table, possible values are
     *  - table
     *
     */
    public static function helper($scaffoldingType = null)
    {

        if (null === $scaffoldingType) {
            $scaffoldingType = 'table';
        }

        if ('table' === $scaffoldingType) {


            header("Content-type: text/plain");


            $tables = QuickPdoInfoTool::getTables("kamille", 'ek_');
            foreach ($tables as $table) {
                $originalTable = $table;
                if (
                    false !== strpos($table, "_")
                ) {
                    $p = explode("_", $table);
                    array_shift($p); // drop the prefix
                    $table = implode('_', $p);
                }
                $name = strtolower($table);
                $name = str_replace("_has_", '-', $name);


                echo <<<EEE
            case "$originalTable":
                \$label = "adresse";
                \$labelPlural = "adresses";
                \$genre = "f";
                \$article = "La";
                break;
                
EEE;
            }

        } else {
            header("Content-type: text/plain");


            $db = "kamille";

            $tables = QuickPdoInfoTool::getTables("kamille", 'ek_');
            $allCols = [];
            foreach ($tables as $table) {
                $originalTable = $table;
                $cols = QuickPdoInfoTool::getColumnNames($table);

                foreach ($cols as $col) {
                    $allCols[] = $col;
                }


            }


            $allCols = array_unique($allCols);
            sort($allCols);
            foreach ($allCols as $col) {
                $label = str_replace('_', ' ', $col);

                echo <<<EEE
            case "$col":
                \$label = "$label";
                break;
                
EEE;
            }

        }

    }

    protected function decorateTableInfo(array &$tableInfo)
    {
        $table = $tableInfo['table'];


        switch ($table) {
            case "ek_address":
                $label = "adresse";
                $labelPlural = "adresses";
                $genre = "f";
                $article = "l'";
                break;
            case "ek_backoffice_user":
                $label = "utilisateur du backoffice";
                $labelPlural = "utilisateurs du backoffice";
                $genre = "m";
                $article = "l'";
                break;
            case "ek_carrier":
                $label = "transporteur";
                $labelPlural = "transporteurs";
                $genre = "m";
                $article = "le";
                break;
            case "ek_cart":
                $label = "panier";
                $labelPlural = "paniers";
                $genre = "f";
                $article = "la";
                break;
            case "ek_category":
                $label = "catégorie";
                $labelPlural = "catégories";
                $genre = "f";
                $article = "la";
                break;
            case "ek_category_has_discount":
                $label = "liaison catégorie/réduction";
                $labelPlural = "liaisons catégorie/réduction";
                $genre = "f";
                $article = "la";
                break;
            case "ek_category_has_product_card":
                $label = "liaison catégorie/carte";
                $labelPlural = "liaisons catégorie/carte";
                $genre = "f";
                $article = "la";
                break;
            case "ek_country":
                $label = "pays";
                $labelPlural = "pays";
                $genre = "m";
                $article = "le";
                break;
            case "ek_coupon":
                $label = "coupon";
                $labelPlural = "coupons";
                $genre = "m";
                $article = "le";
                break;
            case "ek_currency":
                $label = "devise";
                $labelPlural = "devises";
                $genre = "f";
                $article = "la";
                break;
            case "ek_direct_debit":
                $label = "entrée débit direct";
                $labelPlural = "entrées débit direct";
                $genre = "f";
                $article = "l'";
                break;
            case "ek_discount":
                $label = "réduction";
                $labelPlural = "réductions";
                $genre = "f";
                $article = "la";
                break;
            case "ek_feature":
                $label = "caractéristique de produit";
                $labelPlural = "caractéristiques de produit";
                $genre = "f";
                $article = "la";
                break;
            case "ek_feature_value":
                $label = "valeur de caractéristique";
                $labelPlural = "valeurs de caractéristique";
                $genre = "f";
                $article = "la";
                break;
            case "ek_invoice":
                $label = "facture";
                $labelPlural = "factures";
                $genre = "f";
                $article = "la";
                break;
            case "ek_manufacturer":
                $label = "fabricant";
                $labelPlural = "fabricants";
                $genre = "m";
                $article = "le";
                break;
            case "ek_newsletter":
                $label = "entrée newsletter";
                $labelPlural = "entrées newsletter";
                $genre = "f";
                $article = "l'";
                break;
            case "ek_order":
                $label = "commande";
                $labelPlural = "commandes";
                $genre = "f";
                $article = "la";
                break;
            case "ek_order_has_order_status":
                $label = "liaison commande/statut de commande";
                $labelPlural = "liaisons commande/statut de commande";
                $genre = "f";
                $article = "la";
                break;
            case "ek_order_status":
                $label = "statut de commande";
                $labelPlural = "statuts de commande";
                $genre = "m";
                $article = "le";
                break;
            case "ek_password_recovery_request":
                $label = "entrée \"renvoi de mot de passe\"";
                $labelPlural = "entrées \"renvoi de mot de passe\"";
                $genre = "f";
                $article = "l'";
                break;
            case "ek_payment_method":
                $label = "méthode de paiement";
                $labelPlural = "méthodes de paiement";
                $genre = "f";
                $article = "la";
                break;
            case "ek_product":
                $label = "produit";
                $labelPlural = "produits";
                $genre = "m";
                $article = "le";
                break;
            case "ek_product_attribute":
                $label = "attribut de produit";
                $labelPlural = "attributs de produit";
                $genre = "m";
                $article = "l'";
                break;
            case "ek_product_attribute_value":
                $label = "valeur d'attribut de produit";
                $labelPlural = "valeurs d'attribut de produit";
                $genre = "f";
                $article = "la";
                break;
            case "ek_product_bundle":
                $label = "pack";
                $labelPlural = "packs";
                $genre = "m";
                $article = "le";
                break;
            case "ek_product_bundle_has_product":
                $label = "liaison pack/produit";
                $labelPlural = "liaisons pack/produit";
                $genre = "f";
                $article = "la";
                break;
            case "ek_product_card":
                $label = "carte";
                $labelPlural = "cartes";
                $genre = "f";
                $article = "la";
                break;
            case "ek_product_card_has_discount":
                $label = "liaison carte/réduction";
                $labelPlural = "liaisons carte/réduction";
                $genre = "f";
                $article = "la";
                break;
            case "ek_product_card_has_product_attribute":
                $label = "liaison carte/attribut de produit";
                $labelPlural = "liaisons carte/attribut de produit";
                $genre = "f";
                $article = "la";
                break;
            case "ek_product_card_image":
                $label = "image";
                $labelPlural = "images";
                $genre = "f";
                $article = "l'";
                break;
            case "ek_product_comment":
                $label = "commentaire de produit";
                $labelPlural = "commentaires de produit";
                $genre = "m";
                $article = "le";
                break;
            case "ek_product_group":
                $label = "groupe de produit";
                $labelPlural = "groupes de produit";
                $genre = "m";
                $article = "le";
                break;
            case "ek_product_group_has_product":
                $label = "liaison groupe de produit/produit";
                $labelPlural = "liaisons groupe de produit/produit";
                $genre = "f";
                $article = "la";
                break;
            case "ek_product_has_discount":
                $label = "liaison produit/réduction";
                $labelPlural = "liaisons produit/réduction";
                $genre = "f";
                $article = "la";
                break;
            case "ek_product_has_feature":
                $label = "liaison produit/caractéristique de produit";
                $labelPlural = "liaisons produit/caractéristique de produit";
                $genre = "f";
                $article = "la";
                break;
            case "ek_product_has_product_attribute":
                $label = "liaison produit/attribut de produit";
                $labelPlural = "liaisons produit/attribut de produit";
                $genre = "f";
                $article = "la";
                break;
            case "ek_product_has_provider":
                $label = "liaison produit/fournisseur";
                $labelPlural = "liaisons produit/fournisseur";
                $genre = "f";
                $article = "la";
                break;
            case "ek_product_has_tag":
                $label = "liaison produit/tag";
                $labelPlural = "liaisons produit/tag";
                $genre = "f";
                $article = "la";
                break;
            case "ek_product_purchase_stat":
                $label = "statistique d'achat";
                $labelPlural = "statistiques d'achat";
                $genre = "f";
                $article = "la";
                break;
            case "ek_product_type":
                $label = "type de produit";
                $labelPlural = "types de produit";
                $genre = "m";
                $article = "le";
                break;
            case "ek_provider":
                $label = "fournisseur";
                $labelPlural = "fournisseurs";
                $genre = "m";
                $article = "le";
                break;
            case "ek_seller":
                $label = "vendeur";
                $labelPlural = "vendeurs";
                $genre = "m";
                $article = "le";
                break;
            case "ek_seller_has_address":
                $label = "liaison vendeur/adresse";
                $labelPlural = "liaisons vendeur/adresse";
                $genre = "f";
                $article = "la";
                break;
            case "ek_shop_configuration":
                $label = "configuration de la boutique virtuelle";
                $labelPlural = "configurations de la boutique virtuelle";
                $genre = "f";
                $article = "la";
                break;
            case "ek_store":
                $label = "magasin";
                $labelPlural = "magasins";
                $genre = "m";
                $article = "le";
                break;
            case "ek_tag":
                $label = "tag";
                $labelPlural = "tags";
                $genre = "m";
                $article = "le";
                break;
            case "ek_tax":
                $label = "taxe";
                $labelPlural = "taxes";
                $genre = "f";
                $article = "la";
                break;
            case "ek_tax_group":
                $label = "groupe de taxe";
                $labelPlural = "groupes de taxe";
                $genre = "m";
                $article = "le";
                break;
            case "ek_tax_group_has_tax":
                $label = "liaison groupe de taxe/taxe";
                $labelPlural = "liaisons groupe de taxe/taxe";
                $genre = "f";
                $article = "la";
                break;
            case "ek_timezone":
                $label = "fuseau horaire";
                $labelPlural = "fuseaux horaire";
                $genre = "m";
                $article = "le";
                break;
            case "ek_user":
                $label = "utilisateur";
                $labelPlural = "utilisateurs";
                $genre = "m";
                $article = "le";
                break;
            case "ek_user_group":
                $label = "groupe d'utilisateurs";
                $labelPlural = "groupes d'utilisateurs";
                $genre = "m";
                $article = "le";
                break;
            case "ek_user_has_address":
                $label = "liaison utilisateur/adresse";
                $labelPlural = "liaisons utilisateur/adresse";
                $genre = "f";
                $article = "la";
                break;
            case "ek_user_has_product":
                $label = "liaison utilisateur/produit";
                $labelPlural = "liaisons utilisateur/produit";
                $genre = "f";
                $article = "la";
                break;
            case "ek_user_has_user_group":
                $label = "liaison utilisateur/groupe d'utilisateurs";
                $labelPlural = "liaisons utilisateur/groupe d'utilisateurs";
                $genre = "f";
                $article = "la";
                break;
            default:
                $prettyName = $this->getNameByTable($table);
                $label = str_replace("_", ' ', $prettyName);
                $labelPlural = StringTool::getPlural($label);
                $genre = '?';
                $article = '?';
                break;
        }
        $tableInfo['genre'] = $genre;
        $tableInfo['article'] = $article;
        $tableInfo['label'] = $label;
        $tableInfo['labelPlural'] = $labelPlural;
    }


    protected function identifierToLabel($identifier, $table)
    {
        return ucfirst($this->getColumnLabelFromName($identifier, $table));
    }


    protected function getControllerNewItemBtnText(array $tableInfo)
    {
        $sGenre = ($tableInfo['genre'] === 'm') ? 'un nouveau' : 'une nouvelle';
        $label = $tableInfo['label'];
        return "Ajouter $sGenre $label";
    }

    protected function getColumnLabelFromName($colName, $table)
    {
        /**
         * return lower case version of the label
         */
        switch ($colName) {
            case "_discount_badge":
                $label = "badge réduction";
                break;
            case "_popularity":
                $label = "popularité";
                break;
            case "active":
                $label = "actif";
                break;
            case "active_hash":
                $label = "hash actif";
                break;
            case "address":
                $label = "adresse";
                break;
            case "address_id":
                $label = "adresse";
                break;
            case "amount":
                $label = "montant";
                break;
            case "attribute_selection":
                $label = "sélection d'attributs";
                break;
            case "billing_address":
                $label = "adresse de facturation";
                break;
            case "birthday":
                $label = "date d'anniversaire";
                break;
            case "bo_active":
                $label = "actif dans le backoffice";
                break;
            case "cart_quantity":
                $label = "quantité panier";
                break;
            case "category_id":
                $label = "catégorie";
                break;
            case "city":
                $label = "ville";
                break;
            case "code":
                $label = "code";
                break;
            case "codes":
                $label = "codes";
                break;
            case "color":
                $label = "couleur";
                break;
            case "comment":
                $label = "commentaire";
                break;
            case "conditions":
                $label = "conditions";
                break;
            case "configuration":
                $label = "configuration";
                break;
            case "country_id":
                $label = "pays";
                break;
            case "coupon_saving":
                $label = "montant économisé sur le coupon";
                break;
            case "currency_id":
                $label = "devise";
                break;
            case "currency_iso_code":
                $label = "code iso de la devise";
                break;
            case "date":
                $label = "date";
                break;
            case "date_created":
                $label = "créé le";
                break;
            case "date_creation":
                $label = "date de création";
                break;
            case "date_used":
                $label = "utilisé(e) le";
                break;
            case "deleted_date":
                $label = "supprimé(e) le";
                break;
            case "depth":
                $label = "profondeur";
                break;
            case "description":
                $label = "description";
                break;
            case "discount_id":
                $label = "réduction";
                break;
            case "ean":
                $label = "ean";
                break;
            case "email":
                $label = "email";
                break;
            case "exchange_rate":
                $label = "taux de conversion";
                break;
            case "extra":
                $label = "extra";
                break;
            case "feature_id":
                $label = "caractéristique";
                break;
            case "feature_value_id":
                $label = "valeur de caractéristique";
                break;
            case "feedback_details":
                $label = "retours";
                break;
            case "first_name":
                $label = "prénom";
                break;
            case "gender":
                $label = "genre";
                break;
            case "height":
                $label = "hauteur";
                break;
            case "id":
                $label = "id";
                break;
            case "invoice_date":
                $label = "date de facturation";
                break;
            case "invoice_details":
                $label = "détails de la facture";
                break;
            case "invoice_id":
                $label = "facture";
                break;
            case "invoice_number":
                $label = "numéro de facture";
                break;
            case "invoice_number_alt":
                $label = "numéro de facture alternatif";
                break;
            case "ip":
                $label = "ip";
                break;
            case "is_default":
                $label = "par défaut";
                break;
            case "is_default_billing_address":
                $label = "adresse de facturation par défaut";
                break;
            case "is_default_shipping_address":
                $label = "adresse de livraison par défaut";
                break;
            case "iso_code":
                $label = "code iso";
                break;
            case "items":
                $label = "éléments";
                break;
            case "key":
                $label = "clé";
                break;
            case "label":
                $label = "label";
                break;
            case "lang_iso_code":
                $label = "langue (code iso)";
                break;
            case "last_name":
                $label = "nom";
                break;
            case "legend":
                $label = "légende";
                break;
            case "manufacturer_id":
                $label = "fabricant";
                break;
            case "meta_description":
                $label = "meta description";
                break;
            case "meta_keywords":
                $label = "meta keywords";
                break;
            case "meta_title":
                $label = "balise titre";
                break;
            case "mobile":
                $label = "mobile";
                break;
            case "mode":
                $label = "mode";
                break;
            case "name":
                $label = "nom";
                break;
            case "newsletter":
                $label = "newsletter";
                break;
            case "operand":
                $label = "opérande";
                break;
            case "order":
                $label = "ordre";
                break;
            case "order_date":
                $label = "date de la commande";
                break;
            case "order_details":
                $label = "détails de la commande";
                break;
            case "order_id":
                $label = "commande";
                break;
            case "order_status_id":
                $label = "statut de commande";
                break;
            case "out_of_stock_text":
                $label = "message à afficher en cas de rupture de stock";
                break;
            case "paid":
                $label = "payé";
                break;
            case "pass":
                $label = "mot de passe";
                break;
            case "payment_method":
                $label = "méthode de paiement";
                break;
            case "payment_method_extra":
                $label = "méthode de paiement extra";
                break;
            case "phone":
                $label = "téléphone";
                break;
            case "phone_prefix":
                $label = "préfixe téléphonique";
                break;
            case "php_sess_id":
                $label = "identifiant de session php";
                break;
            case "position":
                $label = "position";
                break;
            case "postcode":
                $label = "code postal";
                break;
            case "price":
                $label = "prix";
                break;
            case "price_without_tax":
                $label = "prix sans taxe";
                break;
            case "priority":
                $label = "priorité";
                break;
            case "procedure_operand":
                $label = "opérande";
                break;
            case "procedure_type":
                $label = "type";
                break;
            case "product_attribute_id":
                $label = "attribut de produit";
                break;
            case "product_attribute_value_id":
                $label = "valeur d'attribut de produit";
                break;
            case "product_bundle_id":
                $label = "pack";
                break;
            case "product_card_id":
                $label = "carte";
                break;
            case "product_details":
                $label = "détails du produit";
                break;
            case "product_details_selection":
                $label = "détails de la selection de produit";
                break;
            case "product_group_id":
                $label = "groupe de produit";
                break;
            case "product_id":
                $label = "produit";
                break;
            case "product_label":
                $label = "label";
                break;
            case "product_ref":
                $label = "référence";
                break;
            case "product_type_id":
                $label = "type de produit";
                break;
            case "provider_id":
                $label = "fournisseur";
                break;
            case "pseudo":
                $label = "pseudo";
                break;
            case "purchase_date":
                $label = "date d'achat";
                break;
            case "quantity":
                $label = "quantité";
                break;
            case "rating":
                $label = "vote";
                break;
            case "reference":
                $label = "référence";
                break;
            case "seller":
                $label = "vendeur";
                break;
            case "seller_address":
                $label = "adresse du vendeur";
                break;
            case "seller_id":
                $label = "vendeur";
                break;
            case "shipping_address":
                $label = "addresse de livraison";
                break;
            case "shop_host":
                $label = "nom de domaine de la boutique virtuelle";
                break;
            case "shop_info":
                $label = "informations de la boutique virtuelle";
                break;
            case "slug":
                $label = "slug";
                break;
            case "subscribe_date":
                $label = "date de souscription";
                break;
            case "supplement":
                $label = "supplément";
                break;
            case "symbol":
                $label = "symbole";
                break;
            case "tag_id":
                $label = "tag";
                break;
            case "target":
                $label = "cible";
                break;
            case "tax_group_id":
                $label = "groupe de taxe";
                break;
            case "tax_id":
                $label = "taxe";
                break;
            case "technical_description":
                $label = "description technique";
                break;
            case "title":
                $label = "titre";
                break;
            case "total":
                $label = "total";
                break;
            case "total_without_tax":
                $label = "total sans taxe";
                break;
            case "track_identifier":
                $label = "identifiant de tracking";
                break;
            case "type":
                $label = "type";
                break;
            case "unsubscribe_date":
                $label = "date de désinscription";
                break;
            case "url":
                $label = "url";
                break;
            case "useful_counter":
                $label = "compteur d'utilité";
                break;
            case "user_group_id":
                $label = "groupe d'utilisateurs";
                break;
            case "user_id":
                $label = "utilisateur";
                break;
            case "user_info":
                $label = "info utilisateurs";
                break;
            case "value":
                $label = "valeur";
                break;
            case "weight":
                $label = "poids";
                break;
            case "wholesale_price":
                $label = "prix d'achat";
                break;
            case "width":
                $label = "largeur";
                break;


            default:
                $label = str_replace('_', ' ', $colName);
                break;
        }
        return $label;
    }

    protected function getFormInsertSuccessMessage(array $tableInfo, $table, $label)
    {
        if ('?' === $tableInfo['genre'] || '?' === $tableInfo['article']) {
            return "Le/la " . $label . " a bien été ajouté(e)";
        }
        $last = ("m" === $tableInfo['genre']) ? 'ajouté' : 'ajoutée';
        $article = ucfirst($tableInfo['article']);
        if ('Le' === $article || "La" === $article) {
            $article .= ' ';
        }

        return $article . $label . " a bien été $last";
    }

    protected function getFormUpdateSuccessMessage(array $tableInfo, $table, $label)
    {
        if ('?' === $tableInfo['genre'] || '?' === $tableInfo['article']) {
            return "Le/la " . $label . " a bien été mis(e) à jour";
        }
        $last = ("m" === $tableInfo['genre']) ? 'mis à jour' : 'mise à jour';
        $article = ucfirst($tableInfo['article']);
        $article = ucfirst($tableInfo['article']);
        if ('Le' === $article || "La" === $article) {
            $article .= ' ';
        }
        return $article . $label . " a bien été $last";
    }

    protected function getFormInsertStatement(array $tableInfo, $table, $insertCols)
    {
        $object = $this->getObjectName($table);
        if (false === $object) {
            return parent::getFormInsertStatement($tableInfo, $table, $insertCols);
        }

        return <<<EEE
            \$o = new $object();
            \$ric = \$o->create(\$fData, false, true);
EEE;
    }

    protected function getFormUpdateStatement(array $tableInfo, $table, $updateCols, $updateWhere, array $updateWhereCols)
    {
        $object = $this->getObjectName($table);
        if (false === $object) {
            return parent::getFormUpdateStatement($tableInfo, $table, $updateCols, $updateWhere, $updateWhereCols);
        }

        $s = '';
        $indent = "\t\t\t\t";
        foreach ($updateWhereCols as $col) {
            $s .= PHP_EOL . $indent . '"' . $col . '" => $' . $col . ',';

        }

        return <<<EEE
            \$o = new $object();
            \$o->update(\$fData, [$s            
            ]);
EEE;
    }

    protected function getForeignKeyExtraLinkText($label, array $tableInfo, array $fkTableInfo)
    {
        $sGenre = ($fkTableInfo['genre'] === 'm') ? 'un nouveau' : 'une nouvelle';
        $label = $fkTableInfo['label'];
        return "Créer $sGenre $label";
    }


    protected function getRenderWithParentCodeBlockLangInfo($tableInfo)
    {
        $label = $tableInfo['label'];
        $labelPlural = $tableInfo['labelPlural'];
        $article = $tableInfo['article'];

        if ('le' === $article || 'la' === $article) {
            $label = $article . " " . $label;
        } else {
            $label = $article . "" . $label;
        }

        return [
            $label,
            $labelPlural,
            $tableInfo['article'],
        ];
    }

    protected function _getControllerGetAddBtnTextByAvatarMethod(array $tableInfo)
    {
        $genre = $tableInfo['genre'];
        if ('m' === $genre) {
            $sGenre = "un ";
        } else {
            $sGenre = "une ";
        }
        $s = <<<EEE
        
    protected function getAddBtnTextByAvatar(\$parentAvatar, \$elementLabel, \$parentLabel)
    {
        \$elementLabel = lcfirst(\$elementLabel);
        return "Ajouter $sGenre \$elementLabel pour \$parentLabel \"\$parentAvatar\"";
    }        
    
EEE;
        return $s;
    }

    protected function _getControllerGetRenderWithParentTitle(array $tableInfo)
    {
        $s = <<<EEE
        
    protected function getRenderWithParentTitle(\$parentAvatar, \$elementLabelPlural, \$parentLabel)
    {
        return "\$elementLabelPlural pour \$parentLabel \"\$parentAvatar\"";
    }
    
EEE;
        return $s;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    private function getObjectName($table)
    {
        foreach ($this->handledPrefixes as $prefix => $module) {
            if (0 === strpos($table, $prefix)) {
                $p = explode('_', $table);
                array_shift($p); // drop the prefix
                return '\Module\\' . $module . '\Api\Object\\' . ucfirst(CaseTool::snakeToCamel(implode('_', $p)));
            }
        }

        return false;
    }
}