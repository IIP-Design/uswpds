# U.S. (WordPress) Design System

This plugin is intended to make components from the [U.S. Web Design System](https://designsystem.digital.gov/) available within WordPress.

The initial version makes the full USWDS CSS and JavaScript available to the WordPress frontend. The only component currently included is the [official government organization banner](https://designsystem.digital.gov/components/banner/) which is automatically added to all posts when the plugin is activated.

## Plugin Structure

```bash
├── uswpds.php
    ├── admin # Classes required to run the plugin admin
    │   └── class-admin.php
    │
    ├── includes # Classes that orchestrate and initialize plugin hooks
    │   ├── class-uswpds.php # Defines all the hooks
    │   └── class-loader.php # Registers all actions and filters for the plugin.
    │
    └── public # Classes required to run the plugin frontend
        ├── assets # All enqueued frontend scripts and styles
        │   ├── css
        │   ├── fonts
        │   ├── img
        │   └── js
        │
        └── class-frontend.php # Classes required to run the plugin frontend
```
