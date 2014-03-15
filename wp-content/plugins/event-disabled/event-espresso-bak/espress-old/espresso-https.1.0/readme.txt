=== Event Espresso HTTPS (SSL) ===
This plugin is a fork of the WordPress HTTPS plugin by Mike Ems. When he updated the WordPress HTTPS plugin to 2.0 it caused all kinds problems with the Event Espresso registration pages. So we were forced to fork version 1.9.2 of the WordPress HTTPS plugin to support our users.

== Installation ==

1. Upload the `espresso-https` folder to the `/wp-content/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.

== Frequently Asked Questions ==

= How do I make my whole website HTTPS? =

To make your entire website HTTPS, you simply need to change your home url and site url to HTTPS instead of HTTP. Please read <a href="http://codex.wordpress.org/Changing_The_Site_URL" target="_blank">how to change the site url</a>.

= How do I make only my administration panel HTTPS? =

WordPress already has this process well documented. Please read <a href="http://codex.wordpress.org/Administration_Over_SSL" target="_blank">how to set up administration over SSL</a>.

If you are using Shared SSL, there is an option in WordPress HTTPS to Force Shared SSL Admin.

= How do I make only certain pages HTTPS? =

This plugin grants that ability. Within the Publish box on the add/edit post screen, a checkbox for 'Force SSL' has been added to make this process easy. See Screenshots if you're having a hard time finding it.

= How do I fix partially encrypted errors? =

To identify what is causing your page(s) to be insecure, please follow the instructions below.
<ol>
 <li>Download <a href="http://www.google.com/chrome" target="_blank">Google Chrome</a>.</li>
 <li>Open the page you're having trouble with in Google Chrome.</li>
 <li>Open the Developer Tools. <a href="http://code.google.com/chrome/devtools/docs/overview.html#access" target="_blank">How to access the Developer Tools.</a></li>
 <li>Click on the Console tab.</li>
</ol>
For each item that is making your page partially encrypted, you should see an entry in the console similar to "The page at https://www.example.com/ displayed insecure content from http://www.example.com/." Note that the URL that is loading insecure content is HTTP and not HTTPS.

If you see any external elements (not hosted no your server) that are loading over HTTP, try enabling the 'External HTTPS Elements' option in the WordPress HTTPS settings.

Any other insecure content warnings can generally be resolved by changing absolute references to elements, or removing the insecure elements from the page completely. Although WordPress HTTPS does its best to fix all insecure content, there are a few cases that are impossible to fix.
<ul>
 <li>Elements loaded via JavaScript that are hard-coded to HTTP. Usually this can be fixed by altering the JavaScript calling these elements.</li>
 <li>External elements that can not be delivered over HTTPS. These elements will have to be removed from the page, or hosted locally so that they can be loaded over HTTPS.</li>
 <li>YouTube videos - YouTube does not allow videos to be streamed over HTTPS. YouTube videos will have to be removed from secure pages.</li>
 <li>Google Maps - Loading Google maps over HTTPS requires a Google Maps API Premiere account. (<a href="http://code.google.com/apis/maps/faq.html#ssl" target="_blank">source</a>)</li>
</ul>
