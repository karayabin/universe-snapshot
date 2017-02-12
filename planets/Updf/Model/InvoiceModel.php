<?php


namespace Updf\Model;



class InvoiceModel extends LingAbstractModel
{


    public function getFont()
    {
        return 'helvetica';
    }

    protected function getTemplateVariables()
    {
        return [
            //------------------------------------------------------------------------------/
            // VARIABLES
            //------------------------------------------------------------------------------/
            // header
            'header_logo_width' => "",
            'header_logo_img_src' => "",
            'header_date' => "",
            'header_title' => "",


            // address
            'shop_address' => "",

            'delivery_address' => "",
            'billing_address' => "",


            // summary
            'invoice_number' => "",
            'invoice_date' => "",
            'order_reference' => "",
            'order_date' => "",


            // products
            'display_product_images' => false,
            'order_details' => [],

            // cart rules
            'cart_discounts' => [],


            // tax tab
            'tax_exempt' => false,
            'tax_details' => [],
            'total_products' => "",
            'total_discounts' => "",
            'total_shipping_cost' => "",
            'total_tax_excluded' => "",
            'total_taxes' => "",
            'total_2' => "",

            'payment_method' => "",
            'payment_amount' => "",
        ];
    }


    protected function getThemeVariables()
    {
        return [
            //------------------------------------------------------------------------------/
            // THEME
            //------------------------------------------------------------------------------/
            'theme_header_bgcolor' => "#ddd", // #ddd
            'theme_header_color' => "#000", // #000
            'theme_even_line_bgcolor' => "#f5f5f5", // #f5f5f5
            'theme_even_line_color' => "#000", // #000
            'theme_odd_line_bgcolor' => "#fff", // #fff
            'theme_odd_line_color' => "#000", // #000
            'theme_product_tr_border_color' => "#ccc", // #ccc
        ];
    }
}