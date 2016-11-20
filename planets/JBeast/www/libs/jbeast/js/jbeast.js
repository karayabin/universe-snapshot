(function () {
    /**
     * The snippet below tries to create the retry later string asap.
     * From my personal tests, it works, meaning that when the visitor comes, the retry string could have
     * been injected already, but it might not work in other cases.
     *
     * If this code doesn't work for one, one should add the following code in her test page:
     *
     *      <div id="beastresults">_BEAST_TEST_NOT_FINISHED_RETRY_LATER__</div>
     *
     *
     *
     */
    document.addEventListener("DOMContentLoaded", function (event) {
        var x = document.createElement("DIV");
        x.setAttribute("id", "beastresults");
        var t = document.createTextNode("_BEAST_TEST_NOT_FINISHED_RETRY_LATER__");
        x.appendChild(t);
        document.body.appendChild(x);
    });


    //------------------------------------------------------------------------------/
    // JBEAST CODE
    //------------------------------------------------------------------------------/


    //------------------------------------------------------------------------------/
    // TEST AGGREGATOR
    //------------------------------------------------------------------------------/
    window.TestAggregator = function () {
        this.tests = [];
    };
    window.TestAggregator.create = function () {
        return new window.TestAggregator();
    };
    window.TestAggregator.prototype = {
        /**
         *
         * About function f
         * ----------------------
         *
         * bool|array   f ( number:testNumber )
         *
         *
         * f is a function which returns one either the following:
         *
         *      - a boolean: whether the test is a success or a failure
         *      - an array:
         *          0: bool|string, whether the test is a success or a failure (bool),
         *                          or one of the string notApplicable|skip,
         *                          to indicate that the test is either not applicable or should be skipped (respectively)
         *
         *          1: string, an optional accompanying message
         *      - a string: notApplicable|skip
         *                      to indicate that the test is either not applicable or should be skipped (respectively)
         *
         *
         *
         * If the function returns a boolean, then default messages shall be used.
         * The function shall throw an exception when something goes wrong.
         */
        addTest: function (f) {
            this.tests.push(f);
            return this;
        },
        addAsyncTest: function (f) {
            this.tests.push(function () {
                try {
                    f();
                }
                catch (e) {

                }
            });
            return this;
        },
        getTests: function () {
            return this.tests;
        },
    };


//------------------------------------------------------------------------------/
// TEST INTERPRETER
//------------------------------------------------------------------------------/
    window.TestInterpreter = function () {
        this.defaultSuccessMessage = "";
        this.defaultFailureMessage = "";
        this.defaultNotApplicableMessage = "";
        this.defaultSkipMessage = "";
    };

    window.TestInterpreter.execute = function (agg) {
        var i = new TestInterpreter();
        i.executeAggregator(agg);
    };

    window.TestInterpreter.prototype = {
        executeAggregator: function (aggregator) {

            var self = this;

            ensureDomIsLoaded().then(function () {


                var results = {
                    success: 0,
                    failure: 0,
                    error: 0,
                    skip: 0,
                    notApplicable: 0,
                };

                var allTestsExecuted = new Promise(function (resolve, reject) {
                    var testNumber = 1;
                    var nbTestsTotal = aggregator.getTests().length;
                    var type = null;


                    function onTestFinished(ret, msg) {

                        if (true === ret) {
                            results['success']++;
                            type = 's';
                        }
                        else if (false === ret) {
                            results['failure']++;
                            type = 'f';
                        }
                        else if ('notApplicable' === ret) {
                            if (null === msg) {
                                msg = self.defaultNotApplicableMessage;
                            }
                            results['notApplicable']++;
                            type = 'na';
                        }
                        else if ('skip' === ret) {
                            if (null === msg) {
                                msg = self.defaultSkipMessage;
                            }
                            results['skip']++;
                            type = 's';
                        }
                        else if (ret instanceof Error) {
                            if (!msg) {
                                msg = ret.message;
                            }
                            results['error']++;
                            type = 'e';
                        }
                        else {
                            throw new Error("Unknown test result of type " + typeof ret + " for test #" + testNumber);
                        }


                        self._onTestAfter(type, msg, testNumber);
                        testNumber++;


                        nbTestsTotal--;
                        if (0 === nbTestsTotal) {
                            resolve();
                        }
                    }


                    aggregator.getTests().forEach(function (f) {
                        var msg = null;
                        var async = false;
                        try {

                            var ret = f(testNumber);

                            if ('boolean' === typeof ret) {
                                if (true === ret) {
                                    msg = self.defaultSuccessMessage;
                                }
                                else if (false === ret) {
                                    msg = self.defaultFailureMessage;
                                }
                            }
                            else if (Array.isArray(ret)) {
                                msg = ret.pop();
                                ret = ret.shift();
                            }
                            else if (ret instanceof Promise) {
                                // async tests
                                ret.then(function (result, message) {
                                    ret = result;
                                    msg = message;
                                    onTestFinished(ret, msg);
                                });
                                async = true;
                            }
                            else if ('notApplicable' === ret || 'skip' === ret) {
                                // just pass through
                            }
                            else {
                                throw new Error("Invalid test return for test #" + testNumber);
                            }

                            if (false === async) {
                                onTestFinished(ret, msg);
                            }


                        }
                        catch (e) {
                            onTestFinished(e);
                        }


                    }, this);

                });


                // when all tests are executed, print the results
                allTestsExecuted.then(function () {
                    self.printResults(results);
                });
            });


        },
        setDefaultSuccessMessage: function (m) {
            this.defaultSuccessMessage = m;
            return this;
        },
        setDefaultFailureMessage: function (m) {
            this.defaultFailureMessage = m;
            return this;
        },
        printResults: function (results) {
            var el = document.getElementById('beastresults');
            if (null !== el) {
                var s = '_BEAST_TEST_RESULTS:s=' +
                    results['success'] +
                    ';f=' +
                    results['failure'] +
                    ';e=' +
                    results['error'] +
                    ';na=' +
                    results['notApplicable'] +
                    ';sk=' +
                    results['skip'] +
                    '__';
                el.innerHTML = s;
            }
            else {
                console.log('cannot find an element with id=beastresults');
            }
        },
        //------------------------------------------------------------------------------/
        // 
        //------------------------------------------------------------------------------/
        _onTestAfter: function (type, msg, testNumber) {

        },
    };


    //------------------------------------------------------------------------------/
    // PRIVATE
    //------------------------------------------------------------------------------/
    function ensureDomIsLoaded() {
        return new Promise(function (resolve, reject) {
            if (document.readyState === 'complete') {
                resolve();
            } else {
                document.addEventListener('DOMContentLoaded', function () {
                    resolve();
                });
            }
        });
    }


})();