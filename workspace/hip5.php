<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Kendrick Lamar</title>
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
            <a href="https://oklama.com/" target="_blank">
                Kendrick Lamar
            </a>
        </h1>
        <section class="artist_section">
            <div class="artist_photo">
                <img src="images/kendrick.jpg" alt="kendrick photo">
            </div>

            <div class="artist_info">
                <h4>Kendrick Lamar Duckworth</h4>
                <p>국적: 🇺🇸미국 캘리포니아 주 콤프턴<br>
                    출생: 1987년 6월 17일<br>
                    그룹: Black Hippy, 하이파워 크루<br>
                    레이블:<a
                        href="https://interscope.com/?srsltid=AfmBOorpCBZ6n0YrNs9ZF50sN4v3-SZPvulGPkwKjsLyhfmsrN5OSWn1"
                        target="_blank">인터스코프 레코드</a>,
                    <a href="https://pg-lang.com/" target="_blank">pglang</a><br>
                    데뷔: 2003년
                </p>
            </div>
        </section>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "newsic"; 
        $target_memNum = 8; 

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
                    <img src="images/13.png" alt="Song 1 Image">
                </div>
                <div class="song_info">
                    <h3 class="song_title">
                        <a href="https://youtu.be/B5YNiCfWC3A?si=I6Rpmhhf1KYCQGzv" target="_blank">
                            Swimming Pools
                        </a>
                    </h3>
                    <p class="song_meta">good kid, m.A.A.d city<br>
                        2012년 발매</p>
                    <p class="song_desc">중독성 있는 훅과 사회 비판적 가사가
                        어우러진 서부 힙합의 정수를 보여주는
                        곡이다.</p>
                </div>
            </div>

            <div class="song_item">
                <div class="song_photo">
                    <img src="images/15.png" alt="Song 2 Image">
                </div>
                <div class="song_info">
                    <h3 class="song_title">
                        <a href="https://youtu.be/JQbjS0_ZfJ0?si=EX7u4AmV3VsWBfud" target="_blank">
                            All The Stars (SZA)
                        </a>
                    </h3>
                    <p class="song_meta">Black Pather: The Album, 2018년 발매</p>
                    <p class="song_desc">아프로비트 리듬과 현대적인 팝 요소가
                        결합된 웅장하고 감성적인 사운드가 특징이다.</p>
                </div>
            </div>

            <div class="song_item">
                <div class="song_photo">
                    <img src="images/14.png" alt="Song 3 Image">
                </div>
                <div class="song_info">
                    <h3 class="song_title">
                        <a href="https://youtu.be/zI383uEwA6Q?si=KvKsimT3eCl-Kb6L" target="_blank">
                            N95
                        </a>
                    </h3>
                    <p class="song_meta">Mr.Marale & The Big Steppers<br>
                        2022년 발매</p>
                    <p class="song_desc">격렬한 플로우와 실험적인 프로덕션이
                        결합된 공격적이고 혁신적인 트랙이다.</p>
                </div>
            </div>

            <div class="song_item">
                <div class="song_photo">
                    <img src="images/16.png" alt="Song 4 Image">
                </div>
                <div class="song_info">
                    <h3 class="song_title">
                        <a href="https://youtu.be/H58vbez_m4E?si=iAz19xXBLhLNIXmK" target="_blank">
                            Not Like Us
                        </a>
                    </h3>
                    <p class="song_meta">Not Like Us, 2024년 발매</p>
                    <p class="song_desc">웨스트코스트 펑크 리듬과 날카로운 라임이
                        돋보이는 강렬한 디스 트랙이다.</p>
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
                    <img src="images/don_toliver.jpg" alt="don_toliver" class="other-artist-img">
                    <div class="other-artist-name">Don Toliver</div>
                </a>
                <a href="hip4.php" class="other-artist-card">
                    <img src="images/drake.jpg" alt="Drake" class="other-artist-img">
                    <div class="other-artist-name">Drake</div>
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

