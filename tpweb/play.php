<?php
$channelId = $_GET['id'];
$url = "https://captaintvwc.x10.mx/tataplay/get.php?id=" . $channelId;
$response = file_get_contents($url);
$selectedChannel = json_decode($response, true);

if (!$selectedChannel) {
    echo 'Error: Invalid channel ID';
    exit;
}

$videoUrl = $selectedChannel['channel__url'];
$logoUrl = $selectedChannel['channel_name']; // Assuming there is no logo URL in the JSON, using channel name instead
$videoTitle = $selectedChannel['channel_name'];
$keyid = $selectedChannel['keyid'];
$key = $selectedChannel['key'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🕊𝐓𝐕𝐓𝐞𝐥𝐮𝐠𝐮™</title>
     <link rel="icon" type="image/x-icon" href="https://raw.githubusercontent.com/tvtelugu/play/main/images/TVtelugu.ico">
    <link rel="stylesheet" href="./player.css">
    <style>
        #player {
            position: absolute;
            width: 100% !important;
            height: 100% !important;
        }
         img {
      position: absolute;
      bottom: 35px;
      left: 25px;
   }
  .imgA1 {
  z-index: 1;
  }
    </style>
</head>
<body>
<div id="player"></div>
<img class="imgA1" src="https://raw.githubusercontent.com/tvtelugu/tvtelugu.github.io/main/web/img/tvtelugu%20player.png">
<script src="https://content.jwplatform.com/libraries/KB5zFt7A.js"></script>
<script>
const playerInstance = jwplayer("player").setup({
    controls: true,
    sharing: true,
    displaytitle: true,
    autoplay: true,    
    displaydescription: true,
    abouttext: "🕊𝐓𝐕𝐓𝐞𝐥𝐮𝐠𝐮™",
    aboutlink: "https://t.me/tvtelugu",

    skin: {
        name: "netflix"
    },

    logo: {
        file: "<?php echo $logoUrl; ?>",
        link: "https://t.me/tvtelugu"
    },

    captions: {
        color: "#FFF",
        fontSize: 14,
        backgroundOpacity: 0,
        edgeStyle: "raised"
    },

    playlist: [
        {
            title: "<?php echo $videoTitle; ?>",
            description: "Now On TVTelugu 🕊",
            image: "<?php echo $logoUrl; ?>", // Assuming no specific image, using channel name instead
            sources: [
                {
                    file: "<?php echo $videoUrl; ?>",
                    type: "dash",
                    label: "1080p",
                    default: true,
                    drm: { 
                        "clearkey": {  
                            "keyId": "<?php echo $keyid; ?>",
                            "key": "<?php echo $key; ?>" 
                        } 
                    }
                }
            ]
        }
    ],
    advertising: {
        client: "vast",
        schedule: [
            {
                offset: "pre",
                tag: ""
            }
        ]
    }
});

playerInstance.on("ready", function () {
    const playerContainer = playerInstance.getContainer();
    const buttonContainer = playerContainer.querySelector(".jw-button-container");
    const spacer = buttonContainer.querySelector(".jw-spacer");
    const timeSlider = playerContainer.querySelector(".jw-slider-time");
    buttonContainer.replaceChild(timeSlider, spacer);

    playerInstance.on("adBlock", () => {
        const modal = document.querySelector("div.modal");
        modal.style.display = "flex";

        document.getElementById("close").addEventListener("click", () => location.reload());
    });

    const rewindContainer = playerContainer.querySelector(".jw-display-icon-rewind");
    const forwardContainer = rewindContainer.cloneNode(true);
    const forwardDisplayButton = forwardContainer.querySelector(".jw-icon-rewind");
    forwardDisplayButton.style.transform = "scaleX(-1)";
    forwardDisplayButton.ariaLabel = "Forward 10 Seconds";
    const nextContainer = playerContainer.querySelector(".jw-display-icon-next");
    nextContainer.parentNode.insertBefore(forwardContainer, nextContainer);

    playerContainer.querySelector(".jw-display-icon-next").style.display = "none";
    const rewindControlBarButton = buttonContainer.querySelector(".jw-icon-rewind");
    const forwardControlBarButton = rewindControlBarButton.cloneNode(true);
    forwardControlBarButton.style.transform = "scaleX(-1)";
    forwardControlBarButton.ariaLabel = "Forward 10 Seconds";
    rewindControlBarButton.parentNode.insertBefore(forwardControlBarButton, rewindControlBarButton.nextElementSibling);

    [forwardDisplayButton, forwardControlBarButton].forEach((button) => {
        button.onclick = () => {
            playerInstance.seek(playerInstance.getPosition() + 10);
        };
    });
});
</script>
</body>
</html>