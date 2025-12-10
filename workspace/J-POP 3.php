<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Official髭男dism</title>
    <link rel="stylesheet" href="J-POP 2.css?v=3">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;600;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <!-- 블러 배경 이미지 (z-index: -2) -->
    <div class="background-div"></div>

    <!-- 벚꽃 배경 (z-index: -1) -->
    <div class="cherry-blossom-bg"></div>

    <!-- 휘날리는 벚꽃 (z-index: 1) -->
    <div class="falling-petals">
        <div class="petal"></div>
        <div class="petal"></div>
        <div class="petal"></div>
        <div class="petal"></div>
        <div class="petal"></div>
        <div class="petal"></div>
        <div class="petal"></div>
        <div class="petal"></div>
        <div class="petal"></div>
        <div class="petal"></div>
        <div class="petal"></div>
        <div class="petal"></div>
        <div class="petal"></div>
        <div class="petal"></div>
        <div class="petal"></div>
        <div class="petal"></div>
        <div class="petal"></div>
        <div class="petal"></div>
        <div class="petal"></div>
        <div class="petal"></div>
    </div>

    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="nav-content">
            <a href="Home.php" class="nav-logo">NewSic</a>
            <ul class="nav-menu">
                <li><a href="Home.php">홈</a></li>
                <li><a href="Rock1.php">Rock</a></li>
                <li><a href="J-POP 1.php" class="active">J-POP</a></li>
                <li><a href="hip1.php">Hip Hop</a></li>
                <li><a href="dance1.php">Dance</a></li>
            </ul>
        </div>
    </nav>

    <div class="recommand_page">
        <h1 class="main_title">Official髭男dism(오피셜 히게단디즘)</h1>

        <section class="artist_section">
            <div class="artist_photo">
                <img src="./images/Official髭男dism.webp" alt="artist photo">
            </div>

            <div class="artist_info">
                <p class="info_text">
                    결성일: 2012년 6월 7일<br>
                    레이블: IRORI Records, Pony Canyon<br>
                    멤버:
                </p>

                <ul class="member_list">
                    <li>마츠우라 마사키(드럼): 1993년생, 파워풀한 드럼 실력과 낚시광</li>
                    <li>후지하라 사토시(보컬, 키보드): 1991년생, 남다른 음역대를 가진 천재 보컬</li>
                    <li>오자사 다이스케(기타): 1994년생, 밴드의 막내이자 헤비메탈 마니아</li>
                    <li>나라자키 마코토(베이스, 색소폰): 1989년생, 베이스와 색소폰의 만능 연주자</li>
                </ul>

            </div>
        </section>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "newsic"; 
        $target_memNum = 10; 

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            echo '<div class="db-error-msg">데이터베이스 연결에 실패했습니다: ' . $conn->connect_error . '</div>';
            goto end_php_block;
        }

        $sql_info = "SELECT 유형, 이름, 데뷔년도, 소속사, `활동상태`, 국적, 장르, 대표곡 FROM singers WHERE memNum = ?";
        $stmt_info = $conn->prepare($sql_info);
        
        $stmt_info->bind_param("i", $target_memNum);
        $stmt_info->execute();
        $result_info = $stmt_info->get_result();
        $artist_info = $result_info->fetch_assoc();
        $stmt_info->close();
        
        $has_data = ($artist_info !== null);
        ?>

        <section class="artist_detail_table">
            <h2 class="section-title-small">아티스트 상세 정보</h2>
            <table class="info-table">
                <tbody>
                    <?php if ($has_data): ?>
                    <tr><th>유형</th><td><?php echo htmlspecialchars($artist_info['유형']); ?></td></tr>
                    <tr><th>이름</th><td><?php echo htmlspecialchars($artist_info['이름']); ?></td></tr>
                    <tr><th>데뷔 년도</th><td><?php echo htmlspecialchars($artist_info['데뷔년도']); ?></td></tr>
                    <tr><th>소속사</th><td><?php echo htmlspecialchars($artist_info['소속사']); ?></td></tr>
                    <tr><th>활동 상태</th><td><?php echo htmlspecialchars($artist_info['활동상태']); ?></td></tr>
                    <tr><th>국적</th><td><?php echo htmlspecialchars($artist_info['국적']); ?></td></tr>
                    <tr><th>장르</th><td><?php echo htmlspecialchars($artist_info['장르']); ?></td></tr>
                    <tr><th>대표곡</th><td><?php echo htmlspecialchars($artist_info['대표곡']); ?></td></tr>
                    <?php else: ?>
                    <tr><td colspan="2">memNum <?php echo $target_memNum; ?>번에 해당하는 아티스트 정보가 없습니다.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>

        <?php
        end_php_block:
        if (isset($conn) && $conn->ping()) {
            $conn->close();
        }
        ?>

        <section class="songs_section">
            <div class="song_item">
                <div class="song_photo" data-song="pretender">
                    <img src="./images/Pretender.png" alt="Song 1 Image">
                    <audio class="song-audio">
                        <source src="./audio/Official髭男dism - Pretender［Official Video］ (mp3cut.net).mp3"
                            type="audio/mpeg">
                    </audio>
                </div>
                <div class="song_info">
                    <p>
                        <b><a href="https://youtu.be/TQ8WlA2GXbk?si=VLXDIjNKmBF_1h0Q" target="_blank"
                                class="song-title-link">Pretender</a></b><br><br>
                        히게단을 전설로 만든 노래이다. 도입부 멜로디만 들어도 '아, 이 노래!' 하고 알게 될것이다. 짝사랑의 아픔을 담은 가사인데 멜로디는 역설적이게도 너무 아름답고 신난다.
                    </p>
                </div>
            </div>

            <div class="song_item">
                <div class="song_photo" data-song="ilove">
                    <img src="./images/I LOVE....png" alt="Song 2 Image">
                    <audio class="song-audio">
                        <source src="./audio/Official髭男dism - I LOVE (mp3cut.net).mp3" type="audio/mpeg">
                    </audio>
                </div>
                <div class="song_info">
                    <p>
                        <b><a href="https://youtu.be/bt8wNQJaKAk?si=Lqs2M5rrrbqLAYqE" target="_blank"
                                class="song-title-link">I LOVE...</a></b><br><br>
                        드라마 <사랑은 계속될 거야 어디까지나> 주제곡이다. 사랑이라는 감정을 정말 웅장하고 벅차오르게 표현했다.
                    </p>
                </div>
            </div>

            <div class="song_item">
                <div class="song_photo" data-song="mixednuts">
                    <img src="./images/Mixed Nuts.png" alt="Song 3 Image">
                    <audio class="song-audio">
                        <source
                            src="./audio/임시 가족이라도, 가족이니까👨_👩_👧 오피셜히게단디즘 - Mixed Nuts(ミックスナッツ) [가사발음한그.mp3"
                            type="audio/mpeg">
                    </audio>
                </div>
                <div class="song_info">
                    <p>
                        <b><a href="https://youtu.be/CbH2F0kXgTY?si=Gj04rEQ_swcv6SqZ" target="_blank"
                                class="song-title-link">Mixed Nuts</a></b><br><br>
                        애니메이션 <스파이 패밀리> 오프닝곡이다. 첩보물답게 음악이 롤러코스터 타듯이 엄청 빠르고 스릴 넘친다.
                    </p>
                </div>
            </div>

            <div class="song_item">
                <div class="song_photo" data-song="subtitle">
                    <img src="./images/Subtitle.png" alt="Song 4 Image">
                    <audio class="song-audio">
                        <source
                            src="./audio/우리의 이야기에 붙여진 자막처럼🎬 오피셜히게단디즘 - Subtitle [가사발음한글 자막.mp3"
                            type="audio/mpeg">
                    </audio>
                </div>
                <div class="song_info">
                    <p>
                        <b><a href="https://youtu.be/hN5MBlGv2Ac?si=tTBcqAnMVHLPCKoW" target="_blank"
                                class="song-title-link">Subtitle</a></b><br><br>
                        일본 스트리밍 역사를 새로 쓴 겨울 연금송이다. 드라마 &ltSilent&gt의 주제가인데, 눈 내리는 겨울밤의 차가움과 사랑의 따뜻함이 동시에 느껴진다.
                    </p>
                </div>
            </div>

        </section>

        <!-- 다른 아티스트 보기 -->
        <section class="other-artists-section">
            <h2 class="section-title">다른 아티스트</h2>
            <div class="other-artists-grid">
                <a href="J-POP 2.php" class="other-artist-card">
                    <img src="./images/Mrs. GREEN APPLE.webp" alt="Mrs. GREEN APPLE" class="other-artist-img">
                    <div class="other-artist-name">Mrs. GREEN APPLE</div>
                </a>
                <a href="J-POP 4.php" class="other-artist-card">
                    <img src="./images/Yuuri.webp" alt="Yuuri" class="other-artist-img">
                    <div class="other-artist-name">Yuuri</div>
                </a>
                <a href="J-POP 5.php" class="other-artist-card">
                    <img src="./images/Yorushika.jpg" alt="Yorushika" class="other-artist-img">
                    <div class="other-artist-name">Yorushika</div>
                </a>
            </div>
        </section>
    </div>

    <script>
        const albumCovers = document.querySelectorAll('.song_photo');

        albumCovers.forEach(cover => {
            cover.style.cursor = 'pointer';
            const audio = cover.querySelector('.song-audio');

            cover.addEventListener('click', function () {
                this.classList.toggle('spinning');

                if (audio) {
                    if (audio.paused) {
                        document.querySelectorAll('.song-audio').forEach(a => {
                            if (a !== audio) {
                                a.pause();
                                a.currentTime = 0;
                            }
                        });
                        albumCovers.forEach(c => {
                            if (c !== this && c.classList.contains('spinning')) {
                                c.classList.remove('spinning');
                            }
                        });
                        audio.play();
                    } else {
                        audio.pause();
                    }
                }
            });
        });
    </script>
</body>

</html>

