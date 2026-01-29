# Chatfuel Setup Guide

This guide details how to integrate Drive-Bot with Facebook Messenger using Chatfuel.

## Registration

1.  **Sign Up:** Visit the [Chatfuel](https://chatfuel.com/) homepage and create an account using your Facebook profile.
2.  **Workspace Creation:** Create a new Workspace and link it to your target Facebook Fan Page.

## Configuration

1.  **Create an Automation Block:** Navigate to the **Automate** tab, create a new Block, and give it a recognizable name.
2.  **Capture User Input:** Add a **User Input** card. This will be used to receive search queries from users.
    ![User Input](https://i.imgur.com/sun2Nk6.png)
3.  **Interactive Elements:** Incorporate **Text** and **Typing** cards to make the bot's responses feel more fluid and natural.
    ![](https://i.imgur.com/TqlwSJ7.png)
4.  **Connect the Backend:** Add a **JSON API** card and configure it to point to the `drive.php` file on your server.
    -   **Method:** Set to `GET`.
    -   **Parameters:** Configure the URL parameters as illustrated in the screenshot below.
    ![](https://i.imgur.com/fTFM8OB.png)
5.  **Set Up AI Triggers:** Navigate to the **Set Up AI** tab. Define specific keywords (e.g., "search", "get", "link", "drive") and link them to the Block created in Step 1.
    ![](https://i.imgur.com/M1bdmuV.png)

### Expected Behavior
Once configured, the bot will trigger the search sequence whenever a user types one of the designated keywords.

**Setup complete. Your Drive-Bot integration is now active!**