<?php
    $conn = mysqli_connect("localhost", "root", "");
    if ($conn){
        echo "DB 접속이 성공했습니다 <br>";
        $myDB = mysqli_select_db($conn, "newsic");
        if (!$myDB){
            echo "newsic DB가 없습니다. <br>";
        }
        else{
            echo "newsic DB가 정상적으로 선택되었습니다. <br>";
            
            $qry = "SELECT 1 as rst";
            $qry .= " FROM information_schema.tables";
            $qry .= " WHERE TABLE_NAME='singers' AND TABLE_SCHEMA='newsic'";
            $rst = mysqli_query($conn, $qry);
            $nRows = mysqli_num_rows($rst);
            echo $nRows . "<br>";
            
            if ($nRows > 0){
                echo "이미 singers 테이블이 존재합니다. <br>";
            }
            else
            {
                $qry = "CREATE TABLE IF NOT EXISTS singers(";
                $qry .= "memNum int NOT NULL,";
                $qry .= "유형 varchar(12) NOT NULL,";
                $qry .= "이름 varchar(30) NOT NULL,";
                $qry .= "데뷔년도 int,";
                $qry .= "소속사 varchar(20),";
                $qry .= "`활동상태` varchar(10),";
                $qry .= "국적 varchar(10),";
                $qry .= "장르 varchar(10),";
                $qry .= "대표곡 varchar(20),";
                $qry .= "PRIMARY KEY(이름)";
                $qry .= ")";
            
                $rst = mysqli_query($conn, $qry);
                if ($rst){
                    echo "테이블이 정상적으로 생성되었습니다.<br>";
                }
                else{
                    echo "테이블 생성이 실패하였습니다: " . mysqli_error($conn) . "<br>";
                }
            }
            
            $qry = "INSERT INTO singers( memNum, 유형, 이름, 데뷔년도, 소속사, `활동상태`, 국적, 장르, 대표곡)";
            $qry .= " VALUES( 1, '밴드', '넬', 1999, '스페이스 보헤미안', '현역', '대한민국', '록', '기억을 걷는 시간')";
            $qry .= " ,( 2, '밴드', '쏜애플', 2009, 'MPMG', '현역', '대한민국', '록', '시퍼런 봄')";
            $qry .= " ,( 3, '솔로', '이승윤', 2013, '마름모', '현역', '대한민국', '록', '들려주고 싶었던')";
            $qry .= " ,( 4, '밴드', '윤도현밴드', 1994, '디컴퍼니', '현역', '대한민국', '록', '나는 나비')";
            $qry .= " ,(5, '솔로', '트래비스 스캇', 2013, 'Cactus Jack Records', '현역', '미국', '힙합', 'FEIN')";
            $qry .= " ,(6, '솔로', '돈 톨리버', 2018, 'Cactus Jack Records/애틀랜틱 레코드', '현역', '미국', '트랩/R&B', 'No Idea')";
            $qry .= " ,(7, '솔로', '드레이크', 2009, 'OVO Sound/리퍼블릭 레코드', '현역', '캐나다/미국', '힙합', 'God\'s Plan')";
            $qry .= " ,(8, '솔로', '켄드릭 라마', 2003, '인터스코프 레코드', '현역', '미국', '힙합', 'HUMBLE')";
            $qry .= " ,(9, '밴드', 'Mrs. GREEN APPLE(미세스 그린애플)', 2013, 'EMI Records', '현역', '일본', '얼터너티브 록/팝 록', '푸름과 여름(青と夏)')";
            $qry .= " ,(10, '밴드', 'Official髭男dism(오피셜 히게단디즘)', 2012, 'IRORI Records/Pony Canyon', '현역', '일본', 'J-POP / 모던 록 / 팝 록 / 피아노 록', 'Pretender')";
            $qry .= " ,(11, '솔로', 'Yuuri(유우리)', 2019, 'Ariola Japan', '현역', '일본', 'J-POP / 모던 록', 'Betelgeuse')";
            $qry .= " ,(12, '밴드', 'Yorushika(요루시카)', 2017, 'Polydor Records', '현역', '일본', 'J-POP / 팝 록', '그저 네게 맑아라(ただ君に晴れ)')";
            $qry .= " ,( 13, '솔로', '싸이', '2001', 'P NATION', '현역', '대한민국', '댄스', '강남스타일')";
            $qry .= " ,( 14, '그룹', '빅뱅', '2006', '前YG엔터테인먼트', '현역', '대한민국', '댄스, 랩', '뱅뱅뱅')";
            $qry .= " ,( 15, '솔로', '비욘세', '2003', '파크우드 엔터테인먼트', '현역', '미국', '팝', 'Crazy In Love')";
            $qry .= " ,( 16, '솔로', '두아리파', '2015', '워너 레코드', '현역', '영국, 알바니아, 코소보', '팝', 'New Rules')";
            $rst = mysqli_query($conn, $qry);
            if ($rst){
                echo "정상적으로 기입되었습니다. <br>";
            }
            else{
                echo "데이터 기입 실패: " . mysqli_error($conn) . "<br>";
            }
        }
    }
    else{
        echo "DB 접속이 실패하였습니다 <br>";
    }
        
    if (is_resource($conn))
    {
        mysqli_close($conn);
    }
?>
