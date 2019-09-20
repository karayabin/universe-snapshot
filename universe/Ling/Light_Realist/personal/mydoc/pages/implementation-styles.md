Implementation styles
======================
2019-08-15





So far, I've defined one type of request: [howl](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/request-types.md#howl).
But this is not enough to implement the whole system.


Our system is based on the [ParametrizedSqlQuery](https://github.com/lingtalfi/ParametrizedSqlQuery) technique,
which basically consists in providing parameters to the class that creates the [SqlQuery](https://github.com/lingtalfi/SqlQuery) for us.

This technique allows for a lot of flexibility, and hence different implementation styles to choose from when creating the end-to-end
realist system.

For instance, we can be very verbose and strict about which tags should be given, something like this:


```yaml

test_user:
    table: lud_user
    base_fields:
        - id
        - identifier
        - pseudo
        - avatar_url
        - rights
        - extra



    having: []
    order: []
        order_id_asc: id asc
        order_id_desc: id desc
        order_identifier_asc: identifier desc
        order_identifier_desc: identifier desc
        order_pseudo_asc: pseudo asc
        order_pseudo_desc: pseudo desc
        order_avatar_url_asc: avatar_url asc
        order_avatar_url_desc: avatar_url desc
        order_rights_asc: rights asc
        order_rights_desc: rights desc
        order_extra_asc: extra asc
        order_extra_desc: extra desc
    where: []
        where_id_like: id like '%$value%'
        where_identifier_like: identifier like '%$value%'
        where_pseudo_like: pseudo like '%$value%'
        where_avatar_url_like: avatar_url like '%$value%'
        where_rights_like: rights like '%$value%'
        where_extra_like: extra like '%$value%'
        where_id_starts_with: id like '$value%'
        where_identifier_starts_with: identifier like '$value%'
        # ...
    limit:
        page: $page
        length: 10

```

In the example above, we have a great deal of control over the request.

Or, we could be more loose, and use generic parameters, like this for instance:


```yaml

test_user:
    table: lud_user
    base_fields:
        - id
        - identifier
        - pseudo
        - avatar_url
        - rights
        - extra

    having: []
    order: []
        order_generic: $column $direction
    where: []
        where_generic: $column $operator $value
    limit:
        page: $page
        length: 10

```

We can see already that we have a much less verbose style, however we start giving more freedom to the user, which means we need
to pay more attention to the security of our system.
So in this case, we could rely on variables constraints (for instance) to tighten up this technique a bit, and/or maybe
we can write the list of allowed columns for search.



So as we can see, between the most rigid declaration through the most loose, we have a lot of room for our implementation.
And so again, rather than implementing things from the top of my head, since all that is kind of too abstract for me,
I will base my implementation style on a concrete use case.


So my first use case is this user list from the admin app I'm working on at the moment.
And I want to use a loose style, because I believe it's adapted for the admin lists.

And hence I've created the OpenAdminTable protocol, which defines the way a "renderer" and a "rows generator" should
work together in order to product a gui interactive admin table. 

For more details, check out the [open-admin-table-protocol.md](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/open-admin-table-protocol.md) page.




