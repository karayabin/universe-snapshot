if ('undefined' === typeof window.selectChain) {


    window.selectChain = function (options) {
        var zis = this;
        this.nodes = [];
        this.conf = $.extend({
            /**
             * Set this to true to activate tim communication with the server
             */
            useTim: false,
            /**
             * Set this to true to trigger the first node on start
             */
            triggerOnStart: false,
            /**
             * The value of this parameter will be sent as a key to the server upon a request.
             * The "type" parameter indicates to the server which select has been triggered. 
             */
            typeKeyName: 'type',
            /**
             * The value of this parameter will be sent as a key to the server upon a request.
             * The "value" parameter indicates to the server the value of the selected item
             * when the select was triggered.
             */            
            valueKeyName: 'value'
        }, options);

        
        this.addNode = function (jSelect, url, params) {
            this.nodes.push({
                jSelect: jSelect,
                url: url,
                params: params
            });
        };


        this.getNextNode = function (curNodeIndex) {
            var nextNodeIndex = parseInt(curNodeIndex) + 1;
            if ('undefined' !== typeof this.nodes[nextNodeIndex]) {
                return this.nodes[nextNodeIndex];
            }
            return null;
        };


        this.start = function () {
            for (var i in this.nodes) {

                var next = this.getNextNode(i); // last node is just a receiver

                if (null !== next) {
                    var one_node = this.nodes[i];
                    (function (node, curNodeIndex) {
                        node.jSelect.on('change.selectchain', function () {
                            var params = {};
                            params[zis.conf["typeKeyName"]] = $(this).attr('name');
                            params[zis.conf["valueKeyName"]] = $(this).val();
                            params = $.extend(params, node.params);
                            zis.fetchValues(node.url, params, curNodeIndex);
                        });
                    })(one_node, i);
                }
            }
            
            if(true === this.conf.triggerOnStart){
                if('undefined' !== typeof this.nodes[0]){
                    this.nodes[0].jSelect.trigger('change');
                }
            }
            
        };


    };
    window.selectChain.prototype = {
        fetchValues: function (url, params, curNodeIndex) {
            var zis = this;
            if (true === this.conf.useTim) {
                timPost(url, params, function (values2Labels) {
                    zis.onRequestSuccess(values2Labels, curNodeIndex);
                }, zis.onTimError).fail(zis.onRequestFailed);
            }
            else {
                $.post(url, params, function (values2Labels) {
                    zis.onRequestSuccess(values2Labels, curNodeIndex);
                }, 'json').fail(zis.onRequestFailed);
            }
        },
        onRequestSuccess: function (values2Labels, curNodeIndex) {
            var nextNode = this.getNextNode(curNodeIndex);
            if (null !== nextNode) {
                nextNode.jSelect.empty();
                for (var value in values2Labels) {
                    nextNode.jSelect.append('<option value="' + this.htmlSpecialChars(value) + '">' + values2Labels[value] + '</option>')
                }
                nextNode.jSelect.trigger('change');
            }
        },
        onRequestFailed: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        },
        onTimError: function (msg) {
            alert(msg);
        },
        htmlSpecialChars: function (m) {
            return m.replace('"', '\"');
        }
    };


}
