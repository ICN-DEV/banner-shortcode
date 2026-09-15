# Banner Shortcode

Welcome to the Coinvestasi Button Shortcode repository! This repository contains a custom WordPress plugin that allows you to easily embed a banner with dynamic content using a shortcode.

## Usage

### Installation

1. **Download the Plugin:**
   - Click on the "Code" button in the GitHub repository.
   - Choose "Download ZIP" to download the repository to your local machine.

2. **Upload to WordPress:**
   - Log in to your WordPress dashboard.
   - Navigate to "Plugins" > "Add New."
   - Click on "Upload Plugin" and choose the ZIP file you downloaded.
   - Activate the plugin.

### Shortcode Usage

Use the following shortcode in your WordPress posts or pages to embed the banner with dynamic content:

```html
[banner_customs banner_copy="Your Custom Banner Copy" button_url="https://coinvestasi.com" button_label="Click Me"]
```

### Shortcode Parameters

All parameters are optional — the plugin will fall back to sensible defaults if omitted.

| Parameter              | Description                                                | Default                                                                                 |
| ---------------------- | ---------------------------------------------------------- | --------------------------------------------------------------------------------------- |
| `banner_copy`          | Headline text displayed on the banner.                     | `Default Banner Copy`                                                                   |
| `button_url`           | URL the CTA button links to.                               | `https://coinvestasi.com/`                                                              |
| `button_label`         | Text shown on the CTA button.                              | `Default Button Label`                                                                  |
| `banner_image`         | Background image URL used for the banner (all viewports).  | `https://wp.coinvestasi.com/wp-content/uploads/2025/07/Banner_822x192.jpg`              |
| `banner_url`           | URL of the iframe host that renders the banner.            | `https://icn-dev.github.io/banner-shortcode/banner.html`                                |
| `iframe_height`        | Iframe height in pixels (minimum 157).                     | `200`                                                                                   |

### Full Example

```html
[banner_customs
  banner_copy="Mulai Investasi Bitcoin"
  button_url="https://coinvestasi.com/register"
  button_label="Daftar Sekarang"
  banner_image="https://example.com/banner.jpg"
  iframe_height="220"]
```
