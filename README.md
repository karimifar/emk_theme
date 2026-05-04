# EMK Theme — Personal WordPress Theme

A custom **WordPress theme** for a personal portfolio and blog, built on the Underscores (`_s`) starter theme. Designed to showcase a developer's work samples alongside technical writing.

## Overview

EMK Theme provides a clean, code-first personal site with distinct sections for a portfolio of work projects and a technical blog. Code blocks in posts are syntax-highlighted with Prism.js. The theme includes custom page templates for the home page, a works/portfolio grid, and individual project and post pages.

## Custom Templates

| Template | Purpose |
|----------|---------|
| `page-home.php` | Landing page with intro and featured work |
| `page-works.php` | Portfolio grid listing all work projects |
| `single-works.php` | Individual work/project detail page |
| `single-blog.php` | Blog post with Prism.js syntax highlighting |

## Tech Stack

- **WordPress** — CMS
- **PHP** — template rendering
- **Underscores (`_s`)** — starter theme base
- **Prism.js** — syntax highlighting for code in blog posts
- **Vanilla JavaScript** — nav resize behavior, work project interactions

## Installation

1. Copy this directory to `wp-content/themes/emk_theme/`
2. Activate via **Appearance → Themes** in WordPress admin
3. Assign custom templates via the Page Attributes panel when editing pages
