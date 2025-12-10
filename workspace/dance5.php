<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Dance5(두아리파)</title>
    <link rel="stylesheet" href="dance.css?v=2">
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
            <h1 class="main_title">두아 리파 Dua Lipa</h1>

            <section class="artist_section">
                <div class="artist_photo">
                    <img src="./images/dance_artist4.png" alt="artist photo">
                </div>

                <div class="artist_info">
                    <p>
                        <strong>이름 : Dua Lipa</strong> <br>
                        출생 : 1995년 8월 22일 (30세) <br>
                        국적 : 영국/알바니아/코소보 (복수국적) <br><br>
                        80년대 디스코와 펑크(Funk)를 현대적인 팝 댄스로 재해석하며 레트로 열풍을 주도하는 글로벌 스타
                    </p>
                </div>
            </section>

            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "newsic"; 
            $target_memNum = 16; 

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
                        <img src="./images/Levitating.png" alt="Song 1 Image">
                        <audio class="song_audio">
                            <source src="./audio/레비테이팅.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                    <div class="song_info">
                        <p>
                            <strong><a href="https://youtu.be/TUVcZfQe-Kw?si=S5xMnh1nQJ8w1hQD"
                                    target="_blank">Levitating (feat. DaBaby)</a></strong><br><br>
                            우주가 생각나는 비트로 몽환적이면서 신나는 디스코 분위기가 조화를 이루는 곡이다.
                        </p>
                    </div>
                </div>

                <div class="song_item">
                    <div class="song_photo">
                        <img src="./images/Don't Start Now.png" alt="Song 2 Image">
                        <audio class="song_audio">
                            <source src="./audio/돈스타트나우.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                    <div class="song_info">
                        <p>
                            <strong><a href="https://youtu.be/oygrmJFKYZY?si=iyy2e5ReVuK23lRB" target="_blank">Don't
                                    Start Now</a></strong><br><br>
                            레트로 디스코 열풍을 전 세계적으로 다시 불러일으켰다.
                        </p>
                    </div>
                </div>

                <div class="song_item">
                    <div class="song_photo">
                        <img src="./images/Good in Bed.png" alt="Song 3 Image">
                        <audio class="song_audio">
                            <source src="./audio/굿인베드.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                    <div class="song_info">
                        <p>
                            <strong><a href="https://youtu.be/bJKr_XQIALk?si=lrI3VXeclDCo8nry" target="_blank">Good In
                                    Bed</a></strong><br><br>
                            싸울 때는 최악이지만, 때로는 너무나 잘 맞는 관계를 솔직하게 이야기한다.
                        </p>
                    </div>
                </div>

                <div class="song_item">
                    <div class="song_photo">
                        <img src="./images/Sweetest Pie.png" alt="Song 4 Image">
                        <audio class="song_audio">
                            <source src="./audio/스윗티스트파이.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                    <div class="song_info">
                        <p>
                            <strong><a href="https://youtu.be/K7JrX7PHGBE?si=HPWhJP1CMdHbPm02" target="_blank">Sweetest
                                    Pie (& Megan Thee Stallion)</a></strong><br><br>
                            팝과 힙합이 완벽하게 조화를 이루는 달콤하고도 강렬한 노래.
                        </p>
                    </div>
                </div>

            </section>

            <!-- 다른 아티스트 보기 -->
            <section class="other-artists-section">
                <h2 class="section-title">다른 아티스트</h2>
                <div class="other-artists-grid">
                    <a href="./dance2.php" class="other-artist-card">
                        <img src="./images/dance_artist1.png" alt="psy" class="other-artist-img">
                        <div class="other-artist-name">싸이 PSY</div>
                    </a>
                    <a href="./dance3.php" class="other-artist-card">
                        <img src="./images/dance_artist2.png" alt="bigbang" class="other-artist-img">
                        <div class="other-artist-name">빅뱅 BigBang</div>
                    </a>
                    <a href="./dance4.php" class="other-artist-card">
                        <img src="./images/dance_artist3.png" alt="beyonce" class="other-artist-img">
                        <div class="other-artist-name">비욘세 Beyonce</div>
                    </a>
                </div>
            </section>
        </div>
    </div>
    <script src="./dance.js"></script>
</body>

</html>

