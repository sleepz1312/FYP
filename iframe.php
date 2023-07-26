<!DOCTYPE html>
<html>

<head>
    <title>Media Player</title>
</head>

<body>
    <a href="#" onclick="loadMedia('video', 'path_to_video.mp4')">Play Video</a>
    <a href="#" onclick="loadMedia('audio', 'path_to_audio.mp3')">Play Audio</a>
    <div id="mediaContainer"></div>

    <script>
        function loadMedia(type, path) {
            var mediaContainer = document.getElementById('mediaContainer');
            mediaContainer.innerHTML = '';

            if (type === 'video') {
                var videoElement = document.createElement('video');
                videoElement.controls = true;
                videoElement.src = path;
                mediaContainer.appendChild(videoElement);
            } else if (type === 'audio') {
                var audioElement = document.createElement('audio');
                audioElement.controls = true;
                audioElement.src = path;
                mediaContainer.appendChild(audioElement);
            }
        }
    </script>
</body>

</html>