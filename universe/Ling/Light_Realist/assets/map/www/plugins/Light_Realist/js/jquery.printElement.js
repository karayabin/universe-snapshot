(function ($) {

    $.fn.printme = function () {
        return this.each(function () {
            var container = $(this);

            var hidden_IFrame = $('<iframe></iframe>').attr({
                width: '1px',
                height: '1px',
                display: 'none'
            }).appendTo(container);

            var myIframe = hidden_IFrame.get(0);

            var script_tag = myIframe.contentWindow.document.createElement("script");
            script_tag.type = "text/javascript";
            script = myIframe.contentWindow.document.createTextNode('function Print(){ window.print(); }');
            script_tag.appendChild(script);

            myIframe.contentWindow.document.body.innerHTML = container.html();
            myIframe.contentWindow.document.body.appendChild(script_tag);

            myIframe.contentWindow.Print();
            hidden_IFrame.remove();

        });
    };
})(jQuery);