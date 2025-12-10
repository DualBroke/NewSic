<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Drake</title>
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
            <a href="https://drakerelated.com/rooms/front" target="_blank">
                Drake
            </a>
        </h1>
        <section class="artist_section">
            <div class="artist_photo">
                <img src="images/drake.jpg" alt="drake photo">
            </div>

            <div class="artist_info">
                <h4>Aubrey Drake Graham</h4>
                <p>국적: 🇨🇦캐나다 | 🇺🇸 미국<br>
                    출생: 1986년 10월 24일<br>
                    레이블:<a href="https://www.ovosound.com/" target="_blank">OVO Sound</a>,
                    <a href="https://www.republicrecords.com/" target="_blank">리퍼블릭 레코드</a><br>
                    데뷔: 2009년
                </p>
            </div>
        </section>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "newsic"; 
        $target_memNum = 7; 

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
                    <img src="images/9.png" alt="hold_image">
                </div>
                <div class="song_info">
                    <h3 class="song_title">
                        <a href="https://youtu.be/GxgqpCdOKak?si=k8CkW6t3z-wlncPk" target="_blank">
                            Hold in, we're going home
                            (feat. maid Jordan)
                        </a>
                    </h3>
                    <p class="song_meta">Nothing Was The Same<br>
                        2013년 발매</p>
                    <p class="song_desc">R&B와 팝이 결합된 부드러운 신스팝
                        사운드로 감성적인 멜로디가 특징이다.</p>
                </div>
            </div>

            <div class="song_item">
                <div class="song_photo">
                    <img src="images/10.png" alt="Passionfruit_image">
                </div>
                <div class="song_info">
                    <h3 class="song_title">
                        <a href="https://youtu.be/COz9lDCFHjw?si=rlKf5MaFj68_ImGq" target="_blank">
                            Passionfruit
                        </a>
                    </h3>
                    <p class="song_meta">More Life, 2017년 발매</p>
                    <p class="song_desc">카리브해 댄스홀 리듬과 미니멀한
                        프로덕션이 조화를 이루는 트로피컬
                        사운드이다.</p>
                </div>
            </div>

            <div class="song_item">
                <div class="song_photo">
                    <img src="images/11.png" alt="rich_image">
                </div>
                <div class="song_info">
                    <h3 class="song_title">
                        <a href="https://youtu.be/UcsSdIXHCWM?si=zKs0_2kVcbfVG52N" target="_blank">
                            Rich baby daddy
                            (feat.Sexyy Red, SZA)
                        </a>
                    </h3>
                    <p class="song_meta">For All The Dogs, 2023년 발매</p>
                    <p class="song_desc">감각적인 플로우와 트랩 비트가 결합된
                        현대적인 힙합 트랙이다.</p>
                </div>
            </div>

            <div class="song_item">
                <div class="song_photo">
                    <img src="images/12.png" alt="nokia_image">
                </div>
                <div class="song_info">
                    <h3 class="song_title">
                        <a href="https://youtu.be/8ekJMC8OtGU?si=Rht84-bXH1vC-rH6" target="_blank">
                            NOKIA
                        </a>
                    </h3>
                    <p class="song_meta">$ome $exy $ongs 4 U, 2025년 발매</p>
                    <p class="song_desc">그루비한 베이스라인과 잔잔한 멜로디가
                        어우러진 세련된 R&B 힙합 트랙이다.</p>
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
                <a href="hip3.php" class="other-artist-card">
                    <img src="images/don_toliver.jpg" alt="don Toliver" class="other-artist-img">
                    <div class="other-artist-name">Don Toliver</div>
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

