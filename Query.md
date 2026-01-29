# Google Drive Query Guide

This guide explains how to identify Folder IDs and construct search queries for Drive-Bot.

## Retrieving a Folder ID

1.  **Share the Folder:** Open Google Drive, right-click your folder, and select **Share**.
    ![Sharing a Folder](https://i.imgur.com/QKXARr6.png)
    -   **Important:** Set the permission to **"Viewer"** to allow the bot to read files without risking unintended modifications.
2.  **Identify the ID:** Copy the sharing link. It will look similar to this:
    `https://drive.google.com/drive/folders/0B9GvBjf6V7-MZTg4SUZJRWpTTFU?usp=sharing`
    The **Folder ID** is the unique string of characters after `folders/`. In the example above, the ID is `0B9GvBjf6V7-MZTg4SUZJRWpTTFU`.

## Common Search Queries

These search strings are used to configure the `$q` variable inside `config.php`.

### Global Search
To search all files and folders within your entire Google Drive account:
```php
$q = "";
```
*An empty string removes all location filters.*

### Single Folder Search
To search exclusively within one specific folder:
```php
$q = "('[Folder_ID]' in parents) and ";
```
**Example:**
```php
$q = "('0B4FH8NB1ulOxfmR3TDljR2NPVlk1R2pVOFZ5b044S2J1SHFDUnNtbmpTUnpqNVk1MEJValU' in parents) and ";
```

### Date-Based Search
To filter results by their last modification date:
```php
$q = "modifiedTime > '2023-01-01T12:00:00' and ";
```
*Supported operators include: `>`, `<`, `=`, `<=`, and `>=`.*

### Multi-Folder Search
To search across multiple specific folders simultaneously:
```php
$q = "(('[Folder_ID_1]' in parents) or ('[Folder_ID_2]' in parents)) and ";
```
**Example:**
```php
$q = "(('0B4FH8NB1ulOxfmR3TDljR2NPVlk1R2pVOFZ5b044S2J1SHFDUnNtbmpTUnpqNVk1MEJValU' in parents) or ('0B9GvBjf6V7-MZTg4SUZJRWpTTFU' in parents)) and ";
```

For more advanced query options, refer to the [Google Drive API Documentation](https://developers.google.com/drive/api/v3/search-parameters).
