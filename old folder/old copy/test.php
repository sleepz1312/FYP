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
                var videoElement = document.createElement('video');z
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

        <?php if (!empty($id)) { ?>
            <div style="width:350px;">
                <?php if ($filetype == "LINK") { ?>
                    <iframe src="<?php echo $content ?>">
                    </iframe>
                    <?php
                } elseif ($filetype == "IMG") { ?>
                    <iframe src="media/<?php echo $content ?>">
                    </iframe>
                    <?php ?>
                <?php } elseif ($filetype == 'MP3') { ?>
                    <audio controls>
                        <source src="media/<?php echo $content ?>" type='audio/mpeg'>
                    </audio>
                    <?php
                } elseif ($filetype == "MP4") { ?>
                    <video controls>
                        <source src="media/<?php echo $content ?>" type='video/mp4'>
                    </video>
                    <?php
                } elseif ($filetype == "pdf") { ?>
                    <iframe src="media/<?php echo $content ?>">
                    </iframe>
                    <?php
                } else { ?>
                    <iframe src="<?php echo $content ?>">
                    </iframe>
                    <?php
                }
                } ?>

                        <?php if (!empty($id)) { ?>
            <div style="width: 350px;">
                <?php if ($filetype == "LINK") { ?>
                    <iframe src="<?php echo $content ?>"></iframe>
                <?php } elseif ($filetype == "IMG") { ?>
                    <div id="app">
                        <iframe-component :src="'media/' + '<?php echo $content ?>'"></iframe-component>
                    </div>
                <?php } elseif ($filetype == 'MP3') { ?>
                    <audio controls>
                        <source src="media/<?php echo $content ?>" type='audio/mpeg'>
                    </audio>
                <?php } elseif ($filetype == "MP4") { ?>
                    <video controls>
                        <source src="media/<?php echo $content ?>" type='video/mp4'>
                    </video>
                <?php } elseif ($filetype == "pdf") { ?>
                    <iframe src="media/<?php echo $content ?>"></iframe>
                <?php } else { ?>
                    <iframe src="<?php echo $content ?>"></iframe>
                <?php } 
                }?>
            </div>

                        <script>
                // Define the Vue component
                Vue.component('iframe-component', {
                    props: ['src'],
                    template: '<iframe :src="src"></iframe>'
                });

                // Initialize the Vue app
                new Vue({
                    el: '#app',
                });
            </script>

                    <?php if (!empty($id)) { ?>
            <div style="width: 350px;">
                <?php if ($filetype == "LINK") { ?>
                    <iframe src="<?php echo $content ?>"></iframe>
                <?php } elseif ($filetype == "IMG") { ?>
                    <!-- Vue component for IMG -->
                    <div id="app">
                        <iframe-component :src="'media/' + '<?php echo $content ?>'"></iframe-component>
                    </div>
                <?php } elseif ($filetype == 'MP3') { ?>
                    <!-- Vue component for MP3 -->
                    <div id="app">
                        <audio-component :src="'media/' + '<?php echo $content ?>'"></audio-component>
                    </div>
                <?php } elseif ($filetype == "MP4") { ?>
                    <!-- Vue component for MP4 -->
                    <div id="app">
                        <video-component :src="'media/' + '<?php echo $content ?>'"></video-component>
                    </div>
                <?php } elseif ($filetype == "pdf") { ?>
                    <!-- Vue component for PDF -->
                    <div id="app">
                        <pdf-component :src="'media/' + '<?php echo $content ?>'"></pdf-component>
                    </div>
                <?php } else { ?>
                    <!-- Vue component for default (fallback) -->
                    <div id="app">
                        <default-component :src="content"></default-component>
                    </div>
                <?php } }?>
            </div>

            <script>
                // Define the Vue component for IMG
                Vue.component('iframe-component', {
                    props: ['src'],
                    template: '<iframe :src="src"></iframe>'
                });

                // Define the Vue component for MP3
                Vue.component('audio-component', {
                    props: ['src'],
                    template: '<audio controls><source :src="src" type="audio/mpeg"></audio>'
                });

                // Define the Vue component for MP4
                Vue.component('video-component', {
                    props: ['src'],
                    template: '<video controls><source :src="src" type="video/mp4"></video>'
                });

                // Define the Vue component for PDF
                Vue.component('pdf-component', {
                    props: ['src'],
                    template: '<iframe :src="src"></iframe>'
                });

                // Define the Vue component for default (fallback)
                Vue.component('default-component', {
                    props: ['src'],
                    template: '<iframe :src="src"></iframe>'
                });

                // Initialize the Vue app
                new Vue({
                    el: '#app',
                });
            </script>