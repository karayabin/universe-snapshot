Test rig
=========
2021-05-18



Test 1: import planet uni style
---------
2021-05-18

```bash
cd /tmp; rm -rf testapp; mkdir testapp; cd testapp;
lt import Ling.Light_ControllerHub -ud
```

### Expected

2021-05-18

Check that lot of planets are imported in /tmp/testapp/universe/Ling.



Test 2: testing conflict uni style
---------
2021-05-18

```bash
cd /tmp; rm -rf testapp; mkdir testapp; cd testapp; lt import Ling.Light_ControllerHub -u; rm /tmp/testapp/universe/Ling/Bat
```

Clear terminal.

Then copy Ling.Bat dir manually (from phpStorm current project, just cmd+c) to /tmp/testapp/universe/Ling/Bat (cmd + v),
and change the version to a previous one in meta-info.byml (for instance 1.300).

Now do:

```bash
lt import Ling.Light_ControllerHub -ud
```

### Expected

2021-05-18

Check that the **concrete map import** shows up Bat in its latest version, and that Bat is again a symlink in the
testapp application.



Test 3: testing conflict uni style, no symlink
---------
2021-05-18

```bash
cd /tmp; rm -rf testapp; mkdir testapp; cd testapp; 
lt import Ling.Light_ControllerHub -u; rm /tmp/testapp/universe/Ling/Bat
```

Clear terminal.

Then copy Ling.Bat dir manually (from phpStorm current project, just cmd+c) to /tmp/testapp/universe/Ling/Bat (cmd + v),
and change the version to a previous one in meta-info.byml (for instance 1.300).

Now do:

```bash
lt import Ling.Light_ControllerHub -ud --no-symlinks
```

### Expected

2021-05-18

Check that the **concrete map import** shows up Bat in its latest version, and that Bat is a directory in the testapp,
but not a symlink, and that the meta-info.byml states that Bat is in the latest version (i.e. not 1.300 for instance)




Test 4: import planet uni style, no deps
---------
2021-05-18

```bash
cd /tmp; rm -rf testapp; mkdir testapp; cd testapp;
lt import Ling.Light_ControllerHub -ud --no-deps
```

### Expected

2021-05-18

Check that /tmp/testapp/universe/Ling/Light_ControllerHub exists and is a symlink.



Test 5: import planet versioned style, no deps
---------
2021-05-18

```bash
cd /tmp; rm -rf testapp; mkdir testapp; cd testapp; 
lt import Ling.Light_ControllerHub 1.2.3 -ud --no-deps
```

### Expected

2021-05-18

Check that /tmp/testapp/universe/Ling/Light_ControllerHub exists and is a pure directory (i.e. no symlink) and
meta-info.byml says version 1.2.3.



Test 6: testing conflicts versioned style
---------
2021-05-18

```bash
cd /tmp; rm -rf testapp; mkdir testapp; cd testapp; 
lt import Ling.Light_ControllerHub 1.3.1 -u
```

### Expected

2021-05-18

Check that /tmp/testapp/universe/Ling/Light_ControllerHub exists and is a pure directory (i.e. no symlink) and
meta-info.byml says version 1.2.3.


