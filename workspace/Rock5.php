<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>윤도현밴드 소개</title>
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
            <h1 class="main_title">윤도현밴드</h1>
        </div>
        
        <section class="artist_section">
            <div class="artist_photo">
                <img src="./images/YB.png" alt="artist photo">
            </div>

            <div class="artist_info">
                <h4>윤도현밴드</h4>
                <p>1994년 데뷔한 이후 현재까지 대학 축제에 빠지지 않을 정도로 열심히 활동하고 있고 한국의 가장 유명한 록 밴드라고도 할 수 있을 정도로 뛰어난 라이브와 퍼포먼스를 발휘하는 밴드이다. 때로는 희망적이고 때로는 신나고 때로는 위로마저 주는 윤도현밴드의 노래들을 살펴보자.</p>
            </div>
        </section>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "newsic"; 
        $target_memNum = 4; 

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
                    <img src="./images/나는나비.png" alt="Song 1 Image">
                </div>
                <div class="song_info">
                    <p><b><a href="https://www.youtube.com/watch?v=TGQR63oqFIM" target="_blank" class="song-title-link">
                        나는 나비</a></b><br><br>
                        "윤도현밴드"하면 가장 먼저 떠오르고 가장 유명한 곡이기 때문에 소개하지 않을 수 없다. "날개를 활짝 펴고 세상을 자유롭게 날 거야" 등의 희망적이고 신나는 가사가 가득한, 들으면 행복해지는 노래이며, 심지어 윤도현밴드가 외국에 갔을 때 그 나라의 어린이들에게 짧게 노래를 불러주었는데 깜짝 이벤트로 그 어린이들이 답가로 다시 노래를 불러줬을 정도로 글로벌하게 유명한 곡이다.
                    </p>
                </div>
            </div>


            <div class="song_item">
                <div class="song_photo">
                    <img src="./images/너를보내고.png" alt="Song 2 Image">
                </div>
                <div class="song_info">
                    <p><b><a href="https://www.youtube.com/watch?v=A5isCs8up-I" target="_blank" class="song-title-link">
                        너를 보내고</a></b><br><br>
                        제목에서도 볼 수 있듯이 가사 내용은 전체적으로 사랑하는 사람을 떠나보내며 느끼는 감정들을 표현해낸 곡이며, 윤도현 특유의 절제하면서도 적당히 표현해내는 감정선이 드러나는 곡이다. 곡의 전체적인 분위기는 발라드라고 볼 수도 있지만, 윤도현의 목소리가 어우러져 의심의 여지가 없는 록 발라드가 된 곡이다.
                    </p>
                </div>
            </div>


            <div class="song_item">
                <div class="song_photo">
                    <img src="./images/잊을게.png" alt="Song 3 Image">
                </div>
                <div class="song_info">
                    <p><b><a href="https://www.youtube.com/watch?v=N1--FFpe0xE" target="_blank" class="song-title-link">
                        잊을게</a></b><br><br>
                        윤도현밴드 하면 주로 록발라드를 떠올릴 수 있겠지만, 사실 히트곡들이 록발라드가 많아서 그렇지 이런 빠르고 힘찬 비트의 곡들도 못하는 것이 아니다. 이 곡의 경우 사랑하는 사람과의 이별 후 그 사람을 그리워하면서 잊겠다는 내용의 가사 흐름이며, 슬픈 가사와 대비되는 빠른 템포와 힘차게 내지르는 고음으로 부르기에 쉽지 않은 노래이지만 윤도현의 뛰어난 소화력이 돋보이는 노래이다.
                    </p>
                </div>
            </div>


            <div class="song_item">
                <div class="song_photo">
                    <img src="./images/흰수염고래.png" alt="Song 4 Image">
                </div>
                <div class="song_info">
                    <p><b><a href="https://www.youtube.com/watch?v=Oma_4cJWWNE" target="_blank" class="song-title-link">
                        흰수염고래</a></b><br><br>
                        윤도현밴드가 전하는 위로의 말 같은 노래이다. 삶이 너무 힘들면 혼자라고 생각하지 말고 흰수염고래처럼 헤엄치자는 희망의 메시지를 전해주는 가사 내용이며 QWER 등 수많은 가수들이 커버하면서 더욱 유명해진 곡이며, 현재까지도 많은 사람들이 위로받고 있는 곡이다.
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
                <a href="Rock3.php" class="other-artist-card">
                    <img src="images/ThornApple.png" alt="쏜애플" class="other-artist-img">
                    <div class="other-artist-name">쏜애플</div>
                </a>
                <a href="Rock4.php" class="other-artist-card">
                    <img src="images/LeeSeungyoon.png" alt="이승윤" class="other-artist-img">
                    <div class="other-artist-name">이승윤</div>
                </a>
            </div>
        </section>
    </div>
    <script>
        // 모든 노래 이미지 선택
        const songImages = document.querySelectorAll('.song_photo img');
        
        // 현재 재생 중인 오디오를 담을 변수 (초기값은 없음)
        let currentAudio = null;
        // 현재 회전 중인 이미지를 담을 변수
        let currentImg = null;

        songImages.forEach(img => {
            img.addEventListener('click', function() {
                const src = this.getAttribute('src');
                
                const fileName = src.substring(src.lastIndexOf('/') + 1, src.lastIndexOf('.'));

                if (currentAudio) {
                    currentAudio.pause(); // 노래 정지
                    currentAudio.currentTime = 0; // 노래 시작점으로
                    if(currentImg) currentImg.classList.remove('spinning'); // 회전 클래스 제거
                }

                // (일시정지 기능)
                // 단순히 멈추기만 하고 함수 종료
                if (currentImg === this) {
                    currentImg = null;
                    currentAudio = null;
                    return;
                }

                // 경로: ./audio/파일명.mp3
                // 주의: mp3 파일은 audio 폴더 안에 있어야 함
                currentAudio = new Audio('./audio/' + fileName + '.mp3');
                
                // 노래 재생
                currentAudio.play();
                
                // 이미지 회전 효과 시작
                this.classList.add('spinning');
                currentImg = this;

                // 노래가 끝나면 자동으로 회전 멈추기
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