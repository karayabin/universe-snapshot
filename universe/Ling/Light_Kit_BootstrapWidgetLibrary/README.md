Light_Kit_BootstrapWidgetLibrary
===========
2019-04-26 -> 2021-04-15



A bootstrap widget library for the [Light_Kit](https://github.com/lingtalfi/Light_Kit) planet. 


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_Kit_BootstrapWidgetLibrary
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Kit_BootstrapWidgetLibrary
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_Kit_BootstrapWidgetLibrary api](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/pages/conception-notes.md)
    - [Widget Documentation](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/pages/widget-variables-description.md)
    - [How to create a widget](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/pages/how-to-create-a-widget.md)




Related
=========
- [Light_Kit_Demo](https://github.com/lingtalfi/Light_Kit_Demo/): a planet showing some demos made with Light_Kit_BootstrapWidgetLibrary. 
- [Kit_PicassoWidget](https://github.com/lingtalfi/Kit_PicassoWidget): A type of widget for the kit system. 
 


History Log
=============

- 1.18.13 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.18.12 -- 2021-04-15

    - add FreeContentWidget
  
- 1.18.11 -- 2021-03-09

    - update planet to adapt Ling.Light_Kit_Admin:0.12.25
  
- 1.18.10 -- 2021-03-09

    - rename template dir to include galaxy name, moved www/plugins dir to www/universe dir
  
- 1.18.9 -- 2021-03-05

    - update README.md, add install alternative

- 1.18.8 -- 2021-03-01

    - update ZeroAdminHeaderWidget, now accepts zone_name variable 
  
- 1.18.7 -- 2021-02-26

    - fix ZeroAdminLoginFormWidget template's default values not always set 
  
- 1.18.6 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.18.5 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.18.4 -- 2020-12-01

    - update ZeroAdminForgottenPasswordWidget, add new variables, now handle multiple accounts choice and added back to login link
    
- 1.18.3 -- 2020-11-27

    - update ZeroAdminLoginFormWidget image with new api
    
- 1.18.2 -- 2020-11-27

    - update ZeroAdminLoginFormWidget, add remember me field
    
- 1.18.1 -- 2020-11-27

    - update to accommodate latest Light_Kit api
    
- 1.18.0 -- 2020-08-10

    - add HelloWorldWidget

- 1.17.2 -- 2020-06-04

    - fix ZeroAdminForgottenPasswordWidget not generated properly
    
- 1.17.1 -- 2020-06-04

    - update how-to-create-widget-document 
    
- 1.17.0 -- 2020-06-04

    - add ZeroAdminForgottenPasswordWidget 
    
- 1.16.0 -- 2020-06-04

    - adapt HasDualPaneWidget to Light_AjaxHandler v2
    
- 1.15.2 -- 2020-02-25

    - fix ZeroAdminSidebarWidget not displaying the is_active/is_opened status of menu items
    
- 1.15.1 -- 2019-11-07

    - fix ZeroAdminHeaderWidget html typo
    
- 1.15.0 -- 2019-10-29

    - update ChloroformWidget, now you can opt in the helium assets
    - update ChloroformWidget, add helium light template
    
- 1.14.1 -- 2019-10-29

    - fix typo 
    
- 1.14.0 -- 2019-10-29

    - add LightRealistWidget 
    
- 1.13.2 -- 2019-09-04

    - fix widgets using copilot from constructor 
    
- 1.13.2 -- 2019-09-04

    - fix widgets using copilot from constructor 
    
- 1.13.1 -- 2019-08-13

    - fix ZeroAdminBigNotificationWidget example typo
    
- 1.13.0 -- 2019-08-13

    - add ZeroAdminBigNotificationWidget
    
- 1.12.0 -- 2019-07-30

    - add ChloroformWidget
    
- 1.11.1 -- 2019-07-25

    - fix ZeroAdminLoginFormWidget template not showing the hidden var

- 1.11.0 -- 2019-07-25

    - update ZeroAdminLoginFormWidget, add error_no_match_show, error_no_match_body, and value to the form fields
    
- 1.10.0 -- 2019-07-25

    - add ZeroAdminLoginFormWidget

- 1.9.1 -- 2019-07-25

    - update ZeroAdminNotificationToastWidget, now understand color codes
    
- 1.9.0 -- 2019-07-25

    - add ZeroAdminNotificationToastWidget
    
- 1.8.1 -- 2019-07-24

    - update widget documentation with screenshot names.
    
- 1.8.0 -- 2019-07-24

    - add ZeroAdminNotificationAlertWidget

- 1.7.1 -- 2019-07-18

    - update docTools documentation, add links to source code for classes and methods
    
- 1.7.0 -- 2019-07-16

    - add ZeroAdminStatSummaryIconWidget
    
- 1.6.0 -- 2019-07-16

    - add ZeroAdminBreadcrumbWidget
    
- 1.5.0 -- 2019-07-16

    - add ZeroAdminSidebarWidget
    
- 1.4.0 -- 2019-07-15

    - add ZeroAdminHeaderProfileDropdownLinkWidget
    
- 1.3.0 -- 2019-07-15

    - add ZeroAdminHeaderNewNotificationsIconLinkWidget
    
- 1.2.0 -- 2019-07-15

    - add ZeroAdminHeaderNewMessagesIconLinkWidget
    
- 1.1.0 -- 2019-07-15

    - add ZeroAdminHeaderWidget
    
- 1.0.0 -- 2019-05-17

    - hello version 1
    
- 0.40.0 -- 2019-05-17

    - add FooterWithButtonWidget
    
- 0.39.0 -- 2019-05-17

    - rename MizuxeTwoColumnsContactFormWidget to MizuxeContactFormWidget
    
- 0.38.0 -- 2019-05-17

    - add PortfolioGridThreeColumnsCardInfoWidget
    
- 0.37.0 -- 2019-05-17

    - add ProgressBarWidget
    
- 0.36.0 -- 2019-05-17

    - add PortfolioGridHeaderWithDescriptionWidget
    
- 0.35.0 -- 2019-05-17

    - add PortfolioGridHeaderWithDescriptionWidget
    
- 0.34.0 -- 2019-05-16

    - update BlogenFormWidget, add show_form property, and radio type
    
- 0.33.0 -- 2019-05-16

    - add BlogenSidebarAvatarWithActionButtonsWidget
    
- 0.32.0 -- 2019-05-16

    - add BlogenFormWidget
    
- 0.31.0 -- 2019-05-16

    - add BlogenHeaderWithActionButtonsWidget
    
- 0.30.0 -- 2019-05-16

    - add BlogenIconHeaderWidget
    
- 0.29.0 -- 2019-05-16

    - add BlogenSidebarIconCardsWidget
    
- 0.28.0 -- 2019-05-16

    - add BlogenAdminTableWidget
    
- 0.27.1 -- 2019-05-16

    - cleaning doc
    
- 0.27.0 -- 2019-05-16

    - add BlogenHeaderWithModalActionButtonsWidget
    
- 0.26.0 -- 2019-05-15

    - add BlogenIconHeaderWidget
    
- 0.25.0 -- 2019-05-15

    - add PeopleGridWidget

- 0.24.0 -- 2019-05-15

    - add ContactFormAndCompanyInfoWidget
    
- 0.23.0 -- 2019-05-14

    - add BlogCardsWidget

- 0.22.0 -- 2019-05-14

    - add TwoColumnsAccordionWidget
    
- 0.21.0 -- 2019-05-14

    - add GlozzomPricingTableWidget 
    
- 0.20.0 -- 2019-05-14

    - add SlickTestimonialCarouselWidget 
    
- 0.19.0 -- 2019-05-14

    - add NewsletterHeaderWidget 
    
- 0.18.0 -- 2019-05-14

    - add PhotoGalleryWidget 
    
- 0.17.0 -- 2019-05-14

    - add ParallaxHeaderWithVideoTriggerWidget 
    
- 0.16.0 -- 2019-05-14

    - add GlozzomTwoColumnsTeaserWidget 
    
- 0.15.0 -- 2019-05-13

    - add ParallaxHeaderWidget 
    
- 0.14.0 -- 2019-05-13

    - add IconTeaserWidget 

- 0.13.2 -- 2019-05-13

    - update widget doc with more convoluted examples 
    
- 0.13.1 -- 2019-05-13

    - update widget doc with "back to top" links 
    
- 0.13.0 -- 2019-05-13

    - add ShowCaseCarouselWidget 
    
- 0.12.0 -- 2019-05-13

    - update MainNavWidget, now link items can be active 
    
- 0.11.1 -- 2019-05-13

    - update widget doc, now list presets
    
- 0.11.0 -- 2019-05-13

    - add SimpleFooterWidget
    
- 0.10.0 -- 2019-05-10

    - add MizuxeTwoColumnsContactFormWidget
    
- 0.9.1 -- 2019-05-10

    - fix images not having right content-type
    
- 0.9.0 -- 2019-05-10

    - add MizuxeFourColumnsOurStaffWidget
    
- 0.8.0 -- 2019-05-10

    - add MizuxeNewsletterSignupHeaderWidget
    - add ColoredBoxesWidget
    - add OneColumnAccordionWidget
    
- 0.7.0 -- 2019-05-03

    - add MizuxeTwoColumnsTeaserWidget
    
- 0.6.0 -- 2019-05-03

    - update MainNavWidget, add use_scrollspy and use_smooth_scrolling features
    
- 0.5.0 -- 2019-05-03

    - add LoopLabFooterWithContactUseButtonWidget
    
- 0.4.1 -- 2019-05-03

    - fix indentation problem in widget documentation examples.
    
- 0.4.0 -- 2019-05-03

    - add LoopLabTwoColumnsTeaserWidget
    
- 0.3.0 -- 2019-05-03

    - add LoopLabMonoChromeHeaderWidget
    
- 0.2.0 -- 2019-05-03

    - add LoopLabTwoColumnsSignupFormWidget to widget documentation
    
- 0.1.1 -- 2019-05-02

    - fix widget documentation
    
- 0.1.0 -- 2019-05-02

    - adding widget documentation
    
- 0.0.0 -- 2019-04-26

    - initial commit