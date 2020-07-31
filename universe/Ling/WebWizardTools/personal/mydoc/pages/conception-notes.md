WebWizardTools, conception notes
==========
2020-07-03 -> 2020-07-09



A web wizard is a gui page that helps you do some tasks. You navigate the web wizard pages in a web browser (hence the name web wizard).



Now this planet is about helping you create web wizards for people.



It provides you with some tools, and an inherent logic that you can follow to create the web wizard faster than if you had to create it manually.



So, what tools do we provide?




The processes
========
2020-07-03 -> 2020-07-06


The basic idea of our tools is based around the concept of **processes**.

A **process** is a method executed by your wizard, on behalf of the user. 

Basically, the user will click some gui element on the ww page (aka web wizard page), and that will trigger the process.


So now we know that a process has to be triggered somehow by the user.

A **process** also has a report attached to it.


A process has the following properties:

- name: string, the name of the process
- label: string, the label message to display to the user
- learnMore: string, an html string to complement the label        
- controls: array of controls
- report: the report messages
- webWizard: a reference to the wizard (useful to access the wizard's context) 
- params: an array containing all the parameters useful for executing the process, this includes:
    - the values of the controls when posted
    - the trigger extra parameters if any 
    
    Note, this is only available when the process is triggered by the user


 



The process **report** tells the user the details about the execution of the process.

We have the following category of report messages:

- trace: the process explains every step it takes, this is more a debugger for developer than for the user
- info: the process explains every important step, for instance: "updating the database...", but without going into the details
- error: reports a regular error that occurred during the process execution. Some errors might interrupt the whole process, while some other errors will not stop the process (it depends on the process). 
- exception: reports the caught exceptions caught. An exception always interrupts the current process.  
- important: the process can tell some important messages to the user. For instance, if the user should do some extra steps manually, the process would tell them using the warning messages. 


The report also has some flags:

- isSuccessful: bool, whether the execution of the process was successful (i.e. no error occurred)








The process controls
---------
2020-07-03 -> 2020-07-06


Note: at the moment, controls are not implemented.

A process can also have controls.


Controls collect the user input, the same way form controls do.


For instance, if your wizard generate tables, the user could choose which one specifically he wants to generate, and so you could add an optionList control
to acquire the user choice from the web wizard page and use it in your process.

The different controls are:

- optionList


All controls share some common properties:

- name: string, the name of the control
- label: string, the label to display to the user
- validationRules: array, some validation rules to make sure the user input is correct at the web page level, before we process it in code
- error: string, the validation error message (if the user input is invalid)
- value: mixed, the value collected by the control



Note that the error of a control is a string (i.e. a control can have only one error, for the sake of simplicity).


A **validation rule** has the following properties:

- name: string, the name of the validation rule
- callback: callable, the callback to execute to test whether the input value meets the rule criterion.
    The callback has the following signature:
    
    - callback ( mixed value,  string &errorMsg = null ): bool    
    
    It returns whether the test was successful (i.e. the value passed the validation).
    If the test fails (i.e. the callback returning false), then the errorMsg contains the message to display to the user.
    
                




### The optionList control

2020-07-03


Then the **optionList** contains any number of options, each of which looks like this:

- identifier: a unique identifier chosen by the developer and used by the php components
- label: the gui label to display to the user (for instance: "table 1")
- checked: bool, whether this option is checked







The WebWizard
----------
2020-07-03 -> 2020-07-06


The web wizard is the object containing the processes.

It has a dedicated renderer, which displays the web wizard gui that the user will see.
This includes the processes, along with the reports.

Our default renderer displays the **info**, **error** and **important** messages by default,
It also has a general option to display **trace** messages as well.

The isSuccessful flag is also displayed . 


A web wizard object has the following properties:

- options: array, some options to define the behaviour of the web wizard
- processes: the array of processes handled by this web wizard 
- context: an array of key/value pairs representing a context to pass to every process 
- processKeyName: string, the name of the post property used to transit the process name, default is "process" 
- onProcessSuccessMessage: string, an html string to display when a process is successfully executed 



Note: at the moment, the options part of the wizard is not implemented.






Logs
========
2020-07-03

We provide hooks that your wizard can use to tap into the messages generated by the processes.

It's common to route the trace, info, error and important messages altogether to a "debug" log. 



Processes in practice
-----------
2020-07-06 -> 2020-07-09


In practice, a process is set up in three steps.


- the process invite (i.e. gui) is displayed, and the user can click on it
- the process action is executed when the user triggers it
- the report of that process is then displayed


The **execute** method of the wizard will execute the chosen action,
while the **render** method will take care of displaying both the invite and the report,
depending on whether a process has been executed.



Each process has also a **prepare** method, which is used to create the controls (if any), and/or to change the label of the process dynamically.




The process trigger
----------
2020-07-06

The process trigger is the gui element that the user activates to execute a process.
It's generally a simple html link (i.e. anchor tag).

However, it's sent via post rather than get, because the process can have controls attached to it, and controls can potentially
be verbose (i.e. if you attach some textarea control to a process for instance).



If the process has controls attached to it, the values of those controls are sent along when the user pulls the triggers (i.e. clicks the link).

A trigger can also have extra static parameters that are always sent along, this might be useful for developers who need to pass some sort
of context variables with a process.  



Disabling processes
-----------
2020-07-06


We can disable process, depending on custom conditions. This is done at the wizard level.
When a process is disabled, it's still displayed, but grayed out, so that the user can be aware that it potentially can execute that process.




Category
-----------
2020-07-09


A category helps organize processes in groups at the gui level.




The default synopsis
--------
2020-07-09


Usually, a client using our wizard tools will implement something like this (pseudo code):


- instantiate the webwizard
- add the processes (webwizard->setProcess)
- set the context if necessary (webwizard->setContext)
- run the processes (webwizard->run)
- display the gui (webwizard->render)






 