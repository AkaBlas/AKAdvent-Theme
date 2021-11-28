# AKAdvent-Theme

AKAdvent theme is a minimalistic [Wordpress](https://wordpress.org/) theme based on [Twenty-Twenty One](https://de.wordpress.org/themes/twentytwentyone/) for an advent calendar. A normal blog is limited by this. You can't search anymore, you can't open archive pages. But you can create different advent calendars using categories and access them through a shortcode.

## Usage
To install the theme, the packed ZIP archive can be uploaded under "Upload Theme" in Appearance section. 

After installing the theme in an empty blog, the first thing you will notice is a notification on the home page.
To prevent Advent calendar posts from being requested, functionalities such as the normal blog, search, category pages and archive have been disabled and replaced with an error page.
Therefore, initially a static start page must be created and defined as such in the theme customizer.

Calendars search all posts within a specific category and list them in the desired form. For this purpose, a corresponding category must be created. 
In our case, the slug corresponds to the corresponding year. Afterwards, the shortcode ```[calendar category="slug"]``` can be used on any page.

The category description is displayed as text within the listing.

Posts in the category are then listed according to their creation date (ASC). Pagination has been disabled. Each day is only mentioned once. Missing dates (up to 24) are added by placeholders. Additional posts (over 24) are appended below.

Furthermore there is now the custom post field ```guest-author``` within posts with which you can set the author. The normal author is overwritten and/or deleted.

## Features
By default, ```assets/tuerchen.png``` is used to display the entries and ```assets/logo.png``` is used for the logo. Both images can be replaced and the logo even simpler by a custom logo in the Customizer. Also, the logo is used on the custom login page. ```assets/weihnachtsloewe.png``` is used within the listing as a jaunty image.

If the calendar should only be available internally, the Wordpress blog can be protected with the plugin [Password Protected](https://github.com/benhuson/password-protected).

The calendar is displayed using a CSS grid. In the mobile version there are simply three columns by default. In the desktop version, the tiles are displayed in different sizes. If you want more variety, you can rearrange the grids with custom CSS:
```
.list.list-2021 {
	grid-template-areas:
		"t t t"
		"d10 d12 d18"
		"d13 d3 d21"
		"d6 d17 d8"
		"d2 d1 d14"
		"d19 d24 d15"
		"d23 d20 d11"
		"d5 d22 d16"
		"d4 d7 d9";
}
@media only screen and (min-width: 850px) {
    .list.list-2021 {
        grid-template-areas: "t     t     d7      d19     d19     d2"
                         "t     t      d5    d5      d13     d23"
                         "d9    d16    d21   d15     d12     d12"
                         "d14   d14    d10   d24     d24     d17"
                         "d1    d20    d3    d24     d24     d8"
                         "d22   d11    d6    d6      d18     d4";
    }
}
```

The blog description is displayed as a subheading in the header.

There are two menus. The main menu is displayed on the top right of the header, and the footer menu is displayed in the footer. Both menus have a maximum depth of 1.
