# Drive-Bot

Drive-Bot is a Facebook Messenger-based tool designed to help you search for documents across extensive Google Drive storage spaces seamlessly.

![img](https://i.imgur.com/OylNJWm.png)

## Prerequisites

To deploy Drive-Bot, ensure your environment meets the following requirements:

- **Web Server:** Apache2 or Nginx
- **PHP:** Version 5.6 or higher
- **Composer:** PHP dependency manager (Recommended)
- **Infrastructure:** VPS or shared hosting with internet access

## Installation

### Deployment on a VPS

1.  **Navigate to your web root directory:**
    ```bash
    cd /var/www/html
    ```

2.  **Clone the repository and enter the project folder:**
    ```bash
    git clone https://github.com/VNBot-Developers/Drive-Bot && cd Drive-Bot
    ```

3.  **Install dependencies:**
    Use Composer to install the required PHP libraries:
    ```bash
    composer install
    ```
    *The installation process typically completes within 2–3 minutes, depending on your network speed.*

4.  **Configure the application:**
    Open `config.php` and update the `$q` variable to match your specific search criteria.
    - **Note:** For details on constructing search queries, please refer to the [Query Documentation](Query.md).

5.  **Set up Chatfuel:**
    Integration with Facebook Messenger requires specific configurations on Chatfuel. Follow the instructions in the [Chatfuel Setup Guide](ChatFuel.md).

6.  **Authenticate with Google Drive:**
    Access the URL pointing to `drive.php` on your server. Click the "click" link to initiate the Google OAuth login process.
    ![](https://i.imgur.com/ZLGnER3.png)

7.  **Grant Permissions:**
    Authorize the application to access your Google Drive when prompted.

8.  **Token Configuration:**
    After authorization, the system will generate an access token. Copy this token, paste it into the provided input field, and click **Send**.
    ![](https://i.imgur.com/sAgzsCC.png)

9.  **Deployment Complete:**
    Drive-Bot is now ready for operation.

### Deployment on Shared Hosting

1.  **Download the source:**
    Download the complete source code package from [this link](https://drive.google.com/open?id=1tMz6D1U_u_wrXx_xJHw_okzLBVsHMGqE).
2.  **Upload files:**
    Upload the files to your hosting directory using an FTP client (e.g., FileZilla).
3.  **Finalize Setup:**
    Follow steps 4 through 8 as described in the VPS deployment section to complete the configuration.

## Support & Contact

If you have any questions or need assistance, feel free to reach out:

- **Facebook:** [Trần Đức Ý](https://www.facebook.com/Tranducy1999)
- **Email:** [ducyk41cntt@gmail.com](mailto:ducyk41cntt@gmail.com)