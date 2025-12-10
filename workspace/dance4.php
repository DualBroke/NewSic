<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Dance4(비욘세)</title>
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
            <h1 class="main_title">비욘세 Beyonce</h1>

            <section class="artist_section">
                <div class="artist_photo">
                    <img src="./images/dance_artist3.png" alt="artist photo">
                </div>

                <div class="artist_info">
                    <p>
                        <strong>이름 : Beyonce</strong><br>
                        출생 : 1981년 9월 4일 (44세) <br>
                        국적 : 미국 <br><br>
                        R&B와 팝을 기반으로 하면서도, 댄스 크루 문화에 영향을 준 그루브와 카리스마 넘치는 무대 장악력을 가진 가수
                    </p>
                </div>
            </section>

            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "newsic"; 
            $target_memNum = 15; 

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
                        <img src="./images/Single Ladies (Put a Ring on It).png" alt="Song 1 Image">
                        <audio class="song_audio">
                            <source src="./audio/싱글레이디.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                    <div class="song_info">
                        <p>
                            <strong><a href="https://youtu.be/4m1EFMoRFvY?si=2f75R433x9vdnIjE" target="_blank">Single
                                    Ladies (Put A Ring On It)</a></strong><br><br>
                            결혼반지를 끼워주지 않은 남자친구에게 시원하게 던지는, 헤어진 후에도 "나는 여전히 멋지다"라고 말하는 독립적인 여성에 대한 곡이다.
                        </p>
                    </div>
                </div>

                <div class="song_item">
                    <div class="song_photo">
                        <img src="./images/Crazy in Love.png" alt="Song 2 Image">
                        <audio class="song_audio">
                            <source src="./audio/크레이지인러브.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                    <div class="song_info">
                        <p>
                            <strong><a href="https://youtu.be/ViwtNLUqkMY?si=FcT5BgqyxzudV2Bc" target="_blank">Crazy In
                                    Love</a></strong><br><br>
                            비욘세를 진정한 솔로 팝 아이콘으로 만들어 준 대표적인 데뷔 히트곡.
                        </p>
                    </div>
                </div>

                <div class="song_item">
                    <div class="song_photo">
                        <img src="./images/Run the World (Girls).png" alt="Song 3 Image">
                        <audio class="song_audio">
                            <source src="./audio/런더월드.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                    <div class="song_info">
                        <p>
                            <strong><a href="https://youtu.be/VBmMU_iwe6U?si=3fwpKtTuESUVyda3" target="_blank">Run The
                                    World (Girls)</a></strong><br><br>
                            전 세계 여성들에게 자신감과 주체적인 힘을 북돋아 주는 파워풀한 노래.
                        </p>
                    </div>
                </div>

                <div class="song_item">
                    <div class="song_photo">
                        <img src="./images/Love On Top.png" alt="Song 4 Image">
                        <audio class="song_audio">
                            <source src="./audio/럽온탑.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                    <div class="song_info">
                        <p>
                            <strong><a href="https://youtu.be/Ob7vObnFUJc?si=o9D2xYsqHiCQ6eiv" target="_blank">Love On
                                    Top</a></strong><br><br>
                            점점 고조되는 전조가 여러 번 반복되면서 벅차오르는 사랑의 감정을 표현한다.
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

