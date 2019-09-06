Bootstrap4AdminTable conception notes
=================
2019-08-15



So I want to create a list of users for the admin app I'm currently working on.

For now I just want a renderer.
I've already created [GuiAdminTable](https://github.com/lingtalfi/GuiAdminTable/), which was my last renderer try,
but I don't like it anymore: digging into the code I don't feel comfortable extending it, plus it had a bootstrap 3
renderer, while now I want a bootstrap 4 renderer.



So I designed a new prototype, this time in bootstrap4.

Here it is:

- [With the advanced search collapsed](https://lingtalfi.com/img/universe/Bootstrap4AdminTable/widgets.png)
- [With the advanced search expanded](https://lingtalfi.com/img/universe/Bootstrap4AdminTable/widgets-advanced-search-expanded.png)


This is just a prototype, as you've probably guessed, but we can already see that this renderer features the following widgets (from top to bottom):

- the **debug window** widget, in which I intend to inject the sql query (fetched via ajax), that's just for my personal use while developing the whole list system
- the **global search** widget, when you click the search button, it executes a search on all columns
- the **advanced search** widget, a more advanced search form, in the style of phpMyAdmin  
- the **action buttons** widget, this widget works along with the **checkbox** widget. When one or more rows are selected (i.e. checked),
        we can execute an action on all of them, using an **action button**.
- the **table** widget, the main widget displaying the rows. It's composed of a head, a neck and a body. I didn't need to use the footer for now (nor the caption).
        Note: the columns in the head all have sort icons.
        I didn't consider that this was a widget (although it certainly could have), but rather that it was integrated with the table head columns.
        I don't think it matters anyway. 
        
- the **head** widget, this widget is nested inside the **table** widget. It's the header of the table.
- the **head_sort** widget (aka head columns sort), this widget is nested inside the **head** widget. It's the little sort icons next to the label of the column headers, which allow the user to sort the table.
- the **checkbox** widget, this widget is nested inside the **table** widget. It allows to SELECT rows, so that we can apply an action on them (via the **action buttons**).
- the **neck filters** widget, this widget is nested inside the **table** widget. It adds an extra search filter for every searchable column.
- the **pagination** widget, a regular pagination widget for browsing the rows page by page.
- the **number of rows info** widget, displays meta information about the number of rows returned, and the current rows number being displayed.



Note: This list could be extended in the future (but for now it fits my needs).

As for now, this renderer is now implementing the OpenAdminTableRendererInterface, and as such it should at least include
all the widgets listed in the [open admin table helper implementation notes](https://github.com/lingtalfi/Light-Realist/blob/master/doc/pages/open-admin-table-helper-implementation-notes.md) document.





A 2 Layered renderer
-------------------

How do we inject data in the renderer?
How do you write the word "Hello" in the **global search** widget input?


This renderer works with 2 layers:

- a static layer
- a dynamic layer


### The static layer

Basically, we use default values to control the gui when it's displayed (i.e. before the user interacts with it,
or every time the user refreshes the page).

### The dynamic layer

Then the user interacts with the renderer.
This renderer uses a js layer to capture all the user interaction (with all the widgets of this renderer), and when appropriate,
sends them to the ajax back-end, which should respond with a json array with a well-defined structure; and we use this json
array to update the gui.

This technique has the following benefits:

- we don't need to refresh the whole page



About the rows
----------

Now let's talk about the (data) rows inside the main **table** widget.

This renderer doesn't have nothing to do with them: the rows are provided by the application.

But, the rows can contain some action buttons in the end, shouldn't that be handled by a renderer?

Well, I thought about that: YES, the html of the buttons (in a MVC model) shouldn't be written by the model, but rather
by a renderer.

But, not this renderer, another one that resides on the backend server and that magically coincide with the bootstrap4
design of this renderer.


Now how is that done is not the problem of this renderer, but my two cents about that: I thought about a system where the model
basically would express its action intentions with an array, and would use an adaptor to turn them into html bootstrap4 buttons.

The array would look like this:


- id_of_this_action => parameter 
- id_of_this_action => parameter 


On the configuration side, we could assign meta data to the ids, such as the choice of the icon and the text, and let the parameter
be the link to the page that we want to reach (in case of a link).
(Inline) Action buttons could also be some ajax triggers, which could for instance toggle the state of an object in the database,
those might be treated as link as well (I don't know, but I just wanted to remind the implementor that this will be a concrete
use case, in case she would have forgotten).

But anyway, by not handling the rows from this renderer, our life in this planet is much simpler.

To summarize, we don't need to worry about rows, we just inject the html when we receive it from the server (via ajax).















