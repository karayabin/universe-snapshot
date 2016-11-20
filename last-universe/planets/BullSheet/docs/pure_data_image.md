Pure data images
===================
2016-02-11


BullSheet Generator 1.0.0 knows how to pick up a random lines from a list file.
That's pretty, cool, but when you want to populate a database, sometimes you need more than just text data.

Typically, if your application allows the user to upload some images, you have two cases:

- either the user can upload an url of her own
- or/and she can upload an image from her disk


In the first case, there is a nice public service called http://lorempixel.com/.
You basically keep calling the http://lorempixel.com/400/200/ url, which generates random images.
That's pretty cool, but the images are different every time you refresh the page, plus, 
if takes a little extra time to generate each image (theoretically at least).
Nonetheless, this tool is incredibly useful for faking a development application, so BullSheet implementations
(at least mine) use it.

But that's just half of the picture, we also have to handle cases where you want to emulate an user upload.
In that case you want to copy the user image to your hard drive (inside the application), 
and set the path to that image in the database.

So what can BullSheet do for you in this case?


Well, there is a method that you can use, which basically takes a directory containing any number of images,
and it picks up one image randomly, then it copies it to a folder of your choice, and returns the path to insert in 
the database (you decide how this path is generated, of course).

The synopsis is something like this.


```php
$gen = LingBullSheetGenerator::create()->setDir("/path/to/your//bullsheets");
for ($i = 1; $i <= 50; $i++) {

    $email = $gen->email();
    $userHash = hash('md5', $email);
    a(QuickPdo::insert("users", [
        'email' => $email,
        'avatar' => $gen->uploadedImage("/path/to/app/www/uploaded/$userHash/[image]", "/uploaded/$userHash/[image]"),
    ]));
}
```

In the above example, we use an email hash to avoid email weird chars, so that we have a valid directory name,
then we use the special placeholder [image], which will be replaced by the randomly chosen image when necessary.
The first argument is the path where the image should be copied to, and the second argument is the string 
that the function returns (it's inserted in the database).

There is a third argument that we have omitted, which defaults to "image", and which represents the domain path 
where BullSheet should take the images from. 
This method has the same philosophy as the getPureData method that we already know 
of (if you don't browse the doc again).

Actually, let's be more precise here.
The convention that I use for LingBullSheetGenerator is to have image folder containing both images AND 
the traditional data.txt and src.md files.

Why? 
Because it scales better, in terms of performance.
Imagine you want to gather an image bank of 10000+ images, it would be no problem for the getPureData algorithm.
But if you had to scan for every 10000 files in a foreach, and put them in an array, and then select one of them 
randomly, it might be very slow.

Again, the BullSheet methods are designed to be used inside a foreach loop, so, every optimization matters.

The only problem with the strategy of using both images and data files is to keep data synchronized.
Generally though, you do the work once and you never touch your data file again.
But, that's where you have to be very careful.

Anyway, in the case of the ling bullsheets repository, image paths are listed as relative paths from 
the ling directory.

For instance:

```
images/vintage/Car_of_the_Future_1950-520x739.jpg
images/vintage/Carole-Lombard-by-George-Hurrell-520x677.jpg
images/vintage/Cecil-Beaton-self-portrait-520x546.jpg
images/vintage/Cobra_Dane_Radar_Display-520x772.jpg
images/vintage/Cray-Super-Computer-2-520x496.jpg
```

Note that they are relative paths, and therefore don't start with a slash.


 
Now this type of call doesn't take care of all cases, what if you have an original image called plane.jpg, 
but you want to insert it in the database as 45ze0rzEK.jpg?

So, in that case, the [image] placeholder is not powerful enough.
That's why the first and second argument also accept a callback that should return the string that you other wise pass
manually.



Here is our example revisited, using some callbacks instead of string arguments.


```php
$gen = LingBullSheetGenerator::create()->setDir("/path/to/your//bullsheets");
for ($i = 1; $i <= 50; $i++) {

    $email = $gen->email();
    $userHash = hash('md5', $email);
    a(QuickPdo::insert("users", [
        'email' => $email,
        'avatar' => $gen->uploadedImage(function ($baseName) use ($userHash) {
            return "/path/to/app/www/uploaded/$userHash/supercat_$baseName";
        }, function ($baseName) use ($userHash) {
            return "/uploaded/$userHash/supercat_$baseName";
        }),
    ]));
}
```


So, I forgot the method for the case where the user passes an url.
The method is the following:

```php
str     imageUrlFromLorem( int:width=400, int:height=200, str:category=null )
```


So that's it, we have two new methods in 1.1.0.

```php
str     uploadedImage ( mixed:dstPath, mixed:dstUrl, str:domain=image ) 
str     imageUrlFromLorem ( int:width=400, int:height=200, str:category=null ) 
```


Note: those methods are added to LingBullSheetGenerator, they are extra sugar that can help you, 
but are not in the core of the BullSheet generator.

Also, the LingBullSheetGenerator has a default bullsheet called image, 
which contains 110 images with width > 300, so you don't need to specify the third argument (image) when you 
call the uploadedImage method, unless you want to select from a more specific image repository.











 
 
 
 
