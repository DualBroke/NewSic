<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>이승윤 소개</title>
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
                <li><a href="hip1.html">Hip Hop</a></li>
                <li><a href="dance1.html">Dance</a></li>
            </ul>
        </div>
    </nav>
    <div class="recommand_page">
        <div class="title_area">
            <h1 class="main_title">이승윤</h1>
        </div>
        
        <section class="artist_section">
            <div class="artist_photo">
                <img src="./images/LeeSeungyoon.png" alt="artist photo">
            </div>

            <div class="artist_info">
                <h4>이승윤</h4>
                <p>오디션 프로그램 &lt;싱어게인&gt;에서 "장르가 30호"라고 불리며 자신만의 장르를 확고히 알리며 우승하게 된 이승윤은 비록 록 가수라고 명확히 구분하기에는 워낙 음악 스타일이 한 장르에 국한되지 않고 자신만의 색깔이 뚜렷한 아티스트이지만, 굳이 구분하자면 록에 가까운 아티스트이기 때문에 소개하게 되었다.</p>
            </div>
        </section>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "newsic"; 
        $target_memNum = 3; 

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
            <h2 class="section-title-small">가수 상세 정보</h2>
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
                    <img src="./images/들려주고싶었던.png" alt="Song 1 Image">
                </div>
                <div class="song_info">
                    <p><b><a href="https://www.youtube.com/watch?v=afOPnYGjHkY" target="_blank" class="song-title-link">
                        들려주고 싶었던</a></b><br><br>
                        &lt;싱어게인&gt;에서 최종 우승한 후 2021년 2월에 발매한 싱글 곡으로, 라이브 무대에서 관객들과 호흡하며 무대를 즐기는 모습이 인상적인 곡이다. 오랜 무명 생활을 끝내고 발매한 곡인 만큼 가사에 자신의 팬들을 향한 애정을 담아냈으며, 특별히 이 곡은 팬들이 불러줘야 하는 부분이 있기 때문에 음원보다는 라이브로 듣는 것을 추천한다.
                    </p>
                </div>
            </div>


            <div class="song_item">
                <div class="song_photo">
                    <img src="./images/게인주의.png" alt="Song 2 Image">
                </div>
                <div class="song_info">
                    <p><b><a href="https://www.youtube.com/watch?v=aYFx7cy036g" target="_blank" class="song-title-link">
                        게인주의</a></b><br><br>
                        &lt;싱어게인&gt;에서 TOP 10에 들며 자신의 이름을 밝히는 명명식에서 부르면서 자신을 드러냈던 노래이다. 제목을 "개인주의"의 유사 발음인 "게인주의"로 했는데, 음악에서 사용하는 음폭을 의미하는 게인이 폭발한다는 의미를 담고 있다. 하드 록/모던 록이 결합된 사운드에서 자유롭게 자신을 드러내는 이승윤의 모습을 볼 수 있으며, 라이브에서는 정말 이승윤답게 노는 모습을 볼 수 있다.
                    </p>
                </div>
            </div>


            <div class="song_item">
                <div class="song_photo">
                    <img src="./images/캐논.png" alt="Song 3 Image">
                </div>
                <div class="song_info">
                    <p><b><a href="https://www.youtube.com/watch?v=6VBSmfA8BYk" target="_blank" class="song-title-link">
                        캐논</a></b><br><br>
                        캐논이라는 음악 코드 형식에 대한 이승윤의 애정이 담긴 곡이다. 가사 내용의 경우 "너"와 "나" 사이의 애정에 대해 이야기하고 있으며, 개인적으로 "지우지 않을 후회를 줄게 그래 넌 나의 캐논이야"라는 가사를 통해 캐논이라는 코드를 이승윤이 얼마나 좋아하는지를 느낄 수 있어 마음에 들어한다. 전체적으로 따스하면서도 웅장한 분위기가 인상적인 곡이다.
                    </p>
                </div>
            </div>


            <div class="song_item">
                <div class="song_photo">
                    <img src="./images/언덕나무.png" alt="Song 4 Image">
                </div>
                <div class="song_info">
                    <p><b><a href="https://www.youtube.com/watch?v=-YxdzUEpyWA" target="_blank" class="song-title-link">
                        언덕나무</a></b><br><br>
                        드라마 &lt;그 해 우리는&gt;에 삽입된 ost이며, 평소에 팝과 록이 결합된 듯한, 페스티벌에서나 부를 법한 팡팡 튀고 신나는 곡들을 불러왔던 이승윤만을 보았다면 이런 잔잔하고 애틋한 노래도 잘 부르는 이승윤을 보길 바란다. 전체적으로 발라드 곡들과 비교하더라도 더 느리고 잔잔하게 다가오는 이승윤의 따스한 목소리를 충분히 느낄 수 있는 곡이다.
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
                <a href="Rock5.php" class="other-artist-card">
                    <img src="images/YB.png" alt="윤도현밴드" class="other-artist-img">
                    <div class="other-artist-name">윤도현밴드</div>
                </a>
            </div>
        </section>
    </div>
</body>
</html>