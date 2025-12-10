# NewSic 🎵

음악 장르별 추천 웹사이트입니다. J-POP, Rock, Dance, Hip-hop 등 다양한 장르의 음악과 아티스트를 소개합니다.

## 🌟 주요 기능

- **장르별 음악 추천**: J-POP, Rock, Dance, Hip-hop 4가지 주요 장르
- **아티스트 소개**: 각 장르별 대표 아티스트 정보
- **반응형 디자인**: 모바일, 태블릿, 데스크톱 모두 지원
- **인터랙티브 UI**: 호버 효과, 애니메이션 등 동적인 사용자 경험

## 🚀 배포

이 사이트는 [Cloudflare Pages](https://pages.cloudflare.com/)를 통해 배포됩니다.

**배포 URL**: `https://newsic.pages.dev` (배포 후 업데이트 예정)

### 자동 배포

`main` 브랜치에 푸시하면 자동으로 Cloudflare Pages에 배포됩니다.

## 💻 로컬 개발

이 프로젝트는 순수 HTML, CSS, JavaScript로 구성된 정적 웹사이트입니다.

### 실행 방법

1. 저장소 클론:
```bash
git clone https://github.com/DualBroke/NewSic.git
cd NewSic
```

2. 로컬 서버 실행 (방법 1 - Python):
```bash
cd workspace
python3 -m http.server 8000
```

3. 로컬 서버 실행 (방법 2 - Node.js):
```bash
cd workspace
npx http-server -p 8000
```

4. 브라우저에서 접속:
```
http://localhost:8000
```

## 📁 프로젝트 구조

```
NewSic/
├── workspace/          # 웹사이트 소스 파일
│   ├── Home.html      # 메인 페이지
│   ├── Home.css       # 메인 페이지 스타일
│   ├── J-POP 1-5.html # J-POP 페이지들
│   ├── Rock1-5.html   # Rock 페이지들
│   ├── dance1-5.html  # Dance 페이지들
│   ├── hip1-5.html    # Hip-hop 페이지들
│   └── ...            # 기타 리소스
└── README.md
```

## 🎨 기술 스택

- **Frontend**: HTML5, CSS3, JavaScript (Vanilla)
- **Hosting**: Cloudflare Pages
- **Version Control**: Git, GitHub

## 📝 라이선스

이 프로젝트는 교육 목적으로 제작되었습니다.

---

Made with ❤️ by DualBroke
