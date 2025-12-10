<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Dance2(싸이)</title>
    <link rel="stylesheet" href="dance.css?v=2">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;600;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <!-- 블러 배경 이미지 (z-index: -2) -->
    <div class="background-div"></div>

    <!-- 휘날리는 컨페티 (z-index: 1) -->
    <div class="falling-petals">
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
                <li><a href="J-POP 1.php">J-POP</a></li>
                <li><a href="hip1.php">Hip Hop</a></li>
                <li><a href="dance1.php" class="active">Dance</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="recommand_page">
            <div class="main_title">싸이 PSY</div>

            <section class="artist_section">
                <div class="artist_photo">
                    <img src="./images/dance_artist1.png" alt="artist photo">
                </div>

                <div class="artist_info">
                    <p>
                        <strong>이름 : 싸이</strong><br>
                        출생 : 1977년 12월 31일 (만 47세) <br>
                        국적 : 대한민국 <br><br>
                        대한민국의 댄스 가수이자 프로듀서, 댄서, 연예 기획사 P NATION의 설립자 겸 사내이사
                    </p>
                </div>
            </section>

            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "newsic"; 
            $target_memNum = 13; 

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
                        <img src="./images/연예인.png" alt="Song 1 Image">
                        <audio class="song_audio">
                            <source src="./audio/연예인.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                    <div class="song_info">
                        <p>
                            <strong><a href="https://youtu.be/Eg8L2dqq0Kw?si=u1KZGSzSAFzIg7hn"
                                    target="_blank">연예인</a></strong><br><br>
                            싸이 특유의 유머러스한 가사와 밝고 경쾌한 리듬의 음악이다. 하지만 그렇다고 결코 가볍지 않다.
                            연기, 노래, 코미디 등 모든 방면으로 연예인이 되어 내가 사랑하는 이를 웃게 해주겠다는 로맨틱한 가사를 담고있다.
                        </p>
                    </div>
                </div>

                <div class="song_item">
                    <div class="song_photo">
                        <img src="./images/챔피언.png" alt="Song 2 Image">
                        <audio class="song_audio">
                            <source src="./audio/챔피언.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                    <div class="song_info">
                        <p>
                            <strong><a href="https://youtu.be/TWreIQTlU-M?si=gE44VAKtpHwm5TZu"
                                    target="_blank">챔피언</a></strong><br><br>
                            이 곡 뿐만 아니라 인생을 진정 즐길 줄 아는 당신이 챔피언이라고, 다같이 외치는 노래이다.
                            이 노래를 들으면 왠지모를 힘을 솓는 경험을 할 수 있을 것이다.
                        </p>
                    </div>
                </div>

                <div class="song_item">
                    <div class="song_photo">
                        <img src="./images/예술이야.png" alt="Song 3 Image">
                        <audio class="song_audio">
                            <source src="./audio/예술이야.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                    <div class="song_info">
                        <p>
                            <strong><a href="https://youtu.be/1cKc1rkZwf8?si=_LCSrCJ_1bYOg05t"
                                    target="_blank">예술이야</a></strong><br><br>
                            "지금 이 순간의 모든 것이 청춘이고 예술이다"
                            가사를 곱씹으며 들을 수록 나 자신과 삶, 내 주변의 모든 것에 감사하고 꿈이자 예술임을 느낄 수 있을 것이다.
                        </p>
                    </div>
                </div>

                <div class="song_item">
                    <div class="song_photo">
                        <img src="./images/뜨거운 안녕.png" alt="Song 4 Image">
                        <audio class="song_audio">
                            <source src="./audio/뜨거운안녕.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                    <div class="song_info">
                        <p>
                            <strong><a href="https://youtu.be/biXhgq7zrSg?si=W2c2BFROK2O2vgEv" target="_blank">뜨거운 안녕
                                    (feat.성시경)</a></strong><br><br>
                            한때 너무나도 사랑했던, 그래서 지긋지긋했던 관계를 드디어 떠나고 놓아주는, '뜨거운 안녕'을 하는 노래.
                        </p>
                    </div>
                </div>

            </section>

            <!-- 다른 아티스트 보기 -->
            <section class="other-artists-section">
                <h2 class="section-title">다른 아티스트</h2>
                <div class="other-artists-grid">
                    <a href="./dance3.php" class="other-artist-card">
                        <img src="./images/dance_artist2.png" alt="bigbang" class="other-artist-img">
                        <div class="other-artist-name">빅뱅 BigBang</div>
                    </a>
                    <a href="./dance4.php" class="other-artist-card">
                        <img src="./images/dance_artist3.png" alt="beyonce" class="other-artist-img">
                        <div class="other-artist-name">비욘세 Beyonce</div>
                    </a>
                    <a href="./dance5.php" class="other-artist-card">
                        <img src="./images/dance_artist4.png" alt="dualipa" class="other-artist-img">
                        <div class="other-artist-name">두아 리파 Dua Lipa</div>
                    </a>
                </div>
            </section>
        </div>
    </div>
    <script src="./dance.js"></script>
</body>

</html>

