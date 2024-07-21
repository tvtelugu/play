<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MrSmart TV</title>
    <style>
        body{margin:0;padding:0;background:radial-gradient(circle,#0f0c29,#24243e);color:#fff;font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif}.container{display:flex;flex-direction:column;align-items:center;justify-content:flex-start;min-height:100vh;padding:20px}#player-container{width:100%;max-width:800px;border-radius:10px;overflow:hidden;box-shadow:0 0 20px rgba(0,0,0,.5)}h4{font-size:2rem;font-weight:700;text-transform:uppercase;letter-spacing:2px;color:#8a2be2;text-shadow:0 0 10px rgba(138,43,226,.5);margin-bottom:20px}.error-message{color:red;font-size:1.5rem;text-align:center}
    </style>
</head>
<body>
    <div class="container">
        <?php $id=isset($_GET['id'])?intval($_GET['id']):null;if($id===null){echo '<script src="https://cdn.jsdelivr.net/npm/disable-devtool"></script>';echo '<script>window.location.replace("https://t.me/mr_smart_iptv");</script>';}else{$apiUrl="https://toxicify-tpkeys.vercel.app/$id";$response=@file_get_contents($apiUrl);if($response===FALSE){echo "<script>console.error('Failed to fetch data from API.');</script>";echo '<div class="error-message">Error: Failed to fetch data from the API.</div>';}else{$data=json_decode($response,true);if($data===NULL){echo "<script>console.error('Failed to decode JSON response.');</script>";echo '<div class="error-message">Error: Failed to decode JSON response.</div>';}else{$output=["mpd"=>"https://mrking.site/MPD/tp.mpd?id=$id","keyid"=>isset($data['hex_keys'][0])?explode(':',$data['hex_keys'][0])[0]:null,"key"=>isset($data['hex_keys'][0])?explode(':',$data['hex_keys'][0])[1]:null];echo '<script>';echo 'const videoConfig = '.json_encode($output).';';echo '</script>';}}} ?>

        <h4>MrSmart TV</h4>
        <div id="player-container"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
    <script src="https://content.jwplatform.com/libraries/SAHhwvZq.js"></script>
    <script>
        if("undefined"!=typeof videoConfig&&videoConfig.mpd&&videoConfig.keyid&&videoConfig.key){var e;jwplayer("player-container").setup({file:videoConfig.mpd,type:"dash",drm:{clearkey:{keyId:videoConfig.keyid,key:videoConfig.key}},width:"100%",stretching:"bestfit",autostart:!0,mute:!1,primary:"html5"})}else console.error("Invalid data received from PHP script.");
    </script>
</body>
</html>
