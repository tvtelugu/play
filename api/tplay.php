<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🕊𝐓𝐕𝐓𝐞𝐥𝐮𝐠𝐮™</title>
    <link rel="icon" type="image/x-icon" href="https://raw.githubusercontent.com/tvtelugu/play/main/images/TVtelugu.ico">
    <style>
          #player-container {
            position: absolute;
            width: 100% !important;
            height: 100% !important;
            overflow: hidden; /* Prevent scrollbars */
        }

        .error-message {
            color: red;
            font-size: 18px;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php 
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;
        if ($id === null) {
            echo '<script src="https://cdn.jsdelivr.net/npm/disable-devtool"></script>';
            echo '<script>window.location.replace("https://t.me/mr_smart_iptv");</script>';
            exit;
        }
        $mpdApiUrl = "https://tsdevil.fun/tp-api/catchup-mpd.php";
        $keyApiUrl = "https://toxicify-tpkeys.vercel.app/$id";
        $mpdData = @file_get_contents($mpdApiUrl);
        $keyData = @file_get_contents($keyApiUrl);
        if ($mpdData !== FALSE && $keyData !== FALSE) {
            $mpdData = json_decode($mpdData, true);
            $keyData = json_decode($keyData, true);
            if ($mpdData !== NULL && isset($mpdData[$id]) && $keyData !== NULL) {
                $output = [
                    "mpd" => $mpdData[$id],
                    "keyid" => isset($keyData['hex_keys'][0]) ? explode(':', $keyData['hex_keys'][0])[0] : null,
                    "key" => isset($keyData['hex_keys'][0]) ? explode(':', $keyData['hex_keys'][0])[1] : null
                ];
                echo '<script>const videoConfig = ' . json_encode($output) . ';</script>';
            } else {
                echo '<div class="error-message">Error: Data not found or invalid.</div>';
            }
        } else {
            echo '<div class="error-message">Error: Failed to fetch data from the API.</div>';
        }
        ?>
        <div id="player-container"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
    <script src="https://content.jwplatform.com/libraries/SAHhwvZq.js"></script>
    <script>
        if (typeof videoConfig !== "undefined" && videoConfig.mpd && videoConfig.keyid && videoConfig.key) {
            jwplayer("player-container").setup({
                file: videoConfig.mpd,
                type: "dash",
                drm: {
                    clearkey: {
                        keyId: videoConfig.keyid,
                        key: videoConfig.key
                    }
                },
                width: "100%",
                height: "100%",
                autostart: true,
                mute: false,
                primary: "html5",
                controls: true,
                logo: {
                    file: "https://raw.githubusercontent.com/tvtelugu/play/main/images/TVtelugu.ico",
                    position: "top-left",
                    hide: false
                }
            });
        } else {
            console.error("Invalid data received from PHP script.");
        }
    </script>
</body>

</html>
