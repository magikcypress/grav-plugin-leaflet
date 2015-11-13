# Grav Leaflet Plugin

`Leaflet` is a [Grav](http://github.com/getgrav/grav) plugin and add the [Leaflet](http://leaflet.com/) in Grav pages.

# Installation

Installing the plugin can be done in one of two ways. Our GPM (_Grav Package Manager_) installation method enables you to quickly and easily install the plugin with a simple terminal command, while the manual method enables you to do so via a zip file.

## GPM Installation (Preferred)

The simplest way to install this plugin is via the [Grav Package Manager (GPM)](http://learn.getgrav.org/advanced/grav-gpm) through your system's Terminal (_also called the **command line**_).  From the root of your Grav install type:

    bin/gpm install leaflet

This will install this plugin into your `/user/plugins` directory within Grav. Its files can be found under `/your/site/grav/user/plugins/leaflet`.

## Manual Installation

To install this plugin, just download the zip version of this repository and unzip it under `/your/site/grav/user/plugins`. Then, rename the folder to `leaflet`. You can find these files either on [GetGrav.org](http://getgrav.org/downloads/plugins#extras).

You should now have all the plugin files under

    /your/site/grav/user/plugins/leaflet

> **NOTE:** This plugin is a modular component for Grav which requires [Grav](http://github.com/getgrav/grav), the [Error](https://github.com/getgrav/grav-plugin-error) and [Problems](https://github.com/getgrav/grav-plugin-problems) plugins, and a theme to be installed in order to operate.

# Usage

Add the Twig code to your template or page (_for page you need to enable the twig process in the configuration file_):

    {{ leaflet({params}) }}

The params format follow the Twig array, example:

    {{ leaflet({'id': 'leaflet', 'class': 'leaflet'}) }}

The plugin comes with some sensible default configuration, that are pretty self explanatory:

# Options

|      Variable     |       Description       | Default |           Example         |
| :---------------- | :---------------------- | :------ | :------------------------ |
| `enabled`         | Enable/Disable Plugin   | enable  | `enabled: true`           |
| `id`              | Div ID (_unique_)       | gmap    | `id: "gmap"`              |
| `width`           | Map Width               | 600     | `width: 600`              |
| `height`          | Map Height              | 450     | `height: 450`             |
| `type`            | Map Type                | roadmap | `type: "roadmap"`         |
| `class`           | Div Class               | leaflet | `class: "leaflet"`        |
| `lat`             | Latitude                |    51   | `latitude: "London"`      |
| `lat`             | Longitude               |    0    | `longitude: "London"`     |
| `address`         | Map Address             |         | `address: "Rome street"`  |
| `zoom`            | Map Zoom                | 15      | `zoom: 15`                |

To customize the plugin, you first need to create an override config. To do so, create the folder `user/config/plugins` (_if it doesn't exist already_) and copy the [leaflet.yaml](leaflet.yaml) config file in there and then make your edits.

Also you can override the default options per-page:

    ---
    title: 'My "Page"'

    leaflet:
      id: "xxxxx"
      zoom: 20
    ---


# Updating

As development for this plugin continues, new versions may become available that add additional features and functionality, improve compatibility with newer Grav releases, and generally provide a better user experience. Updating this plugin is easy, and can be done through Grav's GPM system, as well as manually.

## GPM Update (_Preferred_)

The simplest way to update this plugin is via the [Grav Package Manager (GPM)](http://learn.getgrav.org/advanced/grav-gpm). You can do this with this by navigating to the root directory of your Grav install using your system's Terminal (_also called **command line**_) and typing the following:

    bin/gpm update leaflet

This command will check your Grav install to see if your plugin is due for an update. If a newer release is found, you will be asked whether or not you wish to update. To continue, type `y` and hit **enter**. The plugin will automatically update and clear Grav's cache.

## Manual Update

Manually updating this plugin is pretty simple. Here is what you will need to do to get this done:

* Delete the `your/site/user/plugins/leaflet` directory.
* Download the new version of this plugin from either. [GetGrav.org](http://getgrav.org/downloads/plugins#extras).
* Unzip the zip file in `your/site/user/plugins` and rename the resulting folder to `leaflet`.
* Clear the Grav cache. The simplest way to do this is by going to the root Grav directory in terminal and typing `bin/grav clear-cache`.

> **NOTE:** Any changes you have made to any of the files listed under this directory will also be removed and replaced by the new set. Any files located elsewhere (_for example a YAML settings file placed in_ `user/config/plugins`) will remain intact.
