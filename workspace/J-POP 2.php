<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mrs. GREEN APPLE</title>
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
        <h1 class="main_title">Mrs. GREEN APPLE(미세스 그린 애플)</h1>

        <section class="artist_section">
            <div class="artist_photo">
                <img src="./images/Mrs. GREEN APPLE.webp" alt="artist photo">
            </div>

            <div class="artist_info">
                <p class="info_text">
                    결성일: 2013년 5월 20일<br>
                    레이블: EMI Records<br>
                    멤버:
                </p>

                <ul class="member_list">
                    <li>후지사와 료카(키보드): 1993년생, 화려한 퍼포먼스와 맏형 역할</li>
                    <li>오모리 모토키(보컬, 기타): 1996년생, 작사/작곡/편곡 올라운더 천재</li>
                    <li>와카이 히로토(기타): 1996년생, 밴드의 리더이자 분위기 메이커</li>
                </ul>
            </div>
        </section>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "newsic"; 
        $target_memNum = 9; 

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
                <div class="song_photo" data-song="soranji">
                    <img src="./images/soranji.png" alt="Song 1 Image">
                    <audio class="song-audio">
                        <source src="./audio/Soranji (mp3cut.net).mp3" type="audio/mpeg">
                    </audio>
                </div>
                <div class="song_info">
                    <p>
                        <b><a href="https://youtu.be/44cICMd3jW4?si=BvbqOHb_edlOIzZb" target="_blank"
                                class="song-title-link">soranji</a></b><br><br>
                        영화 <수용소로부터 사랑을 담아>의 주제가이다. 보컬 오모리 모토키의 가창력이 폭발하는 곡이다. 숨소리 하나까지 감정이 실려 있어서 듣다 보면 소름이 돋는다.
                    </p>
                </div>
            </div>

            <div class="song_item">
                <div class="song_photo" data-song="wanted">
                    <img src="./images/WanteD! WanteD!.png" alt="Song 2 Image">
                    <audio class="song-audio">
                        <source src="./audio/Wanted! Wanted! (mp3cut.net).mp3" type="audio/mpeg">
                    </audio>
                </div>
                <div class="song_info">
                    <p>
                        <b><a href="https://youtu.be/PbISczErpKY?si=8jpm_kheLlat43kx" target="_blank"
                                class="song-title-link">WanteD! WanteD!</a></b><br><br>
                        미세스를 대중들에게 확실히 각인시킨 히트곡이다. 드라마 OST로도 쓰였는데, 도망치고 싶은 마음을 시원하게 뚫어주는 느낌이다.
                    </p>
                </div>
            </div>

            <div class="song_item">
                <div class="song_photo" data-song="tenbyou">
                    <img src="./images/Tenbyou-no Uta.png" alt="Song 3 Image">
                    <audio class="song-audio">
                        <source src="./audio/Tenbyouno Uta (mp3cut.net).mp3" type="audio/mpeg">
                    </audio>
                </div>
                <div class="song_info">
                    <p>
                        <b><a href="https://youtu.be/sL-yJIyuEaM?si=lwFRubkFqAKaJ8On" target="_blank"
                                class="song-title-link">Tenbyou-no Uta</a></b><br><br>
                        일본 노래방 랭킹에서 몇 년째 상위권에 있는 전설적인 듀엣곡이다. 여름날의 짝사랑을 정말 아름답고 슬프게 그려냈다.
                    </p>
                </div>
            </div>

            <div class="song_item">
                <div class="song_photo" data-song="start">
                    <img src="./images/StaRt.png" alt="Song 4 Image">
                    <audio class="song-audio">
                        <source src="./audio/즐거움으로 가득 채우자! Mrs (mp3cut.net).mp3" type="audio/mpeg">
                    </audio>
                </div>
                <div class="song_info">
                    <p>
                        <b><a href="https://youtu.be/OTUtF7ZxRN8?si=cCtjsvjAuz3tEmdI" target="_blank"
                                class="song-title-link">StaRt</a></b><br><br>
                        미세스 그린 애플의 메이저 데뷔를 알린 기념비적인 곡이다. 탄산음료 캔을 '탁!' 땠을 때 쏟아지는 거품처럼 청량하고 에너지가 넘친다.
                    </p>
                </div>
            </div>

        </section>

        <!-- 다른 아티스트 보기 -->
        <section class="other-artists-section">
            <h2 class="section-title">다른 아티스트</h2>
            <div class="other-artists-grid">
                <a href="J-POP 3.php" class="other-artist-card">
                    <img src="./images/Official髭男dism.webp" alt="Official髭男dism" class="other-artist-img">
                    <div class="other-artist-name">Official髭男dism</div>
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

