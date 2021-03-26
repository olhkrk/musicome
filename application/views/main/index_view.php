<?php
/** @var \Musicome\Model\Playlist[] $data */
?>
<div class="home_page_content">
    <div class="home_page_main_content">
        <div class="home_page_content_row">
            <div class="home_page_content_row_title">
                Recommended Playlist
            </div>
            <div class="home_page_content_row_content carousel">
                <div class="carousel-button-left"><span></span></div>
                <div class="carousel-button-right"><span></span></div>
                <div class="carousel-wrapper">
                    <div class="carousel-items">
                        <?php foreach ($data as $item): ?>
                            <div class="row_item carousel-block">
                                <a href="/music?playlistId=<?= $item->getId() ?>">
                                    <div class="row_item_poster">
                                        <img src="<?= $item->getPicture() ?>" alt="Poster"/>
                                        <div class="play_playlist">
                                            <div class="play_button">
                                                <img src="/media/image/p/l/play.PNG" alt="Play" />
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="row_item_info">
                                    <div class="content_item_name">
                                        <?= $item->getTitle() ?>
                                    </div>
                                    <div class="content_item_author">
                                        <?= $item->getSubtitle() ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>



        <div class="home_page_content_row">
            <div class="home_page_content_row_title">
                Musicome Top-100 Charts
            </div>
            <div class="home_page_content_row_content carousel">
                <div class="carousel-button-left"><span></span></div>
                <div class="carousel-button-right"><span></span></div>
                <div class="carousel-wrapper">
                    <div class="carousel-items">
                        <div class="row_item carousel-block">
                            <a href="#">
                                <div class="row_item_poster">
                                    <img src="/media/image/t/o/top_100_ukraine.jpeg" alt="Poster"/>
                                    <div class="play_playlist">
                                        <div class="play_button">
                                            <img src="/media/image/p/l/play.PNG" alt="Play" />
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="row_item_info">
                                <div class="content_item_name">
                                    Top-100 Ukraine
                                </div>
                            </div>
                        </div>
                        <div class="big_row_item carousel-block">
                            <a href="#">
                                <div class="row_item_poster">
                                    <img src="/media/image/t/o/top_100_new_releases_ukraine.jpg" alt="Poster"/>
                                    <div class="play_playlist">
                                        <div class="play_button">
                                            <img src="/media/image/p/l/play.PNG" alt="Play" />
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="row_item_info">
                                <div class="content_item_name">
                                    Top-100 New Releases (Ukraine)
                                </div>
                            </div>
                        </div>
                        <div class="row_item carousel-block">
                            <a href="#">
                                <div class="row_item_poster">
                                    <img src="/media/image/t/o/top_100_world.jpeg" alt="Poster"/>
                                    <div class="play_playlist">
                                        <div class="play_button">
                                            <img src="/media/image/p/l/play.PNG" alt="Play" />
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="row_item_info">
                                <div class="content_item_name">
                                    Top-100 World
                                </div>
                            </div>
                        </div>
                        <div class="row_item carousel-block">
                            <a href="#">
                                <div class="row_item_poster">
                                    <img src="/media/image/t/o/top_100_freshman.jpg" alt="Poster"/>
                                    <div class="play_playlist">
                                        <div class="play_button">
                                            <img src="/media/image/p/l/play.PNG" alt="Play" />
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="row_item_info">
                                <div class="content_item_name">
                                    Top-100 Freshman
                                </div>
                            </div>
                        </div>
                        <div class="row_item carousel-block">
                            <a href="#">
                                <div class="row_item_poster">
                                    <img src="/media/image/t/o/top_100_new_releases_world.jpg" alt="Poster"/>
                                    <div class="play_playlist">
                                        <div class="play_button">
                                            <img src="/media/image/p/l/play.PNG" alt="Play" />
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="row_item_info">
                                <div class="content_item_name">
                                    Top-100 New Releases (World)
                                </div>
                            </div>
                        </div>
                        <div class="row_item carousel-block">
                            <a href="#">
                                <div class="row_item_poster">
                                    <img src="/media/image/t/o/top_100_usa.jpeg" alt="Poster"/>
                                    <div class="play_playlist">
                                        <div class="play_button">
                                            <img src="/media/image/p/l/play.PNG" alt="Play" />
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="row_item_info">
                                <div class="content_item_name">
                                    Top-100 USA
                                </div>
                            </div>
                        </div>
                        <div class="row_item carousel-block">
                            <a href="#">
                                <div class="row_item_poster">
                                    <img src="/media/image/t/o/top_100_france.jpg" alt="Poster"/>
                                    <div class="play_playlist">
                                        <div class="play_button">
                                            <img src="/media/image/p/l/play.PNG" alt="Play" />
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="row_item_info">
                                <div class="content_item_name">
                                    Top-100 France
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!--<div class="home_page_content_row">
            <div class="home_page_content_row_title">
                Last listened
            </div>
            <div class="home_page_content_row_content carousel">
                <div class="carousel-button-left"><span></span></div>
                <div class="carousel-button-right"><span></span></div>
                <div class="carousel-wrapper">
                    <div class="carousel-items">
                        <div class="row_item carousel-block">
                            <a href="#">
                                <div class="row_item_poster">
                                    <img src="/media/image/t/w/Twenty_One_Pilots_Trench.png" alt="Poster"/>
                                    <div class="play_playlist">
                                        <div class="play_button">
                                            <img src="/media/image/p/l/play.PNG" alt="Play" />
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="row_item_info">
                                <div class="content_item_name">
                                    The Judge
                                </div>
                                <div class="content_item_author">
                                    Twenty One Pilots
                                </div>
                            </div>
                        </div>
                        <div class="row_item carousel-block">
                            <a href="#">
                                <div class="row_item_poster">
                                    <img src="/media/image/m/a/maroon_5_moves_like_jagger.jpg" alt="Poster"/>
                                    <div class="play_playlist">
                                        <div class="play_button">
                                            <img src="/media/image/p/l/play.PNG" alt="Play" />
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="row_item_info">
                                <div class="content_item_name">
                                    Moves Like Jagger
                                </div>
                                <div class="content_item_author">
                                    Maroon 5
                                </div>
                            </div>
                        </div>
                        <div class="row_item carousel-block">
                            <a href="#">
                                <div class="row_item_poster">
                                    <img src="/media/image/n/i/niletto_lyubimka.jpg" alt="Poster"/>
                                    <div class="play_playlist">
                                        <div class="play_button">
                                            <img src="/media/image/p/l/play.PNG" alt="Play" />
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="row_item_info">
                                <div class="content_item_name">
                                    Любимка
                                </div>
                                <div class="content_item_author">
                                    NILETTO
                                </div>
                            </div>
                        </div>
                        <div class="row_item carousel-block">
                            <a href="#">
                                <div class="row_item_poster">
                                    <img src="/media/image/f/r/Freedom_by_Pharrell_Williams.png" alt="Poster"/>
                                    <div class="play_playlist">
                                        <div class="play_button">
                                            <img src="/media/image/p/l/play.PNG" alt="Play" />
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="row_item_info">
                                <div class="content_item_name">
                                    Freedom
                                </div>
                                <div class="content_item_author">
                                    Pharrell Williams
                                </div>
                            </div>
                        </div>
                        <div class="row_item carousel-block">
                            <a href="#">
                                <div class="row_item_poster">
                                    <img src="/media/image/j/o/john_newman_love_me_again.jpg" alt="Poster"/>
                                    <div class="play_playlist">
                                        <div class="play_button">
                                            <img src="/media/image/p/l/play.PNG" alt="Play" />
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="row_item_info">
                                <div class="content_item_name">
                                    Love Me Again
                                </div>
                                <div class="content_item_author">
                                    John Newman
                                </div>
                            </div>
                        </div>
                        <div class="row_item carousel-block">
                            <a href="#">
                                <div class="row_item_poster">
                                    <img src="/media/image/l/i/liked.jpeg" alt="Poster"/>
                                    <div class="play_playlist">
                                        <div class="play_button">
                                            <img src="/media/image/p/l/play.PNG" alt="Play" />
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="row_item_info">
                                <div class="content_item_name">
                                    Понравившиеся
                                </div>
                            </div>
                        </div>
                        <div class="row_item carousel-block">
                            <a href="#">
                                <div class="row_item_poster">
                                    <img src="/media/image/i/m/imagine_dragons_evolve.jpeg" alt="Poster"/>
                                    <div class="play_playlist">
                                        <div class="play_button">
                                            <img src="/media/image/p/l/play.PNG" alt="Play" />
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="row_item_info">
                                <div class="content_item_name">
                                    Beliver
                                </div>
                                <div class="content_item_author">
                                    Imagine Dragons
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
    </div>
</div>


