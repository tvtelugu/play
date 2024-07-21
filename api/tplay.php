<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🕊𝐓𝐕𝐓𝐞𝐥𝐮𝐠𝐮™</title>
    <link rel="icon" type="image/x-icon" href="https://raw.githubusercontent.com/tvtelugu/play/main/images/TVtelugu.ico">
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #000;
            overflow: hidden; /* Prevent scrollbars */
        }

        #player-container {
            width: 100%; /* Full viewport width */
            height: calc(100% - 50px); /* Full viewport height minus control panel height */
            position: relative;
        }

        #controls-container {
            width: 100%;
            height: 50px;
            position: absolute;
            bottom: 0;
            background: rgba(0, 0, 0, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            color: #fff;
        }

        #controls-container button {
            background: transparent;
            border: 1px solid #fff;
            color: #fff;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 16px;
        }

        #controls-container button:hover {
            background: #444;
        }

        .error-message {
            color: #ff0000;
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
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
        <div id="controls-container">
            <button id="playPauseBtn">Play</button>
            <button id="volumeBtn">Mute</button>
            <button id="fullscreenBtn">Fullscreen</button>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
    <script src="https://content.jwplatform.com/libraries/SAHhwvZq.js"></script>
    <script>
        if (typeof videoConfig !== "undefined" && videoConfig.mpd && videoConfig.keyid && videoConfig.key) {
            const player = jwplayer("player-container").setup({
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
                stretching: "bestfit",
                autostart: true,
                mute: false,
                primary: "html5"
            });

            document.getElementById('playPauseBtn').addEventListener('click', function() {
                if (player.getState() === "PLAYING") {
                    player.pause();
                    this.textContent = "Play";
                } else {
                    player.play();
                    this.textContent = "Pause";
                }
            });

            document.getElementById('volumeBtn').addEventListener('click', function() {
                if (player.getMute()) {
                    player.setMute(false);
                    this.textContent = "Mute";
                } else {
                    player.setMute(true);
                    this.textContent = "Unmute";
                }
            });

            document.getElementById('fullscreenBtn').addEventListener('click', function() {
                if (player.getFullscreen()) {
                    player.setFullscreen(false);
                    this.textContent = "Fullscreen";
                } else {
                    player.setFullscreen(true);
                    this.textContent = "Exit Fullscreen";
                }
            });
        } else {
            console.error("Invalid data received from PHP script.");
        }
    </script>
</body>

</html>
