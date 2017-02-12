<?php


namespace Updf\Model;


use Updf\Util\UpdfUtil;

class DummyInvoiceModel extends InvoiceModel
{


    protected function getTemplateVariables()
    {
        return [
            //------------------------------------------------------------------------------/
            // VARIABLES
            //------------------------------------------------------------------------------/
            // header
            'header_logo_width' => "100",
            'header_logo_img_src' => UpdfUtil::getImgSrc(__DIR__ . "/img/updf-default-logo.png"),
            'header_date' => "2017-02-10",
            'header_title' => "#FA000027",


            // address
            'shop_address' => "Default company
France",

            'delivery_address' => "Ling talfi
110 rue verte
49000 Domours
France",
            'billing_address' => "Ling talfi
110 rue verte
49000 Domours
France",


            // summary
            'invoice_number' => "#FR_0000024",
            'invoice_date' => "2017-02-10",
            'order_reference' => "C_00003523",
            'order_date' => "2017-02-10",


            // products
            'display_product_images' => false,
            'order_details' => [
                [
                    'product_reference' => '1438',
                    'product_name' => 'Ballon paille',
                    'product_image_src' => UpdfUtil::getImgSrc(__DIR__ . "/img/ballon-paille-bleu.jpg"),
                    'tax_label' => "20 %",
                    'base_price' => "9,20 €",
                    'unit_price' => "4,50 €",
                    'quantity' => "1",
                    'total' => "4,50 €",
                ],
                [
                    'product_reference' => '1470',
                    'product_name' => 'Corde à sauter',
                    'product_image_src' => UpdfUtil::getImgSrc(__DIR__ . "/img/pilates-ring-lf-noir.jpg"),
                    'tax_label' => "20 %",
                    'base_price' => "3,50 €",
                    'unit_price' => "1,20 €",
                    'quantity' => "2",
                    'total' => "2,40 €",
                ],
            ],


            // cart rules
            'cart_discounts' => [
                [
                    'name' => "Réduction 0,20 € pour tout achat de plus de 5 €",
                    'price' => "-0,20 €",
                ],
            ],


            // tax tab
            'tax_exempt' => false,
            'tax_details' => [
                [
                    'label' => "Produits",
                    'tax_label' => "20.000",
                    'base_price' => "6,70 €",
                    'total_taxes' => "1,34 €",
                ],
                [
                    'label' => "Livraison",
                    'tax_label' => "20.000",
                    'base_price' => "6,37 €",
                    'total_taxes' => "1,27 €",
                ],
            ],
            'total_products' => "6,90 €",
            'total_discounts' => "-0,20 €",
            'total_shipping_cost' => "6,37 €",
            'total_tax_excluded' => "12,07 €",
            'total_taxes' => "2,61 €",
            'total_2' => "14,68 €",


            'payment_method' => "CM-CIC P@iement",
            'payment_amount' => "14,68 €",
        ];
    }
}