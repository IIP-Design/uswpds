# US-WP-DS

This plugin contains a `us-wp-ds.php`, which registers plugin and begins its execution. Additionally, there is an admin class (`admin/class-us-wp-ds-admin.php`) where all admin hooks are registered and the frontend class (`public/class-us-wp-ds-public.php`) where all public hooks are registered. The includes directory contains the main plugin class (`include/class-us-wp-ds.php`), which defines the core functionality of the plugin and the loader file (`include/class-us-wp-ds-loader.php`), which feeds the admin and public hooks in from their respective classes into the main class file.

## Plugin Structure

```bash
├── my-plugin.php
        ├── admin
        │   └── class-my-plugin-admin.php
        ├── includes
        │   ├── class-my-plugin.php
        │   └── class-my-plugin-loader.php
        └── public
            └── class-my-plugin-public.php
```