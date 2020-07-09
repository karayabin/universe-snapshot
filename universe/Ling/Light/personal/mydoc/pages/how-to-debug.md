How to debug?
===========
2020-06-19 -> 2020-07-07



This is a note for myself. Todo: make it readable for others.




It depends on the problem you have, but here are some tools at your disposal.


First of all, use my aliases (or equivalent):


```bash
alias logg='tail -f -n 100 "/komin/jin_site_demo/log/light_log.log"'
alias logopen='open "/komin/jin_site_demo/log"'
alias ldd='open "/komin/jin_site_demo/log/Light_DebugTrace/light_debugtrace.txt"'
alias lddd='open "/komin/jin_site_demo/log/Light_DebugTrace/all"'
alias logex='tail -f -n 100 "/komin/jin_site_demo/log/exception.txt"'
alias cheap='touch /tmp/CheapLogger.txt; sublime /tmp/CheapLogger.txt'
alias pop='touch /tmp/error_pop.txt; sublime /tmp/error_pop.txt'
alias lka='open /tmp/lka_debugtrace.txt'
alias lkad='open /tmp/lka_debugtrace'
alias exc='open /komin/jin_site_demo/log/exceptions/$(date +"%F").txt'
alias excc='tail -f -n 100 /komin/jin_site_demo/log/exceptions/$(date +"%F").txt'
alias err='open /komin/jin_site_demo/log/errors/$(date +"%F").txt'
alias errr='tail -f -n 100 /komin/jin_site_demo/log/errors/$(date +"%F").txt'
```


Of course, replace **/komin/jin_site_demo** with the path to your app.


Then, you can do this:

- logg: monitor the light log (every channel)
- excc: monitor the exceptions file
- exc: Open the exceptions file 
- errr: monitor today's error file
- err: open today's error file
- ldd: open the trace from the [Light_DebugTrace](https://github.com/lingtalfi/Light_DebugTrace) plugin 
- lka: open the trace from the [Light_Kit_Admin_DebugTrace](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace) plugin 
 
- for events: config/services/Light_Events.byml has a useDebug option
- with file_watcher: config/services/Light_FileWatcher.byml has a useDebug option
- with db_synchronizer: config/services/Light_DbSynchronizer.byml has a useDebug option






FAQ
=========
2020-06-25



How do I know which controller is used on a given page?
---------

If you are using light kit admin, use the light kit admin debug trace (alias=lka),
otherwise use the light debug trace (alias=ldd).








