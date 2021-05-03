/**
 * Realist Registry
 * 2019-09-25 -> 2020-09-03
 *
 * https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/older/realist-registry-js.md
 *
 *
 */
if ("undefined" === typeof window.RealistRegistry) {

    (function () {


        var openAdminTableHelper = null;
        var listActionHelper = null;


        window.RealistRegistry = {
            setOpenAdminTableHelper: function (object) {
                openAdminTableHelper = object;
            },
            getOpenAdminTableHelper: function () {
                return openAdminTableHelper;
            },
            setListActionHelper: function (object) {
                listActionHelper = object;
            },
            getListActionHelper: function () {
                return listActionHelper;
            },
        };
    })();
}