# ccc-mountain
Bootstrap 4 Joomla! Template

# CCC-Mountain 
This Joomla! Bootstrap 4 Template is based on the startbootsrap Template from
https://github.com/BlackrockDigital/startbootstrap-landing-page which is released under the MIT License

## Disclaimer
This template is not a all-in-one Joomla! Template. 
It does *not* contain overrides of all core-views. If you use it, you might experience issues with frontend-editing. In fact it does its job on the website it's used on. If you find any bugs or something that can be done better please post an issue or a PR. I am more than happy to test and merge.

## Installation
Install the template as usual through the Joomla! Extension installer

## Description
This template is used on the website 
browsercache-leeren.de 

## Template Parameters

### Main-Output
You can disable the component area 

### Logo
You can define a Logo Text or a Logo Image

### Copyright
If there is no module in the position copyright, the copyright language string is placed into the footer. 

## Module positions

### mainmenu
Publish the main menu in the main menu position (mod_menu)

### header
Setup a mod_custom module in the header position with the layout *clean* 
For the large header image setup the module class suffix: *intro-header* with a leading space and select a background image in the options tab

If you want a smaller header then use the module class suffix *site-header* with a leading space.

### breadcrumbs
Setup a mod_breadcrumbs module in the breadcrumbs position ;-)

### banner
Setup a mod_custom module with the Layout *clean* and add the module class suffix *banner* with a leading space. Setup the Module-tag *aside*.

If you want a banner with a smaller width add the class *small* to the existing ones.
If you want a banner with a darker background add the class *dark* to the existing ones.

### footermenu
Setup a mod_menu module in the footermenu position with the layout *footer*

### copyright
Setup a mod_custom module in this position with the layout *clean*. Put in a paragraph like 
<p class="copyright text-muted small">Your Copyright Information</p>

If there is no module on this position, the copyright message from the template language file is shown.

## Alternate Layout for Category View (Landingpage)
If you have a look at the page browsercache-leeren.de you see that the main menu parent items are showing articles from a category with an alternate Layout and i'´s own menu type. 
• shows the articles from a category in one column below each other
• If there are custom fields or intro-images, the article take 7/12 columns of the bootstrap grid
• If any custom field exists, a tab panel for each custom field is created - the content in the tab panel is the field value, the title of the tab panel is the custom field label (does support JTEXT)
• If an intro image exists it's shown above the tabs or on its own

## Override (Article)
• The article detail view takes 7/12 columns of the bootstrap grid
• If any custom field exists, a tab is created - the content in the tab-panel is the field value, the title of the tab panel is the custom field label (does support JTEXT)
• If a full image exists it's shown above the Tabs or on its own

## Used customFields 
On the website browsercache-leeren.de  
• the "Icon" tab is a Joomla! core media custom field 
• the "Image-Instructions" Tab shows this Bootstrap 4 Slider Custom Field -> https://github.com/coolcat-creations/simpleBootstrapSlider
• the "Video" shows the Youtube Custom Field ->
https://github.com/coolcat-creations/cccyoutubefield
• the "Plugins" tab is a Joomla! core editor Custom Field
• the invisible Recaptcha function in the contact form is: https://github.com/coolcat-creations/cccinvisiblerecaptcha

## Recommendations
Before I put the site online I used the coming soon plugin from Brian Teeman available at: https://github.com/brianteeman/haraka This plugin shows a nice "coming soon" page with countdown if you want to, and makes the page accessible through a secret word parameter instead of login data. That makes it easy to show your site to others before launch.

## ToDos
• Review and add Accessibility Options
• More Overrides for Joomla! Core
• Miscellaneous improvements
• Adding a sidebar-right and sidebar-left module position

This template is not tested thoroughly so if you find any issues:
Suggestions and help are welcome!

Special Thanks to @brianteeman and @bembelimen  :-)






