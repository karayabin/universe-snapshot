if ('undefined' === typeof window.TableListMultiplierHelper) {


    (function () {


        // https://stackoverflow.com/questions/1787322/htmlspecialchars-equivalent-in-javascript
        function escapeHtml(text) {
            var map = {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            };

            return text.replace(/[&<>"']/g, function (m) {
                return map[m];
            });
        }


        window.TableListMultiplierHelper = function (options) {
            /**
             * The items container is the ul that contains of the li, each of which representing
             * a binding. Visually, it's a line with the label in it ("2. Michel" for instance),
             * and two buttons at the end of the line: a drag button and a delete binding button.
             */
            this.jItemsContainer = options.jItemsContainer;

            this.itemInputName = options.itemInputName;


            /**
             * This button is next to the auto-complete input, it allows to add the search result row
             * of the auto-complete to the items container.
             */
            this.jAddBindingBtn = options.jAddBindingBtn;

            /**
             * This input holds the value of the auto-complete search.
             * Remember that the auto-complete control is composed of two parts:
             * - the gui part for the user, which value is a formatted label ("2. Michel" for instance)
             * - the real input part (our binding input), which is the one we want the value from as far as js
             */
            this.jBindingInput = options.jBindingInput;


            /**
             * The label input is the gui part for the user (see the previous comment of jBindingInput to understand).
             * We need the label to display it to the user in the items container.
             */
            this.jBindingLabelInput = options.jBindingLabelInput;




            /**
             * An array containing all the values currently in the items container.
             * It doesn't make much sense in the multiplier pattern to have duplicate values (or does it?).
             *
             * See more details about the multiplier techniquer here:
             * https://github.com/lingtalfi/TheBar/blob/master/discussions/form-multiplier.md
             *
             *
             */
            this.itemsContainerValues = [];
        };

        var $ = jQuery;

        window.TableListMultiplierHelper.prototype = {
            listen: function () {
                var $this = this;
                this.jAddBindingBtn.on('click', function (e) {
                    var jTarget = $(e.target);
                    var value = $this.jBindingInput.val();
                    if ('' !== value) {
                        var label = $this.jBindingLabelInput.text();
                        var items = {};
                        items[value] = label;
                        $this.addItems(items);
                    }
                    return false;
                });

                this.jItemsContainer.on('click', '.remove-item-btn', function (e) {
                    var jTarget = $(e.target);
                    var jInput = jTarget.closest(".tablelist-multiplier-item").find('input[type="hidden"]');
                    $this.deleteItem(jInput);
                    return false;
                });


                // this.jItemsContainer.sortable( {
                //     handle: '.drag-item-btn',
                // } );

            },
            /**
             * Add the given items in the items container.
             * The given items is an array of value => label.
             */
            addItems: function (items) {

                var jLi;
                for (var value in items) {
                    if (-1 === $.inArray(value, this.itemsContainerValues)) {
                        var label = items[value];
                        jLi = this.getItemHtml(value, label);
                        this.jItemsContainer.append(jLi);
                        this.itemsContainerValues.push(value);
                    }
                }
            },
            /**
             * Returns the html for the item.
             * I encapsulated the code into this method to (remind me to) be able to change the
             * template later (if we need a template with image for instance).
             */
            getItemHtml: function (value, label) {
                /**
                 * For now, we just have one template available.
                 */
                return '' +
                    '<li>\n' +
                    '    <div class="d-flex tablelist-multiplier-item">\n' +
                    '        <span>' + label + '</span>\n' +
                    '        <input class="theinput" type="hidden" name="'+ escapeHtml(this.itemInputName) +'" value="' + escapeHtml(value) + '"/>\n' +
                    '        <div class="ml-auto">\n' +
                    '            <span class="remove-item-btn"><i class="far fa-times-circle fa-2x"></i></span>\n' +
                    '        </div>\n' +
                    '    </div>\n' +
                    '</li>';
            },
            deleteItem: function (jInput) {
                if (jInput.length) {
                    var value = jInput.val();
                    this.itemsContainerValues = $.grep(this.itemsContainerValues, function (val) {
                        return value !== val;
                    });
                    jInput.closest('li').remove();
                }
            }
        };
    })();
}