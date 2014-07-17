Pure
======

The Pure CSS WordPress Theme

## Table of Contents

- [Quick Start](#quick-start)
- [Hacks](#hacks)
- [FAQ](#faq)
- [Copyright and license](#copyright-and-license)

## Quick Start

1. Download and extract or clone Pure into the default themes directory.
2. Install up to date Bower dependencies by opening terminal/command prompt in the Pure directory and running `bower install`
3. Activate Pure in the WordPress admin.

## Hacks

WordPress is great, but anyone who has tried to adapt a web application framework like Bootstrap, Foundation or Pure to it will understand that things don't always go smoothly. Since none of these frameworks were built specifically for WordPress, sometimes a hack or questionable technique is needed to add a class, make the code more efficient or fix a weird bug. That being said, not all hacks are created equally.

Inspired by this [CSS Wizardry article](http://csswizardry.com/2013/04/shame-css/), this section is devoted to pointing out the hacks used to create Pure. It is meant to not only bring them to light, but to also explain the logic behind why they exist. Pure is designed for speed, and as such items on the following list are subject to frequent changes as I find more elegant and efficient solutions to these problems.

1. **Primary menu .pure-button hack in [style.css](style.css)**: WordPress does not provide an easy way to add a class to menu links. In order to match the purecss example as closely as possible, primary menu <a> elements need the .pure-button class. To avoid adding a JavaScript dependency solely for the purpose of adding this class, I just directly added the .pure-button css to the '.nav-list li a' styling.

## FAQ

## Copyright and License

Pure is proudly licensed under the [GPLv2](LICENSE).

Copyright &copy; 2014 Leland Riordan.