<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>쏜애플 소개</title>
    <link rel="stylesheet" href="Rock2.css">
</head>
<body>
    <nav class="navbar">
        <div class="nav-content">
            <a href="Home.php" class="nav-logo">NewSic</a>
            <ul class="nav-menu">
                <li><a href="Home.php">홈</a></li>
                <li><a href="J-POP 1.php">J-POP</a></li>
                <li><a href="Rock1.php" class="active">Rock</a></li>
                <li><a href="hip1.php">Hip Hop</a></li>
                <li><a href="dance1.php">Dance</a></li>
            </ul>
        </div>
    </nav>
    <div class="recommand_page">
        <div class="title_area">
            <h1 class="main_title">쏜애플</h1>
        </div>
        
        <section class="artist_section">
            <div class="artist_photo">
                <img src="./images/ThornApple.png" alt="artist photo">
            </div>

            <div class="artist_info">
                <h4>쏜애플 (ThornApple)</h4>
                <p>"가시사과"라는 뜻을 가진 쏜애플은 2009년 결성된 3인조 록 밴드이다. 남들이 감히 따라할 수 없을 만한 독특한 감성의 가사와 함께 어우러지는 가성인지 진성인지 알 수 없는 윤성현의 미묘한 보컬, 또 엄청난 고음이 있다가도 듣기가 마냥 불편하진 않은 몽환적인 분위기의 이상하다고 표현할 수 있는 밴드이다.</p>
            </div>
        </section>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "newsic"; 
        $target_memNum = 2; 

        // DB 연결
        $conn = new mysqli($servername, $username, $password, $dbname);

        // 연결 확인
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
            <h2 class="section-title-small">밴드 상세 정보</h2>
            <table class="info-table">
                <tbody>
                    <?php if ($has_data): ?>
                    <tr>
                        <th>유형</th>
                        <td><?php echo htmlspecialchars($artist_info['유형']); ?></td>
                    </tr>
                    <tr>
                        <th>이름</th>
                        <td><?php echo htmlspecialchars($artist_info['이름']); ?></td>
                    </tr>
                    <tr>
                        <th>데뷔 년도</th>
                        <td><?php echo htmlspecialchars($artist_info['데뷔년도']); ?></td>
                    </tr>
                    <tr>
                        <th>소속사</th>
                        <td><?php echo htmlspecialchars($artist_info['소속사']); ?></td>
                    </tr>
                    <tr>
                        <th>활동 상태</th>
                        <td><?php echo htmlspecialchars($artist_info['활동상태']); ?></td>
                    </tr>
                    <tr>
                        <th>국적</th>
                        <td><?php echo htmlspecialchars($artist_info['국적']); ?></td>
                    </tr>
                    <tr>
                        <th>장르</th>
                        <td><?php echo htmlspecialchars($artist_info['장르']); ?></td>
                    </tr>
                    <tr>
                        <th>대표곡</th>
                        <td><?php echo htmlspecialchars($artist_info['대표곡']); ?></td>
                    </tr>
                    <?php else: ?>
                    <tr>
                        <td colspan="2">memNum <?php{$target_memNum}?>번에 해당하는 아티스트 정보가 없습니다.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>

        <?php
        // DB 연결 닫기
        end_php_block:
        if (isset($conn) && $conn->ping()) {
            $conn->close();
        }
        ?>

        <section class="songs_section">
            <div class="song_item">
                <div class="song_photo">
                    <img src="./images/시퍼런봄.png" alt="Song 1 Image">
                </div>
                <div class="song_info">
                    <p><b><a href="https://www.youtube.com/watch?v=8i-B1ieI_kY" target="_blank" class="song-title-link">
                        시퍼런 봄</a></b><br><br>
                        '시퍼런 봄'은 한자어 청춘(靑春, 푸른 봄)을 비틀어 표현한 것으로 알려져 있다. 단순히 아름다운 '푸른 봄'이 아니라, 아프고 고통스러운 현실 속의 청춘을 상징하는 '시퍼런' 색으로 표현해 넬 특유의 감각적인 정서를 담아냈다. 사운드는 하드 록에 가까울 정도로 강렬한 편이며, 특히 라이브 공연에서 관객들의 반응이 가장 뜨거운 곡으로 꼽힌다. 삶의 의미를 찾기 위해 끊임없이 고통스럽게 몸부림치는 청춘의 모습을 그린 가사를 음미하며 감상해보자.
                    </p>
                </div>
            </div>


            <div class="song_item">
                <div class="song_photo">
                    <img src="./images/매미는비가와도운다.png" alt="Song 2 Image">
                </div>
                <div class="song_info">
                    <p><b><a href="https://www.youtube.com/watch?v=UtcAcaGfVZw" target="_blank" class="song-title-link">
                        매미는 비가 와도 운다</a></b><br><br>
                        제목에서 말하는 '매미'는 고통스러운 상황('비가 와도')에서도 자신의 본능적인 역할(소통, 울음)을 멈추지 않는 존재, 즉 현실의 고독과 불안 속에서도 이상을 향한 갈망을 멈추지 않는 화자 자신을 상징한다. 음악의 분위기는 대체로 몽환적이고 청량하게 흘러가며, 후반부로 갈수록 감정이 고조되며 넬 특유의 사이키델릭한 분위기를 느낄 수 있다.
                    </p>
                </div>
            </div>


            <div class="song_item">
                <div class="song_photo">
                    <img src="./images/멸종.png" alt="Song 3 Image">
                </div>
                <div class="song_info">
                    <p><b><a href="https://www.youtube.com/watch?v=aezBwpaHxD8" target="_blank" class="song-title-link">
                        멸종</a></b><br><br>
                        운석이 떨어져 세상이 불타는데도 불구하고 '어떻게든 되겠지'라고 하며 무관심하게 생각하는 사람들이 가득한 상황에 대한 가사를 담은 노래이다. 그럼에도 불구하고 화자는 마지막으로 남게 된다 해도 사랑을 포기하지 않겠다는 메시지를 전하고 있다. 전반적으로 비트가 빠르고 기타 연주가 화려한 편이며, 멜로디 또한 고음 위주의 곡이라 연주하거나 부르는 데에 무리가 있어 그저 감상하기에 아주 좋은 노래라고 할 수 있다. 
                    </p>
                </div>
            </div>


            <div class="song_item">
                <div class="song_photo">
                    <img src="./images/수성의하루.png" alt="Song 4 Image">
                </div>
                <div class="song_info">
                    <p><b><a href="https://www.youtube.com/watch?v=OQVDEgtikKA&pp=ygUa7I-c7JWg7ZSMIOyImOyEseydmCDtlZjro6g%3D" target="_blank" class="song-title-link">
                        수성의 하루</a></b><br><br>
                        태양계 행성 중 가장 공전주기가 짧고 자전 속도는 느린 수성은 하루가 매우 길고 극심한 온도차가 나는 극한의 환경을 가진다. 이 수성의 이미지는 화자가 느끼는 길고 지루하며 무의미하게 반복되는 듯한 일상을 상징적으로 표현한다. 개인적으로 특히 공감이 되는 부분은 "그저 나 이렇게 숨만 쉬고 살아도 정말 괜찮은 걸까 마치 한 걸음도 떼지 못한 것마냥 언제나 이 자리에"라는 가사이며, 수성이라는 다소 멀게 느껴질 수 있는 대상을 비유를 통해 친근감 있게 표현한 훌륭한 가사를 가진 노래이다.
                    </p>
                </div>
            </div>

        </section>

        <section class="other-artists-section">
            <h2 class="section-title">다른 아티스트</h2>
            <div class="other-artists-grid">
                <a href="Rock2.php" class="other-artist-card">
                    <img src="images/Nell.png" alt="넬" class="other-artist-img">
                    <div class="other-artist-name">넬</div>
                </a>
                <a href="Rock4.php" class="other-artist-card">
                    <img src="images/LeeSeungyoon.png" alt="이승윤" class="other-artist-img">
                    <div class="other-artist-name">이승윤</div>
                </a>
                <a href="Rock5.php" class="other-artist-card">
                    <img src="images/YB.png" alt="윤도현밴드" class="other-artist-img">
                    <div class="other-artist-name">윤도현밴드</div>
                </a>
            </div>
        </section>
    </div>
</body>
</html>