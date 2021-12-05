SqlFiddler, conception notes
================
2021-07-06 -> 2021-07-27


A tool to help when writing sql queries where the user can opt-in some parts.




Intro
--------
2021-07-06

While writing sql queries for a front end, I noticed that the queries I wrote had always 2 parts in it:

- a core part, which is the main part of the query
- a user part, which is some parts of the query that I allowed the user to modify


I also noticed that the user parts are generally confined to a few areas of the query:


- where (when the user is allowed to search)
- order by (when the user is allowed to sort)
- limit (when the user browses the pages, or/and when he is allowed to choose the number of items per page for instance)


Because of those observations, I decided to create the SqlFiddler helper, as to crystallize this idea into a structure,
making it easier for me to write front-end queries.


The benefits of using the fiddler are the following:

- the query is readable
- the user parts are controlled/protected by design



Example
-------
2021-07-06 -> 2021-07-09

Ok, enough talking, here is how it works (example from my code):


```php 

<?php 
    /**
     * @implementation
     */
    public function getProductListItems(array $options = []): array
    {

        $status = $options['status'] ?? "1";
        $status = (int)$status; // this is a dev option, but still...


        $search = $options['search'] ?? "";
        $orderBy = $options['orderBy'] ?? "_default";
        $page = $options['page'] ?? 1;
        $pageLength = $options['pageLength'] ?? 50;
        $itemTypes = $options['itemTypes'] ?? "*";
        if (
            '*' === $itemTypes
        ) {
            $itemTypes = [
                1,
                2,
                3,
            ];
        }
        $sItemTypes = PsvTool::implode(",", $itemTypes, 's');


        $u = new SqlFiddlerUtil();
        $orderByMap = [
            "_default" => [
                'i.front_importance desc, i.id asc',
                'Featured',
            ],
            "price_increasing" => [
                'i.price_in_euro asc',
                'Price: Low to High',
            ],
            "price_decreasing" => [
                'i.price_in_euro desc',
                'Price: High to Low',
            ],
            "avg_rating" => [
                't2.avg_rating desc',
                'Avg. Customer Review',
            ],
            "newest" => [
                'i.post_datetime desc',
                "Newest",
            ],
        ];
        $u
            ->setSearchExpression('(
          i.label like :search or 
          i.reference like :search 
          )', 'search')
            ->setOrderByMap($orderByMap);


        $markers = [];
        $sSearch = $u->getSearchExpression($search, $markers);

        $orderByInfo = $u->getOrderByInfo($orderBy);
        $sOrderBy = $orderByInfo['query'];
        $orderByPublicMap = $orderByInfo['publicMap'];
        $orderByReal = $orderByInfo['real'];


        $q = "
select 

        i.id, i.label, i.reference, i.price_in_euro, i.screenshots,
        a.label as author_name,
       
       group_concat(concat(t.rating, ':', t.nb_ratings) order by t.rating separator ', ') as ratings,
       
       t2.avg_rating, t2.nb_ratings

        -- endselect

from lks_item i
    
    
    
         inner join (
    select item_id,
           rating,
           count(*) as nb_ratings
    from lks_user_rates_item
    group by rating, item_id
) as t on i.id = t.item_id


         inner join (
    select item_id,
           avg(rating) as avg_rating,
           count(*) as nb_ratings
    from lks_user_rates_item
    group by item_id
) as t2 on i.id = t2.item_id

    inner join lks_author a on i.author_id = a.id

where 
      i.status = '$status'
      and i.item_type IN ($sItemTypes)
      and $sSearch

group by i.id
order by $sOrderBy
limit 0, 1 -- endlimit



        ";

//        az($q, $markers);


        $info = $u->fetchAllCountInfo($this->pdoWrapper, $q, $markers, $page, $pageLength, true);
        $info['orderByPublicMap'] = $orderByPublicMap;
        $info['orderByReal'] = $orderByReal;
        return $info;
    }
```


In the above example, I allow the user to browse pages (obviously), to order by a few well-defined criteria, and
to search in the label and reference of the products.


The core query remains readable.


The second argument to the setSearchExpression method is the marker name. 
Using markers helps prevent sql injection.

The marker value is set with the call to the getSearchExpression method.




Recommendations
--------
2021-07-06


Here are a few recommendations when Working with the fiddler:

- always wrap your core query with double quotes, so that you can easily inject php variables in your query 
- always use pdo markers (if possible) in your search expression, to avoid sql injection  



Prepared query, two queries in one
----------
2021-07-08


Note that at the moment, this section only applies to mysql dbms.


Another pattern that I saw when writing queries for the front end is that in addition to the rows, I often need the **total number of rows**.

This number is computed by executing the query, but with the limit part (in mysql) removed.

The **total number of rows** is used to create pagination, and to give information about the current rows in the page (i.e., 25-50 of 300 results).

So we provide a **fetchAllCount** method, which requires a **prepared query**, and returns both the rows and the **total number of rows**.

A **prepared query** is a query where the select part and the limit part (in mysql) are isolated, so that the fetchAllCount method can replace/remove them and to its job.

To isolate the select part, we add the following comment after the select part: 

- **-- endselect**

and the following comment after the limit part:

- **-- endlimit**


Like this for instance:


```sql
select 

        i.id, i.label, i.reference, i.price_in_euro, i.screenshots,
        a.label as author_name,
       
       group_concat(concat(t.rating, ':', t.nb_ratings) order by t.rating separator ', ') as ratings,
       
       t2.avg_rating, t2.nb_ratings

        -- endselect

from lks_item i
    
    
    
         inner join (
    select item_id,
           rating,
           count(*) as nb_ratings
    from lks_user_rates_item
    group by rating, item_id
) as t on i.id = t.item_id


         inner join (
    select item_id,
           avg(rating) as avg_rating,
           count(*) as nb_ratings
    from lks_user_rates_item
    group by item_id
) as t2 on i.id = t2.item_id

    inner join lks_author a on i.author_id = a.id

where 
      i.status = '$status'
      and i.item_type IN ($sItemTypes)
      and $sSearch

group by i.id
order by $sOrderBy
limit $iPage, $pageLength -- endlimit

```





fetchAllCountInfo method
----------
2021-07-09


The **fetchAllCountInfo** method is the big sister of the **fetchAllCount** method.

Where **fetchAllCount** was more of a low-level tool, the **fetchAllCountInfo** method feels more like a high level tool.

The main difference lies in that the **fetchAllCountInfo** method returns you with most of the information that you
need for your pagination system.

It returns the following entries:

- **nbPages**: int, the total number of pages
- **desiredPage**: int, the desired page, as given. This is designed to be the user input (i.e., not trustable).
- **realPage**: int, the "fixed" page number, which is basically a number between 1 and the maximum number of pages.
    This can help you decide what you want to do when the user tries an "out of range" page (i.e., whether to display
    an error page, or to display the closest existing page for instance).
- **nbItems**: int, the number of items returned by the query
- **nbItemsTotal**: int, the number of items returned by the query in limitless mode.
        That is, the same query, without the limit portion, and possibly an extra count wrapper around it if you use "group by"
        in your query. Note: whether to add the extra-wrap is your responsibility, using the useWrap flag.
- **firstItemIndex**: int, the index of the first item of the current page.
        The returned value ranges from 1 to $nbItemsTotal.
- **lastItemIndex**: int, the index of the last item of the current page. This number takes into account when you're on the last
        page and the number of items doesn't fill the page length completely.
        So for instance if your pageLength is 20, you usually have a first/last index range looking like this:
        - 1/20
        - 21/40
        - 41/60
        - ...
        But on the last page, sometimes the lastItemIndex can be lower than the pageLength, and give your something like this for instance:
        - 41/46  
- **rows**: array, the rows returned by the "fixed" query. That is, using the realPage number instead of the desired page.
        Note that if the desiredPage doesn't match the realPage, this means that the "non-fixed" query returns an empty array by definition.
        You can then decide whether to display the "fixed" rows returned by this property, or the empty array (based on whether desiredPage=realPage).


So as you can see, the **fetchAllCountInfo** method is more sophisticated than its little sister,
and gives you more options as to how to handle out-of-range page numbers.

To make it easier for development, we call the return of this method the **list useful information**.



The list useful information
-----------
2021-07-09


The **list useful information** is a word that describes the return of the [fetchAllCountInfo](#fetchallcountinfo-method) method.



The list super useful information
-----------
2021-07-27


The **list super useful information** is like the [list useful information](#the-list-useful-information), but it contains
more properties to it:

- orderByPublicMap: an array of key => label. The keys can be used to trigger different sorting of the query.
     The label is just a human friendly string describing the effect of the sort.
  
- orderByReal: string, the orderBy really used by the query. That's because the user can give us unexpected orderby values.









