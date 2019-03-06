<style>

    /*------------------------------------
    -
    ------------------------------------*/
    .header-bgcolor {
        background-color: __theme_header_bgcolor__;
        color: __theme_header_color__;
    }

    .bold {
        font-weight: bold;
    }

    .big {
        font-size: 8px;
    }

    .bigger {
        font-size: 10px;
    }

    .biggest-font-size {
        font-size: 14px;
    }

    span.grayed_out {
        color: #aaa;
    }

    tr.small-font-size td {
        font-size: 8px;
    }

    /*------------------------------------
    -
    ------------------------------------*/
    table.soft-table {
        padding: 4px;
        border: 1px solid #000;
        background-color: white;
    }

    table.soft-table th {
        font-size: 8px;
        background-color: __theme_header_bgcolor__;
        color: __theme_header_color__;
        vertical-align: middle;
        text-align: center;
        font-weight: bold;
    }

    table.small-font-size tr td {
        font-size: 7px;

    }

    table.soft-table tr.normal-font-size td {
        font-size: 8px;
    }

    /*------------------------------------
    -
    ------------------------------------*/
    table.grid-table {
        padding: 4px;
        border: 1px solid #000;
        background-color: white;
    }

    table.grid-table th {
        font-size: 8px;
        background-color: __theme_header_bgcolor__;
        color: __theme_header_color__;
        vertical-align: middle;
        text-align: center;
        font-weight: bold;
        border-bottom: 1pt solid #000;
    }

    table.grid-table tr.color_line_even {
        background-color: __theme_even_line_bgcolor__;
        color: __theme_even_line_color__;
    }

    table.grid-table tr.color_line_odd {
        background-color: __theme_odd_line_bgcolor__;
        color: __theme_odd_line_color__;
    }

    table.grid-table tr.color_line_even td,
    table.grid-table tr.color_line_odd td {
        border-bottom: 1px solid __theme_product_tr_border_color__;
        font-size: 8px;
    }

    /*------------------------------------
    -
    ------------------------------------*/
    table.align-right tr td {
        text-align: right;
    }

    table.align-center tr td {
        text-align: center;
    }

</style>
<table>


    <!-- HEADER -->
    <tr>
        <td colspan="12">
            <table>
                <tr>
                    <td colspan="6">
                        <img src="__header_logo_img_src__" width="__header_logo_width__"/>
                    </td>
                    <td colspan="6" align="right" class="biggest-font-size">
                        <b><?php echo ($v->text_header_label) ? $v->text_header_label : ''; ?></b>
                        <br><span class="grayed_out">__header_date__</span>
                        <br><span class="grayed_out">__header_title__</span>
                    </td>
                </tr>
            </table>

        </td>
    </tr>

    <!-- space -->
    <tr>
        <td height="35" colspan="12"></td>
    </tr>


    <!-- ADDRESS -->
    <tr>
        <td colspan="12">
            <table>
                <tr>
                    <td><?php echo $v->shop_address; ?></td>
                    <td><?php if ($v->delivery_address): ?><b><?php echo $v->text_delivery_address; ?></b>
                            <br>
                            <br><?php echo $v->delivery_address; ?>
                        <?php endif; ?>
                    </td>
                    <td><b><?php echo $v->text_billing_address; ?></b>
                        <br>
                        <br><?php echo $v->billing_address; ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <!-- space -->
    <tr>
        <td height="30" colspan="12"></td>
    </tr>


    <!-- SUMMARY -->
    <tr>
        <td colspan="12">
            <table class="soft-table align-center small-font-size">
                <tr>
                    <th>__text_invoice_number__</th>
                    <th>__text_invoice_date__</th>
                    <th>__text_order_reference__</th>
                    <th>__text_order_date__</th>
                </tr>
                <tr>
                    <td>__invoice_number__</td>
                    <td>__invoice_date__</td>
                    <td>__order_reference__</td>
                    <td>__order_date__</td>
                </tr>
            </table>
        </td>
    </tr>

    <!-- space -->
    <tr>
        <td height="20" colspan="12"></td>
    </tr>


    <!-- PRODUCTS -->
    <tr>
        <td colspan="12">
            <table class="grid-table">


                <tr>
                    <th width="15%">__text_reference__</th>
                    <th width="35%">__text_product__</th>
                    <th width="10%">__text_tax_rate__</th>
                    <th width="10%">__text_base_price__</th>
                    <th width="10%">__text_unit_price__</th>
                    <th width="10%">__text_quantity__</th>
                    <th width="10%">__text_total__</th>
                </tr>


                <!-- PRODUCTS -->
                <?php
                $i = 1;
                foreach ($v->order_details as $od):
                    $sClass = (0 === ($i++ % 2)) ? 'color_line_even' : 'color_line_odd';

                    ?>
                    <tr class="<?php echo $sClass; ?>">

                        <td>
                            <?php echo $od->product_reference; ?>
                        </td>
                        <td align="left">
                            <?php if ($v->display_product_images): ?>
                                <table>
                                    <tr>
                                        <td width="30%"><img width="40" src="<?php echo $od->product_image_src; ?>">
                                        </td>
                                        <td width="70%"><?php echo $od->product_name; ?></td>
                                    </tr>
                                </table>
                            <?php else: ?>
                                <?php echo $od->product_name; ?>
                            <?php endif; ?>

                        </td>
                        <td>
                            <?php echo $od->tax_label; ?>
                        </td>


                        <td>
                            <?php echo $od->base_price; ?>
                        </td>

                        <td>
                            <?php echo $od->unit_price; ?>
                        </td>
                        <td>
                            <?php echo $od->quantity; ?>
                        </td>
                        <td>
                            <?php echo $od->total; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <!-- END PRODUCTS -->

                <!-- CART RULES -->
                <?php

                $colCount = 0; // don't know what colCount is exactly,
                //see original prestashop template
                $nbCartDiscounts = count($v->cart_discounts);
                if ($nbCartDiscounts > 0): ?>
                    <tr>
                        <th colspan="7">
                            __text_discounts__
                        </th>
                    </tr>
                    <?php
                    $i = 1;
                    foreach ($v->cart_discounts as $cd):
                        $sClass = (0 === ($i++ % 2)) ? 'color_line_even' : 'color_line_odd';
                        ?>
                        <tr class="<?php echo $sClass; ?>">
                            <td colspan="6">
                                <?php echo $cd->name; ?>
                            </td>
                            <td>
                                <?php echo $cd->price; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>

            </table>
        </td>
    </tr>


    <!-- space -->
    <tr>
        <td height="10" colspan="12"></td>
    </tr>


    <!-- TVA -->
    <tr>
        <!-- Code TVA -->
        <td colspan="6">

            <?php if ($v->tax_exempt): ?>__text_tax_exempted__<?php else: ?>
                <table class="soft-table align-center">

                    <tr>
                        <th>__text_tax_detail__</th>
                        <th>__text_tax_rate_label__</th>
                        <th>__text_tax_base_price__</th>
                        <th>__text_tax_total__</th>
                    </tr>

                    <?php if (count($v->tax_details) > 0): ?>
                        <?php foreach ($v->tax_details as $d): ?>

                            <tr class="normal-font-size">
                                <td>
                                    <?php echo $d->label; ?>
                                </td>

                                <td>
                                    <?php echo $d->tax_label; ?> %
                                </td>


                                <td>
                                    <?php echo $d->base_price; ?>
                                </td>


                                <td>
                                    <?php echo $d->total_taxes; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">__text_no_taxes__</td>
                        </tr>
                    <?php endif; ?>
                </table>
            <?php endif; ?>

            <!-- space -->
            <table>
                <tr>
                    <td height="10" colspan="12"></td>
                </tr>
            </table>


            <table class="soft-table align-center small-font-size">
                <tr>
                    <td class="header-bgcolor bold" width="44%">__text_payment_method__</td>
                    <td width="56%">
                        <table>
                            <tr>
                                <td>__payment_method__</td>
                                <td>__payment_amount__</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>


        </td>
        <td colspan="1">&nbsp;</td>
        <!-- Calcule TVA -->
        <td colspan="5">
            <table class="soft-table align-right">
                <tr class="small-font-size">
                    <td class="header-bgcolor" width="70%">
                        __text_total_products__
                    </td>
                    <td class="white" width="30%">
                        __total_products__
                    </td>
                </tr>

                <tr class="small-font-size">
                    <td class="header-bgcolor" width="70%">
                        __text_total_discounts__
                    </td>
                    <td class="white" width="30%">
                        __total_discounts__
                    </td>
                </tr>

                <tr class="small-font-size">
                    <td class="header-bgcolor" width="70%">
                        __text_shipping_cost__
                    </td>
                    <td class="white" width="30%">
                        __total_shipping_cost__
                    </td>
                </tr>

                <tr class="bold big">
                    <td class="header-bgcolor">
                        __text_total_tax_excluded__
                    </td>
                    <td class="white">
                        __total_tax_excluded__
                    </td>
                </tr>
                <tr class="bold big">
                    <td class="header-bgcolor">
                        __text_total_taxes__
                    </td>
                    <td class="white">
                        __total_taxes__
                    </td>
                </tr>
                <tr class="bold bigger">
                    <td class="header-bgcolor">
                        __text_total_2__
                    </td>
                    <td class="white">
                        __total_2__
                    </td>
                </tr>
            </table>

        </td>
    </tr>


</table>
