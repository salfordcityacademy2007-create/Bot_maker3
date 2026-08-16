# Railway Telegram Bot

1. Upload all files in this folder to a GitHub repository.
2. Deploy the repository in Railway.
3. In Railway, open **Settings -> Networking -> Generate Domain**.
4. Redeploy once after the domain exists. The startup script automatically registers the Telegram webhook.
5. Open **Deploy -> Logs** and look for `Webhook URL:` followed by `"ok":true`.

No `config.php` or `jdf.php` is required for this build.

Note: the original project references many `botsSource/*` template files. Those files were not present in the uploaded PHP file, so features that depend on those templates will need their original source files added separately. The core bot/webhook and admin panel code are kept in `index.php`.
