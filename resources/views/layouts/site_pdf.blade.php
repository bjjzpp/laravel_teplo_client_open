<!DOCTYPE html>
<html lang="ru"><head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Муниципальное предприятие «Теплоснабжение», Калужская область г.Обнинск"/>
<meta name="keywords" content="Теплоснабжение, тепло, теплосети, госзакупки, ФЗ-223,"/>
<title></title>
<style>
@font-face {
  font-family: 'DejaVu Sans';
  src: url('../../fonts/DejaVuSans.tff') fromat('tff');
}

html {
    font-family: 'DejaVu Sans';
    -webkit-text-size-adjust: 100%;
    -ms-text-size-adjust:     100%;
    color:#000;
}

body {
    margin: 0;
    font-family: 'DejaVu Sans';
    line-height: 1.7;
    font-size: 14px;
    color:#000;
    overflow-x:hidden;
    word-wrap: break-word;
}

article,
aside,
details,
figcaption,
figure,
footer,
header,
main,
menu,
nav,
section,
summary {
    display: block;
}

audio,
canvas,
progress,
video {
    display: inline-block;
    vertical-align: baseline;
}

audio:not([controls]) {
    display: none;
    height: 0;
}

[hidden],
template {
    display: none;
}

a {
    background-color: transparent;
}

a:active,
a:hover {
    outline: 0;
}

abbr[title] {
    border-bottom: 1px dotted;
}

b,
strong {
    font-weight: bold;
}

dfn {
    font-style: italic;
}

mark {
    background: #ff0;
    color: #000;
}

small {
    font-size: 80%;
}

sub,
sup {
    font-size: 75%;
    line-height: 0;
    position: relative;
    vertical-align: baseline;
}

sup {
    top: -0.5em;
}

sub {
    bottom: -0.25em;
}

img {
    border: 0;
}

svg:not(:root) {
    overflow: hidden;
}

figure {
    margin: 1em 40px;
}

hr {
    box-sizing: content-box;
    height: 0;
}

pre {
    overflow: auto;
}

code,
kbd,
pre,
samp {
    font-family:'DejaVu Sans';
    font-size: 1em;
}

fieldset {
    border: 1px solid #c0c0c0;
    margin: 0 2px;
    padding: 0.35em 0.625em 0.75em;
}

legend {
    border: 0;
    padding: 0;
}

textarea {
   overflow: auto;
}

optgroup {
    font-weight: bold;
}

table {
    border-collapse: collapse;
    border-spacing: 0;
}

td, th {
    border: 1px solid #dddddd;
    padding: 5px;
    text-align: center;
}

table {
    margin: 0 0 1.5em;
    width: 100%;
}

blockquote {
    margin: 0 15px;
}

blockquote {
    background-color: #f9f9f9;
    border-left: 4px solid #ffab1f;
    font-style: italic;
    font-weight: normal;
    margin-bottom: 20px;
    margin-left: 0;
    padding: 20px;
}

blockquote,
q {
    quotes: "" "";
}

address {
  margin: 0 0 15px;
}

pre {
    background: #eee;
    font-family: 'DejaVu Sans';
    font-size: 15px;
    font-size:15px;
    line-height: 1.6;
    margin-bottom: 15px;
    max-width: 100%;
    overflow: auto;
    padding:15px;
}

code,
kbd,
tt,
var {
    font-family: 'DejaVu Sans';
    font-size: 15px;
    font-size:15px;
}

abbr,
acronym {
    border-bottom: 1px dotted #666;
    cursor: help;
}

mark,
ins {
    background: #fff9c0;
    text-decoration: none;
}

big {
    font-size: 125%;
}

/*--------------------------------------------------------------
# Elements
--------------------------------------------------------------*/
html {
    box-sizing: border-box;
}

*,
*:before,
*:after { /* Inherit box-sizing to make it easier to change the property for components that leverage other behavior; see http://css-tricks.com/inheriting-box-sizing-probably-slightly-better-best-practice/ */
    box-sizing: inherit;
}

body {
    background: #fff; /* Fallback for when there is no custom background color defined. */
}

blockquote:before,
blockquote:after,
q:before,
q:after {
    content: "";
}

blockquote,
q {
    quotes: "" "";
}

hr {
    background-color: #ccc;
    border: 0;
    height: 1px;
    margin-bottom: 1.5em;
}
p {
    color: #666666;
    font-size: 14px;
    line-height: 1.5;
    margin: 0 0 15px;
}

h1, h2, h3, h4, h5, h6 {
    color: #294a70;
    font-family: 'DejaVu Sans';
    font-weight: normal;
    margin: 0 0 15px;
}

h1 {
    font-size: 28px;
}

h2 {
    font-size: 20px;
}

h3{
    font-size: 17px;
}

h4 {
    font-size: 16px;
}

h5 {
    font-size: 15px;
}

h6 {
    font-size: 14px;
}

ul,
ol {
    margin: 0 0 15px 25px;
    padding: 0;
}

ul {
    list-style: disc;
}

ol {
    list-style: decimal;
}

dt {
    font-weight: bold;
}

dd {
    margin: 0 1.5em 1.5em;
}

img {
    height: auto; /* Make sure images are scaled correctly. */
    max-width: 100%; /* Adhere to container width. */
}

/*--------------------------------------------------------------
# Alignments
--------------------------------------------------------------*/
.alignleft {
    display: inline;
    float: left;
    margin-right: 15px;
    margin-bottom: 15px;
}

.alignright {
    display: inline;
    float: right;
    margin-left: 15px;
    margin-bottom: 15px;

}

.aligncenter {
    clear: both;
    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 15px;
}

.alignnone{
    clear: both;
    display: inline-block;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 15px;
    margin-top: 15px;
}

/*--------------------------------------------------------------
# Clearings
--------------------------------------------------------------*/
.clear:before,
.clear:after,
.entry-content:before,
.entry-content:after,
.comment-content:before,
.comment-content:after,
.site-header:before,
.site-header:after,
.site-content:before,
.site-content:after,
.site-footer:before,
.site-footer:after {
    content: "";
    display: table;
}

.clear:after,
.entry-content:after,
.comment-content:after,
.site-header:after,
.site-content:after,
.site-footer:after {
    clear: both;
}

/*--------------------------------------------------------------
# Content
--------------------------------------------------------------*/
/*--------------------------------------------------------------
## Posts and pages
--------------------------------------------------------------*/

.sticky {
    display: block;
}

.hentry {
    margin: 0 0 15px;
}

.byline,
.updated:not(.published) {
    display: none;
}

.single .byline,
.group-blog .byline {
    display: inline;
}

.single .entry-content{
    text-align: left;
}

.entry-meta > span a,
.single-post-meta > span a,
.entry-footer > span a {
    font-style: italic;
}

.page-content,
.entry-content,
.entry-summary {
    margin: 15px 0 0;
}

.entry-title {
    margin-bottom: 5px;
}

#featured-content .entry-title {
    margin-bottom: 10px;
}

.page-links {
    clear: both;
    margin: 0 0 15px;
}

.entry-meta > span:before,
.entry-footer > span:before,
.single-post-meta > span:before,
.block-meta a:before {
    display: inline-block;
    font-family: 'DejaVu Sans';
    height: 15px;
    margin-right:8px;
    content: "";
}

.block-meta {
    margin-bottom: 10px;
}


.single .byline,
.group-blog .byline {
    display: inline;
}

.page-content,
.entry-content,
.entry-summary {
    margin: 1.5em 0 0;
}


/*--------------------------------------------------------------
## Asides
--------------------------------------------------------------*/

.blog .format-aside .entry-title,
.archive .format-aside .entry-title {
    display: none;
}

#calendar_wrap caption {
    background: #ffa500 none repeat scroll 0 0;
    color: #ffffff;
    font-size: 19px;
    padding: 5px 10px;
}

#calendar_wrap table {
    background: #294a70 none repeat scroll 0 0;
    color: #ffffff;
}

#calendar_wrap #next,
#calendar_wrap td#prev,
td#today{
    background: #ffab1f;
}

#calendar_wrap #next a,
#calendar_wrap td#prev a,
td#today a{
    color: #fff;
}

/*--------------------------------------------------------------
## Captions
--------------------------------------------------------------*/
.wp-caption {
    margin-bottom: 1.5em;
    max-width: 100%;
}

.wp-caption img[class*="wp-image-"] {
    display: inline-block;
    margin-left: auto;
    margin-right: auto;
}

.wp-caption .wp-caption-text {
    margin: 0.8075em 0;
}

.wp-caption-text {
    text-align: center;
}

/*--------------------------------------------------------------
## Galleries
--------------------------------------------------------------*/
.gallery {
    margin-bottom: 1.5em;
    margin-right: -5px;
    margin-left: -5px;
}

.gallery-item {
    display: inline-block;
    margin: 0;
    padding: 5px;
    text-align: center;
    vertical-align: top;
    width: 100%;
}

.gallery-item img {
    vertical-align: middle;
}

.gallery-columns-2 .gallery-item {
    max-width: 50%;
}

.gallery-columns-3 .gallery-item {
    max-width: 33.33%;
}

.gallery-columns-4 .gallery-item {
    max-width: 25%;
}

.gallery-columns-5 .gallery-item {
    max-width: 20%;
}

.gallery-columns-6 .gallery-item {
    max-width: 16.66%;
}

.gallery-columns-7 .gallery-item {
    max-width: 14.28%;
}

.gallery-columns-8 .gallery-item {
    max-width: 12.5%;
}

.gallery-columns-9 .gallery-item {
    max-width: 11.11%;
}

.gallery-caption {
    display: block;
}



/*--------------------------------------------------------------
# Custom By WEN Themes
--------------------------------------------------------------*/
/*--------------------------------------------------------------
## Custom Basic Reset By WEN Themes
--------------------------------------------------------------*/


/*Clearings*/

.clear-fix:before,
.clear-fix:after,
.entry-content:before,
.entry-content:after,
.comment-content:before,
.comment-content:after,
.site-header:before,
.site-header:after,
.site-content:before,
.site-content:after,
.site-footer:before,
.site-footer:after {
  content: "";
  display: table;
}

.clear-fix:after,
.entry-content:after,
.comment-content:after,
.site-header:after,
.site-content:after,
.site-footer:after {
  clear: both;
}

#tophead::after,
#tophead::before,
#masthead::after,
#masthead::before,
#featured-slider::after,
#featured-slider::before,
#content::after,
#content::before,
#footer-widgets::after,
#footer-widgets::before,
#colophon::after,
#colophon::before,
#featured-content::after,
#featured-content::before,
#featured-news-events::after,
#featured-news-events::before {
  clear: both;
  content: "";
  display: table;
}

/*--------------------------------------------------------------
## Custom Basic Style By WEN Themes
--------------------------------------------------------------*/

.container{
  width: 1170px;
  margin: 0 auto;
  padding-left: 15px;
  padding-right: 15px;
}

.inner-wrapper{
  margin-left: -15px;
  margin-right: -15px;
}

/*--------------------------------------------------------------
## Custom Basic Header Style By WEN Themes
--------------------------------------------------------------*/
/*--------------------------------------------------------------
## Custom Basic Header Style By WEN Themes
--------------------------------------------------------------*/
.site-info a {
    color: #ffffff;
}

.site-header {
    clear: both;
    padding: 20px 0;
}

.site-logo-link, .custom-logo-link{
    float: left;
    margin-right: 10px;
    max-width:300px;
}

#site-identity {
    float: left;
    margin-top: 7px;
}

.site-title {
    clear: none;
    font-family: 'DejaVu Sans';
    font-size: 28px;
    font-weight: bold;
    line-height: 1;
    margin-bottom: 6px;
}


.site-logo-link > img, .custom-logo-link img {
    max-height: 110px;
    width: auto;
}
.site-description {
    color: #666666;
    font-size: 14px;
    font-style: inherit;
    font-weight: 400;
    letter-spacing: 1.4px;
    margin-bottom: 0;
}

.site-content {
    padding:40px 0;
    float: left;
    width: 100%;
}
.home.home-content-not-enabled .site-content {
  padding: 0;
}
#tophead {
    background-color: #49688e;
    clear: both;
    font-family: 'DejaVu Sans';
    min-height: 35px;
}

#quick-contact {
    float: left;
    padding-top: 8px;
}

#quick-contact li {
    border-left: 1px solid #fff;
    float: left;
    font-size: 14px;
    line-height: 1.1;
    list-style: outside none none;
    margin-left: 15px;
    padding-left: 15px;
}

#quick-contact li:first-child {
    border: medium none;
    margin: 0;
    padding: 0;
}

#quick-contact li::before {
    color:#ffab1f;
    content: "";
    display: inline-block;
    font-family: 'DejaVu Sans';
    margin-right: 5px;
    font-size: 17px;
}

#quick-contact .top-news-title::before {
    color: #ffab1f;
    content: "\f0a4";
    float: left;
    font-family: 'DejaVu Sans';
    font-size: 18px;
    line-height: 1;
    margin-right: 5px;
}

#quick-contact .top-news > p {
    color: #ffffff;
    margin: 0;
}

#quick-contact .top-news > p{
    float: left;
    min-width: 270px;
}

#quick-contact .top-news-title {
    display: block;
    float: left;
    margin-right: 15px;
}

#quick-contact li.quick-call::before {
    content: "\f095";
}

#quick-contact li.quick-email::before {
    content: "\f0e0";
}

#quick-contact > ul {
    margin: 0;
    padding: 0;
}

#quick-contact .top-news {
    border-left: 1px solid #fff;
    float: left;
    margin-left: 15px;
    padding-left: 15px;
}

#quick-contact > ul {
    float: left;
    margin: 0;
    padding: 0;
}

#quick-contact a,
#tophead {
    color: #ffffff;
}


#quick-contact a:hover,
#quick-contact li:hover a,
#quick-contact .top-news a:hover {
    color: #bfbfbf;
}

#quick-contact .top-news a {
    font-weight: bold;
    text-decoration: underline;
}

/*--------------------------------------------------------------
## Custom Basic Content Style By WEN Themes
--------------------------------------------------------------*/


#content article {
    border-bottom: 1px solid #dddddd;
    padding-bottom: 25px;
}

#primary{
    width: 75%;
    padding-left:15px;
    padding-right: 15px;
    float: left;
}

#sidebar-primary .widget-title::after ,
#sidebar-secondary .widget-title::after{
    border-left: 9px solid rgba(0, 0, 0, 0);
    border-right: 9px solid rgba(0, 0, 0, 0);
    border-top: 9px solid #294a70;
    bottom: -20px;
    content: "";
    display: block;
    height: 21px;
    left: 5%;
    margin: 0 auto;
    position: absolute;
    width: 13px;
    z-index: 9999;
}

#sidebar-primary .widget-title,
 #sidebar-secondary .widget-title {
    background: #294a70 none repeat scroll 0 0;
    border-bottom: 0 solid #ffab1f;
    border-left: 5px solid #ffab1f;
    color: #ffffff;
    font-size: 16px;
    font-weight: normal;
    line-height: 1.5;
    padding: 5px 15px;
    position: relative;
    margin-bottom: 20px;
}


.widget-area ul li::before {
    color: #ffab1f;
    content: "\f101";
    display: inline-block;
    font-family: 'DejaVu Sans';
    font-size: 15px;
    left: 0;
    margin-left: 5px;
    margin-right: 8px;
    position: absolute;
}

.widget-area .widget {
    clear: both;
    float: left;
    width: 100%;
    margin-bottom: 30px;
}

.widget-area ul ul ul ul ul > li {
    padding-left: 0;
}
.widget-area ul ul ul ul ul > li:before {
    left:-20px;

}
/*--------------------------------------------------------------
## Custom Basic Sidebar Style By WEN Themes
--------------------------------------------------------------*/

#sidebar-primary {
    width:25%;
    padding-left:15px;
    padding-right: 15px;
    float: right;
}

#sidebar-secondary {
    width:25%;
    padding-left:15px;
    padding-right: 15px;
    float: right;
}

.widget-area ul {
    list-style: outside none none;
    margin-left: 0;
    padding-left: 0;
}

.widget-area ul ul {
    margin-bottom: 0;
    border: none;
}

.widget-area ul li {
    padding: 2px 0 2px 25px;
    position: relative;
}

.attachment-full.wp-post-image {
    margin: 0 0 15px 0;
}

.recent-news {
    float: left;
    padding: 0 15px;
    width: 60%;
}

.recent-events {
    float: left;
    padding: 0 15px;
    width: 40%;
}

.news-post {
    float: left;
    padding: 0 15px;
    width: 50%;
}

.news-post:last-child {
    border: medium none;
}

.news-post:nth-child(2n+1) {
    clear: both;
}
.recent-events img {
    max-width: 95px;
}

#featured-content article {
    float: left;
    padding: 0 15px;
}

#featured-content .featured-content-column-1 article{
    width: 100%;
}

#featured-content .featured-content-column-2 article{
    width: 50%;
}

#featured-content .featured-content-column-3 article{
    width: 33.33%;
}

#featured-content .featured-content-column-4 article{
    width: 25%;
}

#featured-content {
    background: #fbfbfb none repeat scroll 0 0;
    padding: 30px 0;
    float: left;
    width: 100%;
}

#featured-news-events h2::before {
    content: "";
    display: inline-block;
    font-family: 'DejaVu Sans';
    margin-right: 15px;
}

#featured-news-events .recent-news h2::before{
    content: "\f1ea"
}

#featured-news-events .recent-events h2::before{
    content: "\f073"
}

#featured-news-events h3 {
    margin-bottom: 5px;
}

.event-post .entry-meta {
    background: #ffab1f none repeat scroll 0 0;
    border-radius: 8px 8px 5px 5px;
    border-top: 3px solid #002147;
    color: #ffffff;
    float: left;
    font-size: 30px;
    font-weight: bold;
    line-height: 1.4;
    margin: 10px 20px 10px 0;
    padding: 0 10px 10px;
    position: relative;
    text-align: center;
    text-shadow: 0 0 1px #5d5d5d;
    width: 71px;
}

.event-post .entry-meta::before {
    border: 1px solid #ffab1f;
    border-radius: 100%;
    content: "";
    display: block;
    height: 25px;
    left: 24px;
    position: absolute;
    top: -15px;
    width: 25px;
}

.event-post .entry-meta::after {
    border: 1px solid #ffffff;
    border-radius: 100%;
    content: "";
    display: block;
    height: 1px;
    left: 0;
    position: absolute;
    top: 44px;
    width: 100%;
}

a.button {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    font-size: 15px;
    padding: 0;
}

a.button:hover{
    color:#6081a7;
}

a.button::after {
    content: "\f101";
    font-family: 'DejaVu Sans';
    margin-left: 5px;
}

.event-post .entry-meta a{
    color: #fff;
}

.event-post {
    background: #f3f3f3 none repeat scroll 0 0;
    clear: both;
    margin-bottom: 18px;
    overflow: hidden;
    padding: 15px 15px 0;
}

#featured-news-events {
    clear: both;
    padding: 30px 0 15px;
}

.news-content {
    background: #f3f3f3 none repeat scroll 0 0;
    border-top: 5px solid #ffab1f;
    padding: 15px;
}

.news-post img{
    margin-bottom:0;
}


    /*--------------------------------------------------------------
    ## Custom Basic Footer Style By WEN Themes
    --------------------------------------------------------------*/

    #footer-widgets {
        background-color: #294a70;
        border-top: 5px solid #ffab1f;
        float: left;
        padding: 30px 0;
        width: 100%;
    }

    .footer-widget-area  ul {
        margin: 0;
    }

    .footer-widget-area  ul li{
        list-style: none;
        position: relative;
        padding-left: 20px;
    }

    .footer-widget-area ul li::before {
        color: #ffab1f;
        content: "\f101";
        display: inline-block;
        font-family: 'DejaVu Sans';
        font-size: 15px;
        left: 0;
        margin-left: 5px;
        margin-right: 8px;
        position: absolute;
    }

    .news-content {
        background: #f3f3f3 none repeat scroll 0 0;
        border-top: 5px solid #ffab1f;
        margin-bottom: 20px;
        padding: 15px;
    }

    .footer-widget-area:first-child{
        border:none;
    }

    .footer-widget-area {
        border-left: 1px dashed #939393;
        float: left;
        height: 100%;
        padding: 0 25px;
    }

    #footer-widgets .inner-wrapper{
        margin-left: -25px;
        margin-right: -25px;
    }

    .footer-widget-area  a{
        color:#fff;
    }

    .footer-widget-area a:hover,
    #colophon a:hover{
        color:#c2c2c2;
    }

    #colophon a {
        color: #c2c2c2;
    }

    #colophon a:hover {
        opacity: 0.5;
    }

    .footer-widget-area p,
    .footer-widget-area{
        color: #fff;
    }

    #footer-widgets .widget-title {
        color: #c2c2c2;
        font-weight: normal;
    }

    .footer-active-1{
        width: 100%;
    }

    .footer-active-2{
        width: 50%;
    }

    .footer-active-3{
        width: 33.33%;
    }

    .footer-active-4{
        width: 25%;
    }

    .site-footer {
        background-color: #15305b;
        clear: both;
        color: #ffffff;
        padding: 15px 0;
        text-align: center;
    }

    .copyright {
        margin-bottom: 5px;
        margin-top: 5px;
    }

    .social-links {
        margin-bottom: 15px;
    }

    #footer-navigation li:first-child a,
    #quick-links-404 ul li:first-child a {
        border: medium none;
    }

    #footer-navigation li a,
    #quick-links-404 ul li a {
        border-left: 1px solid #dddddd;
        line-height: 0.2;
    }

    /*--------------------------------------------------------------
    ## Inner pages Style By WEN Themes
    --------------------------------------------------------------*/

    #footer-navigation li a,
    #quick-links-404 ul li a {
        color: #ffffff;
        display: block;
        padding: 5px 10px;
    }

    #footer-navigation ul{
        margin: 0;
    }

    #quick-links-404 {
        margin-top: 10px;
    }

    #footer-navigation li,
    #quick-links-404 ul li {
        display: inline-block;
        list-style: outside none none;
    }
    .footer-widget-area .education_hub_widget_social ul li {
        padding: 0;
    }
    .footer-widget-area .education_hub_widget_social ul li:before {
        display: none;
    }


    /*--------------------------------------------------------------
    ## Custom Basic Layout Style By WEN Themes
    --------------------------------------------------------------*/

    body.site-layout-boxed{
    background-color: #ddd;
    }

    .site-layout-boxed #tophead,
    .site-layout-boxed #masthead,
    .site-layout-boxed #main-nav,
    .site-layout-boxed #featured-slider,
    .site-layout-boxed #featured-content,
    .site-layout-boxed #footer-widgets,
    .site-layout-boxed #colophon {
    margin-left: -25px;
    margin-right: -25px;
    }

    .site-layout-boxed #tophead,
    .site-layout-boxed #masthead,
    .site-layout-boxed #featured-content,
    .site-layout-boxed #footer-widgets,
    .site-layout-boxed #colophon{
    padding-left:25px;
    padding-right:25px;
    }

    .site-layout-boxed #main-nav,
    .site-layout-boxed #footer-widgets {
        width: 105%;
    }

    .site-layout-boxed #page {
        background: #ffffff;
        margin: 30px auto;
        overflow: hidden;
        position: relative;
    }

    .site-layout-fluid #page {
    background: inherit;
    box-shadow: inherit;
    margin: 0;
    padding: 0;
    width: 100%;
    }

    .site-layout-boxed #page .container {
    padding: 0;
    width: 100%;
    }

    .global-layout-left-sidebar #primary {
    float: right;
    }

    .global-layout-three-columns #primary {
    display: inline-block;
    float: none;
    width: 50%;
    }

    .global-layout-three-columns #sidebar-primary {
    float: left;
    width: 25%;
    }

    .global-layout-no-sidebar #primary{
    width: 100%;
    }

    .site-layout-fluid #featured-slider .container {
    margin: 0;
    padding-left: 0;
    padding-right: 0;
    width: 100%;
    }

    .site-layout-fluid #main-slider {
    margin: 0;
    }

    /*--------------------------------------------------------------
    ## Custom Basic Scrollup Style By WEN Themes
    --------------------------------------------------------------*/

    .scrollup {
        background: #ffab1f none repeat scroll 0 0;
        bottom: 50px;
        color: #ffffff;
        display: none;
        float: right;
        line-height: 1.2;
        padding: 5px 10px 10px;
        position: fixed;
        right: 32px;
        text-align: center;
        z-index: 99999;
    }

    .scrollup i {
        font-size: 26px;
        color:#294a70;
    }

    .scrollup:hover i {
        font-size: 26px;
        color:#fff;
    }

    /*--------------------------------------------------------------
    ## Custom Basic Inner Pages Style By WEN Themes
    --------------------------------------------------------------*/

    .entry-footer > span,
    .entry-meta > span{
        margin-right: 15px;
    }


    section.error-404 {
        text-align: center;
    }

    h2.error-title {
        font-size: 113px;
        font-style: italic;
        text-shadow: 3px 3px 0 #ffab1f;
    }



    #quick-links-404 ul li a{
        color: #404040;
    }

    .error404 #primary {
        width: 100%;
    }

    form.wpcf7-form input[type="text"],
    form.wpcf7-form input[type="email"],
    input[type="url"] {
        width: 100%;
    }

    /*--------------------------------------------------------------
    ### Custom Basic Breadcrumb  Style By WEN Themes
    --------------------------------------------------------------*/

    #breadcrumb {
    background: #f4f4f4 none repeat scroll 0 0;
    clear: both;
    padding-bottom: 15px;
    padding-top: 15px;
    }


    /*--------------------------------------------------------------
    ## Custom Basic Responsive Style By WEN Themes
    --------------------------------------------------------------*/


    /*  Media Queries
    --------------------------- */
    /* Smaller than standard 1139 (devices and browsers) */
    @media only screen and (max-width:1169px){
        #page,
        .container  {
            width: 97%;
        }

        .main-navigation ul li a {
            font-size: 14px;
            padding: 10px 15px;
        }

        #main-slider .cycle-caption{
            max-width: 50%;
        }
        .main-navigation ul ul {
            top:41px;
        }
    }
    /* Smaller than standard 1024 (devices and browsers) */
    @media only screen and (max-width:1023px){
    .inner-wrapper,
    #footer-widgets .inner-wrapper {
        margin-left: -15px;
        margin-right: -15px;
    }

    #page {
        padding: 0 15px;
        width: 97%;
    }

    #primary,
    #sidebar-primary,
    #sidebar-secondary,
    .site-footer {
        padding-left: 15px;
        padding-right: 15px;
    }

    #main-slider .cycle-caption{
        padding:15px;
    }

    #main-slider .cycle-prev,
    #main-slider .cycle-next{
        bottom: 40%;
    }

    #main-slider .cycle-caption {
        left: 8.5%;
        max-width: 60%;
        padding: 15px 22px;
        top: 25%;
        width: auto;
        z-index: 999;
    }

    #main-slider .cycle-slide {
        width: 100%;
    }

    .main-navigation ul li a {
        font-size: 15px;
        padding: 10px 13px;
    }

    .quick-links {
        margin: 10px auto;
    }

    #calendar_wrap td,
    #calendar_wrap th {
        font-size: 12px;
        padding: 3px;
    }

    #quick-contact {
        float: left;
        padding-top: 20px;
    }

    #notice-ticker,
    .top-news > p {
        min-width: 125px;
    }
        .header-social-wrapper {
            float: left;
            margin-top: 9px;
        }
        #quick-contact {
            padding-top: 20px;
            width: 100%;
        }
    }



    /* All Mobile Sizes (devices and browser) */
    @media only screen and ( max-width: 767px ) {
        h1 {
            font-size:22px;
        }

        h2 {
            font-size: 20px;
        }

        h3 {
            font-size: 18px;
        }

        h4 {
            font-size:16px;
        }

        h5 {
            font-size: 15px;
        }

        h6 {
            font-size: 14px;
        }
        #page #masthead {
            background-position: center top;
            background-size: 100% auto;
            padding-top:110px;
        }
        #page,
        .container  {
            width:100%;
            padding: 0 15px;
        }

        .site-content {
            padding-top: 15px;
        }

        .site-main .post {
            margin-bottom: 15px;
        }

        #primary,
        #sidebar-primary,
        #sidebar-secondary{
            width: 100%;
            clear: both;
        }

        .site-branding {
            text-align: center;
        }

        .site-layout-boxed  #page {
            box-shadow: inherit;
            margin-bottom: 15px;
            margin-top: 15px;
            width: 93%;
        }

        .global-layout-three-columns #primary,
        .global-layout-three-columns #sidebar-primary,
        .global-layout-three-columns #sidebar-secondary {
            display: inline-block;
            float: none;
            width: 100%;
        }

        #quick-contact li {
            display: inline-block;
            float: none;
            margin: 10px 0;
            padding: 0 10px;
        }

        #quick-contact > ul {
            float: left;
            margin: 0;
            padding: 0;
            text-align: center;
            width: 100%;
        }

        #quick-contact {
            padding-top: 8px;
        }

        #quick-contact .top-news-title::before {
            float: none;
        }

        #quick-contact .top-news {
            border: medium none;
            margin: 0;
            padding: 0;
            text-align: center;
            width: 100%;
        }

        .search-section {
            clear: both;
            float: right;
            padding-top: 15px;
            width: 100%;
        }

        #site-identity {
            display: inline-block;
            float: none;
            margin-top: 7px;
        }

        .site-logo-link, .custom-logo-link{
            display: inline-block;
            float: none;
            margin-right: 10px;
            max-width: 75px;
        }
        .site-logo-link, .custom-logo-link{
            float: none;
        }

        /*Top Header social links*/

        .header-social-wrapper {
            float: left;
            margin-bottom: 15px;
            max-width: inherit;
            text-align: center;
            width: 100%;
        }
        .header-social-wrapper .education_hub_widget_social li {
            display: inline-block;
            float: none;
            margin: 4px 2.5px 0;
        }
        .header-social-wrapper .education_hub_widget_social {
            float: none;
            margin: 0 2px 0 0;
            width: 100%;
        }


        /*featured slider style*/

        #main-slider .cycle-prev:after,
        #main-slider .cycle-next:after {
            display: block;
            font-size: 32px;
        }

        #main-slider .cycle-prev,
        #main-slider .cycle-next {
            bottom: 35%;
        }

        #main-slider .cycle-caption {
            left: 12.5%;
        }

        #main-slider .cycle-caption p {
            font-size: 13px;
            height: 63px;
            overflow: hidden;
        }

        #main-slider .cycle-caption h3 {
            font-size: 19px;
            font-weight: bold;
            line-height: 1.4;
            margin-bottom: 6px;
        }

        #featured-content .inner-wrapper article {
            width: 50%;
        }
    #featured-content .inner-wrapper article:nth-child(2n+1) {
            clear: both;
        }

        .recent-news,
        .recent-events {
            float: left;
            padding: 0 15px;
            width: 100%;
        }

        .news-post {
            float: left;
            padding: 0 15px;
            width: 50%;
        }

        #featured-slider {
            clear: both;
            display: block;
        }

        .site-header {
            clear: both;
            padding: 15px 0;
        }

        .recent-news,
        .recent-events {
            margin-bottom: 15px;
        }

    /* Responsive Menu styling*/

    .main-navigation li {
        display: block;
        float: inherit;
        margin-bottom: 0;
        position: relative;
        clear: both;
    }

    .main-navigation li a {
        padding:10px 15px;
        clear: both;
        border-bottom: 1px solid;
    }

    .main-navigation li li a {
        padding-left: 30px;
    }

    .main-navigation li li li a {
        padding-left: 40px;
    }

    .main-navigation li li li li a {
        padding-left: 60px;
    }

    .main-navigation li:hover > a {
        background:inherit;
        color: #ffffff;
    }

    .main-navigation ul ul,
    .main-navigation ul ul ul {
        clear: both;
        display: none;
        float: left;
        left: 0;
        position: inherit;
        top: inherit;
        width: 100%;
    }

    .main-navigation li:hover > ul {
        display: none;
    }

    #main-nav{
        background: inherit;
    }

    .main-navigation ul.sub-menu.toggled-on {
        display: block;
    }
    .main-navigation ul {
        background: #294a70 none repeat scroll 0 0;

    }
    .wrap-menu-content {
        background-color: #666666;
        display: none;
        left: 3.5%;
        position: absolute;
        width: 93%;
        z-index: 9999;
    }

    .main-navigation.toggled .wrap-menu-content {
        display: block;
    }

    .menu-toggle {
        background-color: #294a70;
        border-radius: 3px;
        display: block;
        font-size: 20px;
        line-height: 1.3;
        margin: 15px auto;
        padding: 5px 20px 5px 15px;
        border-radius: 0;
    }

    .menu-toggle i {
        border-right: 1px solid #dddddd;
        float: left;
        font-size: 26px;
        line-height: 1;
        margin-right: 10px;
        padding-right: 15px;
    }

    .dropdown-toggle {
        background:#ffab1f ;
        border: 0 none;
        box-sizing: content-box;
        content: "";
        height: 43px;
        padding: 0;
        position: absolute;
        right: 0;
        text-transform: lowercase;
        top: 0;
        width: 43px;
        z-index: 9999;
    }

    .dropdown-toggle.toggle-on:after {
        content: "-";
        font-size: 45px;
        font-weight: normal;
        line-height: 0.5;
    }

    .dropdown-toggle:after {
        color: #ffffff;
        content: "+";
        font-size: 30px;
        font-weight: bold;
        left: 1px;
        line-height: 42px;
        position: relative;
        top: 0;
        width: 42px;
    }

    .main-navigation ul li.menu-item-has-children > a::after,
    .main-navigation ul li.page_item_has_children > a::after {
        display: none;
    }

}
</style>
</head>
<body>
<div class="container">
    <div class="inner-wrapper">
        @yield('content')
    </div>
</div>
</body>
</html>
