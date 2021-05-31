InvoiceGenerator, conception notes
================
2021-05-04 -> 2021-05-07


The basic idea of this planet is to generate pdf invoices from templates.



Our templates are:


- [basicStore/classic](https://github.com/lingtalfi/InvoiceGenerator/blob/master/doc/pages/basic_store-classic.md)




The [templates](#invoice-templates) are organized by type of invoices.


All invoice types are composed of two main sections:

- the **main invoice**
- the **invoice lines**


We provide the following invoice types:


- basicStore invoice





The details for each invoice type is described later in this document.


To generate the pdf call the **generate** method of our InvoiceGenerator object.


Each type of invoice assumes that the **main invoice** and the **invoice lines** section have certain fields in it, for instance (first_name, last_name, quantity, unit_price, etc...).


The basicStore invoice
--------
2021-05-04 -> 2021-05-06


- single currency invoice
- no tax 
- generic address format
- virtual product (i.e. no shipping)
- possible discount on the total 



With this type of invoice, there is only one currency (for instance euro, or dollar...).


### The **main invoice** fields
 
- invoice_number    
- purchase_date     
- payment_method     
- company           
- first_name        
- last_name         
- phone        
- email       
- address           
- zip_postal_code   (zip/postal code)
- city              
- state_province_region (state/province/region) 
- country           
- discount_code (if not null, the discount is active, otherwise it's not)    
- discount_label    
- discount_amount   (in the chosen currency)



### The **invoice lines** fields (for each line)
 
- product_reference     
- product_name          
- quantity              
- unit_price (in the chosen currency)



It is assumed that:

- the total formulae for any **invoice line** is: **quantity x unit_price**
- the total formulae of the **main invoice** section is: **{sum of all invoice line totals} - discount_amount**


Some templates compute the **invoice lines** totals automatically, if this is the case you need to provide
the quantity and unit_price as int/float.
Some other templates might require you to provide your own line sub-total.
See the source code of the templates for more details.






Invoice templates
========
2021-05-04 -> 2021-05-06


A template is basically a simple php file used to generate the invoice in a certain manner, with a certain style.


Our templates are located in a directory named after the invoice type.

The **templateId** (required by the generate method) is a string with the following format:

- invoiceType/templateName

For instance:

- basicStore/classic


To make things simple, all templates receive one array with the following structure:


- main: array containing fields for the **main invoice** section 
- lines: array of items, each of which being an array containing the fields for the **invoice line** section
- total: array containing items to display in the total section. Each item is an array of two entries:
  - 0 : the label describing the value 
  - 1 : the value (often a decimal number representing an amount of money)
- ...other data might be added by the template, see each template's source code for more info



Note: unless otherwise specified, the monetary values are not formatted by the template, which basically just displays strings.


Our templates are first created using basic html (i.e. no fancy style such as flexbox), and converted via the [wkhtmltopdf](https://wkhtmltopdf.org/) utility, which must be installed
on the machine.


Note: all templates are php files, because some templates need to be smart. For instance, the template I've just created needs to know the number
of lines in the total section, and the number of lines in the lines section in order to display the right amount of vertical space in the bottom of the lines section.





