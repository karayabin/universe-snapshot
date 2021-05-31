<!DOCTYPE html>
<?php


use Ling\Bat\ConvertTool;

$main = $data['main'];
$lines = $data['lines'];
$total = $data['total'];
$vendor = $data['vendor'] ?? [];
$options = $data['options'] ?? [];
$text = $data['text'] ?? [];

$vendorTitle = $vendor['title'] ?? "MyVendor.com";
$vendorName = $vendor['name'] ?? "Komin.fr";
$vendorAddress = $vendor['address'] ?? "6 rue du marché creux";
$vendorZip = $vendor['zip'] ?? "73000";
$vendorCity = $vendor['city'] ?? "LongCastle";
$vendorCountry = $vendor['country'] ?? ""; // if empty, not displayed
$vendorPhone = $vendor['phone'] ?? "05 11 22 33 44"; // if empty, not displayed


$currencyDecimalSep = $options['currency_decimal_separator'] ?? ",";
$footerHtml = $options['footer'] ?? "Komin> -
                6 rue du marché creux 73000 LongCastle<br>
                Tél: 05 11 22 33 44 - Email: contact@komin.fr";

$maxNumberOfItemLinesForPageA = $options['maxNumberOfItemLinesForPageA'] ?? 20;


$textTelephone = $text['telephone'] ?? "Téléphone";
$textInvoice = $text['invoice'] ?? "Facture";
$textTelAbbr = $text['tel'] ?? "Tél";
$textEmail = $text['email'] ?? "Email";
$textDate = $text['date'] ?? "Date";
$textPage = $text['page'] ?? "Page";
$textPaymentMethod = $text['payment_method'] ?? "Payment method";

$textLinesReference = $text['lines_reference'] ?? "Reference";
$textLinesItem = $text['lines_item'] ?? "Item";
$textLinesUnitPrice = $text['lines_unit_price'] ?? "Unit price";
$textLinesQuantity = $text['lines_quantity'] ?? "Quantity";
$textLinesTotal = $text['lines_total'] ?? "Total";


/**
 * README FIRST
 * ===============
 *
 * This template works with 3 different pages:
 *
 * - page A: item lines and total section
 * - page B: only item lines, no total section
 * - page C: only total section, no item lines
 *
 *
 * This is due to how we want to handle multiple pages. Usually, page A is enough for most cases,
 * assuming that the client doesn't order too many things.
 *
 * Now a page can only display a certain amount of item lines. If the order contains more lines
 * than the page can fit, then we have to use multiple pages.
 * When in multiple page mode, we usually use page B for all the pages, except for the last page which
 * usually is a page A.
 *
 * The page C is sometimes required, when the order contains exactly the number of lines of x pages,
 * which means there is no more room for anything on the last page, but we still need to display the total.
 * In that case, we display the total on its own page (page C).
 *
 *
 */


/**
 *
 *
 * Displaying page B and page C is straight forward.
 *
 * However, for the display of page A we've decided to delegate some of the work on YOU (because our work around estimations
 * were deemed to clumsy).
 *
 * The problem with page A is that if the item lines and the total section are too big, they will overlap each other,
 * which is not acceptable.
 *
 * There are two elements to consider:
 *
 * - the item lines section, which grows down
 * - the total section, which grows up
 *
 * They grow up and down because we positioned them in absolute positioning, which is I believe the best positioning
 * for this kind of stuff, but the price to pay is a bit of extra configuration.
 *
 *
 * The number of lines of the total section depends on the customer: how many discounts will he apply to the cart.
 * In general (i.e. not this particular template), a total section can host a number of things:
 *
 * - a line for the tax
 * - a line for the carrier
 * - a variable amount of lines for some discounts
 * - a variable amount of lines for some special offers
 * - ...other things that your e-store might want to display
 *
 * In other words, it's difficult to know in advance the exact height of it.
 * However, because you know how your e-store works, you can have a pretty good estimation of its max height.
 *
 * So your goal, when configuring THIS template, is to estimate the max height of your total section,
 * and set the maxNumberOfItemLinesForPageA variable accordingly.
 *
 * I hope this is not too confusing.
 * Good luck!
 *
 *
 */


$maxNumberOfItemLinesForPageB = 30;

$nbItemLines = count($lines);
$nbPages = (int)ceil($nbItemLines / $maxNumberOfItemLinesForPageB);
$nbLinesOnLastPage = $nbItemLines % $maxNumberOfItemLinesForPageB;

$lastPageIsPageC = false;

if (
    0 === $nbLinesOnLastPage ||
    $nbLinesOnLastPage > $maxNumberOfItemLinesForPageA
) {
    $lastPageIsPageC = true;
}
if (true === $lastPageIsPageC) {
    $nbPages++;
}


?>
<html lang="en">
<head>
    <title>Title</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>


        html, body {
            height: 100%;
            padding: 0;
            margin: 0;
            font-size: 16px;
        }

        body {
            /*padding: 10px;*/
        }

        table {
            width: 100%;
            /*border: 1px dotted black;*/
        }

        .table-with-border {
            border: 1px solid black;
            border-collapse: collapse;
        }

        .table-with-all-border {
            border: 1px solid black;
            border-collapse: collapse;
        }

        .table-with-all-border tr,
        .table-with-all-border th,
        .table-with-all-border td {
            border: 1px solid black;
            padding: 5px;
        }

        .tr-border {
            border: 1px solid black;
        }

        .relative {
            position: relative;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .col50 {
            width: 50%;
        }

        .bold {
            font-weight: bold;
        }

        .p1 {
            padding: 5px;
        }

        .p2 {
            padding: 20px;
        }

        .mr3 {
            margin-right: 15px;
        }

        .company-title {
            font-weight: bold;
            font-size: 60px;
        }

        .small-title {
            font-weight: bold;
            font-size: 24px;
        }

        .tiny-title {
            font-weight: bold;
            font-size: 18px;
        }


        .buyer-name {
            font-weight: bold;
            font-size: 18px;
        }

        .bold-b2 {
            font-weight: bold;
        }


        .medium-title {
            font-weight: bold;
            font-size: 24px;
        }

        .brush2 {
            font-size: 18px;
        }

        .small-text {
            font-size: 1rem;
        }

        .table-with-all-border tr.no-border,
        .table-with-all-border td.no-border {
            border: none;
            border-left: 1px solid black;
        }

        .new-page {
            page-break-before: always;
            padding: 10px;
            height: 1425px;
            width: 1000px;

        }

        .abs {
            position: absolute;
        }


    </style>

</head>

<body>

<?php for ($currentPageNumber = 1; $currentPageNumber <= $nbPages; $currentPageNumber++):
    $isLastPage = ($nbPages === $currentPageNumber);
    $isPageC = (true === $isLastPage && true === $lastPageIsPageC);
    ?>


    <div class="relative new-page">

        <div class="abs" style="top:10px; left: 10px;right: 10px;">
            <table class="header">
                <tr style="vertical-align: top">
                    <td style="width:60%">
                        <span class="company-title"><?php echo $vendorTitle; ?></span><br>


                        <div style="margin-top: 5px; font-size: 20px;">
                            <span class="small-title"><?php echo $vendorName; ?></span>
                            <br>

                            <?php echo $vendorAddress; ?><br>
                            <?php echo $vendorZip; ?> <?php echo strtoupper($vendorCity); ?>
                            <?php if (false === empty($vendorCountry)): ?>
                                &nbsp;(<?php echo strtoupper($vendorCountry); ?>)
                            <?php endif; ?>
                            <br>
                            <?php if (false === empty($vendorPhone)): ?>
                                <?php echo $textTelephone; ?>: <?php echo $vendorPhone; ?>
                            <?php endif; ?>
                        </div>

                    </td>
                    <td style="width:40%">
                        <table class="table-with-border">
                            <tr>
                                <td class="p1">
                                    <span class="medium-title"><?php echo $textInvoice; ?> N°</span>

                                </td>
                                <td class="p1 text-right">
                                    <span class="medium-title mr3"><?php echo $main['invoice_number']; ?></span>
                                </td>
                            </tr>
                        </table>
                        <!--                                <table class="table-with-border" style="margin-top: 3px">-->
                        <!--                                    <tr class="tr-border">-->
                        <!--                                        <td class="p1">-->
                        <!--                                            <span class="brush2">Date</span>-->
                        <!---->
                        <!--                                        </td>-->
                        <!--                                        <td class="p1 text-right">-->
                        <!--                                            <span class="brush2 mr3">2021-05-04</span>-->
                        <!--                                        </td>-->
                        <!--                                    </tr>-->
                        <!--                                </table>-->
                        <table style="margin-top: 3px;">
                            <tr>
                                <td style="width: 90%">
                                    <table class="table-with-all-border">
                                        <tr>
                                            <td class="p1">
                                                <span class="brush2"><?php echo $textDate; ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p1">
                                                <span class="brush2"><?php echo $main['purchase_date']; ?></span>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="width: 10%">
                                    <table class="table-with-all-border">
                                        <tr>
                                            <td class="p1">
                                                <span class="brush2"><?php echo $textPage; ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p1">
                                                <span class="brush2"><?php echo $currentPageNumber; ?>/<?php echo $nbPages; ?></span>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>

                        <table class="table-with-border" style="margin-top: 50px">
                            <tr>
                                <td class="p2">
                                    <?php if (false === empty($main['company'])): ?>
                                        <span class="bold-b2"><?php echo $main['company']; ?></span><br>
                                        <span><?php echo strtoupper($main['last_name'] . " " . $main['first_name']); ?></span>
                                        <br>
                                    <?php else: ?>
                                        <br>
                                        <span class="bold-b2"><?php echo strtoupper($main['last_name'] . " " . $main['first_name']); ?></span>
                                        <br>
                                    <?php endif; ?>

                                    <?php echo strtoupper($main['address']); ?><br>
                                    <br>
                                    <?php echo $main['zip_postal_code']; ?> <?php echo strtoupper($main['city'] . " (" . $main['country'] . ")"); ?>
                                    <br>

                                    <?php if (false === empty($main['phone'])): ?>
                                        <?php echo $textTelAbbr; ?>: <?php echo $main['phone']; ?>
                                    <?php endif; ?>
                                    <br>


                                    <?php if (false === empty($main['email'])): ?>
                                        <?php echo $textEmail; ?>: <?php echo $main['email']; ?>
                                    <?php endif; ?>
                                    <br>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>

        <div class="abs" style="top:400px; left: 10px; width: 100%">
            <table class="middle">
                <tr>
                    <td>
                        <table class="table-with-all-border" style="width: 30%;">
                            <tr>
                                <td class="tiny-title">
                                    <?php echo $textPaymentMethod; ?>
                                </td>
                                <td style="text-align: center">
                                    <?php echo strtoupper($main['payment_method']); ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>


        <?php if (false === $isPageC): ?>
            <div class="abs" style="top:450px; left: 10px;right: 10px;">
                <table class="invoice-lines" style="margin-top: 20px;">
                    <tr>
                        <td>
                            <table class="table-with-all-border">
                                <tr>
                                    <th>
                                        <?php echo $textLinesReference; ?>
                                    </th>
                                    <th>
                                        <?php echo $textLinesItem; ?>
                                    </th>
                                    <th>
                                        <?php echo $textLinesUnitPrice; ?>
                                    </th>
                                    <th>
                                        <?php echo $textLinesQuantity; ?>
                                    </th>
                                    <th>
                                        <?php echo $textLinesTotal; ?>
                                    </th>
                                </tr>
                                <?php

                                $x = 0;
                                for ($i = 1; $i <= $maxNumberOfItemLinesForPageB; $i++): ?>
                                    <?php
                                    $item = array_shift($lines);
                                    ?>

                                    <?php if ($item):
                                        $x++;
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $item['product_reference']; ?>
                                            </td>
                                            <td>
                                                <?php echo $item['product_name']; ?>
                                            </td>
                                            <td>
                                                <span class="price"><?php echo $item['unit_price']; ?></span>
                                            </td>
                                            <td>
                                                <?php echo $item['quantity']; ?>
                                            </td>
                                            <td>
                                    <span class="price"><?php echo
                                        ConvertTool::toPrice((int)$item['quantity'] * (float)str_replace(',', '.', $item["unit_price"]), $currencyDecimalSep);
                                        ?></span>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endfor; ?>



                                <?php if ($x < $maxNumberOfItemLinesForPageA): ?>
                                    <?php for ($i = 1; $i <= $maxNumberOfItemLinesForPageA - $x; $i++): ?>

                                        <tr class="no-border">
                                            <td class="no-border">&nbsp;</td>
                                            <td class="no-border">&nbsp;</td>
                                            <td class="no-border">&nbsp;</td>
                                            <td class="no-border">&nbsp;</td>
                                            <td class="no-border">&nbsp;</td>
                                        </tr>
                                    <?php endfor; ?>
                                <?php endif; ?>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        <?php endif; ?>

        <?php if (true === $isLastPage): ?>


            <table id="total-zone" class="bottom-row abs" style="
            <?php if (true === $isPageC): ?>
                    top: 450px;
            <?php else: ?>
                    bottom: 100px;
            <?php endif; ?>


                    right: 10px;">


                <tr>
                    <td style="width:70%">
                    </td>
                    <td style="width: 30%">
                        <table class="total table-with-all-border">
                            <?php foreach ($total as $item): ?>
                                <tr>
                                    <td class="bold"><?php echo array_shift($item); ?></td>
                                    <td>
                                        <span><?php echo array_shift($item); ?></span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </td>
                </tr>
            </table>
        <?php endif; ?>

        <table id="footer-zone" class="abs text-center" style="bottom: 0px">
            <tr>
                <td>
                <span class="small-text text-center">
                <?php echo $footerHtml; ?>
                </span>
                </td>
            </tr>
        </table>
    </div>

<?php endfor; ?>
</body>
</html>