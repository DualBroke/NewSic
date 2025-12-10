<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yorushika</title>
    <link rel="stylesheet" href="J-POP 2.css?v=2">
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
        <h1 class="main_title">Yorushika(요루시카)</h1>

        <section class="artist_section">
            <div class="artist_photo">
                <img src="./images/Yorushika.jpg" alt="artist photo">
            </div>

            <div class="artist_info">
                <p class="info_text">
                    결성일: 2017년 4월 27일<br>
                    레이블: Polydor Records<br>
                    멤버:
                </p>

                <ul class="member_list">
                    <li>n-buna(작사, 작곡, 기타): 1995년생, 기타, 작곡, 편곡 다 하는 만능 리더</li>
                    <li>suis(보컬): 1995년생, 맑으면서도 호소력 짙은 목소리의 주인공</li>
                </ul>
            </div>
        </section>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "newsic"; 
        $target_memNum = 12; 

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
                <div class="song_photo" data-song="leftright">
                    <img src="./images/Left-Right Confusion.png" alt="Song 1 Image">
                    <audio class="song-audio">
                        <source
                            src="./audio/너의 세상에 조금이라도 좋으니🌺  Yorushika (ヨルシカ) - 左右盲 (좌우맹) [가사해석lyrics] (mp3cut.net).mp3"
                            type="audio/mpeg">
                    </audio>
                </div>
                <div class="song_info">
                    <p>
                        <b><a href="https://youtu.be/1IlTeOMCNJU?si=q3PsJZ6aK4e7bjmK" target="_blank"
                                class="song-title-link">
                                左右盲(좌우맹)</a></b><br><br>
                        영화 <오늘 밤, 세계에서 이 사랑이 사라진다 해도>의 주제가로 유명하다. 잊고 싶지 않은 소중한 기억이 점점 사라져가는 슬픔을 노래했다.
                    </p>
                </div>
            </div>

            <div class="song_item">
                <div class="song_photo" data-song="usotsuki">
                    <img src="./images/嘘月.png" alt="Song 2 Image">
                    <audio class="song-audio">
                        <source src="./audio/Liar (mp3cut.net).mp3" type="audio/mpeg">
                    </audio>
                </div>
                <div class="song_info">
                    <p>
                        <b><a href="https://youtu.be/utpMm8qi4hg?si=FPfl0EGE6tm12Zwq" target="_blank"
                                class="song-title-link">嘘月(거짓말쟁이)</a></b><br><br>
                        영화 <울고 싶은 나는 고양이 가면을 쓴다>의 엔딩 테마곡이다. 여름밤의 짙은 그리움과 쓸쓸함을 담고 있다.
                    </p>
                </div>
            </div>

            <div class="song_item">
                <div class="song_photo" data-song="itte">
                    <img src="./images/言って。.png" alt="Song 3 Image">
                    <audio class="song-audio">
                        <source src="./audio/ヨルシカ - 言って。(Music Video) (mp3cut.net).mp3" type="audio/mpeg">
                    </audio>
                </div>
                <div class="song_info">
                    <p>
                        <b><a href="https://youtu.be/F64yFFnZfkI?si=-1wN-hSp02xyqacs" target="_blank"
                                class="song-title-link">言って。(말해줘)</a></b><br><br>
                        요루시카를 대표하는 또 하나의 명곡이다. "네가 말해줘, 네가 전부 말해줘!"라고 외치는 후렴구가 정말 중독성 있다.
                    </p>
                </div>
            </div>

            <div class="song_item">
                <div class="song_photo" data-song="juntoumei">
                    <img src="./images/準透明少年.png" alt="Song 4 Image">
                    <audio class="song-audio">
                        <source src="./audio/ヨルシカ - 準透明少年 (MUSIC VIDEO) (mp3cut.net).mp3" type="audio/mpeg">
                    </audio>
                </div>
                <div class="song_info">
                    <p>
                        <b><a href="https://youtu.be/9ypEFXTakV8?si=K2bV-08sL0409D6k" target="_blank"
                                class="song-title-link">準透明少年(준투명 소년)</a></b><br><br>
                        요루시카 특유의 질주감이 폭발하는 곡이다. 가사는 슬픈데, 멜로디는 역설적으로 엄청 신나고 빠르다.
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
                <a href="J-POP 3.php" class="other-artist-card">
                    <img src="./images/Official髭男dism.webp" alt="Official髭男dism" class="other-artist-img">
                    <div class="other-artist-name">Official髭男dism</div>
                </a>
                <a href="J-POP 4.php" class="other-artist-card">
                    <img src="./images/Yuuri.webp" alt="Yuuri" class="other-artist-img">
                    <div class="other-artist-name">Yuuri</div>
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

