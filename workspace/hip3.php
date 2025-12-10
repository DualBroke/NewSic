<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Don Toliver</title>
    <link rel="stylesheet" href="hiphop.css?v=2">
</head>

<body>
    <nav class="navbar">
        <div class="nav-content">
            <a href="Home.php" class="nav-logo">NewSic</a>
            <ul class="nav-menu">
                <li><a href="Home.php">홈</a></li>
                <li><a href="Rock1.php">Rock</a></li>
                <li><a href="J-POP 1.php">J-POP</a></li>
                <li><a href="hip1.php" class="active">Hip Hop</a></li>
                <li><a href="dance1.php">Dance</a></li>
            </ul>
        </div>
    </nav>
    <div class="recommand_page">
        <h1 class="main_title">
            <a href="https://www.dontolivermusic.com/" target="_blank">
                Don Toliver
            </a>
        </h1>
        <section class="artist_section">
            <div class="artist_photo">
                <img src="images/don_toliver.jpg" alt="don_toliver photo">
            </div>

            <div class="artist_info">
                <h4>Caleb Zackery Toliver</h4>
                <p>국적: 🇺🇸미국 텍사스 휴스턴<br>
                    출생: 1994년 6월 12일<br>
                    레이블: Cactus Jack Records<br>
                    <a href="https://www.atlanticrecords.com/" target="_blank">애틀랜틱 레코드</a><br>
                    데뷔: 2018년
                </p>
            </div>
        </section>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "newsic"; 
        $target_memNum = 6; 

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
                <div class="song_photo">
                    <img src="images/7.png" alt="no idea_image">
                </div>
                <div class="song_info">
                    <h3 class="song_title">
                        <a href="https://youtu.be/_r-nPqWGG6c?si=AO8Z6BdJrHXGbR7J" target="_blank">
                            No Idea
                        </a>
                    </h3>
                    <p class="song_meta">Heaven Or Hell, 2020년 발매</p>
                    <p class="song_desc">반복되는 멜로디 훅이 귀에 감기는
                        중독적인 사운드가 특징이다.</p>
                </div>
            </div>

            <div class="song_item">
                <div class="song_photo">
                    <img src="images/8.png" alt="you_image">
                </div>
                <div class="song_info">
                    <h3 class="song_title">
                        <a href="https://youtu.be/aKoPsWBw3RY?si=QL_FEHVQozfr3ikE" target="_blank">
                            You (feat. Travis Scott)
                        </a>
                    </h3>
                    <p class="song_meta">Life of a DON, 2021년 발매</p>
                    <p class="song_desc">부드러운 보컬 라인 위에 그루비한 멜로디,
                        스캇의 피처링이 시너지를 내는 곡이다.</p>
                </div>
            </div>

            <div class="song_item">
                <div class="song_photo">
                    <img src="images/5.png" alt="no pole_image">
                </div>
                <div class="song_info">
                    <h3 class="song_title">
                        <a href="https://youtu.be/A5mURRozXtg?si=jsWEZS8M1ExUzIIU" target="_blank">
                            No Pole
                        </a>
                    </h3>
                    <p class="song_meta">Love Sick, 2023년 발매</p>
                    <p class="song_desc">강렬한 베이스와 몽환적인 신스가 어우러진
                        사이키델릭 트랩 사운드가 인상적이다.</p>
                </div>
            </div>

            <div class="song_item">
                <div class="song_photo">
                    <img src="images/6.png" alt="5_image">
                </div>
                <div class="song_info">
                    <h3 class="song_title">
                        <a href="https://youtu.be/Er6SiVOH9EM?si=IKZd8XM7ex472DsC" target="_blank">
                            5 to 10
                        </a>
                    </h3>
                    <p class="song_meta">HARDSTONE PSYCHO, 2024년 발매</p>
                    <p class="song_desc">레이드백한 보컬과 하드한 808 드럼이
                        대비를 이루는 현대적인 힙합 트랙이다.</p>
                </div>
            </div>
        </section>

        <section class="other-artists-section">
            <h2 class="section-title">다른 아티스트</h2>
            <div class="other-artists-grid">
                <a href="hip2.php" class="other-artist-card">
                    <img src="images/travis_scott.jpg" alt="Travis Scott" class="other-artist-img">
                    <div class="other-artist-name">Travis Scott</div>
                </a>
                <a href="hip4.php" class="other-artist-card">
                    <img src="images/drake.jpg" alt="drake" class="other-artist-img">
                    <div class="other-artist-name">Drake</div>
                </a>
                <a href="hip5.php" class="other-artist-card">
                    <img src="images/kendrick.jpg" alt="Kendrick" class="other-artist-img">
                    <div class="other-artist-name">Kendrick Lamar</div>
                </a>
            </div>
        </section>
    </div>

    <script>
        const songImages = document.querySelectorAll('.song_photo img');
        let currentAudio = null;
        let currentImg = null;

        songImages.forEach(img => {
            img.addEventListener('click', function () {
                const src = this.getAttribute('src');
                const fileName = src.substring(src.lastIndexOf('/') + 1, src.lastIndexOf('.'));

                if (currentAudio) {
                    currentAudio.pause();
                    currentAudio.currentTime = 0;
                    if (currentImg) currentImg.classList.remove('spinning');
                }

                if (currentImg === this) {
                    currentImg = null;
                    currentAudio = null;
                    return;
                }

                currentAudio = new Audio('./audio/' + fileName + '.mp3');
                currentAudio.play();
                this.classList.add('spinning');
                currentImg = this;

                currentAudio.addEventListener('ended', () => {
                    this.classList.remove('spinning');
                    currentImg = null;
                    currentAudio = null;
                });
            });
        });
    </script>
</body>

</html>

