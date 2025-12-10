<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Dance3(빅뱅)</title>
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
            <div class="main_title">빅뱅 BigBang</div>

            <section class="artist_section">
                <div class="artist_photo">
                    <img src="./images/dance_artist2.png" alt="artist photo">
                </div>

                <div class="artist_info">
                    <p>
                        <strong>이름 : 빅뱅</strong><br>
                        멤버 : G-Dragon, 태양, 대성, 탑 <br>
                        국적 : 대한민국 <br><br>
                        스타일리시하고 트렌디한 힙합/댄스 음악을 통해 K-팝의 글로벌 확장을 선도한 그룹
                    </p>
                </div>
            </section>

            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "newsic"; 
            $target_memNum = 14; 

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
                        <img src="./images/붉은 노을.png" alt="Song 1 Image">
                        <audio class="song_audio">
                            <source src="./audio/붉은노을.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                    <div class="song_info">
                        <p>
                            <strong><a href="https://youtu.be/QhjgPFu9K28?si=JwevrKG7B9Qk2ktV" target="_blank">붉은
                                    노을</a></strong><br><br>
                            가수 이문세의 <붉은 노을> 리메이크곡이지만, 빅뱅의 트렌디함으로 새롭게 소화한 곡.
                        </p>
                    </div>
                </div>

                <div class="song_item">
                    <div class="song_photo">
                        <img src="./images/뱅뱅뱅.png" alt="Song 2 Image">
                        <audio class="song_audio">
                            <source src="./audio/뱅뱅뱅.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                    <div class="song_info">
                        <p>
                            <strong><a href="https://youtu.be/2ips2mM7Zqw?si=lQTFTq4iK1OwaSBy"
                                    target="_blank">뱅뱅뱅</a></strong><br><br>
                            인트로부터 많은 사람들을 일어나게 하는 곡. 처음부터 끝까지 떼창이 가능하고, 할 수 밖에 없는 인기곡이다.
                        </p>
                    </div>
                </div>

                <div class="song_item">
                    <div class="song_photo">
                        <img src="./images/거짓말.png" alt="Song 3 Image">
                        <audio class="song_audio">
                            <source src="./audio/거짓말.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                    <div class="song_info">
                        <p>
                            <strong><a href="https://youtu.be/NeDeZUqNiVo?si=y9Dfwq8CiMXBI6jH"
                                    target="_blank">거짓말</a></strong><br><br>
                            발매된 지 18년이 넘어도 세련되고 음악 어플에서도 차트에 오를 만큼 여전히 많은 사람들이 찾는 노래.
                        </p>
                    </div>
                </div>

                <div class="song_item">
                    <div class="song_photo">
                        <img src="./images/GOOD BOY.png" alt="Song 4 Image">
                        <audio class="song_audio">
                            <source src="./audio/굿보이.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                    <div class="song_info">
                        <p>
                            <strong><a href="https://youtu.be/1ZRb1we80kM?si=cyCCzKXyicTmIGYq" target="_blank">Good Boy
                                    (GD X TAEYANG)</a></strong><br><br>
                            세련된 비트와 지디, 태양의 각 잡히고 절도 있는 안무가 매력적이다.
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

