# NeverCat Wordpress theme

A Wordpress starter theme, although it is covering a lot of possible use cases.
The layout is based on Foundation 5 by Zurb. 

Right out of the box it offers some useful hooks you could use for your modifications/child themes/plugins.
The customizer code enables you to decide if you want to use an off canvas menu and which side you want the sidebar to be.

If you like this, feel free to contact me and/or send me contributions!

## Development Requirements

To make use of the development environment you need some dependencies.

* [Node.js](http://nodejs.org): If you haven't heard of that before you probably should read up on it first.
* [Grunt](http://gruntjs.com/): NeverCat uses Grunt for compiling the sass files and checking the js files, as well as
* [Bower](http://bower.io): This takes care of getting the necessary upstream files.

The project file (package.json) luckily takes care of most of this. Simply

`[sudo] npm install`

and the necessary modules are installed locally, and bower gets called to automatically pull its dependencies

After the initial setup all you need to do is running

`grunt`

so the complete task list is being called. run grunt with a specific taskname to only run that or

`grunt watch`

and grunt awaits changes in the theme files to run whatever task fits.
