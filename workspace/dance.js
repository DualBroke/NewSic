// dance.js 파일 내용
// 모든 앨범 표지 요소를 선택
const albumCovers = document.querySelectorAll('.song_photo');

// 각 앨범 표지에 클릭 이벤트 리스너 추가
albumCovers.forEach(cover => {
    // 1. 마우스 커서를 클릭 가능한 모양으로 변경
    cover.style.cursor = 'pointer'; 
    
    // 2. 현재 앨범 표지(cover) 내에서 audio 태그(.song_audio)를 찾음
    const audio = cover.querySelector('.song_audio');
    
    cover.addEventListener('click', function () {
        // 3. spinning 클래스를 토글 (있으면 제거, 없으면 추가)
        this.classList.toggle('spinning');
        
        // 4. 음악 재생/일시정지 로직 실행
        if (audio) {
            if (audio.paused) {
                // 현재 음악이 멈춰있으면,
                
                // 5. 다른 모든 음악 정지
                document.querySelectorAll('.song_audio').forEach(a => {
                    if (a !== audio) {
                        a.pause();
                        a.currentTime = 0; // 음악을 처음으로 되돌림
                    }
                });
                
                // 6. 다른 앨범 표지 회전 정지
                albumCovers.forEach(c => {
                    if (c !== this && c.classList.contains('spinning')) {
                        c.classList.remove('spinning');
                    }
                });
                
                // 7. 현재 음악 재생
                audio.play();
            } else {
                // 현재 음악이 재생 중이면, 일시정지
                audio.pause();
            }
        }
    });
});