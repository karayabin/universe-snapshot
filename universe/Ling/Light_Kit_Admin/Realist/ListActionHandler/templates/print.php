<style>
    @media print {
        .no-print, .no-print * {
            display: none !important;
        }
    }

    #target-table thead tr{
        cursor: pointer;
    }
</style>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


<div class="container-fluid mt-2 collapse no-print" id="print-table-options">
    <h4 class="text-center">Print table options</h4>
    <table style="width: 90%; margin: 0 auto;">
        <tr>
            <td class="align-top">
                <h6 class="mr-4">Headers visibility</h6>
            </td>
            <td class="headers-visibility">
                <label class="mr-3">
                    Show headers
                    <input type="checkbox" checked>
                </label>
            </td>
        </tr>
        <tr>
            <td class="align-top">
                <h6 class="mr-4">Columns visibility</h6>
            </td>
            <td class="columns-visibility">

                <?php foreach ($columns as $column): ?>
                    <label class="mr-3">
                        <?php echo $column; ?>
                        <input type="checkbox" checked>
                    </label>
                <?php endforeach; ?>
            </td>
        </tr>
        <tr>
            <td class="align-top">
                <h6 class="mr-4">Header background color</h6>
            </td>
            <td class="header-bg-color">
                <label class="mr-3">
                    Show header background color
                    <input type="checkbox">
                </label>
            </td>
        </tr>
    </table>

</div>

<div class="container-fluid">
    <div class="row my-3 no-print">
        <div class="col text-center">

            <button class="btn btn-sm btn-primary" id="print-button">Print</button>
            <button data-toggle="collapse" data-target="#print-table-options" aria-expanded="false"
                    class="btn btn-sm btn-outline-success" id="configure-button">Configure
            </button>
        </div>
    </div>
    <table class="table table-bordered table-sm sortable" id="target-table">
        <tbody>
        <tr>
            <?php foreach ($columns as $column): ?>
                <th><?php echo $column; ?></th>
            <?php endforeach; ?>
        </tr>
        <?php echo $rowsHtml; ?>
        </tbody>
    </table>

</div>

<script src="/libs/universe/Ling/JSortTable/sort-table.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>


<script>


    $(document).ready(function () {


        //----------------------------------------
        // helper
        //----------------------------------------
        var jTable = $('#target-table');
        var jPrintBtn = $('#print-button');
        var MyHelper = function (options) {

        };
        MyHelper.prototype = {
            hideColumns: function (hideColumnIndexes) {
                jTable.find('tr').each(function () {
                    $(this).find('> th, > td').each(function (index) {
                        if (-1 !== hideColumnIndexes.indexOf(index)) {
                            $(this).hide();
                        } else {
                            $(this).show();
                        }
                    });
                });
            },
            showHeader: function () {
                jTable.find('tr:first').show();
            },
            hideHeader: function () {
                jTable.find('tr:first').hide();
            },
            showHeaderBgColor: function(){
                jTable.find('thead').addClass('thead-dark');
            },
            hideHeaderBgColor: function(){
                jTable.find('thead').removeClass('thead-dark');
            },
        };

        //----------------------------------------
        // script
        //----------------------------------------
        var myHelper = new MyHelper();
        var jPrintTableOptions = $('#print-table-options');
        var jColumnsVisibility = jPrintTableOptions.find('.columns-visibility input');
        var jHeadersVisibility = jPrintTableOptions.find('.headers-visibility input');
        var jHeaderBgColor = jPrintTableOptions.find('.header-bg-color input');
        jColumnsVisibility.on('change', function () {
            var toHide = [];
            jColumnsVisibility.each(function (index) {
                if (false === $(this).is(':checked')) {
                    toHide.push(index);
                }
            });
            myHelper.hideColumns(toHide);
        });
        jHeadersVisibility.on('change', function () {
            if (true === $(this).is(':checked')) {
                myHelper.showHeader();
            } else {
                myHelper.hideHeader();
            }
        });
        jHeaderBgColor.on('change', function () {
            if (true === $(this).is(':checked')) {
                myHelper.showHeaderBgColor();
            } else {
                myHelper.hideHeaderBgColor();
            }
        });
        jPrintBtn.on('click', function () {
            window.print();
            return false;
        });


    });
</script>
