/**
 * Realist Registry
 * 2019-09-25
 *
 * https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/realist-registry-js.md
 *
 *
 */
if ("undefined" === typeof window.RealistRegistry) {

    (function () {


        var openAdminTableHelper = null;


        window.RealistRegistry = {
            setOpenAdminTableHelper: function (object) {
                openAdminTableHelper = object;
            },
            getOpenAdminTableHelper: function () {
                return openAdminTableHelper;
            },
        };
    })();
}