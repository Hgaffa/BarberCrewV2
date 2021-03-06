# Barber Crew Website Version 2.0
Updated Barber Crew Website Theme. Find website live at https://www.barbercrew.co.uk

## 1 External Scripts & Libraries:
- Cookie Alert: https://github.com/Wruczek/Bootstrap-Cookie-Alert
- Font Awesome Fonts: https://kit.fontawesome.com/324219a00a.js

This project is built with the Bootstrap framework (HTML, CSS, JS) and is based off of the Desi theme. 

---

## 2 Improved Features:

### 2.1 Image Formats:
- Images are updated to use next gen file formats, namely AVIF. Unfortunately, many modern browsers still do not support AVIF and so fallback JPEGs & PNGs are provide. This has allowed for optimal performance and load speeds on Chrome specifically.

### 2.2 Responsive Full-Width Video Banner
- A full width promotion video banner is used at the header of the site with animated buttons to draw customers to book at any of their chosen studios. The menu is responsive with a consistent colour scheme throughout the site, including social icon links.

https://user-images.githubusercontent.com/43887682/163655675-9a7b84df-a0c2-40b2-a5e7-f0c286aea493.mp4

### 2.3 Location Map
- The site contains an interactive google map that updates to show the google business location of the chosen studio. A booking button is also displayed and dynamically updated depending on the location chosen.

https://user-images.githubusercontent.com/43887682/163655680-d647106f-f774-4fca-94a6-f41f94f2f6bd.mp4

### 2.4 Interactive Gallery

https://user-images.githubusercontent.com/43887682/163655685-d31331a8-5a5a-4c00-a551-ec86b07e883e.mp4

### 2.5 Ovatu Booking Integration
- Integrates Ovatu booking app widget directly into the site for streamlined customer bookings.

---

#### *TO DO:*
1) Write 301 redirects for old pages and trim .html from URLS. For redirects add the following to .htaccess file (https://www.gingerdomain.com/seo/301-redirect-old-page-new-page/):
`redirect 301 /old/old.html http://www.yuu.come/new.html`
2) ~~Complete cookie consent component~~
3) ~~Optimize SEO using [Ubersuggest](https://app.neilpatel.com/en/traffic_analyzer/keywords?domain=barbercrew.co.uk&locId=2826&lang=en) for all pages~~
4) ~~Integrate new location~~
   
