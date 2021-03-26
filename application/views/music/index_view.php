<?php
/** @var array $data */
?>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() { startplayer(); }, false);
    var player;
    var startButton;
    var pauseButton;
    var i = 0;
    var oldValue = 100;
    var files1Ids = [];
    var files1 = {};
    <?php foreach($data as $item): ?>
        files1Ids.push('<?= $item['id'] ?>');
        files1[<?= $item['id'] ?>] = {
            src: "<?= $item['path'] ?>",
            image: "<?= $item['picture'] ?>",
            title: "<?= $item['title'] ?>",
            singer: "<?= $item['singers'] ?>",
            album: "<?= $item['album_title'] ?? '' ?>",
            year: ""
        };
    <?php endforeach; ?>

    function changePlaylist() {
        let audioPlaylistElement = document.getElementById("playlist_items");
        let content = "";
        for (let inc = 0; inc < files1Ids.length; inc++) {
            let currentAddSong = files1[files1Ids[inc]];
            content += '<div class="playlist_item song_item_'+ files1Ids[inc] +'" id="'+ files1Ids[inc] +'">' +
                '<div class="song_poster" onclick="play_aud_id('+inc+')">' +
                '<img src="'+ currentAddSong.image +'" alt="Poster" />' +
                '<div class="play_playlist">' +
                '<div class="play_button">' +
                '<input type="image" src="/media/image/p/l/play.PNG" id="play_button">' +
                '</div></div></div>' +
                '<div class="song_info">' +
                '<div class="song_title">'+ currentAddSong.title + '</div>' +
                '<div class="singer">'+ currentAddSong.singer + '</div></div></div>';;
        }

        audioPlaylistElement.innerHTML = content;
    }

    function setPlayerMainSong() {
        let currentSong = files1[files1Ids[i]];
        let content = "";
        content += '<div class="center_song_block_poster">' +
            '<img src="'+currentSong.image+'" alt="Poster" />' +
            '</div>' +
            '<div class="center_song_block_info">' +
            '<div class="center_song_block_song_name">' + currentSong.title + '</div>' +
            '<div class="center_song_block_artist">' + currentSong.singer + '</div>' +
            '<div class="center_song_block_year">' + currentSong.year + '</div>';

        if (currentSong.album !== null && currentSong.album !== '' && currentSong.album !== undefined) {
            content += '<div class="center_song_block_album">Album: ' + currentSong.album + '</div>';
        }
        content += "</div>";
        document.getElementById("center_song_block").innerHTML = content;
    }

    function startplayer()
    {
        changePlaylist();
        setPlayerMainSong();
        startButton = document.getElementById("play_music_button");
        pauseButton = document.getElementById("pause_music_button");
        player = document.getElementById('music_player');
        player.controls = false;
        player.src = files1[files1Ids[i]].src;
        $('.playlist_item').removeClass("active");
        document.getElementById("" + files1Ids[i]).classList.add("active");
        player.addEventListener('ended', next, false);
        startButton.hidden = true;
        pauseButton.hidden = false;

        player.addEventListener('loadedmetadata', function() {
            document.getElementById("music_fill_time").innerHTML = secondsToTime(player.duration);
        });

        player.addEventListener('timeupdate', function() {
            document.getElementById("aud_change_time").value = player.currentTime/player.duration;
            document.getElementById("music_current_time").innerHTML = secondsToTime(player.currentTime);
        });
    }

    function secondsToTime(time) {
        let hours = time/3600;
        time %= 3600;
        let minutes = Math.trunc(time/60);
        let audioTime = "";
        let seconds = 0;

        if (hours >= 1) {
            audioTime += Math.trunc(hours) + ":"
        }

        if (minutes < 10 && hours >= 1) {
            minutes = "0" + minutes;
        }

        if (time % 60 < 10) {
            seconds = "0" + Math.trunc(time % 60);
        } else {
            seconds = Math.trunc(time % 60);
        }

        audioTime += minutes + ":" + seconds;

        return audioTime;
    }

    function sound_aud() {
        let audioVolumeElement = document.getElementById("change_vol");
        if (player.volume > 0) {
            oldValue = player.volume;
            audioVolumeElement.value = 0;
            player.volume = 0;
        } else {
            audioVolumeElement.value = oldValue;
            player.volume = oldValue;
        }
    }

    function repeat_aud()
    {
        player.loop = player.loop !== true;


        var repeat_music = document.getElementById("repeat_music");

        if (player.loop === true) {
            repeat_music.style.opacity = 1;
        } else {
            repeat_music.style.opacity = 0.4;
        }
    }

    function play_aud_id(increment_id) {
        i = increment_id;
        setPlayerMainSong();
        player.src = files1[files1Ids[i]].src;
        $('.playlist_item').removeClass("active");
        document.getElementById("" + files1Ids[i]).classList.add("active");
        startButton.hidden = true;
        pauseButton.hidden = false;
        play_aud();
    }

    function shuffle(array) {
        var currentIndex = array.length, temporaryValue, randomIndex;

        // While there remain elements to shuffle...
        while (0 !== currentIndex) {

            // Pick a remaining element...
            randomIndex = Math.floor(Math.random() * currentIndex);
            currentIndex -= 1;

            // And swap it with the current element.
            temporaryValue = array[currentIndex];
            array[currentIndex] = array[randomIndex];
            array[randomIndex] = temporaryValue;
        }

        return array;
    }

    function mix_aud() {
        shuffle(files1Ids)
        changePlaylist();

        $('.playlist_item').removeClass("active");
        console.log(i);
        document.getElementById("" + files1Ids[i]).classList.add("active");
    }

    function play_aud()
    {
        startButton.hidden = true;
        pauseButton.hidden = false;
        player.play();
    }
    function pause_aud()
    {
        startButton.hidden = false;
        pauseButton.hidden = true;
        player.pause();
    }

    function change_vol()
    {
        player.volume=document.getElementById("change_vol").value;
    }

    function change_time() {
        player.currentTime = document.getElementById("aud_change_time").value * player.duration;
    }

    // function for moving to next audio file
    function next() {
        // Check for last audio file in the playlist
        if (i === files1Ids.length - 1) {
            i = 0;
        } else {
            i++;
        }

        setPlayerMainSong();
        // Change the audio element source
        player.src = files1[files1Ids[i]].src;
        $('.playlist_item').removeClass("active");
        document.getElementById("" + files1Ids[i]).classList.add("active");
        startButton.hidden = true;
        pauseButton.hidden = false;
        play_aud()
    }

    // function for moving to next audio file
    function previous() {
        // Check for last audio file in the playlist
        if (i === 0) {
            i = files1Ids.length - 1;
        } else {
            i--;
        }

        setPlayerMainSong();
        // Change the audio element source
        player.src = files1[files1Ids[i]].src;
        $('.playlist_item').removeClass("active");
        document.getElementById("" + files1Ids[i]).classList.add("active");
        startButton.hidden = true;
        pauseButton.hidden = false;
        play_aud()
    }
</script>

<div class="music_page_content">
    <div class="left_playlist_block">
        <div class="block_title">
            Queue
        </div>
        <div class="playlist">
            <div class="playlist_items" id="playlist_items"></div>
        </div>
        <div class="music_control_block">
            <div id="wrapper">
                <div id='player'>
                    <audio id="music_player" autoplay></audio>
                    <div class="top_music_control_block">
                        <div class="top_music_control_block_item dislike">
                            <img src="/media/image/d/i/dislike.png" alt="dislike" />
                        </div>
                        <div class="top_music_control_block_item previous">
                            <input type="image" src="/media/image/p/r/previous.PNG" onclick="previous()" id="play_button">
                        </div>
                        <div class="top_music_control_block_item play" id="play_music_button">
                            <input type="image" src="/media/image/p/l/play.PNG" onclick="play_aud()" id="play_button">
                        </div>
                        <div class="top_music_control_block_item pause" id="pause_music_button" hidden>
                            <input type="image" src="/media/image/p/a/pause.PNG" onclick="pause_aud()" id="play_button">
                        </div>
                        <div class="top_music_control_block_item next">
                            <input type="image" src="/media/image/n/e/next.PNG" onclick="next()" id="play_button">
                        </div>
                        <div class="top_music_control_block_item like">
                            <img src="/media/image/l/i/like.png" alt="like" />
                        </div>
                    </div>
                    <div class="middle_music_control_block">
                        <div class="timeline">
                            <div class="middle_music_control_block_item middle_music_control_block_soundline">
                                <input type="range" id="aud_change_time" onchange="change_time()" step="0.005" min="0" max="1" value="0">
                            </div>
                        </div>
                        <div class="time">
                            <span class="current_time" id="music_current_time">
                                0:00
                            </span>
                            /
                            <span class="fulltime" id="music_fill_time">
                                00:00
                            </span>
                        </div>
                    </div>
                    <div class="bottom_music_control_block">
                        <div class="bottom_music_control_block_item repeat" id="repeat_music">
                            <input type="image" src="/media/image/r/e/repeat.png" onclick="repeat_aud()" id="play_button">
                        </div>
                        <div class="bottom_music_control_block_item mix">
                            <input type="image" src="/media/image/m/i/mix.png" onclick="mix_aud()" id="play_button">
                        </div>
                        <div class="bottom_music_control_block_item sound">
                            <input type="image" src="/media/image/s/o/sound_music.png" onclick="sound_aud()" id="play_button">
                        </div>
                        <div class="bottom_music_control_block_item bottom_music_control_block_soundline">
                            <input type="range" id="change_vol" onchange="change_vol()" step="0.01" min="0" max="1" value="1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="center_song_block" id="center_song_block"></div>
    <div class="right_recommended_movies_block">
        <div class="block_title" hidden>
            Used in movies
        </div>
        <div class="block_title">
            Recommended movies
        </div>
        <div class="right_recommended_movies_items">
            <div class="music_page_content_row">
                <div class="music_page_content_row_content carousel_vertical">
                    <div class="carousel_vertical-button-top"><img src="/media/image/a/r/arrow_top.png" alt="arrow" /></div>
                    <div class="carousel_vertical-wrapper">
                        <div class="carousel_vertical-items">
                            <div class="row_item carousel_vertical-block">
                                <a href="#">
                                    <div class="row_item_poster">
                                        <img src="/media/image/s/e/sex_education.jpg" alt="Poster"/>
                                    </div>
                                </a>
                                <div class="row_item_info">
                                    <div class="content_item_name">
                                        Sex Education
                                    </div>
                                    <div class="content_item_year">
                                        2019
                                    </div>
                                </div>
                            </div>
                            <div class="row_item carousel_vertical-block">
                                <a href="#">
                                    <div class="row_item_poster">
                                        <img src="/media/image/g/r/green_book.jpg" alt="Poster"/>
                                    </div>
                                </a>
                                <div class="row_item_info">
                                    <div class="content_item_name">
                                        Green Book
                                    </div>
                                    <div class="content_item_year">
                                        2018
                                    </div>
                                </div>
                            </div>
                            <div class="row_item carousel_vertical-block">
                                <a href="#">
                                    <div class="row_item_poster">
                                        <img src="/media/image/t/h/the_fast_of_the_furious_8.jpg" alt="Poster"/>
                                    </div>
                                </a>
                                <div class="row_item_info">
                                    <div class="content_item_name">
                                        The Fast of the Furious 8
                                    </div>
                                    <div class="content_item_year">
                                        2018
                                    </div>
                                </div>
                            </div>
                            <div class="row_item carousel_vertical-block">
                                <a href="#">
                                    <div class="row_item_poster">
                                        <img src="/media/image/s/i/silicon_valley.jpg" alt="Poster"/>
                                    </div>
                                </a>
                                <div class="row_item_info">
                                    <div class="content_item_name">
                                        Silicon Valley
                                    </div>
                                    <div class="content_item_year">
                                        2015
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel_vertical-button-bottom"><img src="/media/image/a/r/arrow_bottom.png" alt="arrow" /></div>
                </div>
            </div>
        </div>
    </div>
</div>