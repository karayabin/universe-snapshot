Light_Kit_Store, conception notes
================
2021-05-04 -> 2021-07-27



A store where **website creators** can purchase [light kit](https://github.com/lingtalfi/Light_Kit) products.



- [Overview]()
- [The front end]()
- [The back api]()
- [The database schema explained]()




Overview
=========
2021-05-04


In the **light kit** conception, a website is composed of different pages, each of which containing a certain number of widgets.


A **website creator** might create those elements himself/herself, but alternately he/she can download those elements from external places, to save some time.

This planet provides some essential components to create such a **store**, where a buyer can "purchase" those elements made by third-party authors.

In this document, the word purchase also applies to free items. It basically refers to the action of the buyer acquiring an item, which involves the creation
of an invoice (a proof of the acquiring). This gives the buyer the right to rate the product later if he/she so desires.


There are two main parts to the store:

- [the front end](#the-front-end)
- [the back api](#the-back-api)


The items that one can purchase on the **store** are the following:

- website
- page
- widget




The front end
=======
2021-05-04


The **front end** is basically the buyer's gui.

The buyer can access his(/her) account, from where he can download the invoices for his purchases.

The buyer can also rate a product that he purchased.



The remember_me system
-----------
2021-06-24

What we call the **remember_me system** is actually a "keep me signed in until I log out" system.

To activate this system, the user must check the "keep me signed in until I log out" checkbox when he logs in.

The idea with the **remember_me system** is to keep the user connected until he/she logs out.

This way, he/she doesn't have to click the "sign in" button everytime he visits our website.


Our implementation is the following:

- when the user signs in successfully (and if he activated the **remember_me system**), we create a **remember_me token** (an arbitrary, unguessable string)
  and put it in his cookies. We also store the same **remember_me** token in our database.
  
- once the user is logged in, we use a classical php session system to keep the user logged in.
    We use the session duration default which is about 5 minutes.
    This means after 5 minutes of inactiviy, the user is automatically logged out of the php session (but not from the **remember_me system** as you will see).
  

- if an user is invalid (for instanced logged out of the php session), we check if he has a **remember_me token** in his cookies.
    If he doesn't, we do nothing.
    If he does, we check if this token corresponds to an entry in our database.
      If it does, we connect the user (i.e. start a new php session for him), and regenerate a new token, which we put both in 
      the database and in the user cookies.
      If the token doesn't match, we remove the token from the user cookies.
        Note: at this step, some systems will give the user a strong warning (i.e. identity theft assumed), but we prefer 
        to just remove the cookie silently.


- when the user logs out, we remove the **remember_me token** from both the database and the cookies   
  










The back api
===========
2021-05-04 -> 2021-05-31

The **back api** is used by a **client website**.

The **client website** is responsible for displaying the available items to potential buyers.

In order to do that, it will connect to the **store** via the **back api**, requesting for instance all the available **website items**, or **widget items**.


The **back api** is basically the api for any **client website**.


It can do the following (amongst other things):

- retrieve information about items from the (store) database 
- handle the payment process (making sure that the payment was successful)
- provide the purchased item as a zip file
- install the zip file on the client website (our planet needs to be installed on the **client website** for that)
- register an item and store it in the database




The item registration process
---------
2021-05-04


Third-party authors register their items to the **store website** via a simple [alcp request](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/ajax-light-communication-protocol.md) (basically, a $_POST request which returns
a alcp response).


The registration process is basically the same regardless of the item type (website, page, widget, others?...), and it goes like this:

- the third-party author sends his/her item as a zip file to the **store website**.
- the **store website** responds either:
  - with a successful response: the item has been registered (although maybe it still needs to be validated via a moderator, that's specified in the alcp response, depending on this plugin configuration)
  - with an explicit error message if something failed


There are some conventions that dictates the structure of the zip file representing the item.

When you extract the zip file, you should end up with only one directory named **item**, which contains the following:

- ?map: a directory to map files to the target application (same as the [assets/map](https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/conception-notes.md#the-planets-and-assetsmap) concept of the UniverseTool planet)
- info.byml: a [babyYaml](https://github.com/lingtalfi/BabyYaml) file containing meta info about the item (at this point I don't know which info exactly) 
- ... some **specific files**, depending on the item type



The **specific files** are:

- For a website:
  - at this point in time I don't know yet
- For a page:
  - at this point in time I don't know yet
- For a widget:
  - at this point in time I don't know yet





The item installation process
---------
2021-05-04


Our planet provides an appropriate method for each different type of item (i.e. website, page, widget, ...)

The **client website** should therefore download our planet in order to have those methods ready when the buyer purchases the item and wants to install
it on the **client website**.

So basically, as the buyer's payment has been confirmed, the **store** will send a confirmation of the payment to the **client website**, which will then
ask for the zip file representing the item.

Once the zip file is downloaded on the **client website** side, the **client website** uses our method to install the item and make it active on the **client website**.


If something fails during the installation process, the user is redirected either to whichever culprit is responsible
for the error (third-party author, client website, or store). 
In other words, we do our best to ensure a good service for the user (as he might have paid the item), providing him/her with
the solution to solve the problem if this unfortunately happens (which shouldn't).





The signup process
----------
2021-06-03 -> 2021-06-11

**Client websites** can use our backend api to sign up new users into our database. This helps provide users with a better browsing experience,
as the user can sign up directly from the **client website**, instead of leaving the **client website** to sign up in our store. 


To sign up a user to our database, we use an [alcp request](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/ajax-light-communication-protocol.md).

The request should contain the following parameters:

- email
- password
- password_confirm
- project_name (this is a pointer to the captcha keys, see our service conf for more details)
- g-recaptcha-response (we use recaptcha v3 from google)


All fields are filled with empty values if not defined.

The possible causes for errors are:

- x cannot be empty 
- invalid email address 
- passwords don't match
- already signed up
- invalid captcha 







The login process
----------
2021-06-14 -> 2021-06-24


**Client websites** can log-in their users to the **store** from their gui, using our backend api.


What really happens under the hood is that when the user logs in successfully, we give him a unique [token](#the-kit-store-tokens) (aka **login token**).


To sign in a user to our database, we use an [alcp request](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/ajax-light-communication-protocol.md).

The request should contain the following parameters:

- email: string="""
- password: string=""
- remember_me: bool=false
- flash: bool=false



The possible causes for errors are:

- x cannot be empty 
- credentials not matching

A successful response returns the following fields:

- token: the **token** to use to execute **token actions**



If the **remember_me** flag is set to true, we generate a **remember_me token** and put it in the database and in the user cookies.
See the [remember_me system section](#the-remember_me-system) for more info.








The kit store tokens
---------
2021-06-15


When a user logs in successfully from a remote website (a **client website**), we provide a **token** (a hash string) to that client.

The client can then use this **token** to execute so-called **token actions**. 


**Token actions** are privileged actions that only a logged-in user can execute.

The **token** basically serves as a "proof" that the user has successfully authenticated on the **store**.



By default, the **token** lasts 15 minutes, and is refreshed every time the user triggers a **token action**.

When the **token** expires, the user needs to log in again to acquire a new **token**.




The reset password process
-------
2021-06-15


This is a standard **reset password system**.

The user gives us his/her email address, and we send a mail to that address.

That mail contains a link to reset his/her password.

Implementation wise, we use the reset password tokens from the **lks_user** in the database.









The database schema explained
======
2021-05-04 -> 2021-06-28



### lks_user
2021-06-28


I created the user table, with the idea that only a user who bought a product could rate it.

The **user table** contains the email and password fields, so that we can identify the users uniquely.

It also contains the basic fields required to create invoices (address, zip, phone, ...).

It also contains some **token** related fields (see the [login process section](#the-login-process) for more details about token).

- token: the token hash
- token_first_connection_time: nullable, null when there is no token, or when the token has expired, otherwise the datetime when the user first connects for a new **session**.
- token_last_connection_time: nullable, null when there is no token, or when the token has expired, otherwise the datetime when the user last connects during an active **session**.

Here, the **session** is the period during which the **token** is active.




The **active** column has the following values:

- 0: user not active
- 1: user active
- 2: user not active, waiting for signup token click (he just signed up, and now he needs to click the signup token in his email)
- 3: user not active, waiting for moderation (he just signed up and a human moderator needs to activate his account)










### lks_item
2021-05-04 -> 2021-07-19


In general the concept of provider/identifier is destined to the **plugin provider** (which provides those identifiers).

The slug

The **provider** column is the actual [dot name](https://github.com/karayabin/universe-snapshot#the-planet-dot-name) of the planet,
whereas the **identifier** is any string chosen by the provider that identifies the product.

The **identifier** string is then used by the provider plugin to actually install the product in the target application.
It shall be unique inside the provider context.

The **status** has to do with moderation. It's the idea that someday other people than myself may register items to the store.
When that happens, I still want to have my word to say in it. So:

- 0: the item has just been registered in the database, but is not available for the public yet
- 1: the item is active (i.e. I have validated it)
- 2: the item is inactive (i.e., for some reasons, I have disabled it)


Note: I believe that if I deny a proposed item, I would delete the entry directly, and therefore there is no dedicated status code
for "denied by the moderator". I can use status=**2** instead, if I want to temporarily put a hold on an item.


The **label** is what is displayed to the users on the product pages.


The **screenshots** field is a babyYaml array of **visual elements**.

The first entry is the main **visual element** to display on the product lists.

There are different types of **visual element**:

- photo (extension = jpg, png)
- video (extension = mp4, or youtube videos)



In parallel of that, we have the following **containing directories**:

- thumb     (photo/video)
- medium    (photo)
- large     (photo)
- video     (video of type mp4)
- poster    (video)


The thumb, medium and large **containing directories** represents an image size, or size range.
The video **containing directory** is just a container for video files.
The poster **containing directory** contains the poster images for the videos.

For more details about photo sizes, see the [screenshots](#screenshots) section.



The files are organized like this:

```txt 
- libs/universe/Ling/Light_Kit_Store/img/products/$itemId/
----- thumb:
--------- test-1.jpg    
--------- test-23.jpg    
--------- 2021-07-13-furniture.jpg    
----- medium: 
--------- test-1.jpg    
--------- test-23.jpg    
----- large:
--------- test-1.jpg    
--------- test-23.jpg    
----- video:
--------- 2021-07-13-furniture.mp4    
----- poster:
--------- 2021-07-13-furniture.jpg    
```




Convention:

- For a photo:
    - we use the same [filename](https://github.com/lingtalfi/NotationFan/blob/master/filename-basename.md), and the file must be in all the three **containing directories**: medium, thumb, large.
    - a photo file must be located at the root of its **containing directory** (i.e., no sub-directories allowed)
    - in the database we store the path to the "medium" file
- For a video:
    - we use the same [basename](https://github.com/lingtalfi/NotationFan/blob/master/filename-basename.md), and the file must be in the following **containing directories**: thumb, poster, video.
    - in the database we store the path to the "video" file if it's a mp4, or the following syntax for youtube videos:
        - yt: $youtubeVideoId
    - the video file must be a mp4 (only recognized format for now), and the thumb and poster must be in jpg
    - the poster image has a max width of 679px
    


Our system expects the above convention to be met.

So for instance if we have a photo with the url: 

- libs/universe/Ling/Light_Kit_Store/img/products/$itemId/medium/test-1.jpg

Then our system expects that the thumb of this photo is at:

- libs/universe/Ling/Light_Kit_Store/img/products/$itemId/thumb/test-1.jpg
  
And that the large version of this photo is at:

- libs/universe/Ling/Light_Kit_Store/img/products/$itemId/large/test-1.jpg


There is no double-checking, which means the work of preparing the different photo formats, for instance, must be done BEFORE the product is registered in the database.








The **reference** is a unique string that identifies the product, defined by the author. It just serves the purpose of finding a product more quickly.

The **item_type** field can be one of the following:

- 1: website




### lks_user_has_item
2021-07-02

The **rating** is a number between 1 and 5. If it's null, it means the user hasn't rated the product yet.



### lks_author
2021-07-02 -> 2021-07-27


The **label** is what is displayed to the users on the product pages.


The **author_name** is unique and strlowered for consistency, it's displayed in the url when you search by author.





Our user
=========
2021-06-24


The **light kit store** planet uses the [Ling.Light_OpenUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightOpenUser.md) class to represent all its users (in the php code).


In the props, we put at least the following:

- id















Screenshots
==========
2021-07-13


Each screenshot has the following formats:

- thumb: 40x40 (ratio is ignored)
- medium: width fixed to 679px (and keep the ratio)  
- large: any size up to 1500px (i.e., we reduce the largest side to 1500px and keep the ratio)





